<x-app-layout>
    <x-slot name="header">{{ __(`Genres`) }}</x-slot>
    <x-z-table add="Add Genre" route="genres.create" title="Genres" canAdd="genre-create">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Parent</th>
            <th>Icon</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $key=>$genre)
            <tr class="hover">
                <td class="small">{{ $key+1 }}</td>
                <td>{{ $genre->name }}</td>
                <td>{{$genre->parent}}</td>
                <td>{{$genre->icon}}</td>
                <td>
                    <x-buttons.edit href="{{ route('genres.show', $genre->id) }}">Details</x-buttons.edit>
                    @if(!auth()->user()->hasRole('astronaut'))
                        <x-buttons.edit href="{{ route('genres.edit', ['genre'=>$genre->id]) }}" btn="btn-secondary">
                            Edit
                        </x-buttons.edit>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
        <x-slot name="tfoot">{{$genres->links()}}</x-slot>
    </x-z-table>
</x-app-layout>

