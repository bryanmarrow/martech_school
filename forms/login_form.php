<form id="form_iniciosesion">
    <div class="pb-3 mb-3">
        <div class="position-relative"><i class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
            <input class="form-control form-control-lg ps-5" type="email" name="email_inicio_sesion" placeholder="Correo electrónico" required>
        </div>
    </div>
    <div class="mb-4">
        <div class="position-relative"><i class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
            <div class="password-toggle">
            <input class="form-control form-control-lg ps-5" type="password" name="password_inicio_sesion" placeholder="Contraseña" required>
            <label class="password-toggle-btn" aria-label="Mostrar/ocultar Contraseña">
                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
            </label>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">    
        <a class="fs-sm fw-semibold text-decoration-none my-1" href="recuperar-password">Olvidaste tu contraseña?</a>
    </div>
    <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Iniciar sesión</button>    
</form>