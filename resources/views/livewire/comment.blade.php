<div class="px-10 py-5">
    <div class="flex justify-between items-center">
                        <div class="flex">
                            <img class="h-8 w-8 rounded-full object-cover "  src ="{{ $user->profile_photo_url }}" alt="{{ $user->name}}" />
                            <div class="flex mx-3 flex-col">
                                <p class="font-bold text-md">{{ $user->first_name . " " . $user->last_name }}</p>
                                <span class="text-xs text-gray-400">
                                    @if ( Carbon\Carbon::parse(today())->isoFormat('D/M/Y')==Carbon\Carbon::parse($comment->created_at)->isoFormat('D/M/Y'))
                                        {{ Carbon\Carbon::parse($comment->created_at)->isoFormat('H:m') }}
                                    @else
                                    {{ Carbon\Carbon::parse($comment->created_at)->isoFormat('D/M/Y') }}
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
                                
                                <x-jet-dropdown-link href="{{ route('comment.index',['id'=>$salon_id,'comment_id'=>$comment->id]) }}">
                                    {{ __('Update') }}
                                </x-jet-dropdown-link>
    
                                <x-jet-dropdown-link wire:click='delete' class="cursor-pointer">
                                    {{ __('Delete') }}
                                </x-jet-dropdown-link>
                                
                            </x-slot>
                        </x-jet-dropdown>
                        @endif
                    </div>
                    <p class="text-lg font-semibold px-10 py-4">{{ $comment->content }}</p>
</div>
