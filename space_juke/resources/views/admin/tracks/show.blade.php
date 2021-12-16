@auth()
    <x-app-layout>
    <x-slot name="header">{{ __(`Track`) }}</x-slot>
    <x-table-boilerplate pageTitle="Track: {{$track->name}} Details">
        <dl class="grid grid-cols-6 gap-2 mt-5">
            <dt class="col-span-1">ID</dt>
            <dd class="col-span-5">{{ $track->id }}</dd>
            <dt class="col-span-1">Artist</dt>
            <dd class="col-span-5">{{ $track->artist }}</dd>
            <dt class="col-span-1">Album</dt>
            <dd class="col-span-5">{{ $track->album }}</dd>
            <dt class="col-span-1">Genre</dt>
            <dd class="col-span-5">{{ $track->genre->name }}</dd>
            <dt class="col-span-1">Name</dt>
            <dd class="col-span-5">{{ $track->name }}</dd>
            <dt class="col-span-1">Length</dt>
            <dd class="col-span-5">{{ $track->length }}</dd>
            <dt class="col-span-1">Year</dt>
            <dd class="col-span-5">{{ $track->year }}</dd>
            <dt class="col-span-1">Created Date</dt>
            <dd class="col-span-5">{{ $track->created_at }}</dd>
            <dt class="col-span-1">Last Update Date</dt>
            <dd class="col-span-5">{{ $track->updated_at }}</dd>
            <dt class="col-span-1">
                <x-buttons.edit href="{{ route('tracks.edit', ['track'=>$track->id]) }}">Edit</x-buttons.edit>
            </dt>
            <dd class="col-span-5">
                <x-forms.delete action="{{route('tracks.destroy',['track'=>$track])}}">
                    <x-buttons.delete/>
                </x-forms.delete>
            </dd>
        </dl>
        <x-buttons.back name="tracks"/>
    </x-table-boilerplate>
</x-app-layout>
@else
    <x-guest-layout>
        <x-slot name="header">{{ __(`Track`) }}</x-slot>
        <x-table-boilerplate pageTitle="Track: {{$track->name}} Details">
            <dl class="grid grid-cols-6 gap-2 mt-5">
                <dt class="col-span-1">ID</dt>
                <dd class="col-span-5">{{ $track->id }}</dd>
                <dt class="col-span-1">Artist</dt>
                <dd class="col-span-5">{{ $track->artist }}</dd>
                <dt class="col-span-1">Album</dt>
                <dd class="col-span-5">{{ $track->album }}</dd>
                <dt class="col-span-1">Genre</dt>
                <dd class="col-span-5">{{ $track->genre->name }}</dd>
                <dt class="col-span-1">Name</dt>
                <dd class="col-span-5">{{ $track->name }}</dd>
                <dt class="col-span-1">Length</dt>
                <dd class="col-span-5">{{ $track->length }}</dd>
                <dt class="col-span-1">Year</dt>
                <dd class="col-span-5">{{ $track->year }}</dd>
                <dt class="col-span-1">Created Date</dt>
                <dd class="col-span-5">{{ $track->created_at }}</dd>
                <dt class="col-span-1">Last Update Date</dt>
                <dd class="col-span-5">{{ $track->updated_at }}</dd>
            </dl>
            <x-buttons.back name="tracks"/>
        </x-table-boilerplate>
</x-guest-layout>
@endif
