@push('css')

@endpush
<div>
    <x-slot name="title">
        Error
    </x-slot>
    <x-slot name="header">
        error
    </x-slot>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ URL::asset('venam/') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>Page Not Found</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">404 Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- 404-area -->
    <section class="error-area pt-80 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="error-content text-center">
                        <div class="error_txt">404</div>
                        <h5>oops! The page you requested was not found!</h5>
                        <p>The page you are looking for was moved, removed, renamed or might never existed.</p>
                        <div class="search_form">
                            <form method="post">
                                <input name="text" id="text" type="text" placeholder="Search" class="form-control">
                                <button type="submit" class="icon_search"><i class="flaticon-loupe"></i></button>
                            </form>
                        </div>
                        <a href="index.html" class="btn btn-fill-out">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 404-area-end -->

</div>

@push('scripts')

@endpush


