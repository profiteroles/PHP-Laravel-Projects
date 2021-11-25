<x-app name="What to DO!">
    {{--Table--}}
    <x-table addAction="{{route('store')}}">
        @foreach($todolists as $list)
            <x-list-item item="{{$list->title}}" href="{{route('show',$list->id)}}" priority="{{$list->priority}}">
                <form action="{{route('destroy',$list->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <x-checkbox/>
                </form>
            </x-list-item>
        @endforeach
    </x-table>
</x-app>

