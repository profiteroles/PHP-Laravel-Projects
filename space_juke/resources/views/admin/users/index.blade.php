<x-app-layout>
    <x-slot name="header">
            {{ __(`User Details`) }}
    </x-slot>
    <x-z-table add="Add New User" route="users.create" title="Users" canAdd="user-create" >
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Last Logged In</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key=>$user)
            <tr class="hover">
                <td class="small">{{ $key+1 }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->last_login?? "-"}}</td>
                <td>
                    <x-buttons.edit href="{{ route('users.show', $user->id) }}">Details</x-buttons.edit>
                    <x-buttons.edit href="{{ route('users.edit', ['user'=>$user->id]) }}" btn="btn-secondary">Edit</x-buttons.edit>
                </td>
            </tr>
        @endforeach
        </tbody>
        <x-slot name="tfoot">{{$users->links()}}</x-slot>
    </x-z-table>
</x-app-layout>

