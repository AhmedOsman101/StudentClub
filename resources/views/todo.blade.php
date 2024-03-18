<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/todo.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('images/checked.png')}}">
    <link rel="stylesheet" href="{{asset('images/no-task.png')}}">
</head>

<body>
    <section class="d-flex">
        <div class="container-fluid pb-5 h-100 todo-container">
            @livewire('todo')
        </div>
    </section>
</body>

</html>
