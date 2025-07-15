<?php

use function Laravel\Folio\name;

name('products.show');
?>

<x-layouts.app>

    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Product Detail: ') . $product->name }}
        </h2>
    </x-slot>

    <div class="max-w-1xl mx-auto py-1 px-4">
        <div class="bg-white shadow rounded-lg p-8">
            <div class="flex flex-col md:flex-row md:items-center">
                <img src="{{ '/storage/'.$product->image_path }}" alt="{{ $product->name }}" class="w-full md:w-1/5 rounded-lg mb-6 md:mb-0 md:mr-8">
                <div class="flex-1 ml-2">
                    <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
                    <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                    <div class="text-1xl font-semibold text-slate-600 mb-3">SKU: {{ $product->sku }}</div>
                    <div class="text-1xl font-semibold text-slate-600 mb-3">Availability: {{ $product->active_status }}</div>
                    <div class="text-1xl font-semibold text-slate-600 mb-3">Price: {{ $product->formatted_price }}</div>
                    <div class="text-1xl font-semibold text-slate-600 mb-3">Stock: {{ $product->stock }}</div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>