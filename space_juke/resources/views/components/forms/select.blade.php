@props(['name','required'=>'required'])
<div class="form-control">
    <label for="{{$name}}" class="label">
        <span class="label-text dark:text-black">
            {{ucwords(str_replace('id','',str_replace('_', ' ',$name)))}}
        </span>
    </label>
    <select
        class="input input-bordered"
        name="{{$name}}" id="{{$name}}" {{$required}}>
        {{$slot}}
    </select>
    @error($name)
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
</div>
