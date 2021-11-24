<th x-data={showInput:false}>
    <div x-show="showInput" class="form-control">
        <div class="relative">
            <form action="{{route('addtask',1)}}" method="POST" autocomplete="off">
                @csrf
                <input type="text" name="todolist_id" hidden value="1">
                <input type="text" name="title" placeholder="Add New One"
                       class="w-full pr-16 input input-primary input-bordered">
                <button x-on:click="showInput=!showInput" type="submit"
                        class="absolute top-0 right-0 rounded-l-none btn btn-primary">+
                </button>
            </form>
        </div>
    </div>
    <button @click="showInput=!showInput" type="button" x-transition >
        <template x-if="!showInput">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </template>
    </button>
</th>
