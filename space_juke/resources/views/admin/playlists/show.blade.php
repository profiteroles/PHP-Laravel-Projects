@auth()
    <x-app-layout>
    <x-slot name="header">{{ __(`Playlists`) }}</x-slot>
    <x-table-boilerplate pageTitle="Playlist: {{$playlist->name}} Details">
        <dl class="grid grid-cols-6 gap-2 mt-5">
            <dt class="col-span-1">ID</dt>
            <dd class="col-span-5">{{ $playlist->id }}</dd>
            <dt class="col-span-1">Name</dt>
            <dd class="col-span-5">{{ $playlist->name }}</dd>
            <dt class="col-span-1">Owner</dt>
            <dd class="col-span-5">{{ $playlist->user->name }}</dd>
            <dt class="col-span-1">Account Type</dt>
            <dd class="col-span-5">{{$playlist->public == 1 ? "Public" : "Private"}}</dd>
            <dt class="col-span-1">Created Date</dt>
            <dd class="col-span-5">{{ $playlist->created_at }}</dd>
            <dt class="col-span-1">Last Update Date</dt>
            <dd class="col-span-5">{{ $playlist->updated_at }}</dd>
        </dl>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200 dark:bg-gray-700 dark:text-white">
                        <div class="overflow-x-auto">
                            <table class="table w-full table-zebra">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Artist</th>
                                    <th>Album</th>
                                    <th>Genre</th>
                                    <th>Name</th>
                                    @if($playlist->user_id == auth()->user()->id)
                                    <th>Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($playlist->tracks()->orderBy('name')->get() as $key=>$track)
                                    <tr class="hover">
                                        <td class="small">{{ $key+1 }}</td>
                                        <td>{{ $track->artist }}</td>
                                        <td>{{ $track->album }}</td>
                                        <td>{{ $track->genre->name }}</td>
                                        <td>{{ $track->name }}</td>
                                        @if($playlist->user_id == auth()->user()->id)
                                        <td>
                                            <a href="{{route('playlist.removeTrack',['playlist'=>$playlist, 'track'=>$track])}}">
                                                <x-buttons.delete/>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <dl class="grid grid-cols-6 gap-2 mt-5">
            <x-buttons.back name="playlists"/>
            @if($playlist->user_id == auth()->user()->id)
            <x-buttons.edit href="{{ route('playlists.edit', ['playlist'=>$playlist->id]) }}">Edit</x-buttons.edit>
            <x-forms.delete action="{{route('playlists.destroy',['playlist'=>$playlist])}}">
                @endif
                <x-buttons.delete/>
            </x-forms.delete>
        </dl>
    </x-table-boilerplate>
</x-app-layout>
@else
    <x-guest-layout>
        <x-slot name="header">{{ __(`Playlists`) }}</x-slot>
        <x-table-boilerplate pageTitle="Playlist: {{$playlist->name}} Details">
            <dl class="grid grid-cols-6 gap-2 mt-5">
                <dt class="col-span-1">ID</dt>
                <dd class="col-span-5">{{ $playlist->id }}</dd>
                <dt class="col-span-1">Name</dt>
                <dd class="col-span-5">{{ $playlist->name }}</dd>
                <dt class="col-span-1">Owner</dt>
                <dd class="col-span-5">{{ $playlist->user->name }}</dd>
                <dt class="col-span-1">Account Type</dt>
                <dd class="col-span-5">{{$playlist->public == 1 ? "Public" : "Private"}}</dd>
                <dt class="col-span-1">Created Date</dt>
                <dd class="col-span-5">{{ $playlist->created_at }}</dd>
                <dt class="col-span-1">Last Update Date</dt>
                <dd class="col-span-5">{{ $playlist->updated_at }}</dd>
            </dl>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200 dark:bg-gray-700 dark:text-white">
                            <div class="overflow-x-auto">
                                <table class="table w-full table-zebra">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Artist</th>
                                        <th>Album</th>
                                        <th>Genre</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($playlist->tracks()->orderBy('name')->get() as $key=>$track)
                                        <tr class="hover">
                                            <td class="small">{{ $key+1 }}</td>
                                            <td>{{ $track->artist }}</td>
                                            <td>{{ $track->album }}</td>
                                            <td>{{ $track->genre->name }}</td>
                                            <td>{{ $track->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <dl class="grid grid-cols-6 gap-2 mt-5">
                <x-buttons.back name="playlists"/>
            </dl>
        </x-table-boilerplate>
    </x-guest-layout>
@endif
