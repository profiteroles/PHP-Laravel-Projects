<x-app-layout>
    <x-slot name="header">{{ __(`User Details`) }}</x-slot>
    <x-table-boilerplate pageTitle="Update The User: {{ $user->name }}">
        <x-forms.input id="User" action="{{route('users.update',$user->id)}}" route="users">
            @csrf
            @method('patch')
            <x-input-field name="name" type="text" value="{{$user->name}}" />
            <x-input-field name="email" type="email" value="{{$user->email}}"/>
            <x-forms.selection-box name="roles">
                @foreach($roles as $role)
                    <x-forms.checkbox value="{{$role->id}}" name="{{ucwords($role->name)}}" checked="{{$userRoles->contains($role->name) ? 'checked' : ''}}"  />
                @endforeach
            </x-forms.selection-box>
            <x-input-field name="password" type="password" required=""/>
            <x-input-field name="confirm_password" type="password" required=""/>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>
