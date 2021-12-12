<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Salon') }}
        </h2>
    </x-slot>

    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-12 py-32">
                <form action="{{ route('salon.store') }}" method="POST" class="flex flex-col justify-around h-80">
                    @csrf
                    <div class="block ">
                        <x-jet-label for="name" class="text-xl font-extrabold" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full border-2 border-gray-400 p-2 text-xl font-bold" type="text" name="name" required autofocus />
                    </div>
                    <div class="block ">
                        <x-jet-label for="module" class="text-xl font-extrabold" value="{{ __('module') }}" />
                        <x-jet-input id="module" class="block mt-1 w-full border-2 border-gray-400 p-2 text-xl font-bold" type="text" name="module" required autofocus />
                    </div>
                    <div class="mt-10">
                        <x-jet-label for="description" class="text-xl font-extrabold mb-1" value="{{ __('Description') }}" />
                        <textarea name="description" id="description" class="w-full h-48 border-2 rounded-xl border-gray-400 resize-none text-xl p-2 font-bold"></textarea>
                    </div>
                    

                    <x-jet-button class="ml-4 w-max mt-10">
                        {{ __('Create') }}
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>

    
</x-app-layout>