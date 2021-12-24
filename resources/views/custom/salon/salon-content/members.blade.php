@extends('custom.salon.salon-nav_bar')

@section('content')

<section class=" container m-auto  divide-y divide-y-reverse divide-green-600 ">
    <div class="flex justify-between items-center ">
        <h1 class="text-5xl text-green-400">Members</h1>
        <span>{{ $num }} Members</span>
    </div>
    
        @foreach ($members as $member )
            @if ($member->id==Auth::user()->id)
            <div class="my-10">
                <div>
                    <div class="my-5 flex items-center">
                        <img class="h-8 w-8 rounded-full object-cover "  src ="{{ $member->profile_photo_url }}" alt="{{ Auth::user()->name}}" />
                        <span class="font-bold text-xl mx-5">{{ $member->first_name . " " . $member->last_name }}</span>
                    </div>
                </div>
            </div>
            @else
                
            <div class="my-10">
                <div class="flex justify-between items-center">
                    <div class="my-5 flex items-center">
                        <img class="h-8 w-8 rounded-full object-cover "  src ="{{ $member->profile_photo_url }}" alt="{{ Auth::user()->name}}" />
                        <span class="font-bold text-xl mx-5">{{ $member->first_name . " " . $member->last_name }}</span>
                    </div>
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
                            {{ __('Chat') }}
                        </x-jet-dropdown-link>
                        @if ($enseignant_id==Auth::user()->id)
                        <form action="{{ route('exclude',$id) }}" method="POST">
                            @csrf
                            <x-jet-dropdown-link class="bg-red-400 hover:bg-red-500" href="{{ route('exclude',$id) }}"
                            onclick="event.preventDefault();
                                   this.closest('form').submit();">
                                {{ __('Exclude') }}
                            </x-jet-dropdown-link>
                            <input type="text" name="member_id" class="hidden" value="{{ $member->id }}">
                        </form>
                        
                        @endif
                    </x-slot>

                </x-jet-dropdown>
                </div>
            </div>
            
            @endif

   
        @endforeach
</section>
@endsection