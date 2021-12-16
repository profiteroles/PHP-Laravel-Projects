@auth()
<x-app-layout>
    <x-slot name="header">{{ __(`Playlists`) }}</x-slot>
    <x-z-table add="Make a Playlist" route="playlists.create" title="Playlist" canAdd="add-playlist">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Owner</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($playlists as $key=>$playlist)

            <tr class="hover">
                <td class="small">{{ $key+1 }}</td>
                <td>{{ $playlist->name }}</td>
                <td>{{$playlist->user()->get()->first()->name}}</td>
                <td>{{$playlist->public == 1 ? "Public" : "Private"}}</td>
                <td>
                    <x-buttons.edit href="{{ route('playlists.show', $playlist->id) }}">Details</x-buttons.edit>
                    @if($playlist->user_id == auth()->user()->id)
                    <x-buttons.edit href="{{ route('playlists.edit', ['playlist'=>$playlist->id]) }}" btn="btn-secondary">Edit</x-buttons.edit>
                    @endif

                </td>
            </tr>
        @endforeach
        </tbody>
        <x-slot name="tfoot">{{$playlists->links()}}</x-slot>
    </x-z-table>
    <x-success-message/>
</x-app-layout>
@else
    <x-guest-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(`Playlists`) }}
            </h2>
        </x-slot>
        <x-z-table add="Make a Playlist" route="playlists.create" title="Playlist" canAdd="">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Owner</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($playlists as $key=>$playlist)
                <tr class="hover">
                    <td class="small">{{ $key+1 }}</td>
                    <td>{{ $playlist->name }}</td>
                    <td>{{$playlist->user()->get()->first()->name}}</td>
                    <td>{{$playlist->public == 1 ? "Public" : "Private"}}</td>
                    <td>
                        <x-buttons.edit href="{{ route('playlists.show', $playlist->id) }}">Details</x-buttons.edit>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <x-slot name="tfoot">{{$playlists->links()}}</x-slot>
        </x-z-table>
        <x-success-message/>
    </x-guest-layout>
    @endif
