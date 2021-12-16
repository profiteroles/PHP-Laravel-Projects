@props(['action'])
<form
    class="pb-5"
    action="{{ $action }}"
    method="POST">
    @csrf
    @method('delete')
    {{$slot}}
</form>
