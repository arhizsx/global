<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Tech Team Philippines">
        <title>Tau Gamma Phi</title>
        <link rel="shortcut icon" type="image/svg" href="/icon_optimized.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <style>
        html, body{height:100%; background-color: black;}
        .navbar-brand {
            font-weight: bold;
            margin-right: 30px;
            padding-left: 15px;
        }
        a {
            text-decoration: none;
            color: white;
            cursor: pointer;
        }
        .subheader-text {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 20px;
            font-size: 24px;
        }
        .menu-item {
            width: 120px;
            height: 120px;
        }
        .fields_box {
            background-color: #fdd700;
            border-radius: 20px;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 30px;
            padding-bottom: 30px;
            color: black;
        }
        label {
            margin-bottom: 3px;
            font-size: .8em;
        }
    </style>
    <body>
        @include('logo')
        <div class="container-fluid px-0">
            <header>
                <nav class="navbar fixed-top navbar-expand-lg bg-white p-2" style="min-height: 100px;">
                    <div class="navbar-brand">
                        @yield("logo")
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active"> <a class="nav-link" href="/">Home</a> </li>
                        </ul>
                    </div>
                </nav>
                <!-- ./ end of navbar -->
            </header>
            </content>
            <content>
                <subheader>
                    <div class="row bg-warning" style="margin-top: 100px; min-height: 5px; ">
                        <div class="col-12">
                            @yield('subheader')
                        </div>
                    </div>
                </subheader>
                <maincontent>
                    @yield('maincontent')
                </maincontent>
            </content>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
