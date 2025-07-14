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
                   

                    <x-form wire:submit="save"  class="mt-6 space-y-6">
 
                        <x-input label="Name" wire:model="form.name" />
                        <x-input label="Stock" wire:model="form.stock" />
                        <x-input label="Price" wire:model="form.price" />

                        <x-slot:actions>
                            <x-button label="Cancel" />
                            <x-button label="Create" class="btn-seconday" type="primary" submit="true" spinner="save" />
                        </x-slot:actions>
                    </x-form>
                </div>
            </section>
        </div>
    </div>
</div>