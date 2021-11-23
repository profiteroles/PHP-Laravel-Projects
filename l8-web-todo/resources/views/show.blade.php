<x-app>
    {{--Table--}}
    <x-table>
        @foreach($tasks as $task)
            <x-list-item item="{{$task->task}}">
                <form action="{{route('destroy',$task->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <x-checkbox/>
                </form>
            </x-list-item>
        @endforeach
    </x-table>
</x-app>
