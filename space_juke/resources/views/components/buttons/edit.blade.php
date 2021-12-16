@props(['href','btn'=>'btn-primary'])
<a href="{{$href}}"
class="btn btn-sm text-gray-50 {{ $btn }}">{{$slot}}</a>
