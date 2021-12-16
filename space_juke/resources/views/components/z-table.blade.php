@props(['add', 'route','title','colNo', 'canAdd'])
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-700 dark:text-white">
                @can($canAdd)
                <div class="flex justify-between">
                    <h2>{{$title}}</h2>
                    <a href="{{ route($route)}}"
                       class="btn btn-sm btn-primary mb-2">
                        {{$add}}
                    </a>
                </div>
                @endcan
                <div class="overflow-x-auto">
                    <table class="table w-full table-zebra">
                        {{$slot}}
                        <tfoot>
                        <tr>
                            <td colspan="{{$colNo ?? '5'}}">
                                {{$tfoot}}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<x-success-message/>
