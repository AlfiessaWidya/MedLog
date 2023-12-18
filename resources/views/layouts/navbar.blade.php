<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">
    
    <title>MedLog</title>

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,400;1,800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

</head>
<body style="background-color: #DDECFA">
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-sm">
            <form method="POST" action="/warehouse">
                @csrf
                <a class="navbar-brand" href="/warehouse">
                    <img src="/assets/logo.png" alt="Logo" width="115rem" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </form>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <form method="POST" action="/warehouse">
                            @csrf
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="/warehouse">Home</a>
                            </li>
                        </form>
                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <form method="POST" action="/riwayat">
                            @csrf
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/riwayat">Riwayat</a>
                            </li>
                        </form>
                    </ul>
                </div>
                <div class="d-flex ms-auto">
                    <div class="btn-group">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
                            <i class="fa fa-user" style="padding-right: 5px"></i>
                            {{ Auth::user()->username }}
                        </button>
                        <ul class="dropdown-menu w-0">
                            <form method="GET" action="/logout">
                                @csrf
                                <button class="btn" type="submit"><i class="fas fa-sign-out-alt" style="padding: 0px 9px 0px 24px"></i>Logout</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="navbar" class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('show.bs.modal', () => {
            myInput.focus()
        })
    </script>
</body>
</html>