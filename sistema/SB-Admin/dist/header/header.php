<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php" id="hrefInicio">Sistema Bomberos</a>
    <a class="navbar-brand" id="hrefUsuario" style="display: none;">Usuario: <?php echo $_SESSION["usuario"]; ?></a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto">
        <button type="button" class="btn btn-light" id="btnCerrarSesion"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
    </ul>
</nav>