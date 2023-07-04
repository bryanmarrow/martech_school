<form id="form_registro" class="needs-validation" novalidate>
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
        <input class="form-control form-control-lg" type="password" name="password" placeholder="Contraseña" required>
        <label class="password-toggle-btn" aria-label="Show/hide password">
            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
        </label>
    </div>
    <div class="password-toggle mb-4">
        <input class="form-control form-control-lg" type="password" placeholder="Confirmar contraseña" required>
        <label class="password-toggle-btn" aria-label="Show/hide password">
            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
        </label>
    </div>
    <div class="pb-4">
        <div class="form-check my-2">
            <input class="form-check-input" type="checkbox" id="terms">
            <label class="form-check-label ms-1" for="terms">Estoy de acuerdo con los <a href="#">Términos y condiciones</a></label>
        </div>
    </div>
    <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Registrarme</button>              
</form>