<x-app-layout>
    <x-table-boilerplate pageTitle="Update The Role: {{$role->name}}">
        <x-forms.input id="Role" action="{{route('roles.update',$role->id)}}" route="roles">
            @csrf
            @method('patch')
            <x-input-field name="name" type="text" value="{{$role->name}}"/>
            <div class="container my-5">
                <div class="p-2 bg-base-200 items-left rounded md:h-100 grid grid-rows-5 grid-flow-col gap-5 ">
                    @foreach($allPermissions as $per)
                        <x-forms.toggle name="{{$per->name}}">
                            <input name="permissions[]" value="{{$per->id}}" id="toggle-{{$per->name}}" @if($role->permissions->contains($per->id)) checked @endif type="checkbox"  class="sr-only">
                        </x-forms.toggle>
                    @endforeach
                </div>
            </div>
        </x-forms.input>
    </x-table-boilerplate>
</x-app-layout>

