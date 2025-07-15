<?php

use App\Models\Product;
use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;

name('products.index');
middleware(['auth', 'verified']);

new class extends Component {

    use Toast;
    use WithPagination;

    public string $search = '';

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'sku', 'label' => 'SKU', 'class' => 'w-32'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-32'],
            ['key' => 'is_active', 'label' => 'Active', 'class' => 'w-8'],
            ['key' => 'category.name', 'label' => 'Category', 'class' => 'w-16'],
            ['key' => 'price', 'label' => 'Price', 'class' => 'w-16'],
            ['key' => 'stock', 'label' => 'Stock', 'class' => 'w-16'],
            ['key' => 'created_at_formatted', 'label' => 'Created At', 'class' => 'w-32'],
        ];
    }

    public function products()
    {
        return Product::query()
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->when($this->search, function () {
                return Product::where('name', 'like', $this->search . '%');
            })->paginate(10);
    }


    public function with(): array
    {
        return [
            'products' => $this->products(),
            'headers' => $this->headers()
        ];
    }

    public function delete(int $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        $this->toast('Product deleted successfully.', 'success');
    }

    public function edit(int $id)
    {
        return redirect()->route('products.update', ['product' => $id]);
    }

    public function show(int $id)
    {
        return redirect()->route('products.show', ['product' => $id]);
    }
};
?>



<x-layouts.app>

    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Products') }}
        </h2>
    </x-slot>

    @volt('products.index')
    <div class="pb-5">
        <div class="mx-auto space-y-6">
            <x-card shadow>
                <x-table :headers="$headers" :rows="$products" :sort-by="$sortBy" with-pagination>
                    @scope('actions', $user)
                    <div class="flex space-x-2">
                        <x-button wire:click="delete({{ $user['id'] }})" wire:confirm="Are you sure?" spinner class="btn-ghost btn-sm text-error" icon="o-trash" />
                        <x-button wire:click="edit({{ $user['id'] }})" class="btn-ghost btn-sm text-secondary" icon="c-pencil-square" />
                        <x-button wire:click="show({{ $user['id'] }})" class="btn-ghost btn-sm text-secondary" icon="o-link" />
                    </div>
                    @endscope
                </x-table>
            </x-card>
        </div>
    </div>
    </div>
    @endvolt

</x-layouts.app>