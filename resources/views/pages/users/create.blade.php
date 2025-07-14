<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use function Laravel\Folio\{middleware, name};
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Locked;

name('users/create');
middleware(['auth', 'verified']);

new class extends Component {

    public $name = '';
    public $email = '';
    public $current_password = '';

    #[Validate('required|confirmed|min:6')]
    public $new_password = '';
    public $new_password_confirmation = '';
    public $delete_confirm_password = '';

    public function mount() {}



    public function createUser()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|min:3|email|max:255|unique:users,email',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->new_password),
        ]);

 

        $this->dispatch('toast', message: 'Successfully the user is created.', data: ['position' => 'top-right', 'type' => 'success']);

        //$this->dispatch('toast', message: 'Successfully updated password.', data: ['position' => 'top-right', 'type' => 'success']);
        //$this->user->fill(['password' => Hash::make($this->new_password), 'remember_token' => Str::random(60)])->save();

        //$this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    }
};

?>


<x-layouts.app>

    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    @volt('user.create')
    <div class="pb-5">
        <div class="mx-auto space-y-6">



            {{-- Create an user  --}}
            <section
                class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Create an User') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('') }}
                        </p>
                    </header>
                    <form wire:submit="createUser" class="mt-6 space-y-6">

                        <x-input label="Name" wire:model="name" placeholder="Your name" icon="o-user" hint="Your full name" />
                        <x-input label="Email address" type="email" id="email" name="email" icon="o-envelope"
                            wire:model="email" />
                        <x-input label="New Password" type="password" id="new_password" name="new_password" icon="o-key"
                            wire:model="new_password" />
                        <x-input label="Confirm New Password" type="password" id="new_password_confirmation" icon="o-key"
                            name="new_password_confirmation" wire:model="new_password_confirmation" />

                        <div class="flex items-start">
                            <div>
                                <x-button type="primary" submit="true">{{ __('Create') }}</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            {{-- End Update Password Section --}}

        </div>
    </div>
    @endvolt

</x-layouts.app>