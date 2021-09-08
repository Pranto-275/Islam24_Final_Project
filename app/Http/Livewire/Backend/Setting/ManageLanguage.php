<?php

namespace App\Http\Livewire\Backend\Setting;

use App\Models\Backend\Setting\Language;
use Livewire\Component;

class ManageLanguage extends Component
{
    public $language;
    public $sign_up;
    public $sign_in;
    public $new_product;
    public $best_selling_product;
    public $home;
    public $product_categories;
    public $shop_page;
    public $complain_or_opinion;
    public $communication;
    public $return_policy;
    public $contact_us;
    public $privacy_policy;
    public $terms_and_condition;
    public $about_us;
    public $mission_and_vision;
    public $my_account;
    public $shopping_cart;
    public $checkout;
    public $menu;
    public $product_search;
    public $beaking_news;
    public $total;
    public $more_categories;
    public $more_products;
    public $is_default;
    public $LanguageId;
    public function mount($id = NULL)
    {
        $QueryUpdate = Language::find($id);
        $this->LanguageId = $QueryUpdate->id;
        $this->sign_up = $QueryUpdate->sign_up;
        $this->sign_in = $QueryUpdate->sign_in;
        $this->new_product = $QueryUpdate->new_product;
        $this->best_selling_product = $QueryUpdate->best_selling_product;
        $this->home = $QueryUpdate->home;
        $this->product_categories = $QueryUpdate->product_categories;
        $this->shop_page = $QueryUpdate->shop_page;
        $this->complain_or_opinion = $QueryUpdate->complain_or_opinion;
        $this->communication = $QueryUpdate->communication;
        $this->return_policy = $QueryUpdate->return_policy;
        $this->contact_us = $QueryUpdate->contact_us;
        $this->privacy_policy = $QueryUpdate->privacy_policy;
        $this->terms_and_condition = $QueryUpdate->terms_and_condition;
        $this->about_us = $QueryUpdate->about_us;
        $this->mission_and_vision = $QueryUpdate->mission_and_vision;
        $this->my_account = $QueryUpdate->my_account;
        $this->shopping_cart = $QueryUpdate->shopping_cart;
        $this->checkout = $QueryUpdate->checkout;
        $this->menu = $QueryUpdate->menu;
        $this->product_search = $QueryUpdate->product_search;
        $this->beaking_news = $QueryUpdate->beaking_news;
        $this->total = $QueryUpdate->total;
        $this->more_categories = $QueryUpdate->more_categories;
        $this->more_products = $QueryUpdate->more_products;
        $this->is_default = $QueryUpdate->is_default;
    }

    public function languageDelete($id)
    {
        Language::find($id)->delete();
        $this->emit('success', [
            'text' => 'Language Deleted Successfully',
        ]);
    }
    public function dataSave()
    {
        $Query = Language::find($this->LanguageId);
        $Query->sign_up = $this->sign_up;
        $Query->sign_in = $this->sign_in;
        $Query->new_product = $this->new_product;
        $Query->best_selling_product = $this->best_selling_product;
        $Query->home = $this->home;
        $Query->product_categories = $this->product_categories;
        $Query->shop_page = $this->shop_page;
        $Query->complain_or_opinion = $this->complain_or_opinion;
        $Query->communication = $this->communication;
        $Query->return_policy = $this->return_policy;
        $Query->contact_us = $this->contact_us;
        $Query->privacy_policy = $this->privacy_policy;
        $Query->terms_and_condition = $this->terms_and_condition;
        $Query->about_us = $this->about_us;
        $Query->mission_and_vision = $this->mission_and_vision;
        $Query->my_account = $this->my_account;
        $Query->shopping_cart = $this->shopping_cart;
        $Query->checkout = $this->checkout;
        $Query->menu = $this->menu;
        $Query->product_search = $this->product_search;
        $Query->beaking_news = $this->beaking_news;
        $Query->total = $this->total;
        $Query->more_categories = $this->more_categories;
        $Query->more_products = $this->more_products;
        if ($this->is_default) {
            $Query->is_default = 1;
        } else {
            $Query->is_default = 0;
        }
        $Query->save();
        $this->emit('success_redirect', [
            'text' => 'Language Updated Successfully',
            'url' => route('setting.language'),
        ]);
    }
    public function render()
    {
        return view('livewire.backend.setting.manage-language', [
            'languages' => Language::get(),
        ]);
    }
}
