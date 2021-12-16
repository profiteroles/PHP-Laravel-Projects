<x-app-layout>
    <x-slot name="header">{{ __(`Genres`) }}</x-slot>
    <x-table-boilerplate pageTitle="Add New Genre">
        <x-forms.input id="Genre" route="genres" action="{{route('genres.store')}}">
            <x-input-field name="name" type="text"></x-input-field>
            <x-input-field name="parent" type="number"></x-input-field>
            <x-input-field name="icon" type="text"></x-input-field>
            <x-input-field name="extra" type="text"></x-input-field>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>
