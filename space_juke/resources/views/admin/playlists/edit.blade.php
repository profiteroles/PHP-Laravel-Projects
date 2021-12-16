<x-app-layout>
    <x-table-boilerplate pageTitle="Update {{$playlist->name}} Playlist - {{$playlist->user->name}}">
        <x-forms.input id="Playlist" action="{{route('playlists.update',$playlist->id)}}" route="playlists" reset="false">
            @csrf
            @method('patch')
            <x-input-field name="name" type="text" value="{{$playlist->name}}"></x-input-field>
            <x-forms.select name="public">
                <option hidden value="{{$playlist->public}}">{{$playlist->public == 0 ? "Private" : "Public"}}</option>
                <option value="1">Public</option>
                <option value="0">Private</option>
            </x-forms.select>
            <x-forms.multiselection name="track">
                @foreach($tracks as $track)--}}
                <option class="bg-gray-400" id="track-{{$track->id}}" name="track_id"
                        value="{{$track->id}}">{{$track->name}}</option>
                @endforeach
            </x-forms.multiselection>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>
