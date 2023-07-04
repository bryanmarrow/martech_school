<form id="form_registro" action="" >
    <div class="row row-cols-1 row-cols-sm-2">
        <div class="col-lg-6 mb-4">
            <input class="form-control form-control-lg" name="nombre" type="text" placeholder="Nombre" required>
        </div>
        <div class="col-lg-6 mb-4">
            <input class="form-control form-control-lg" name="apellidos" type="text" placeholder="Apellidos" required>
        </div>
        <div class="col-lg-12 mb-4">
            <input class="form-control form-control-lg" name="dob" type="date" placeholder="Fecha de Nacimiento" required>
        </div>
        <div class="col-lg-12 mb-4">
            <input class="form-control form-control-lg" name="email" type="email" placeholder="Email address" required>
        </div>
    </div>
    <div class="password-toggle mb-4">
        <input class="form-control form-control-lg usuario_password" id="password1" type="password" name="password" placeholder="Contraseña" required>
        <label class="password-toggle-btn" aria-label="Show/hide password">
            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
        </label>
    </div>
    <div class="password-toggle mb-4">
        <input class="form-control form-control-lg" type="password" id="password2" name="password2" placeholder="Confirmar contraseña" required>
        <label class="password-toggle-btn" aria-label="Show/hide password">
            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
        </label>
    </div>
    <div id="pswd_info">        
        <p class="m-1">La contraseña debe cumplir los siguientes requerimientos:</p>
        <ul>
            <li id="letter" class="invalid">Al menos <strong>una letra</strong></li>
            <li id="capital" class="invalid">Al menos <strong>una letra mayúscula</strong></li>
            <li id="number" class="invalid">Al menos <strong>un número</strong></li>
            <li id="length" class="invalid">Al menos <strong>8 carácteres</strong></li>
            <li id="null" class="invalid">Debe <strong>confirmar la contraseña</strong></li>
            <li id="match" class="invalid">Las contraseñas <strong>deben cohincidir</strong></li>
            <li id="blank" class="invalid">Las contraseñas <strong>no deben tener espacios</strong></li>
        </ul>
    </div>
    <div class="pb-4">
        <div class="form-check my-2">
            <input class="form-check-input" type="checkbox" id="terms">
            <label class="form-check-label ms-1" for="terms">Estoy de acuerdo con los <a href="#">Términos y condiciones</a></label>
        </div>
    </div>
    <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Registrarme</button>              
</form>