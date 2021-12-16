@props(['name'])
{{--TODO: Findout ytf m-4 not functioning--}}
<div class="container mt-2">
<span class="text-primary">{{ucwords($name)}}</span>
<div class="overflow-scroll h-28 rounded-lg border border-gray-500 border-2">
    <div class="block">
        <div class="mt-2 ml-4">
            {{$slot}}
        </div>
    </div>
</div>
</div>
