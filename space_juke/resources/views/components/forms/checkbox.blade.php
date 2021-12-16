@props(['name','checked'=>'', 'value'])

<div>
    <label class="inline-flex items-center">
        <input  name="roles_id[]" value="{{$value}}" type="checkbox" class="form-checkbox" {{$checked}} ">
        <span class="ml-2">{{$name}}</span>
    </label>
</div>
