<x-app-layout>
    <x-slot name="header">{{ __(`Genres`) }}</x-slot>
    <x-table-boilerplate pageTitle="Genre: {{$genre->name}} Details">
        <dl class="grid grid-cols-6 gap-2 mt-5">
            <dt class="col-span-1">ID</dt>
            <dd class="col-span-5">{{ $genre->id }}</dd>
            <dt class="col-span-1">Name</dt>
            <dd class="col-span-5">{{ $genre->name }}</dd>
            <dt class="col-span-1">Parent</dt>
            <dd class="col-span-5">{{ $genre->parent ?? "-" }}</dd>
            <dt class="col-span-1">Icon</dt>
            <dd class="col-span-5">{{ $genre->icon }}</dd>
            <dt class="col-span-1">Extra</dt>
            <dd class="col-span-5">{{ $genre->extra ?? "-" }}</dd>
            <dt class="col-span-1">Created Date</dt>
            <dd class="col-span-5">{{ $genre->created_at }}</dd>
            <dt class="col-span-1">Last Update Date</dt>
            <dd class="col-span-5">{{ $genre->updated_at }}</dd>
            @if(!auth()->user()->hasRole('astronaut'))
            <dt class="col-span-1">
                <x-buttons.edit href="{{ route('genres.edit', ['genre'=>$genre->id]) }}">Edit</x-buttons.edit>
            </dt>
            <dd class="col-span-5">
                <x-forms.delete action="{{route('genres.destroy',['genre'=>$genre])}}">
                    <x-buttons.delete/>
                </x-forms.delete>
            </dd>
            @endif
        </dl>
        <x-buttons.back name="genres"/>
    </x-table-boilerplate>
</x-app-layout>
