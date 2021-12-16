<x-app-layout>
    <x-slot name="header">{{__(`Roles`)}}</x-slot>
    <x-table-boilerplate pageTitle="Add New Role">
        <x-forms.input id="Role" route="roles" action="{{route('roles.store')}}">
            <x-input-field name="name" type="text"/>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>
