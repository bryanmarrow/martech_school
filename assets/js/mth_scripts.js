
var DataPostController;
var validateFormRegistro;
var loaderEdutrebol = document.querySelector('.page-loading');

$(document).ready(() => {
    setTutores();
    setEstudiantes();
    setCuotas_Estudiante();
})

$('#form_registro').submit(async (e)=> {
    e.preventDefault();    
    let form_registro = document.getElementById('form_registro');
    let formData = new FormData(form_registro);

    if(validateFormRegistro){
        let {respuesta, mensaje} = await sendDataForm('registro_controller', 'insertar_registro',formData);
        switch(respuesta){
            case 'success':
                Swal.fire({                
                    icon: 'success',
                    title: mensaje,
                    showConfirmButton: false,
                    timer: 3500
                  }).then(() => {
                    resetValidatePassword();        
                    form_registro.reset();    
                  })
                
                
                break;
            case 'error':
                Swal.fire({                
                    icon: 'error',
                    title: 'ERROR',
                    text: mensaje,
                    showConfirmButton: false,
                    timer: 1500
                })
                break;
        }   
    }else{
        Swal.fire({                
            icon: 'error',
            title: 'Error al llenar el formulario de registro,',
            showConfirmButton: false,
            timer: 1500
        })
    }


})


loaderActive = () => {
    loaderEdutrebol.classList.add('active')
};

loadeRemove = () => {
    loaderEdutrebol.classList.remove('active')
};





$('#form_iniciosesion').submit(async (e)=> {
    e.preventDefault();
    let form_iniciosesion = document.getElementById('form_iniciosesion');
    let formData = new FormData(form_iniciosesion);
    
    loaderActive();
    let {respuesta, mensaje} = await sendDataForm('usuario_controller', 'iniciar_sesion',formData);
    switch(respuesta){
        case 'success':
            loadeRemove();
            
            window.location.href="mi-cuenta"
            break;
        case 'error':
            loadeRemove();
            Swal.fire({                
                icon: 'error',
                title: 'ERROR',
                text: mensaje,
                showConfirmButton: true,                
            })
            break;
    }  
    

})

$('#form_registro input').keyup(function (){
    
    let password = $(this).val();
    var p1 = document.getElementById("password1").value;
    var p2 = document.getElementById("password2").value;
    
    validateFormRegistro=true;
    var noValido = / /;

    if ( password.length < 8 ) {
        $('#length').removeClass('valid').addClass('invalid');
        validateFormRegistro=false;         
    } else {
        $('#length').removeClass('invalid').addClass('valid');
        
    }
    //validar letra
    if ( password.match(/[A-z]/) ) {
        $('#letter').removeClass('invalid').addClass('valid');    
        
    } else {
        $('#letter').removeClass('valid').addClass('invalid');    
        validateFormRegistro=false;     
    }

    // // //validar letra mayúscula
    if ( password.match(/[A-Z]/) ) {
        $('#capital').removeClass('invalid').addClass('valid');             
    } else {
        $('#capital').removeClass('valid').addClass('invalid');
        validateFormRegistro=false;     
        
    }

    // // //validar numero
    if ( password.match(/\d/) ) {
        $('#number').removeClass('invalid').addClass('valid');        
    } else {
        $('#number').removeClass('valid').addClass('invalid');
        validateFormRegistro=false; 
        
    }

    if(p1 != "" && p2 != ""){

      //validar confirmación contraseña
      if (p1.length == 0 || p2.length == 0) {
        $('#null').removeClass('valid').addClass('invalid');
        validateFormRegistro=false;         
      } else {
        $('#null').removeClass('invalid').addClass('valid');
           
      }

      //validar contraseñas cohincidan
      if (p1 != p2) {
        $('#match').removeClass('valid').addClass('invalid');    
        validateFormRegistro=false;     
      } else {
        $('#match').removeClass('invalid').addClass('valid');
        
      }

      if(noValido.test(p1 || p2)){ // se chequea el regex de que el string no tenga espacio
        $('#blank').removeClass('valid').addClass('invalid');   
        validateFormRegistro=false;      
      } else {
        $('#blank').removeClass('invalid').addClass('valid');
           
      }
    }
   

})

function resetValidatePassword(){
    

    $('#pswd_info').find('li').each((item, element) => {        
        $(element).removeClass('valid');
    })
    
}



sendDataForm = async (data_controller, action_controller, formData) => {
    
    let urlController = 'controllers/'+data_controller+'.php';

    formData.append('action', action_controller);

    await $.ajax({
        url: urlController,
        type: 'POST',
        data: formData,
        datatype: "json",
        processData: false,
        contentType: false,
    }).done(async (data) => {        
        DataPostController = data;
    })


    return DataPostController;
}

function logOut(){
    $.ajax({
        url:'controllers/logout',
        type: 'POST'        
    }).done(() => {
        window.location.href="inicio-sesion";
    })
}

