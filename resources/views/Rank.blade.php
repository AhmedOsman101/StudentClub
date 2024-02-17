<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('images/Student Club Logo.png')}}"/>
    <link rel="stylesheet" href="{{ asset('css/rank.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <title>Rank</title>
</head>
<body>
    <div class="sidebar">
    </div>
    <div class="body">
        @livewire('Rank')
    </div>
</body>
</html>