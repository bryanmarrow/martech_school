const urlParams = new URLSearchParams(window.location.search);
const id_escuela = urlParams.get('id_escuela');
const id_generacion = urlParams.get('id_generacion');
var id_comprobante;


const Alert = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    },
})

$(document).ready(() => {
    Fancybox.bind('[data-fancybox]', {
        
    }); 
    
    setGruposEscuela();
})

let tabla_comprobantes = new DataTable('#tabla_comprobantes', {    
    dom: 'Blfrtip',
    buttons: [
        'copy',
        'pdf',
        'print'
    ],
    "responsive": true,
    "pageLength": 10,
    "order": [
        [2, "desc"]
    ],
    "columnDefs": [{
        "targets": [0,1],
        "visible": false
    }],
    "ajax": {
        "url": "controllers/comprobantes",
        "method": 'POST',
        "data": {
            action: 'get_comprobantes',
            id_escuela: id_escuela

        },
        "dataSrc": ""
    },
    "columns": [
        {
            "defaultContent":``,
            "render":function(data, type, row, meta){
                return `<div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox"  />
                </div>`
            }
        },
        {
            "data": "id_comprobante"
        },
        {            
            "data": "create_date_comprobante",
        },
        {            
            "data": "nombre_completo_estudiante",
        },
        {            
            "data": "nombre_cuota",
        },
        {            
            "data": "nombre_ciclo_escolar",
        },       
        {

            "data": "badge_admin_status"
        },
        {
            "data": "file_comprobante",
            "render": function(data, type, row, meta){                
                type_fancy=row['format_comprobante']=='application/pdf' ? 'iframe' : '';
                return `
                    <a                           
                        class="btn btn-info btn-sm m-0 p-2 btn_viewcomprobante"                        

                    >
                        <i class="far fa-file-archive"></i>
                    </a>
                `
            }
        },
        {
            // width: 90,
            "defaultContent":``,
            "render": function (data, type, row, meta) {
                return `                                        
                    <div class="font-sans-serif btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                    </div>
                `;
            }
        }
    ]
});



$(document).on('click', '.btn_viewcomprobante', function(){
    fila = $(this).closest("tr");
    tabla_comprobantes.row(this).child.isShown() ? data = tabla_comprobantes.row(this).data() : data = tabla_comprobantes.row(fila).data();
    
    // console.log(data)
    img_comprobante='data:'+data.format_comprobante+';base64,'+data.file_comprobante;
    type_fancy=data.format_comprobante=='application/pdf' ? 'iframe' : '';
    
    id_comprobante=data.id_comprobante;

    // $('#vista_comprobante .img_comprobante').attr("src", img_comprobante);
    // $('#vista_comprobante .img_comprobante').attr("data-src", img_comprobante);
    // $('#vista_comprobante .img_comprobante').attr("href", img_comprobante);
    // $('#vista_comprobante .img_comprobante').attr("href", img_comprobante);
    // $('#vista_comprobante .img_comprobante').attr("data-type", type_fancy);
    // $('#vista_comprobante .img_comprobante').attr("data-caption", data.token_comprobante);
    // $('#vista_comprobante .iframe_comprobante').attr("src", img_comprobante);

    divImagenComprobante=`<a
        data-fancybox
        data-src="${img_comprobante}"
        href="${img_comprobante}"
        data-type="${type_fancy}"                    
        data-caption="${data.token_comprobante}"      
    >
        <img 
        class="rounded w-100 fit-cover img_comprobante"         
        src="${img_comprobante}" alt="" style="min-height: 250px;">                       
    </a>`;
    divPdfComprobante=`<div class="comprobante_pdf">
    <iframe src="${img_comprobante}" style="width:100%; height:400px;" class="iframe_comprobante" frameborder="0"></iframe>        
    <a 
      data-fancybox
      data-src="${img_comprobante}"
      href="${img_comprobante}"
      data-type="${type_fancy}"                    
      data-caption="${data.token_comprobante}"  
      class="btn btn-primary"
    >
      Visualizar comprobante
    </a>
    </div>`;

    divComprobante=data.format_comprobante=='application/pdf' ? divPdfComprobante : divImagenComprobante;

    $('#vista_comprobante').html(divComprobante);


    $('.fecha_comprobante').html(data.create_date_comprobante);
    $('.nombre_cuota').html(data.nombre_cuota);
    $('.ciclo_escolar_comprobante').html(data.nombre_ciclo_escolar);
    $('.estudiante_comprobante').html(data.nombre_completo_estudiante);
    $('.grupo_comprobante').html(data.grupo_completo_estudiante);

    $('.select-status').attr('disabled', false);
    $('.div_cambiar_status').removeClass('d-none');

    if(data.status_comprobante==1 || data.status_comprobante==2){
        $('.select-status').attr('disabled', true);
        $('.div_cambiar_status').addClass('d-none');
    }
    $('#view_comprobante').offcanvas('show')
})


