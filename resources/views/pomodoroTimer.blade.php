@extends('layouts.main')

@section('headers')

<!-- ICONS -->
<script src="{{asset('js/fontawsome.js')}}"></script>
<!-- Fonts -->
<!-- ========== Start styles ========== -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/pomodoro.css')}}">
<!-- ========== End styles ========== -->
@endsection

@section('content')
<section class="pomodoro">
    <div id="container">
        <h1>Pomodoro</h1>

        <div class="painel">
            <p id="work">Work</p>
            <p id="break">Break</p>
        </div>

        <div class="timer">
            <div class="circle">
                <div class="time">
                    <p id="minutes"></p>
                    <p>:</p>
                    <p id="seconds"></p>
                </div>
            </div>
        </div>

        <div class="controls">
            <button id="start" onclick="start({{$currentUser->id}})">
                <i class="fa-solid fa-play"></i>
            </button>

            <button id="reset" onclick="reset()">
                <i class="fa-solid fa-arrow-rotate-left"></i>
            </button>
            <button id="pause" onclick="pause()">
                <i class="fa-solid fa-pause"></i>
            </button>
            <button id="resume" onclick="resume()">
                <i class="fa-solid fa-play"></i>
            </button>
        </div>
    </div>
</section>

<!-- SCRIPT -->

<script src="{{asset('js/pomodoro.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Success = ()=>{
            Swal.fire({
                title: "Good job!",
                text: "You have completed the pomodoro!",
                icon: "success",
                didClose: () => {
                reset();
            },
            })
        };
        if (isCompleted) Success();
        
</script>


@endsection
