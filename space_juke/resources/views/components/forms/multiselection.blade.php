@props(['name'])

<label class="block text-left pt-4">
    <span>{{ucwords($name)}}</span>
    <select class="bg-gray-400 border border-2 border-gray-500 focus-within:border-white rounded-lg form-multiselect block w-full mt-1" multiple name="{{$name}}_id[]">
        {{$slot}}
    </select>
</label>
