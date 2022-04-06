<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IBI Customer - Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.navbar')

        <main class="py-4">
        <!-- Jika User mmendapatkan error dari pengecekan sebelumnya -->
        @if (\Session::has('error'))
        <div class="container" onclick="warningboxred()" id=warningboxred>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-danger" role="alert" >
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>

                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (\Session::has('success'))
        <div class="container" onclick="warningboxgreen()" id=warningboxgreen>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert" >
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>

                    </div>
                </div>
            </div>
        </div>
        @endif
        @yield('content')
        </main>
    </div>
<script>
function warningboxred() { 
	document.getElementById("warningboxred").style.display="none"; 
}
@yield('script')
</script>
</body>
</html>
