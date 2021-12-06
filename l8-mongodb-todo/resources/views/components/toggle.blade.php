@props(['priority'=>false, 'title','href'])
<form action="{{$href ?? ''}}" method="POST" class="text-red-500 flex-initial pr-2.5 hover:text-primary">
    @csrf
    @method('patch')
    <button type="submit">

        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
            <input type="checkbox" name="priority" id="{{$title}}" {{$priority ? 'checked' : ''}}
            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
            <label for="{{$title}}"
                   class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
        </div>
    </button>

    <label for="toggle" class="text-xs text-white">{{$priority ? 'Prioritised' : 'Not Prioritised'}}</label>
</form>
