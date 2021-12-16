<x-app-layout>
    <x-slot name="header">{{__(`Roles`)}}</x-slot>
    <x-table-boilerplate pageTitle="{{ucwords($role->name)}}'s Details">
        <dl class="grid grid-cols-6 gap-2 mt-5">
            <dt class="col-span-1">ID</dt>
            <dd class="col-span-5">{{ $role->id }}</dd>
            <dt class="col-span-1">Name</dt>
            <dd class="col-span-5">{{ $role->name }}</dd>
            <dt class="col-span-1 text-center">Guard Name</dt>
            <dd class="col-span-5">{{ $role->guard_name }}</dd>
            <dt class="col-span-1">Created Date</dt>
            <dd class="col-span-5">{{ $role->created_at }}</dd>
            <dt class="col-span-1">Permissions</dt>
            <dd class="col-span-5">{{ count($role->permissions) }}</dd>
        </dl>
        <div class="container my-5">
            <div class="p-2 bg-base-200 items-center rounded-box md:h-100 grid grid-rows-5 grid-flow-col gap-5 ">
                @foreach($role->permissions as $per)
                    <div class="rounded shadow-lg bg-base-100">
                        <div class="badge-info text-center ">{{$per->name}}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container inline-flex">
            <x-buttons.edit btn="btn-primary m-3" href="{{ route('roles.edit', ['role'=>$role->id]) }}">Edit
            </x-buttons.edit>
            <x-forms.delete action="{{route('roles.destroy',['role'=>$role])}}">
                <x-buttons.delete btn="btn-secondary m-3"/>
            </x-forms.delete>
        </div>
        <x-buttons.back name="roles"/>
    </x-table-boilerplate>
</x-app-layout>
