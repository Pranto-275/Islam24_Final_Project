@extends('layouts.front_end')
@section('content')
<div>
    <x-slot name="title">
        Cart
    </x-slot>
    <x-slot name="header">
        Cart
    </x-slot>
    <div class="card">
  <div class="card-header">
      I am a Normal User!!
  </div>
  </div>
</div>
    <br>
    <br>
    <a class="log-out-btn text-danger border border-danger p-1 pt-2 rounded"
                                            href="#"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                class="bx bx-power-off font-size-16 align-middle text-danger"></i>
                                            লগ আউট</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
@endsection
<!-- main-area-end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

            });
</script>
</div>
@push('scripts')

@endpush
