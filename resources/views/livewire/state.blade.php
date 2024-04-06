<div class="diagram">

    <h1>Your Stats</h1>
    <div class="hr"></div>
    <div class="Sunday">
        <div class="state_text">
            <p>Sunday</p>
        </div>
        <div class="state_color">
            {{-- Sunday Percentage --}}
            <div class="avarage" style="width: {{ $days->sunday }}%">
            </div>
        </div>
        <div class="percentage">
            {{ $days->sunday }}%
        </div>
    </div>

    <div class="monday">
        <div class="state_text">
            <p>Monday</p>
        </div>
        <div class="state_color">
            {{-- monday Percentage --}}
            <div class="avarage" style="width: {{ $days->monday }}%">
            </div>
        </div>
        <div class="percentage">
            {{ $days->monday }}%
        </div>
    </div>

    <div class="tuesday">
        <div class="state_text">
            <p>tuesday</p>
        </div>
        <div class="state_color">
            {{-- tuesday Percentage --}}
            <div class="avarage" style="width:{{ $days->tuesday }}%">
            </div>
        </div>
        <div class="percentage">
            {{ $days->tuesday }}%
        </div>
    </div>

    <div class="wednesday">
        <div class="state_text">
            <p>wednesday</p>
        </div>
        <div class="state_color">
            {{-- wednesday Percentage --}}
            <div class="avarage" style="width: {{ $days->wednesday }}%">
            </div>
        </div>
        <div class="percentage">
            {{ $days->wednesday }}%
        </div>
    </div>

    <div class="thursday">
        <div class="state_text">
            <p>thursday</p>
        </div>
        <div class="state_color">
            {{-- thursday Percentage --}}
            <div class="avarage" style="width: {{ $days->thursday }}%">
            </div>
        </div>
        <div class="percentage">
            {{ $days->thursday }}%
        </div>
    </div>

    <div class="friday">
        <div class="state_text">
            <p>friday</p>
        </div>
        <div class="state_color">
            {{-- friday Percentage --}}
            <div class="avarage" style="width: {{ $days->friday }}%">
            </div>
        </div>
        <div class="percentage">
            {{ $days->friday }}%
        </div>
    </div>

    <div class="saturday">
        <div class="state_text">
            <p>saturday</p>
        </div>
        <div class="state_color">
            {{-- saturday Percentage --}}
            <div class="avarage" style="width: {{ $days->saturday }}%">
            </div>
        </div>
        <div class="percentage">
            {{ $days->saturday }}%
        </div>
    </div>

</div>
