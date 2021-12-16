<x-app-layout>
    <x-table-boilerplate pageTitle="Update The Track: {{$track->name}}">
        <x-forms.input id="Track" action="{{route('tracks.update',$track->id)}}" route="tracks">
            @method('patch')
            <x-input-field name="artist" type="text" value="{{$track->artist}}"/>
            <x-input-field name="album" type="text" value="{{$track->album}}"/>
            <x-forms.select name="genre_id">
                @foreach(\App\Models\Genre::all() as $genre)
                    <option value="{{$genre->id}}"
                        {{$track->genre->name == $genre->name ? 'selected': ''}}
                    >{{ucwords($genre->name) }}</option>
                @endforeach
            </x-forms.select>
            <x-input-field name="name" type="text" value="{{$track->name}}"/>
            <x-input-field name="length" type="text" value="{{$track->length}}"/>
            <x-input-field name="year" type="number" value="{{$track->year}}"/>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>
