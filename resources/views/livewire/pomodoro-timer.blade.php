<section>
    <div class="container">
        <h1>pomodoro</h1>

        <div class="painel">
            <p id="work">work</p>
            <p id="break">break</p>
        </div>

        <div class="timer">
            <div class="circle">
                <div class="time">
                    <p id="minutes">{{ $workMinutes }}</p>
                    <p>:</p>
                    <p id="seconds">{{ $seconds }}</p>
                </div>
            </div>
        </div>

        <div class="controls">
            <button wire:click="startTimer">
                <i class="fa-solid fa-play"></i>
            </button>

            <a wire:click="resetTimer">
                <i class="fa-solid fa-arrow-rotate-left"></i></a>
        </div>
    </div>
</section>


