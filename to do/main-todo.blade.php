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
    <link rel="stylesheet" href="{{asset('no-task.png');}}">
</head>

<body>
    <section class=" d-flex ">
        <div class="bg-dark w-25">
            .
        </div>
        <div class="container-fluid pb-5 h-100 todo-container">
            @livewire('to-do')
        </div>
    </section>
</body>
</html>
