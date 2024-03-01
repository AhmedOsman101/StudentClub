<div class="productivity">
    <h1>Productivity</h1>
    <div class="hr"></div>
    <div class="cycle">
        <div class="cycle_avarage"
        style="width:
            @foreach ( $days as $day)
                        {{{floor(( $day->sunday + $day->monday + $day->thursday + $day->wednesday + $day->thuesday + $day->friday + $day->saturday )/7)}}}%
                @endforeach
            ; height:
            @foreach ( $days as $day)
                        {{{floor(( $day->sunday + $day->monday + $day->thursday + $day->wednesday + $day->thuesday + $day->friday + $day->saturday )/7)}}}%
                @endforeach
            "></div>
            <h1 class="cycle_percentage">
                @foreach ( $days as $day)
                        {{{floor(( $day->sunday + $day->monday + $day->thursday + $day->wednesday + $day->thuesday + $day->friday + $day->saturday )/7)}}}%
                @endforeach
            </h1>
    </div>
    <div class="text">
        <div class="day">
            <h4>This Day</h4>
            <h5>
                @foreach ( $days as $day)
                    {{{ $day->saturday }}}%
                @endforeach
            </h5>
        </div>
        <div class="week">
            <h4>This week</h4>
            <h5>
                @foreach ( $days as $day)
                    {{{floor(( $day->sunday + $day->monday + $day->thursday + $day->wednesday + $day->thuesday + $day->friday + $day->saturday )/7)}}}%
                @endforeach
            </h5>
        </div>
    </div>
</div>
