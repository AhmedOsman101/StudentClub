<div class="create-todo mb-5 mx-auto">
    <div class="card rounded-3 ">
        <div class="card-body py-3">
            <form class="row g-3 justify-content-center align-items-center mb-3 pb-2">
                <div class="col-12">
                    <div>
                        <input wire:model='task' type="text" id="form1" class=" input-create d-flex" placeholder="what would you like to do ?" />
                        @error('task')
                            <span class="text-danger text-center d-block">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button wire:click.prevent='create' type="submit" class="btn-save">
                       <span>Save</span> </button>
                </div>
                @if(session('success'))
                    <span class="">{{session('success')}}</span>
                @endif
            </form>
        </div>
    </div>
</div>
