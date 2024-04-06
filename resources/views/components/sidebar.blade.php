<div class="l-navbar show" id="nav-bar">
    @php
    $current_team = Auth::user()->currentTeam->id;
    @endphp
    <nav class="nav">
        <div>
            <a href="{{route('home')}}" class="nav_logo">
                <i class='bx bxs-graduation' style='color:#ffffff; font-size: 24px;'></i>
                <span class="nav_logo-name">{{env('APP_NAME')}}</span>
            </a>
            <div class="nav_list">
                <a href="{{route('home')}}" class="nav_link {{ request()->is('/') ? 'active' : '' }}">
                    <i class="bx bx-home nav_icon"></i>
                    <span class="nav_name">Home</span>
                </a>
                <a href="{{route('profile.show')}}"
                    class="nav_link {{ request()->is('user/profile') ? 'active' : '' }}">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Profile</span>
                </a>
                {{-- href="{{route('teams.show')}}" --}}
                <a href="{{route('teams.show', $current_team)}}" class=" nav_link {{ request()->is('teams/'.$current_team) ? 'active' :
                    '' }}">
                    <i class='bx bxl-microsoft-teams'></i>
                    <span class="nav_name">Teams</span>
                </a>
                <a href="{{route('todo')}}" class="nav_link {{ request()->is('todo') ? 'active' : '' }}">
                    <i class="bx bx-notepad nav_icon"></i>
                    <span class="nav_name">Todo</span>
                </a>
                <a href="{{route('pomodoro')}}" class="nav_link {{ request()->is('pomodoro') ? 'active' : '' }}">
                    <i class="bx bx-time nav_icon"></i>
                    <span class="nav_name">Pomodoro</span>
                </a>
                <a href="{{route('calender.index')}}" class="nav_link {{ request()->is('calendar') ? 'active' : '' }}">
                    <i class='bx bx-calendar' style='font-size: 20px'></i>
                    <span class="nav_name">Calendar</span>
                </a>
                <a href="{{route('rank')}}" class="nav_link {{ request()->is('rank') ? 'active' : '' }}">
                    <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                    <span class="nav_name">Rank</span>
                </a>
            </div>
        </div>
        <span class="nav_link">
            <i class="bx bx-log-out nav_icon"></i>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <button type="submit" class="nav_name btn text-white">
                    {{ __('SignOut') }}
                </button>
            </form>
        </span>
    </nav>
    <script src="{{asset('js/sidebar.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</div>
