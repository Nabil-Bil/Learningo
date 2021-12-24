<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 min-w-7xl">
            <div class="bg-white shadow-xl sm:rounded-lg p-4 pb-10 border-2 border-gray-600 break-words">
                <div class="divide-y">
                    <div>

                    <div class="flex justify-between items-center px-6">
                        <div class="flex">
                            <img class="h-8 w-8 rounded-full object-cover "  src ="{{ $user->profile_photo_url }}" alt="{{ $user->name}}" />
                            <div class="flex mx-3 flex-col">
                                <p class="font-bold text-md">{{ $user->first_name . " " . $user->last_name }}</p>
                                <span class="text-xs text-gray-400">
                                    @if ( Carbon\Carbon::parse(today())->isoFormat('D/M/Y')==Carbon\Carbon::parse($post->created_at)->isoFormat('D/M/Y'))
                                        {{ Carbon\Carbon::parse($post->created_at)->isoFormat('H:m') }}
                                    @else
                                    {{ Carbon\Carbon::parse($post->created_at)->isoFormat('D/M/Y') }}
                                    @endif
    
    
                                </span>
                            </div>
                        </div>
                        @if($user->id==Auth::user()->id)
                        <x-jet-dropdown align="right" width="46">
                            <x-slot name="trigger">
                                <button class="flex border-none outline-none" style="border:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                
                                <x-jet-dropdown-link href="">
                                    {{ __('Update') }}
                                </x-jet-dropdown-link>
    
                                <x-jet-dropdown-link wire:click='delete' class="cursor-pointer">
                                    {{ __('Delete') }}
                                </x-jet-dropdown-link>
                                 
                            </x-slot>
                        </x-jet-dropdown>
                        @endif 
                    </div>
                        <p class="p-10">{{ $post->content }}</p>
                        
                </div>
                <div>
                    @error('add_comment') <span class="error text-xl font-bold text-red-500 mb-5">{{ $message }}</span> @enderror
                    <form class="flex items-center px-5 my-3" wire:submit.prevent='submit'>
                        <img class="h-8 w-8 rounded-full object-cover mr-10 "  src ="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->first_name . " " . Auth::user()->last_name}}" />
                        
                            <label class="relative text-gray-400 focus-within:text-gray-600 block w-full">
                                
                                  <textarea 
                                  x-data="{ resize: () => { $el.style.height = '50px'; $el.style.height = $el.scrollHeight + 'px' } }"
                                  x-init="resize()"
                                  @input="resize()"
                                  wire:model.defer="comment"
                                  x-on:keydown.enter="if (!$event.shiftKey) $wire.comment()"
                                  placeholder="Send Message..." 
                                  class="bg-blueGray-100 max-h-58 w-full rounded-md focus:outline-none focus:ring-0 resize-none overflow-hidden font-semibold text-xl p-3 pr-14"
                                  ></textarea>
                                  <button type="submit" class=" absolute top-1/2 transform -translate-y-1/2 right-3 pr-2 rotate-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                      </svg>
                                </button>
                           </label> 
                        </div>
                    </form>
                </div>
                @if (!empty($all_comments->first()))
                <div x-data="{open : false}">
                    <div class="text-center">
                        <button @click="open = !open" class="border-none underline font-bold text-xl ">Show All Comments</button>
                    </div>
                      <div  x-show="open" class="divide-y">
                        @foreach ($all_comments as $comment)
                            <livewire:comment :comment='$comment' :wire:key="$comment->id"/>
                        @endforeach
                      </div>
                </div>
                @endif

            </div>

            </div>
    </div>
</div>
