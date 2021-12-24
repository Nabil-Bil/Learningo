<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
            
            <div class="flex p-8 justify-between">
                <div class="mx-8">

                    <h1 class="font-bold text-3xl ">{{ $data->first_name. " ". $data->last_name }}</h1>
                    <div class="text-xl mt-4">{{ $data->email }}</div>
                    <div class="text-lg mt-8 text-gray-400">{{date('d-m-Y', strtotime($data->created_at)) }}</div>
                </div>
            
                <div class="flex flex-col mx-8 justify-between">
            
                    <button wire:click='accept({{ $data->id }})' class="text-green-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                      </svg>
                    </button>
            
                    <button  wire:click='refuse({{ $data->id }})'class="text-red-500 "><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                </div> 
            </div>           
        </div>
    </div>
</div>