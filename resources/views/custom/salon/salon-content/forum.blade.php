@extends('custom.salon.salon-nav_bar')

@section('content')
    @livewire('forum',['salon_id'=>$id])
@endsection