<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Tech Team Philippines">
        <title>Tau Gamma Phi</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/png" href="/icon_optimized.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css" integrity="sha512-hbs/7O+vqWZS49DulqH1n2lVtu63t3c3MTAn0oYMINS5aT8eIAbJGDXgLt6IxDHcWyzVTgf9XyzZ9iWyVQ7mCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    @vite('resources/css/tau.css')

    <body>
        @include('logo')
        <div class="container-fluid p-0 m-0">
            <header>
                <nav class="navbar fixed-top navbar-expand-lg bg-white p-2" style="min-height: 100px;">
                    <div class="navbar-brand">
                        <a href="/">@yield("logo")</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto" style="margin-left: 20px;">
                            <li class="nav-item active"> <a class="nav-link" href="/">Home</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/triskelions">Triskelions</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/chapters">Chapters</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/councils">Councils</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/record-update">Record Update</a> </li>
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
                <breadcrumbs>
                    @yield('breadcrumbs');
                </breadcrumbs>
                <maincontent>
                    @yield('maincontent')
                </maincontent>
            </content>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" integrity="sha512-0bEtK0USNd96MnO4XhH8jhv3nyRF0eK87pJke6pkYf3cM0uDIhNJy9ltuzqgypoIFXw3JSuiy04tVk4AjpZdZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @vite('resources/js/tau.js')
        @vite('resources/js/jquery.signature.js')


        @yield('js')

        {{-- @vite('resources/js/app.js') --}}

    </body>
</html>
