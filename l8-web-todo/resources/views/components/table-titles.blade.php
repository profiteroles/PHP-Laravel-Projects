@props(['delbtn'=>false, 'title'=>'title','addAction','id'])
<tr>
    @if($delbtn)
        <th>
            <label for="my-modal-2" class="btn btn-primary modal-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </label>
            <input type="checkbox" id="my-modal-2" class="modal-toggle">
            <div class="modal">
                <div class="modal-box">
                    <p>Would you like to all the list items?</p>
                    <form
                        action="{{Request()->route()->getName() == 'index' ? route('deleteAllList'): route('deleteAll',[$id]) }}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <div class="modal-action">
                            <button type="submit">
                                <label for="my-modal-2" class="btn btn-primary">Yeap</label>
                            </button>
                            <label for="my-modal-2" class="btn">Nah Nah</label>
                        </div>
                    </form>
                </div>
            </div>
        </th>
    @else
        <th></th>
    @endif
    <th>{{$title}}</th>
    <x-addbtn addAction="{{$addAction}}"/>
</tr>
