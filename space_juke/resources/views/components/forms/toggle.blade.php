@props(['name','checked'=>false])
<style>
    input:checked ~ .{{$name}} {
        transform: translateX(100%);
        background-color: #48bb78;
    }
</style>
<!-- Toggle -->
<div class="flex items-left justify-start w-full mb-12">

    <label for="toggle-{{$name}}" class="flex items-center cursor-pointer">
        <!-- toggle -->
        <div class="relative">
            <!-- input -->
            {{$slot}}
            <!-- line -->
            <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
            <!-- dot -->
            <div class="{{$name}} absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
        </div>
        <!-- label -->
        <div class="ml-3 text-blue-300 font-medium">{{$name}}</div>
    </label>
</div>
