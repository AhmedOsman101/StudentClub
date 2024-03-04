<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>{{ env("APP_NAME") }} - Pomodoro Timer</title>

    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/6f3103b13c.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=figtree:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- ========== Start styles ========== -->
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/pomodoro.css')}}">
    <!-- ========== End styles ========== -->

</head>

<body>
    {{-- @livewire('PomodoroTimer') --}}


    <section>
        <div class="container">
            <h1>Pomodoro</h1>

            <div class="painel">
                <p id="work">work</p>
                <p id="break">break</p>
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
    @php
    $path = "js/pomodoro.js"
    @endphp
    <script src="{{asset($path)}}"></script>
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


</body>

</html>
