<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("libs/bootstrap/css/bootstrap.min.css")}}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- este stack carrega os estilos das páginas --}}
    @stack('style')
    <title>Gabi teste</title>
</head>
<body>
    @yield('content')
    {{-- dependecias bootstrap e jquery --}}
    <script src="{{asset("libs/jquery/jquery-3.4.1.min.js")}}"></script>
    <script src="{{asset("libs/bootstrap/js/bootstrap.min.js")}}"></script>
    {{-- stack carrega os scripts das páginas --}}
    @stack('script')
</body>
</html>
