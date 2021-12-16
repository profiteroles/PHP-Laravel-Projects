<x-app-layout>
    <x-slot name="header">{{ __(`Playlists`) }}</x-slot>
    <x-table-boilerplate pageTitle="Add New Track">
        <x-forms.input id="Track" route="tracks" action="{{route('playlists.store')}}">
            <x-input-field name="name" type="text"></x-input-field>
            @if(auth()->user()->hasRole('admin'))
                <x-forms.select name="user_id">
                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{$user->id}}" {{old('user_id') == $user->id ? 'selected': ''}}>
                            {{ucwords($user->name)}}
                        </option>
                    @endforeach
                </x-forms.select>
            @else
                <input type="text" id="user_id" name="user_id" hidden value="{{auth()->user()->getAuthIdentifier()}}">
            @endif
            <x-forms.select name="public">
                <option disabled selected>Type</option>
                <option value="1">Public</option>
                <option value="0">Private</option>
            </x-forms.select>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>
