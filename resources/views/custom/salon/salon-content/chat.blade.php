@extends('custom.salon.salon-nav_bar')

@section('content')
<body>
    @livewire('chat',['salon_id'=>$id,'receiver_id'=>$receiver_id])
</body>
    
    
@endsection