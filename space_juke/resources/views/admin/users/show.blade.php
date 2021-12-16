<x-app-layout>
    <x-slot name="header">{{ __(`User Details`) }}</x-slot>
    <x-table-boilerplate pageTitle="{{$user->name}}'s Details">
        <dl class="grid grid-cols-6 gap-2 mt-5">
            <dt class="col-span-1">ID</dt>
            <dd class="col-span-5">{{ $user->id }}</dd>
            <dt class="col-span-1">Name</dt>
            <dd class="col-span-5">{{ $user->name }}</dd>
            <dt class="col-span-1">Email</dt>
            <dd class="col-span-5">{{ $user->email }}</dd>
            <dt class="col-span-1">User Role</dt>
            <dd class="col-span-5">@foreach($user->getRoleNames() as $role)'{{ ucwords($role) }}' @endforeach</dd>
            <dt class="col-span-1">Last Logged In</dt>
            <dd class="col-span-5">{{ '-' }}</dd>
            <dt class="col-span-1">Created Date</dt>
            <dd class="col-span-5">{{ $user->created_at }}</dd>
            <dt class="col-span-1">Last Update Date</dt>
            <dd class="col-span-5">{{ $user->updated_at }}</dd>
            <dt class="col-span-1">Email Verification Date</dt>
            <dd class="col-span-5">{{ $user->email_verified_at }}</dd>
            <dt class="col-span-1">
                <x-buttons.edit href="{{ route('users.edit', ['user'=>$user->id]) }}">Edit</x-buttons.edit>
            </dt>
            <dd class="col-span-5">
                <x-forms.delete action="{{route('users.destroy',['user'=>$user])}}">
                    <x-buttons.delete/>
                </x-forms.delete>
            </dd>
        </dl>
        <x-buttons.back name="users"/>
    </x-table-boilerplate>
</x-app-layout>
