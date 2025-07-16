<?php

use function Laravel\Folio\{middleware, name};

name('about');
?>



<x-layouts.frontend>



    @volt('about.index')
    <div class="pb-5">
        <div class="mx-auto space-y-6">
            <x-card shadow>
                <h3>HELLO ADBOUT</h3>
            </x-card>
        </div>
    </div>

    @endvolt

</x-layouts.frontend>