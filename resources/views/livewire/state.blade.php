<div class="diagram">

    <h1>Your State</h1>
    <div class="hr"></div>
    <div class="Sunday">
        <div class="state_text">
            <p>Sunday</p>
        </div>
        <div class="state_color">
            {{-- Sunday Percentage --}}
            <div class="avarage" style="width: 
            @foreach ($days as $day)
            {{ $day->sunday }}% @endforeach
            ">
            </div>
        </div>
        <div class="percentage">
            @foreach ($days as $day)
            {{ $day->sunday }}%
            @endforeach
        </div>
    </div>

    <div class="monday">
        <div class="state_text">
            <p>Monday</p>
        </div>
        <div class="state_color">
            {{-- monday Percentage --}}
            <div class="avarage" style="width: 
            @foreach ($days as $day)
            {{ $day->monday }}% @endforeach
            ">
            </div>
        </div>
        <div class="percentage">
            @foreach ($days as $day)
            {{ $day->monday }}%
            @endforeach
        </div>
    </div>

    <div class="thursday">
        <div class="state_text">
            <p>thursday</p>
        </div>
        <div class="state_color">
            {{-- thursday Percentage --}}
            <div class="avarage" style="width: 
            @foreach ($days as $day)
            {{ $day->thursday }}% @endforeach
            ">
            </div>
        </div>
        <div class="percentage">
            @foreach ($days as $day)
            {{ $day->thursday }}%
            @endforeach
        </div>
    </div>

    <div class="wednesday">
        <div class="state_text">
            <p>wednesday</p>
        </div>
        <div class="state_color">
            {{-- wednesday Percentage --}}
            <div class="avarage" style="width: 
            @foreach ($days as $day)
            {{ $day->wednesday }}% @endforeach
            ">
            </div>
        </div>
        <div class="percentage">
            @foreach ($days as $day)
            {{ $day->wednesday }}%
            @endforeach
        </div>
    </div>

    <div class="tuesday">
        <div class="state_text">
            <p>tuesday</p>
        </div>
        <div class="state_color">
            {{-- tuesday Percentage --}}
            <div class="avarage" style="width: 
            @foreach ($days as $day)
            {{ $day->tuesday }}% @endforeach
            ">
            </div>
        </div>
        <div class="percentage">
            @foreach ($days as $day)
            {{ $day->tuesday }}%
            @endforeach
        </div>
    </div>

    <div class="friday">
        <div class="state_text">
            <p>friday</p>
        </div>
        <div class="state_color">
            {{-- friday Percentage --}}
            <div class="avarage" style="width: 
            @foreach ($days as $day)
            {{ $day->friday }}% @endforeach
            ">
            </div>
        </div>
        <div class="percentage">
            @foreach ($days as $day)
            {{ $day->friday }}%
            @endforeach
        </div>
    </div>

    <div class="saturday">
        <div class="state_text">
            <p>saturday</p>
        </div>
        <div class="state_color">
            {{-- saturday Percentage --}}
            <div class="avarage" style="width: 
            @foreach ($days as $day)
            {{ $day->saturday }}% @endforeach
            ">
            </div>
        </div>
        <div class="percentage">
            @foreach ($days as $day)
            {{ $day->saturday }}%
            @endforeach
        </div>
    </div>

</div>
