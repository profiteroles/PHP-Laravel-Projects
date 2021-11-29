<div class="mx-10 py-5">
    <div class="p-5 navbar mb-2 shadow-lg bg-neutral text-neutral-content rounded-box">
        <div class="flex-none">
            <a class="btn btn-square btn-ghost" href="{{route('index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
            </a>
        </div>
        <div class="flex px-2 mx-2">
            <span class="flex-initial text-lg font-bold font-mono">{{$title}}</span>
        </div>
        {{$slot}}
    </div>
</div>
