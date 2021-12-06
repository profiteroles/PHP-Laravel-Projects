<x-app>
    {{--NavBar--}}
    <x-navbar title="What to DO!"/>
    {{--Table--}}
    <x-table addAction="{{route('lists.store')}}">
        @foreach($todolists as $list)
            <tr>
                <td>
                <form action="{{route('lists.destroy',$list->id)}}" method="POST">
                    @csrf
                    @method('delete')
                        <input type="submit" class="checkbox">
                </form>
                </td>
                <td class="flex h-16 hover:text-primary">
                    @if($list->priority)
                        <x-arrow-icon>
                            <x-title title="{{$list->title}}"/>
                        </x-arrow-icon>
                    @else
                        <x-title title="{{$list->title}}"/>
                    @endif
                </td>
                <td>
                    @if(Route::currentRouteName() =='index')
                        <x-edit-icon href="{{route('tasks.index',$list->id)}}"/>
                    @else
                        <x-toggle href="{{route('tasks.index',$list->id)}}" title="{{$list->title}}" priority="{{$list->priority}}"/>
                    @endif
                </td>
            </tr>
        @endforeach
    </x-table>
    <x-success/>
</x-app>

