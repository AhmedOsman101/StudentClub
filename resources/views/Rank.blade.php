<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env("APP_NAME") }} - Rank</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=figtree:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{asset('images/Student Club Logo.png')}}" />
    <link rel="stylesheet" href="{{ asset('css/rank.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
</head>

<body>
    <div class="sidebar">
    </div>
    <div class="body">
        @livewire('Rank')
    </div>
</body>

</html>
