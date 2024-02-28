<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css');}}">
    <link rel="stylesheet" href="{{asset('todo.css');}}">
    <link rel="stylesheet" href="{{asset('all.min.css');}}">
    <link rel="stylesheet" href="{{asset('checked.png');}}">
    <link rel="stylesheet" href="{{asset('no-task.css');}}">
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
