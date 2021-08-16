@push('css')
<style>
    .custom-search-dropdown {
        z-index: 10001;
    }
</style>
@endpush
<div>
    <form class="form-horizontal validatable ">
        <div class="search-box mr-2">
            <div class="form-group">
                <input type="text" wire:model.debounce.500ms="search" class="form-control border-1"
                    placeholder="Sale Invoice...">
                <i class="bx bx-search-alt search-icon"></i>
                @if (strlen($search) >= 2)
                <div class="col-16" >
                    <div class="list-group" style="position: absolute; z-index: 999;">
                        @if ($search_list->count() > 0)
                            @foreach ($search_list as $invoice)
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action" wire:click="searchSelect({{$invoice}})">{{$invoice->code}}</a>
                            @endforeach
                            @else
                              <a href="javascript:void(0)" class="list-group-item list-group-item-action">No result found for {{$search}}</a>
                            @endif
                    </div>
                </div>
                @endif
            </div>
        </div>

    </form>
</div>
