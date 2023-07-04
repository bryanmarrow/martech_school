
var DataPostController;

// $(document).ready(function(){
    
// })



$('#form_registro').submit(async (e)=> {
    e.preventDefault();    
    let form_registro = document.getElementById('form_registro');
    let formData = new FormData(form_registro);

    let data_post = await sendDataForm('registro_controller', 'insertar_registro',formData);

    console.log(data_post);

})



sendDataForm = async (data_controller, action_controller, formData) => {
    
    let urlController = 'controllers/'+data_controller;

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