$(document).on('click', '.btn_cambiar_status_comprobante', function(){
    id_status=$('.select-status').find(':selected').val();
    
    $.ajax({
        url: 'controllers/comprobantes',
        type: 'POST',
        data: { id_status, id_comprobante, action: 'actualizar_status_comprobante'}    
    }).done(({respuesta, mensaje}) => {
        switch(respuesta){
            case 'success':
                tabla_comprobantes.ajax.reload(null, false);
                $('#view_comprobante').offcanvas('hide');
                Alert.fire({
                    icon: 'success',
                    title: mensaje
                })
                break;
            case 'error':
                Alert.fire({
                    icon: 'danger',
                    title: 'Ocurrió un error'
                })
                break;
        }   
    })    
})


setGruposEscuela = () => {
    
    if(document.getElementById('set_grupos_escuela')){
        $.ajax({
            url: 'controllers/grupos',
            type: 'POST',
            data: { action: 'get_grupos_ciclo_escolar', id_escuela, id_generacion}        
        }).done(data => {
            
            optionGrupo=`<option value="">Seleccionar un grupo</option>`
            data.forEach(element => {
                // console.log(element);
                // divCardGrupo=`
                //      <div class="col-lg-3 col-md-4">                       
                //     <div class="card mb-3">
                //         <div class="card-body">                          
                //         <div class="d-flex align-items-center">                        
                //             <p class="text-800 fw-bold fs--1 mb-2 line-clamp-1 lh-sm flex-1 me-5">Ciclo Escolar: ${element.nombre_ciclo_escolar}</p>
                //             <a class=" text-700" 
                //                 href="#collapse_grupo${element.id_generacion}" role="button" data-bs-toggle="collapse" 
                //                 aria-expanded="false" aria-controls="collapseWidthDeals-1">
                //                 <span class="fa-solid fa-angle-down"></span>
                //             </a>        
                //         </div>
                //         <div class="deals-items-head d-flex align-items-center mb-2"><a class="text-primary fw-bold line-clamp-1 me-3 mb-0 fs-1" href="deal-details.html">${element.nombre_grados} - ${element.nombre_grupo}</a>
                            
                //         </div>
                //         <div class="deals-company-agent d-flex flex-between-center">
                //             <div class="d-flex align-items-center">
                //                 <button class="btn btn-primary me-1 mb-1" type="button">Ver alumnos</button>
                //             </div>                        
                //         </div>
                //         <div class="collapse mt-3" id="collapse_grupo${element.id_generacion}">
                //             <div class="d-flex gap-2 mb-5"><span class="badge badge-phoenix badge-phoenix-info">new</span><span class="badge badge-phoenix badge-phoenix-danger">Urgent</span></div>
                //             <table class="mb-4 w-100 table-stats table-stats">
                //             <tr>
                //                 <th></th>
                //                 <th></th>
                //                 <th></th>
                //             </tr>
                //             <tr>
                //                 <td class="py-1">
                //                 <div class="d-flex align-items-center"><span class="me-2 text-700" data-feather="dollar-sign"></span>
                //                     <p class="fw-semi-bold fs--1 mb-0 text-700">Expected Revenue</p>
                //                 </div>
                //                 </td>
                //                 <td class="py-1 d-none d-sm-block pe-sm-2">:</td>
                //                 <td class="py-1">
                //                 <p class="ps-6 ps-sm-0 fw-semi-bold fs--1 mb-0 mb-0 pb-3 pb-sm-0 text-1100">$14,000.00</p>
                //                 </td>
                //             </tr>
                //             <tr>
                //                 <td class="py-1">
                //                 <div class="d-flex align-items-center"><span class="me-2 text-700" data-feather="user" style="width:16px; height:16px"></span>
                //                     <p class="fw-semi-bold fs--1 mb-0 text-700">Company Name</p>
                //                 </div>
                //                 </td>
                //                 <td class="py-1 d-none d-sm-block pe-sm-2">:</td>
                //                 <td class="py-1">
                //                 <p class="ps-6 ps-sm-0 fw-semi-bold fs--1 mb-0 mb-0 pb-3 pb-sm-0 text-1100 d-flex align-items-center gap-2">Knitkake.inc<a href="#!"> <span class="fa-solid fa-square-phone text-700"></span></a><a href="#!"> <span class="fa-solid fa-square-envelope text-700"></span></a><a href="#!"> <span class="fab fa-whatsapp-square text-700"></span></a></p>
                //                 </td>
                //             </tr>
                //             <tr>
                //                 <td class="py-1">
                //                 <div class="d-flex align-items-center"><span class="me-2 text-700" data-feather="calendar" style="width:16px; height:16px"></span>
                //                     <p class="fw-semi-bold fs--1 mb-0 text-700">Closing Date &amp; Time</p>
                //                 </div>
                //                 </td>
                //                 <td class="py-1 d-none d-sm-block pe-sm-2">:</td>
                //                 <td class="py-1">
                //                 <p class="ps-6 ps-sm-0 fw-semi-bold fs--1 mb-0 mb-0 pb-3 pb-sm-0 text-1100">27-12-2022<span> . 11:19 PM</span></p>
                //                 </td>
                //             </tr>
                //             <tr>
                //                 <td class="py-1">
                //                 <div class="d-flex align-items-center"><span class="me-2 text-700" data-feather="headphones" style="width:16px; height:16px"></span>
                //                     <p class="fw-semi-bold fs--1 mb-0 text-700">Assigned Agent </p>
                //                 </div>
                //                 </td>
                //                 <td class="py-1 d-none d-sm-block pe-sm-2">:</td>
                //                 <td class="py-1"><select class="form-select form-select-sm py-0 ms-n3 border-0 shadow-none">
                //                     <option selected="selected">Ally Aagaard</option>
                //                     <option>Lonnie Kub</option>
                //                     <option>Aida Moen</option>
                //                     <option>Niko Koss</option>
                //                     <option>Alec Haag</option>
                //                     <option>Ola Smith</option>
                //                     <option>Leif Walsh</option>
                //                     <option>Brain Cole</option>
                //                     <option>Reese Mann</option>
                //                 </select></td>
                //             </tr>
                //             </table>
                //             <p class="fs--1 mb-1"> Probability:</p>
                //             <div class="progress" style="height:8px">
                //             <div class="progress-bar rounded-pill bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                //             </div>
                //         </div>
                //         </div>
                //     </div>
                // </div>`
                
                optionGrupo+=`<option value="${element.id_generacion}">${element.nombre_completo_grupo}</option>`;
    
                
            })        
            $('#set_grupos_escuela').html(optionGrupo);
        })
    }
    

}



