@props(['priority'=>false, 'item','href','hrefEdit'])
<tr>
    {{$slot}}
    <td class="flex h-16 hover:text-primary">
        @if($priority)
            <x-arrow-icon>
                <x-title title="{{$item}}"/>
            </x-arrow-icon>
        @else
            <x-title title="{{$item}}"/>
        @endif
    </td>
    <td>
        @if(Route::currentRouteName() =='index')
            <x-edit-icon href="{{$href}}"/>
        @else
            <x-toggle href="{{$hrefEdit ?? ''}}" title="{{$item}}" priority="{{$priority}}"/>
        @endif
    </td>
</tr>
