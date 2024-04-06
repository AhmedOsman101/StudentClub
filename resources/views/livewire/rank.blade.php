<div wire:poll.keep-alive.2s>
    <center>
        <h1>Global Rank</h1>
        <div class="hr"></div>
    </center>
    <div class="rank">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Position</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Points</th>
                    <th class="text-center">Team</th>
                    <th class="text-center">Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-center"> {{ ++$counter }} </td>
                    <td class="text-center"> {{ $user->name }} </td>
                    <td class="text-center"> {{ $user->score }} pts</td>
                    <td class="text-center">{{ optional($user->team)->name }}</td>
                    <td class="text-center">{{ $user->country }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
