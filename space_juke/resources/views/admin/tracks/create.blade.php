<x-app-layout>
    <x-slot name="header">{{ __(`Track`) }}</x-slot>
    <x-table-boilerplate pageTitle="Add New Track">
        <x-forms.input id="Track" route="tracks" action="{{route('tracks.store')}}">
            <x-input-field name="artist" type="text"></x-input-field>
            <x-input-field name="album" type="text"></x-input-field>
            <x-forms.select name="genre_id">
                @foreach(\App\Models\Genre::all() as $genre)
                    <option value="{{$genre->id}}"
                        {{old('genre_id') == $genre->id ? 'selected': ''}}
                    >{{ucwords($genre->name)}}</option>
                @endforeach
            </x-forms.select>
{{--            <x-input-field name="genre" type="text"></x-input-field>--}}
            <x-input-field name="name" type="text"/>
            <x-input-field name="length" type="text"/>
            <x-input-field name="year" type="number"/>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>
