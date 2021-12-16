@props(['name','type','required'=>'required'])
<div class="form-control">
    <label for="{{$name}}" class="label">
        <span class="label-text text-primary">
            {{ucwords(str_replace('id','',str_replace('_', ' ',$name)))}}
        </span>
    </label>
    <input {{$required}}
           type={{$type}}
           name="{{$name}}"
           id="{{$name}}"
           placeholder="{{ucwords(str_replace('id','',str_replace('_', ' ',$name)))}}"
           class="input input-bordered"
           {{$attributes(['value'=>old($name)])}}
{{--           value={{$value == '' ? old($name) : $value}}--}}
    >
    @error($name)
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
</div>
