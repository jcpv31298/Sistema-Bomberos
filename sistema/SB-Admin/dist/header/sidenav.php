<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="http://localhost/sistema/SB-Admin/dist/index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Inicio
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#empleados" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Empleados
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="empleados" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="http://localhost/sistema/SB-Admin/dist/src/tablaEmpleados/tablaEmpleados.php">Tabla de Empleados</a>
                        <a class="nav-link" href="http://localhost/sistema/SB-Admin/dist/src/agregarEmpleado/agregarEmpleado.php">Agregar Empleado</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportes" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                    Reportes
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="reportes" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="http://localhost/sistema/SB-Admin/dist/src/tablaReportes/tablaReportes.php">Tabla de Empleados</a>
                        <a class="nav-link" href="http://localhost/Ssistema/B-Admin/dist/src/graficasReportes/graficasReportes.php">Agregar Empleado</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div>Usuario: <?php echo $_SESSION["usuario"]; ?></div>
        </div>
    </nav>
</div>