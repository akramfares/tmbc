<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') TMBC Comments @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="tmbc, comments, nested"/>
    @show @section('meta_author')
        <meta name="author" content="Akram Fares"/>
    @show @section('meta_description')
        <meta name="description"
              content="A commenting system for websites."/>
    @show
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')

    <link rel="shortcut icon" href="{!! asset('assets/site/ico/favicon.ico')  !!} ">
</head>
<body>
@include('partials.nav')

<div class="container" id="app" style="margin-bottom: 40px">
    @yield('content')
</div>

<!-- Scripts -->
@yield('scripts')
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>