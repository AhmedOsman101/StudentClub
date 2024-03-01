<div class="get-task h-100">
    <div class="card rounded-3">
        <table class="table mb-4 text-center">
            <thead>
                <tr>
                    <div class="d-flex align-items-center">
                        <h4 class="mx-4 my-3 ">To Do List</h4>
                        <div style="width: 40px;"><img style="max-width: 100%;" src="image/check.png" alt=""></div>
                    </div>
                </tr>
                <tr>
                    <th scope="col">Todo</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                <tr>
                    <td>
                        <div class="d-flex align-content-center ">
                            @if($todo->status)
                            <input wire:click="toggle({{$todo->id}})" class="mr-2 form-check-input" type="checkbox" checked>
                            <input type="text" placeholder="{{ $todo->task }}" value="{{ $todo->task }}" class="mx-1" wire:model="EditTask.{{ $todo->id }}" wire:keydown.enter="save({{ $todo->id }})" style="border:none;outline:none;">
                            @else
                            <input wire:click="toggle({{$todo->id}})" class="mr-2 form-check-input" type="checkbox" name="" id="">
                            <input type="text" placeholder="{{ $todo->task }}" value="{{ $todo->task }}" class="mx-1" wire:model="EditTask.{{ $todo->id }}" wire:keydown.enter="save({{ $todo->id }})" style="border:none;outline:none;">
                            @endif
                            @if($EditTodoID === $todo->id)
                            <input wire:model="EditTask.{{ $todo->id }}" type="text" placeholder="To do......">
                            @error("EditTask.$todo->id")
                            <span class="text-danger text-center d-block">{{$message}}</span>
                            @enderror
                            @endif
                        </div>
                    </td>
                    <td>{{$todo->created_at}}</td>
                    <td>
                        <div class="d-flex align-items-center justify-content-center">
                            <svg wire:click="delete({{$todo->id}})" class="delete inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#ed1d1d" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80
                                            80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3
                                            32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16
                                            7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                            </svg>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        @if($todos->isEmpty())
                <div class="empty-todo">
                    <p>You currently have nothing todo</p>
                    <p><b>"Don't worry about feeling empty. Keep striving towards your dreams."</b></p>
                    <div class="notask">
                        <img src="image/no-task.png" alt="">
                    </div>
                </div>
        @endif
        <div class="d-flex justify-content-center mt-2 mb-2"> <!-- Added mt-4 (margin-top) and mb-4 (margin-bottom) -->
            {{ $todos->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

</div>
