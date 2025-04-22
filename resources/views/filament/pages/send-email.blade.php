<x-filament::page>

    <x-filament-panels::form wire:submit="sendEmail()">
        {{ $this->emailForm }}
        {{ $error_message ?? '--' }}
<<<<<<< HEAD
        <x-filament-panels::form.actions :actions="$this->getEmailFormActions()" />
=======
<<<<<<< HEAD
        <x-filament-panels::form.actions :actions="$this->getEmailFormActions()" />
=======
        <x-filament-panels::form.actions
            :actions="$this->getEmailFormActions()"
        />
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)

        <x-filament::loading-indicator class="h-5 w-5" wire:loading wire:target="sendEmail()"/>

    </x-filament-panels::form>
</x-filament::page>
