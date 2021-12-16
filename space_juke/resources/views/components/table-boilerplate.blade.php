@props(['pageTitle'])
<div class="py-12 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg ">
            <div class="p-6 border-b border-gray-200">
                <h2>{{$pageTitle}}</h2>
                {{$slot}}
            </div>
        </div>
    </div>
</div>