var setTutores = () => {
    $('#list_tutores_usuario').empty();
    $.ajax({
        url:'controllers/tutores_controller.php',
        type: 'POST',
        data: {            
            'id_usuario': 1,
            'action': 'obtenertutores_porusuario'
        }
    }).done( tutores => {
        if(tutores.data.length==0 || tutores.data.length < 3){
            
            cardTutor=`<div class="col card_agregartutor">
            <div class="card h-100 justify-content-center align-items-center border-dashed rounded-3 py-5 px-3 px-sm-4">
                <a class="stretched-link d-flex align-items-center fw-semibold text-decoration-none my-sm-3"
                  data-bs-toggle="collapse" href="#collapse_form_agregar_tutor" role="button" aria-expanded="false" aria-controls="collapse_form_agregar_tutor"
                >
                  <i class="ai-circle-plus fs-xl me-2"></i>
                  Agregar tutor 
                </a>
                </div>
          </div>`;
          $('#list_tutores_usuario').append(cardTutor);
        }
        if(tutores.data.length>0){
            
            tutores.data.forEach(element => {
                console.log(element)
                cardTutor=`<div class="col">
                <div class="card h-100 rounded-3 p-3 p-sm-4">
                  <div class="d-flex align-items-center pb-2 mb-1">
                    <h3 class="h6 text-nowrap text-truncate mb-0">#${element.token_tutor}</h3><span class="badge bg-faded-primary text-primary fs-xs ms-3">Verificado</span>
                    <div class="d-flex ms-auto">
                     
                      <button 
                      class="nav-link text-danger fs-xl fw-normal py-1 pe-0 ps-1 ms-2" onclick="eliminar_tutor(${element.id_tutor})"                      type="button" data-bs-toggle="tooltip" title="Eliminar Tutor"><i class="ai-trash"></i></button>
                    </div>
                  </div>
                  <div class="text-dark">${element.nombrecompleto_tutor}</div>
                  <p class="mb-0">${element.email_tutor}</p>
                  
                  
                </div>
              </div> `;
                $('#list_tutores_usuario').append(cardTutor);
            });
        }
        
    })
}


var setEstudiantes = () => {

    $('#list_estudiantes_usuario').empty();
    $.ajax({
        url:'controllers/estudiantes_controller.php',
        type: 'POST',
        data: {            
            'id_usuario': 1,
            'action': 'obtenerestudiantes_porusuario'
        }
    }).done( estudiantes => {
        

        if(estudiantes.data.length==0 || estudiantes.data.length < 3){
            
        //     cardTutor=`<div class="col card_agregartutor">
        //     <div class="card h-100 justify-content-center align-items-center border-dashed rounded-3 py-5 px-3 px-sm-4">
        //         <a class="stretched-link d-flex align-items-center fw-semibold text-decoration-none my-sm-3"
        //           data-bs-toggle="collapse" href="#collapse_form_agregar_tutor" role="button" aria-expanded="false" aria-controls="collapse_form_agregar_tutor"
        //         >
        //           <i class="ai-circle-plus fs-xl me-2"></i>
        //           Agregar tutor 
        //         </a>
        //         </div>
        //   </div>`;
        //   $('#list_estudiantes_usuario').append(cardTutor);
        }
        if(estudiantes.data.length>0){
            
            estudiantes.data.forEach(element => {
                // console.log(element)
                rowEstudiante=`<tr>                                    
                    <td>${element.nombre_estudiante}</td>     
                    <td><a class="btn btn-primary btn-sm" href="cuotas?token_estudiante=${element.token_estudiante}"><i class="text-light ai-file-text mx-1"></i> Cuotas</a></td>           
                </tr>`;
                $('#list_estudiantes_usuario').append(rowEstudiante);
            });
        }
        
    })
}

