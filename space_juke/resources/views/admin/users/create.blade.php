<x-app-layout>
    <x-slot name="header">{{ __(`User Details`) }}</x-slot>
    <x-table-boilerplate pageTitle="Add New User">
        <x-forms.input id="User" route="users" action="{{route('users.store')}}">
            <x-input-field name="name" type="text"/>
            <x-input-field name="email" type="email"/>
            <x-input-field name="password" type="password"/>
            <x-input-field name="password_confirmation" type="password"/>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>
