<x-app name="{{$todolist->title}}">
    {{--Table--}}
    <x-table title="{{$todolist->title}}">
        @foreach($tasks as $task)
            <x-list-item item="{{$task->task}}" priority="{{$task->priority}}">
                <form action="{{route('remove',$task->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <x-checkbox value="{{$task->id}}"/>
                </form>
            </x-list-item>
        @endforeach
    </x-table>
</x-app>
