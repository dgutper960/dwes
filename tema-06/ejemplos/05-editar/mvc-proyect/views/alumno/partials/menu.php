<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="alumno">Alumnos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>alumno/new">Nuevo</a> <!-- ejecuta el metodo new de alumno -->
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ordenar
                    </a>
                    <!-- Deberemos enviar el criterior de ordenacion de forma dinamica -->
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.id">id</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.nombre">Nombre</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.apellidos">Apellidos</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.email">Email</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.telefono">Telefono</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.direccion">Dirección</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.poblacion">Población</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.provincia">Provincia</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.nacionalidad">Nacionalidad</a>
                        </li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.dni">DNI</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.fechaNac">Edad</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>ordenar.php?criterio=alumnos.id_curso">id_curso</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="GET" action="filtrar.php">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search"
                    name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>