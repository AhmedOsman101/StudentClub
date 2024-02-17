<div wire:poll.keep-alive.5s >
    <center>
        <h1>Global Rank</h1>
        <div class="hr"></div>
    </center>
    <div class="rank">
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
                @foreach ($users as $user)
                    <tr>
                            <td> {{ $user->id }} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->score }} </td>
                            <td> {{ $user->country }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
