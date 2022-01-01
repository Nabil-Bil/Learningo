<div class="flex h-screen antialiased text-gray-800">
    <div class="flex flex-row h-full w-full overflow-x-hidden">
        <div class="flex flex-col flex-auto h-full p-6">
            <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl h-full p-4">
                <div class="flex flex-col h-full overflow-x-auto mb-4">
                    <div class="flex flex-col h-full">
                        <div class="grid grid-cols-12 gap-y-2">
                            @if (!empty($all_messages->first()))
                            @foreach ($all_messages as $message )
                            @if ($message->sender_id==Auth::user()->id)

                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                <div class="flex items-center justify-start flex-row-reverse">
                                    <img class="h-8 w-8 rounded-full object-cover" src={{ Auth::user()->profile_photo_url }} />
                                    <div class="relative mr-3 text-sm bg-gray-300 py-2 px-4 shadow rounded-xl">
                                        <div>
                                            {{ $message->content }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <img src={{ $receiver->profile_photo_url }} class="h-8 w-8 rounded-full object-cover" />
                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                        <div>{{ $message->content }}</div>
                                    </div>
                                </div>
                            </div>

                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <form class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4" wire:submit.prevent='send'>
                    <div>
                        <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-grow ml-4">
                        <div class="relative w-full">
                            <input type="text"
                                class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" wire:model='message'/>
                            <button
                                class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="ml-4">
                        <button type="submit"
                            class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                            <span>Send</span>
                            <span class="ml-2">
                                <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>