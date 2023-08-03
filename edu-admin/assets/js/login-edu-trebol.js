$('#form_login_admins').submit(function(e){
    e.preventDefault();

    formdata_login = new FormData(this);
    formdata_login.append('action', 'login_admins');

    $.ajax({
        url:'controllers/login_admin',
        type: 'POST',
        data: formdata_login,
        processData: false, 
        contentType: false,
    }).done(({respuesta, mensaje, data}) => {

        switch(respuesta){
            case 'success':
                window.location.href = "../edu-admin/";
                break;
            case 'error':
                alert(mensaje);
                break;
        }
    })

})