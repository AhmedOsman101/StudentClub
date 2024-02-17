<div>
    <center>
        <h1>Global Rank</h1>
        <div class="hr"></div>
    </center>
    <table class="table">
        <thead>
            <tr>
                <th>Num</th>
                <th>Name</th>
                <th>Points</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->score }} </td>
                    <td> {{ $user->country }} </td>
                </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
</div>
