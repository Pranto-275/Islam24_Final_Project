<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class ProductView extends Component
{
    public function render()
    {
        return view('livewire.frontend.product-view')
        ->layout('layouts.front_end');
    }
}
