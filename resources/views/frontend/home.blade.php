@extends('layouts.front_end')
@section('content')
<h1>This is a Home!</h1>
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
