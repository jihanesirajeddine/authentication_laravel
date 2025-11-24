<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Stories</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('stories.index') }}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('stories.index') }}">All stories</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('stories.show') }}">My stories</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('stories.create') }}">Create</a>
                    </li>
                </ul>
            @endauth

            <div class="ms-auto d-flex">
                @guest
                    <a class="btn btn-dark me-2" type="submit" href="{{ route('show.login') }}">Login</a>
                    <a class="btn btn-outline-dark" type="submit" href="{{ route('show.register') }}">Register</a>
                @endguest
                @auth
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCompte">
                        {{ Auth::user()->name }} <i class="bi bi-person-circle ms-3"></i>
                    </button>

                    <div class="modal fade" id="modalCompte" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCompteLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalCompteLabel">Compte</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center mt-3">
                            <i class="bi bi-person-circle" style="font-size: 80px;"></i>
                            <h3>{{ Auth::user()->name }}</h3>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-dark" class="dropdown-item"><i class="bi bi-box-arrow-left me-2 "></i>Logout</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<div class="m-5">
    {{ $slot }}
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>