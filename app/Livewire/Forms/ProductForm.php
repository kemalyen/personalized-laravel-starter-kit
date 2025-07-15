<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    public Product $product;

    #[Validate('required|min:3|max:255')]
    public $name;

    public $description;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|numeric|min:0')]
    public $stock;

    #[Validate('required|min:3|max:255')]
    public $sku;

    public $is_active = true;

    #[Validate('required|exists:categories,id')]
    public $category_id;


    public function setProduct(Product $product)
    {
        $this->product = $product;
        $this->fill($product->toArray());
    }

    public function update()
    {
        $this->validate();

        $this->product->update($this->all());

    }

    public function store()
    {
        $this->validate();

        Product::create($this->all());

        $this->reset();
    }
}
