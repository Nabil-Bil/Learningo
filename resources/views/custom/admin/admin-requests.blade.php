<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Requests') }}
        </h2>
    </x-slot>
    @foreach ($datas as $data)
    @livewire('request', ['data' => $data], key($data->id))
        
    @endforeach

</div>
