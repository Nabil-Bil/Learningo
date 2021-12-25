@extends('custom.salon.salon-nav_bar')

@section('content')
<body class=" overflow-y-scroll overflow-x-hidden">
    @livewire('chat',['salon_id'=>$id,'receiver_id'=>$receiver_id])
</body>
    
@endsection