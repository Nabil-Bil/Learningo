<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Join') }}
        </h2>
    </x-slot>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-jet-validation-errors class="mb-4" />
                <form action="{{ route('salon.join') }}" method="POST">
                    @csrf
                    <div>
                        <x-jet-label for="code_salon" value="{{ __('Code Salon') }}" class="text-xl"/>
                        <x-jet-input id="code_salon" class="block mt-1 w-full font-bold text-lg" type="text" name="code_salon" required autofocus />
                    </div>  
                    <x-jet-button class="ml-4 mt-10">
                        {{ __('Join') }}
                    </x-jet-button>
                </form>

            </div>
        </a>
    </div>
</x-app-layout>
