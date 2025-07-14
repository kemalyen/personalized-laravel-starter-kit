<div>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create a product') }}
        </h2>
    </x-slot>

    <div class="pb-5">
        <div class="mx-auto space-y-6">

            <section
                class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
                <div class="max-w-xl">
                   

                    <x-form wire:submit="save">
                        <x-input label="Name" wire:model="name" />
                        <x-input label="stock" wire:model="stock" />
                        <x-input label="price" wire:model="price" prefix="USD" money />

                        <x-slot:actions>
                            <x-button label="Cancel" />
                            <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
                        </x-slot:actions>
                    </x-form>
                </div>
            </section>
        </div>
    </div>
</div>