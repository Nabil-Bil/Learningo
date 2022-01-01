<x-app-layout>
    <div class="mx-10">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <x-jet-validation-errors class="mb-4" />
                    <form action="{{ route('admin.salon.update',['salon_id'=>$salon->id]) }}" method="POST">
                        @csrf
                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full " type="text" name="name"
                                value="{{ $salon->name }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="description" value="{{ __('Description') }}" />
                            <textarea
                                x-data="{ resize: () => { $el.style.height = '150px'; $el.style.height = $el.scrollHeight + 'px' } }"
                                x-init="resize()" @input="resize()" wire:model.defer="comment"
                                class="bg-blueGray-100 max-h-58 w-full rounded-md focus:outline-none focus:ring-0 resize-none overflow-hidden p-3 pr-14"
                                style="height: 150px" name="description">{{ $salon->description }}</textarea>
                        </div>

                        <div class="flex justify-between mt-10">
                            <x-jet-button class="mr-4">
                                {{ __('Edit') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>