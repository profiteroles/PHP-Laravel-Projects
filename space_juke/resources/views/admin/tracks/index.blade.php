@auth()
    <x-app-layout>
        <x-slot name="header">{{ __(`Tracks`) }}</x-slot>
        <x-z-table add="Add New Track" route="tracks.create" title="Tracks" colNo="8" canAdd="add-track">
            <thead>
            <tr>
                <th></th>
                <th>Artist</th>
                <th>Album</th>
                <th>Genre</th>
                <th>#(idfk)</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tracks as $key=>$track)
                <tr class="hover">
                    <td class="small">{{ $key+1 }}</td>
                    <td>{{ $track->artist }}</td>
                    <td>{{ $track->album }}</td>
                    <td>{{ $track->genre->name }}</td>
                    <td>{{ $track->idfk }}</td>
                    <td>{{ $track->name }}</td>
                    <td>
                        <x-buttons.edit href="{{ route('tracks.show', $track->id) }}">Details</x-buttons.edit>
                        <x-buttons.edit href="{{ route('tracks.edit', ['track'=>$track->id]) }}" btn="btn-secondary">
                            Edit
                        </x-buttons.edit>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <x-slot name="tfoot">{{$tracks->links()}}</x-slot>
        </x-z-table>
        <x-success-message/>
    </x-app-layout>
@else
    <x-guest-layout>
        <x-z-table add="Add New Track" route="tracks.create" title="Tracks" colNo="8" canAdd="">
            <thead>
            <tr>
                <th></th>
                <th>Artist</th>
                <th>Album</th>
                <th>Genre</th>
                <th>#(idfk)</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tracks as $key=>$track)
                <tr class="hover">
                    <td class="small">{{ $key+1 }}</td>
                    <td>{{ $track->artist }}</td>
                    <td>{{ $track->album }}</td>
                    <td>{{ $track->genre->name }}</td>
                    <td>{{ $track->idfk }}</td>
                    <td>{{ $track->name }}</td>
                    <td>
                        <x-buttons.edit href="{{ route('tracks.show', $track->id) }}">Details</x-buttons.edit>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <x-slot name="tfoot">{{$tracks->links()}}</x-slot>
        </x-z-table>
        <x-success-message/>
    </x-guest-layout>
@endif


