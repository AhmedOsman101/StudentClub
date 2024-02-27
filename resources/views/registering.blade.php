<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="ie=edge" http-equiv="X-UA-Compatible">
        <title>{{ env("APP_NAME") }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net" rel="preconnect">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- ========== Start styles ========== -->
        @livewireStyles
        {{-- <link href="{{ asset("css/app.css") }}" rel="stylesheet"> --}}
        {{-- <link href="{{ asset("css/register.css") }}" rel="stylesheet"> --}}
        <!-- ========== End styles ========== -->
        <!-- ========== Start scripts ========== -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- ========== End scripts ========== -->

    </head>

    <body>
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>
    
            <x-validation-errors class="mb-4" />
                @livewire("register")
        </x-authentication-card>

    </body>

</html>
