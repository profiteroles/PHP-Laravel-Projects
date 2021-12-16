<x-app-layout>

    <x-slot name="header">{{__(`Roles`)}}</x-slot>
    <x-z-table add="Add Role" route="roles.create" title="Roles" canAdd="role-create">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Guard Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $key=>$role)
            <tr class="hover">
                <td class="small">{{ $key+1 }}</td>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td class="text-center">{{ $role->guard_name }}</td>
                <td>
                    <x-buttons.edit href="{{ route('roles.show', $role->id) }}">Details</x-buttons.edit>
                    <x-buttons.edit href="{{ route('roles.edit', ['role'=>$role->id]) }}" btn="btn-secondary">Edit</x-buttons.edit>
                </td>
            </tr>
        @endforeach
        </tbody>
        <x-slot name="tfoot">{{$roles->links()}}</x-slot>
    </x-z-table>
</x-app-layout>
