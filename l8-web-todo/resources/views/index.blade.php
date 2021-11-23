<x-app>
    {{--Table--}}
    <x-table>
        @foreach($todolists as $list)
            <x-list-item item="{{$list->title}}" href="{{route('show',$list->id)}}">
                <form action="{{route('destroy',$list->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <x-checkbox/>
                </form>
            </x-list-item>
        @endforeach
    </x-table>
</x-app>

