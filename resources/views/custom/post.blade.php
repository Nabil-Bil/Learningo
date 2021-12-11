<div class="ml-6 mr-4">
    <form  wire:submit.prevent='submit' method="POST" class=" px-96">
        @csrf
        <div class="block mt-4 ">
            <x-jet-label for="title" value="{{ __('title') }}" />
            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title"  autofocus wire:model="title" />
        </div>

        <div>
            <x-jet-label for="email" value="{{ __('content') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="text" name="content" wire:model="content" />
        </div>

        <x-jet-button class="ml-4 mt-4">
            {{ __('envoyé') }}
        </x-jet-button>


    </form>

    
    
</div>