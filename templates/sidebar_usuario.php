<aside class="col-lg-3 pe-lg-4 pe-xl-5 mt-n3">
    <div class="position-lg-sticky top-0">
        <div class="d-none d-lg-block" style="padding-top: 105px;"></div>
        <div class="offcanvas-lg offcanvas-start" id="sidebarAccount">
            <button class="btn-close position-absolute top-0 end-0 mt-3 me-3 d-lg-none" type="button"
                data-bs-dismiss="offcanvas" data-bs-target="#sidebarAccount"></button>
            <div class="offcanvas-body">
                <div class="pb-2 pb-lg-0 mb-4 mb-lg-5">
                    <!-- <img class="d-block rounded-circle mb-2"
                        src="assets/img/avatar/02.jpg" width="80" alt="Isabella Bocouse"> -->
                    <h3 class="h5 mb-1"><?= $nombreCompletoUsuarioLog ?></h3>
                    <p class="fs-sm text-muted mb-0"><?= $emailUsuarioLog ?></p>
                </div>
                <nav class="nav flex-column pb-2 pb-lg-4 mb-3">
                    <h4 class="fs-xs fw-medium text-muted text-uppercase pb-1 mb-2">Escritorio</h4>
                    <a class="nav-link fw-semibold py-2 px-0" href="mi-cuenta">
                        <i class="ai-user-check fs-5 opacity-60 me-2"></i>Mi cuenta
                    </a>
                    <a class="nav-link fw-semibold py-2 px-0" href="tutores">
                        <i class="ai-user-check fs-5 opacity-60 me-2"></i>Padres de familia/Tutores
                    </a><a class="nav-link fw-semibold py-2 px-0" href="account-settings.html"><i
                            class="ai-settings fs-5 opacity-60 me-2"></i>Mis estudiantes</a><a
                        class="nav-link fw-semibold py-2 px-0" href="account-billing.html"><i
                            class="ai-wallet fs-5 opacity-60 me-2"></i>Comunicados</a>
                </nav>
               
                <nav class="nav flex-column">
                    <button type="button" class="nav-link fw-semibold py-2 px-0" onclick="logOut()" href="#"><i
                            class="ai-logout fs-5 opacity-60 me-2"></i>Cerrar sesión</button></nav>
            </div>
        </div>
    </div>
</aside>