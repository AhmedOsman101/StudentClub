<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <title>{{ config("app.name", env("APP_NAME")) }}</title>
    <link href="{{ asset('images/Student Club Logo.png') }}" rel="icon" type="image/png" />

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect" />
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link
        href="https://fonts.bunny.net/css?family=figtree:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- ========== Start styles ========== -->
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    @livewireStyles
    @livewireScripts
    <!-- ========== End styles ========== -->
    @yield('headers')
</head>

<body id="body-pd">
    <x-sidebar />
    @yield('content')
</body>

</html>
