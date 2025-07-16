<?php

use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;

name('home');
middleware(['redirect-to-dashboard']);

new class extends Component
{
};

?>

<x-layouts.frontend>

    @volt('home')
   <h2>Welcome Home</h2>
    @endvolt

</x-layouts.frontend>