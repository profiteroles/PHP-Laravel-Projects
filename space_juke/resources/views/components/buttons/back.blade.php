@props(['name'])
<a href="{{route($name.".index")}}" class="btn btn-sm btn-accent text-gray-50">Back
    to {{ucwords($name)}}</a>
