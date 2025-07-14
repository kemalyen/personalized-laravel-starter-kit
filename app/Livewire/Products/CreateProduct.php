<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{
    public ProductForm $form;
 
    public function save()
    {
        $this->form->store();

        return $this->redirect('/products');
    }

    public function render()
    {
        return view('livewire.products.create-product');
    }
}
