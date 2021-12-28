@push('css')


@endpush
<x-app-layout>
    <x-slot name="title">
        {{ __('DASHBOARD') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="rounded">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18 ml-2">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end row -->

    </div>
</x-app-layout>
@push('scripts')
    <!-- plugin js -->
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Calendar init -->
    <script src="{{ URL::asset('assets/js/pages/dashboard.init.js') }}"></script>
    <!-- plugin js -->
@endpush
