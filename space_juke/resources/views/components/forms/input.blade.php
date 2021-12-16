@props(['route','id','action','reset'=>'true'])
<form action={{$action}} method="POST">
    @csrf
    {{$slot}}

    <div class="py-6">
        <x-buttons.back name="{{$route}}"></x-buttons.back>
        @if($reset == 'true')
        <x-buttons.reset/>
        @endif
        <x-buttons.submit>Save {{$id}}</x-buttons.submit>
    </div>
    @if($errors->any())
        <lu>
            @foreach($errors->all() as $err)
                <li class="text-red-500 text-xs">{{$err}}</li>
            @endforeach
        </lu>
    @endif
</form>
<x-success-message/>
