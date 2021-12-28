<div class="container m-auto">
    <div class="bg-{{ $salon->color_code }} w-max p-4 mt-2 rounded-lg text-center">
        <span class="font-semibold text-lg">Code Salon : </span><br>
        <span class="font-bold text-xl">{{ $salon->codeSalon }}</span>
    </div>
    <div class="mx-10">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    @error('post') <span class="error text-xl font-bold text-red-500 mb-5">{{ $message }}</span>
                    @enderror
                    <form wire:submit.prevent="submit">
                        <textarea
                            x-data="{ resize: () => { $el.style.height = '150px'; $el.style.height = $el.scrollHeight + 'px' }}"
                            x-init="resize()" @input="resize()" wire:model.defer="post"
                            x-on:keydown.enter="if (!$event.shiftKey) $wire.post()" placeholder="Send Message..."
                            class="bg-blueGray-100 max-h-58 w-full rounded-md  focus:outline-none focus:ring-0 resize-none overflow-hidden font-semibold text-xl p-3"></textarea>
                        @error('files.*') <span class="error text-xl font-bold text-red-500 my-2">{{ $message }}</span>
                        @enderror
                        
                        <div class="flex justify-between mt-10">

                            <div class="flex items-center justify-center">
                                <div class="flex items-center">

                                    <label
                                        class="w-64 flex flex-col items-center px-2 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase cursor-pointer border-2 ">
                                        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        <span class="mt-2 text-base leading-normal">Select files</span>
                                        <input type='file' class="hidden" multiple wire:model="files"
                                            accept=".pdf,.png,.jpg,.mp4,.mkv,.docx,.doc,.pptx" />
                                    </label>
                                    @if (!empty($files))
                                    <p class="mx-5 text-lg font-semibold">You will upload {{ count($files) }} files</p>
                                    @endif
                                </div>


                            </div>
                            <x-jet-button class="mr-4">
                                {{ __('Post') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
                <div>
                    @if(!empty($all_posts->first()))
                        @foreach ($all_posts as $post )
                            <livewire:post :post='$post' :wire:key="$post->id" />
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>