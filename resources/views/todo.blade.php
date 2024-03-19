@extends('layouts.main')

<html lang="en" data-bs-theme="light">
@section('headers')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/todo.css')}}">
<link rel="stylesheet" href="{{asset('css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('images/checked.png')}}">
<link rel="stylesheet" href="{{asset('images/no-task.png')}}">
@endsection

@section('content')
<section class="d-flex">
    <div class="container-fluid pb-5 h-100 todo-container">
        @livewire('todo')
    </div>
</section>
@endsection
