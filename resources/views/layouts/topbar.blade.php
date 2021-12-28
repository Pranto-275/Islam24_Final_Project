<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <a class="log-out-btn text-danger mr-4 rounded "
                                            href="#"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                class="bx bx-power-off font-size-16 align-middle text-danger"></i>
                                            Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
  </div>
</nav>
