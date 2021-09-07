@push('css')
@endpush
<div>
    <x-slot name="title">
        Manage Language
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Manage Language</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{ route('setting.language') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>Language</a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <form wire:submit.prevent="dataSave">
                            <div class="modal-body">
                                {{-- Start Language Input --}}
                                <div class="row p-1 m-1">
                                    <div class="col-md-4">
                                        <div class="row" style="background-color: #bedac2;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="sign_up">Sign Up</label>
                                                    <input type="text" class="form-control" wire:model.lazy="sign_up"
                                                        name="sign_up" id="sign_up" placeholder="Sign Up">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="sign_in">Sign In</label>
                                                    <input type="text" class="form-control" wire:model.lazy="sign_in"
                                                        name="sign_in" id="sign_in" placeholder="Sign In">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="new_product">New Product</label>
                                                    <input type="text" class="form-control" wire:model.lazy="new_product"
                                                        name="new_product" id="new_product" placeholder="New Product">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="best_selling_product">Best Selling Product</label>
                                                    <input type="text" class="form-control"
                                                        wire:model.lazy="best_selling_product" name="best_selling_product"
                                                        id="best_selling_product" placeholder="Best selling Product">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="home">Home</label>
                                                    <input type="text" class="form-control" wire:model.lazy="home" name="home"
                                                        id="home" placeholder="Home">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="home">Product Categories</label>
                                                    <input type="text" class="form-control" wire:model.lazy="product_categories"
                                                        name="product_categories" id="product_categories"
                                                        placeholder="Product Categories">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shop_page">Shop Page</label>
                                                    <input type="text" class="form-control" wire:model.lazy="shop_page"
                                                        name="shop_page" id="shop_page" placeholder="Shop Page">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="complain_or_opinion">Complain/Opinion</label>
                                                    <input type="text" class="form-control"
                                                        wire:model.lazy="complain_or_opinion" name="complain_or_opinion"
                                                        id="complain_or_opinion" placeholder="Complain/Opinion">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mx-md-1" style="background-color: #bedac2;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="communication">Communication</label>
                                                    <input type="text" class="form-control" wire:model.lazy="communication"
                                                        name="communication" id="communication" placeholder="Communication">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="return_policy">Return Policy</label>
                                                    <input type="text" class="form-control" wire:model.lazy="return_policy"
                                                        name="return_policy" id="return_policy" placeholder="Return Policy">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="contact_us">Contact Us</label>
                                                    <input type="text" class="form-control" wire:model.lazy="contact_us"
                                                        name="contact_us" id="contact_us" placeholder="Contact Us">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="privacy_policy">Privacy Policy</label>
                                                    <input type="text" class="form-control" wire:model.lazy="privacy_policy"
                                                        name="privacy_policy" id="privacy_policy" placeholder="Privacy Policy">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="terms_and_condition">Terms And Condition</label>
                                                    <input type="text" class="form-control"
                                                        wire:model.lazy="terms_and_condition" name="terms_and_condition"
                                                        id="terms_and_condition" placeholder="Terms And Condition">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="about_us">About Us</label>
                                                    <input type="text" class="form-control" wire:model.lazy="about_us"
                                                        name="about_us" id="about_us" placeholder="About Us">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="mission_and_vision">Mission And Vision</label>
                                                    <input type="text" class="form-control" wire:model.lazy="mission_and_vision"
                                                        name="mission_and_vision" id="mission_and_vision"
                                                        placeholder="About Us">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="my_account">My Account</label>
                                                    <input type="text" class="form-control" wire:model.lazy="my_account"
                                                        name="my_account" id="my_account" placeholder="My Account">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row" style="background-color: #bedac2;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shopping_cart">Shopping Cart</label>
                                                    <input type="text" class="form-control" wire:model.lazy="shopping_cart"
                                                        name="shopping_cart" id="shopping_cart" placeholder="Shopping Cart">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="checkout">Checkout</label>
                                                    <input type="text" class="form-control" wire:model.lazy="checkout"
                                                        name="checkout" id="checkout" placeholder="Checkout">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="menu">Menu</label>
                                                    <input type="text" class="form-control" wire:model.lazy="menu" name="menu"
                                                        id="menu" placeholder="Menu">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="product_search">Product Search</label>
                                                    <input type="text" class="form-control" wire:model.lazy="product_search"
                                                        name="product_search" id="product_search" placeholder="Product Search">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="beaking_news">Breaking News</label>
                                                    <input type="text" class="form-control" wire:model.lazy="beaking_news"
                                                        name="beaking_news" id="beaking_news" placeholder="Breaking News">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="total_amount">Total</label>
                                                    <input type="text" class="form-control" wire:model.lazy="total_amount"
                                                        name="total_amount" id="total_amount" placeholder="Total">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="more_categories">More Categories</label>
                                                    <input type="text" class="form-control" wire:model.lazy="more_categories"
                                                        name="more_categories" id="more_categories"
                                                        placeholder="More Categories">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="more_categories">More Products</label>
                                                    <input type="text" class="form-control" wire:model.lazy="more_products"
                                                        name="more_products" id="more_products" placeholder="More Products">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="checkbox" name="is_default" wire:model.lazy="is_default">
                                                    <label>Is Default?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Start Language Input --}}
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
<script>
    function callDelete(id) {
        @this.call('languageDelete', id);
    }
        $(document).ready(function () {
            var datatable = $('#languageTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('data.language_list')}}",
                columns: [
{
title: 'SL',
data: 'id'
},
{
title: 'Language',
data: 'language',
name: 'language'
},
{
title: 'Is Default',
data: 'is_default',
name: 'is_default'
},
{
title: 'Action',
data: 'action',
name: 'action'
},
]
});

window.livewire.on('success', message => {
datatable.draw(true);
});
});
</script>
@endpush
