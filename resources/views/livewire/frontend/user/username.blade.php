<div class="card">
  <div class="card-body">
      Your are logged in as:
    {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
  </div>
</div>
