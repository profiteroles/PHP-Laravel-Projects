<x-app>
    {{--NavBar--}}
    <x-navbar title="{{$todolist->title}}">
        <x-toggle href="{{route('lists.update',$todolist->id)}}" title="{{$todolist->title}}"
                  priority="{{$todolist->priority}}"/>
    </x-navbar>
    <x-table addAction="{{route('tasks.store',[$todolist->id])}}" id="{{$todolist->id}}">
        @foreach($tasks as $task)
            <x-list-item item="{{$task->task}}" priority="{{$task->priority}}"
                         hrefEdit="{{route('tasks.update',[$todolist->id, $task->id])}}">
                <td>
                    <form action="{{route('tasks.destroy',[$todolist->id, $task->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" class="checkbox">
                    </form>
                </td>
            </x-list-item>
        @endforeach
    </x-table>
    <x-success/>
</x-app>