var setCuotas_Estudiante = async () => {

    token_estudiante=$('#viewgrupos_usuario_cuotas').data('token_estudiante');    
    
    
    $('#viewgrupos_usuario_cuotas').empty();
    var dataGrupos = $.ajax({
        url:'controllers/estudiantes_controller.php',
        type: 'POST',
        data: {            
            'token_estudiante': token_estudiante,
            'action': 'obtener_cuotas_estudiante'
        }
    }).done( grupo_cuotas => {
        
        
        
    })

    dataGrupos.then((grupo_cuotas) => {        
        if(grupo_cuotas.data.length==0 || grupo_cuotas.data.length < 3){            
            //     cardTutor=`<div class="col card_agregartutor">
            //     <div class="card h-100 justify-content-center align-items-center border-dashed rounded-3 py-5 px-3 px-sm-4">
            //         <a class="stretched-link d-flex align-items-center fw-semibold text-decoration-none my-sm-3"
            //           data-bs-toggle="collapse" href="#collapse_form_agregar_tutor" role="button" aria-expanded="false" aria-controls="collapse_form_agregar_tutor"
            //         >
            //           <i class="ai-circle-plus fs-xl me-2"></i>
            //           Agregar tutor 
            //         </a>
            //         </div>
            //   </div>`;
            //   $('#list_estudiantes_usuario').append(cardTutor);
            }
            if(grupo_cuotas.data.length>0){
                
                grupo_cuotas.data.forEach(element => {         
                    
                    token_escuela=element.token_escuela;

                    
                    list_cuotas=$.ajax({
                        url: 'controllers/estudiantes_controller.php',
                        type: 'POST',
                        data: {
                            'token_escuela': token_escuela,
                            'action': 'obtener_cuotas_asignadas'
                        }
                    })

                    var divCuotas='';    
                    list_cuotas.then((data_cuotas)=> {
                        
                        data_cuotas.data.forEach(element => {
                            divCuotas+=`<div class="mb-3">
                            <label for="text-input" class="form-label">Text</label>
                            <input class="form-control" type="text" id="text-input" value="Artisanal kale">
                            </div>`;
                        })

                        
                    })
                    console.log(divCuotas);
                    

                    cardCuotas=`<div class="accordion-item border-top mb-0" data-token_escuela='${token_escuela}'>
                        <div class="accordion-header">
                        <a class="accordion-button d-flex fs-4 fw-normal text-decoration-none py-3 collapsed" href="#orderOne" data-bs-toggle="collapse" aria-expanded="false" aria-controls="orderOne">
                            <div class="d-flex justify-content-between w-100" style="max-width: 440px;">
                            <div class="me-3 me-sm-4">
                                <div class="fs-sm text-muted">${element.nombrecompleto_grupo}</div><span class="badge bg-faded-info text-info fs-xs">In progress</span>
                            </div>
                            <div class="me-3 me-sm-4">
                                <div class="d-none d-sm-block fs-sm text-muted mb-2">Nivel</div>
                                <div class="d-sm-none fs-sm text-muted mb-2">Nivel</div>
                                <div class="fs-sm fw-medium text-dark">${element.nombre_nivel}</div>
                            </div>
                            <div class="me-3 me-sm-4">
                                <div class="fs-sm text-muted mb-2">Ciclo Escolar</div>
                                <div class="fs-sm fw-medium text-dark">${element.nombre_ciclo_escolar}</div>
                            </div>
                            </div>
                            <div class="accordion-button-img d-none d-sm-flex ms-auto">
                            
                            </div>
                        </a>
                        </div>
                        <div class="accordion-collapse collapse" id="orderOne" data-bs-parent="#orders">
                        <div class="accordion-body">                        
                            <div class="bg-secondary rounded-1 p-4 my-2">
                            <div class="row">
                                <div class="col-sm-5 col-md-3 col-lg-4 mb-3 mb-md-0">
                                <div class="fs-sm fw-medium text-dark mb-1">Payment:</div>
                                <div class="fs-sm">Upon the delivery</div><a class="btn btn-link py-1 px-0 mt-2" href="#"><i class="ai-time me-2 ms-n1"></i>Order history</a>
                                </div>
                                <div class="col-sm-7 col-md-5 mb-4 mb-md-0">
                                <div class="fs-sm fw-medium text-dark mb-1">Delivery address:</div>
                                <div class="fs-sm">401 Magnetic Drive Unit 2,<br>Toronto, Ontario, M3J 3H9, Canada</div>
                                </div>
                                <div class="col-md-4 col-lg-3 text-md-end">
                                <button class="btn btn-sm btn-outline-primary w-100 w-md-auto" type="button"><i class="ai-star me-2 ms-n1"></i>Leave a review</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>`;
                    $('#viewgrupos_usuario_cuotas').append(cardCuotas);
                });
            }

    })



}


$('#form_agregar_tutor').submit(async function(e){
    e.preventDefault();

    let formData = new FormData(this);
    
    for(let [name, value] of formData) {
      console.log(`${name} = ${value}`);
    }
    loaderActive();
    let {respuesta, mensaje} = await sendDataForm('tutores_controller', 'insertar_tutor',formData);
    switch(respuesta){
        case 'success':
            $('#collapse_form_agregar_tutor').collapse('hide');
            $('#form_agregar_tutor').trigger('reset');   
            setTutores();
            loadeRemove();

            Swal.fire({                
                icon: 'success',
                title: mensaje,
                showConfirmButton: false,
                timer: 1000
            })
             
            break;
        case 'error':
            loadeRemove();
            Swal.fire({                
                icon: 'error',
                title: 'ERROR',
                text: mensaje,
                showConfirmButton: true,                
            })
            break;
    }  

    
})


async function eliminar_tutor(id_tutor){
    
    

    $.confirm({
        title: '',
        content: '¿Confirma que desea eliminar al tutor seleccionado?',
        buttons: {
            confirmar: async function () {
                let formData = new FormData();
                formData.append('id_tutor', id_tutor)
                
                // for(let [name, value] of formData) {
                // console.log(`${name} = ${value}`);
                // }
            
                let {respuesta, mensaje, data} = await sendDataForm('tutores_controller', 'eliminar_tutor',formData);

                switch(respuesta){
                    case 'success':
                        
                        setTutores();
                       
                        Swal.fire({                
                            icon: 'success',
                            title: data.MSG,
                            showConfirmButton: false,
                            timer: 1000
                        })
                        
                        break;
                    case 'error':
                       
                        Swal.fire({                
                            icon: 'error',
                            title: 'ERROR',
                            text: mensaje,
                            showConfirmButton: true,                
                        })
                        break;
                }  
                
            },
            cancelar: function () {
               
            }
        }
    });
    
}