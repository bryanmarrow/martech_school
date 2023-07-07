
var DataPostController;
var validateFormRegistro;
var loaderEdutrebol = document.querySelector('.page-loading');

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
            Swal.fire({                
                icon: 'success',
                title: 'Inicio de sesión correcto',
                showConfirmButton: false,
                timer: 3500
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