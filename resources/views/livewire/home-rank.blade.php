<div wire:poll.keep-alive.2s>
    <center>
        <h1>Global Rank</h1>
        <div class="hr"></div>
    </center>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Position</th>
                <th class="text-center">Name</th>
                <th class="text-center">Points</th>
                <th class="text-center">Clan</th>
                <th class="text-center">Country</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center"> {{ ++$counter }} </td>
                    <td class="text-center"> {{ $user->name }} </td>
                    <td class="text-center"> {{ $user->score }} </td>
                    <td class="text-center">{{ $this->getTeam($user->current_team_id) }}</td>
                    <td class="text-center"> {{ $user->country }} </td>
                </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
</div>
