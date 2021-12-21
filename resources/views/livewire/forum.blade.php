<div class="container m-auto">
    <div class="mx-10">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                        <form wire:submit.prevent="submit">
                            @error('add_post') <span class="error text-xl font-bold text-red-500 mb-5">{{ $message }}</span> @enderror
                            <textarea 
                            x-data="{ resize: () => { $el.style.height = '150px'; $el.style.height = $el.scrollHeight + 'px' } }"
                            x-init="resize()"
                            @input="resize()"
                            wire:model.defer="post"
                            x-on:keydown.enter="if (!$event.shiftKey) $wire.post()"
                            placeholder="Send Message..." 
                            class="bg-blueGray-100 max-h-58 w-full rounded-md  focus:outline-none focus:ring-0 resize-none overflow-hidden font-semibold text-xl p-3"
                            ></textarea>
                            <div class=" flex justify-between mt-10">
                                
                                <div></div>
                                <x-jet-button class="mr-4">
                                    {{ __('Post') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
            
                @foreach ($all_posts as $post )
                    <livewire:post :post='$post' :wire:key="$post->id"  />
                @endforeach
                
            </div>
        </div>
    </div>
</div>
