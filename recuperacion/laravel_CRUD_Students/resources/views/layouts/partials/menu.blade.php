<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand nav-item-custom" href="{{route('index')}}">HOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active nav-item-custom" aria-current="page" href="{{ route('students.index')}}">ALUMNOS</a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="nav-item"><a href="#" class="nav-link active nav-item-custom">Login</a></li>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="nav-item"><a href="#" class="nav-link active nav-item-custom">Registrar</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
