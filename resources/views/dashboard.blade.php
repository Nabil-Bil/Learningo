<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @foreach ($salons as $salon)
    <div class="py-12" >
        <a  href="{{ route('dashboard') }}" >
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex p-8 justify-between">
                        <div class="mx-8">
        
                            <h1 class="font-bold text-3xl ">{{ $salon->name}}</h1>
                            <div class="text-xl mt-4">{{ $salon->description }}</div>
                            <div class="text-lg mt-8 text-gray-400">{{date('d-m-Y', strtotime($salon->created_at)) }}</div>
                        </div>
                    </div>           
                </div>
            </div>
        </a>
    </div>
   
    @endforeach
    

    
</x-app-layout>
