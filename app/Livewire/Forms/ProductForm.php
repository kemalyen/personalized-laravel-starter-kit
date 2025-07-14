<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    #[Validate('required|min:5')]
    public $name;

    public $description;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|numeric|min:0')]
    public $stock;

    #[Validate('required|exists:categories,id')]
    public $category;


    public function store()
    {
        $this->validate();
        dd($this->all());
        Product::create($this->all());

        $this->reset();
    }
}
