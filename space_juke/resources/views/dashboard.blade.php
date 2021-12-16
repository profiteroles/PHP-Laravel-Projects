<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--Main Col-->
            <div class="p-4 md:p-12 text-center lg:text-left">
                <!-- Image for mobile view-->
                <div class="block mx-auto avatar indicator bg-center">
                    <div class="indicator-item badge">Update</div>
                    <div class="w-48 h-48 rounded-btn">
                        <img src="{{auth()->user()->image}}">
                    </div>
                </div>

                <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{auth()->user()->name}}</h1>
                <p class=" text-sm">Your are {{auth()->user()->roles->first->name->name}}</p>
{{--                @if(auth()->user()->hasRole('astronaut'))--}}
{{--                <p>{{ auth()->user()->hasRole('astronaut') }}</p>--}}
{{--                @endif--}}
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
                <div class="p-10">
                    @foreach(auth()->user()->roles as $role)
                        <div class="container">
                        <div class="badge badge-accent badge-outline">{{$role->name}} {{count($role->permissions)}}</div>
                            <hr class="my-2">
                        </div>
                        @foreach($role->permissions as $per)
                                <div class="badge badge-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 52 52"
                                         class="inline-block w-4 h-4 mr-2 stroke-current">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                    </svg>
                                    {{$per->name}}
                                </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
