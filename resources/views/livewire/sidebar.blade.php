<div class="main-content">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <x-application-logo style="width: 10rem" />
    <div class="link-wrapper">
        <x-home-icon />
        <a href="/">
            Home
        </a>
    </div>

    <div class="link-wrapper">
        {{--
        <x-calendar-icon /> --}}
        <div>hello</div>
        <div>
            <a href="/calendar">
                Calendar
            </a>
        </div>
    </div>
    <div class="link-wrapper">
        <x-pomodoro-icon />
        <a href="/pomodoro">
            Pomodoro
        </a>
    </div>
    <div class="link-wrapper">
        <x-todo-icon />
        <a href="/todo">
            To do list
        </a>
    </div>
</div>
