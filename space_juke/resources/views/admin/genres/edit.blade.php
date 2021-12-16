<x-app-layout>
    <x-table-boilerplate pageTitle="Update The Genre: {{$genre->name}}">
        <x-forms.input id="Genre" action="{{route('genres.update',$genre->id)}}" route="genres">
            @method('patch')
            <x-input-field name="name" type="text" value="{{$genre->name}}"/>
            <x-input-field name="parent" type="number" value="{{$genre->parent}}"/>
            <x-input-field name="icon" type="text" value="{{$genre->icon}}"/>
            <x-input-field name="extra" type="text" value="{{$genre->extra}}"/>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>

