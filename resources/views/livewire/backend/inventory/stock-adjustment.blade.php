@push('css')

@endpush
<div>
    <x-slot name="title">
        STOCK ADJUSTMENT
    </x-slot>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                       <div class="col-md-12">
                           <h3>Stock Adjustment</h3>
                        </div>
                       <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">

                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="StockAdjustmentTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>

        $(document).ready(function () {
            var datatable = $('#StockAdjustmentTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('data.index')}}",
                columns: [
                    {
                        title: 'SL',
                        data: 'id'
                    },
                    {
                        title: 'Stock Adjustment ID',
                        data: 'stock adjustment id',
                        name:'code'
                    },

                    {
                        title: 'Action',
                        data: 'action',
                        name:'action'
                    },
                ]
            });

            window.livewire.on('success', message => {
                datatable.draw(true);
            });
        });
    </script>
@endpush

