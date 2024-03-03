<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css\bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css\todo.css')}}">
    <link rel="stylesheet" href="{{asset('css\all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css\check.png')}}">
    <link rel="stylesheet" href="{{asset('css\no-task.css')}}">
</head>

<body>
    <section class="vh-100 d-flex ">
        <div class="bg-dark vh-100 w-25">
            .
        </div>
        <div class="container py-5 h-100">
            @livewire('to-do')
        </div>
    </section>
</body>

</html>
