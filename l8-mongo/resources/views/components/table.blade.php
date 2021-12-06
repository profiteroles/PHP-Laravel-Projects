<div class="container mx-auto">
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
            <x-table-titles addAction="{{$addAction}}" title="{{$slot->isNotEmpty() ? 'title':'Press + to Add New Item'}}" delbtn="{{$slot ?? false}}" id="{{$id ?? ''}}" />
            </thead>
            <tbody>
            {{$slot}}
            </tbody>
            <tfoot>
            @if($slot->isNotEmpty())
            <x-table-titles addAction="{{$addAction}}"/>
            @endif
            </tfoot>
        </table>
    </div>
</div>