var datatable_alumnos ={
    action: 'get_alumnos_grupo',
    id_grupo: 0,
    id_generacion,
    id_escuela
};

let tabla_alumnos= $('#tabla_alumnos').DataTable({    
    dom: 'Blfrtip',
    buttons: [
        'copy',
        'pdf',
        'print'
    ],
    "responsive": true,
    "pageLength": 10,
    "order": [
        [2, "asc"]
    ],
    "columnDefs": [{
        "targets": [1],
        "visible": false
    }],
    "ajax": {
        "url": "controllers/grupos",
        "method": 'POST',
        // "data": {
        //     action: 'get_alumnos_grupo',                
        //     id_grupo: id_grupo                

        // },
        data: function(d){
            return  $.extend(d, datatable_alumnos);
        },
        "dataSrc": ""
    },
    "columns": [  
        {
            "defaultContent":``,
            "render":function(data, type, row, meta){
                num_lista=meta.row+1;
                return num_lista;                
            }
        },          
        {
            "data": "estudiante_id"
        },
        {            
            "data": "nombre_completo_estudiante",
        },
        {            
            "data": "CURP_estudiante",
        }
    ]
});

$(document).on('change', '#set_grupos_escuela', function(){
    id_grupo=$(this).find(':selected').val();    
    
    datatable_alumnos.id_grupo = id_grupo      
    tabla_alumnos.ajax.reload();
})


$(document).on('click', '#btn_cargar_alumnos', function(){

    id_grupo=$('#set_grupos_escuela').find(':selected').val();    
    file_carga_alumnos = document.getElementById('form_carga_alumnos_grupo');

    formData = new FormData(file_carga_alumnos);
    formData.append('action', 'carga_alumnos_grupo');
    formData.append('id_grupo', id_grupo);

    input_file_grupos=$('#file_carga_alumnos').val();
    if(input_file_grupos==''){
        Alert.fire({
            icon: 'error',
            title: 'No ha seleccionado un archivo'
        })
        return;
    }else if(id_grupo==''){
        Alert.fire({
            icon: 'error',
            title: 'No ha seleccionado un grupo'
        })
        return;
    }    
    $.ajax({
        url:'controllers/alumnos',
        type: 'POST',
        data: formData,
        processData: false, 
        contentType: false,
    }).done(({respuesta, mensaje}) => {
        switch(respuesta){
            case 'success':
                tabla_alumnos.ajax.reload(null, false);
                
                $('#file_carga_alumnos').val('')

                Alert.fire({
                    icon: 'success',
                    title: mensaje
                })
                break;
            case 'error':
                Alert.fire({
                    icon: 'error',
                    title: 'Ocurrió un error'
                })
                break;
        }  
    })
})

