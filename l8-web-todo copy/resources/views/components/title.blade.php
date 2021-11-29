@props(['title'])
<div x-data="{ complete: false }">
    <h2 @click="complete = !complete" :aria-expanded="complete ? 'true' : 'false'" :class="{ 'line-through': complete }" class="flex-initial font-bold">{{$title}}</h2>
</div>
