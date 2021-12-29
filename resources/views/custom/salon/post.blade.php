@extends('custom.salon.salon-nav_bar')

@section('content')

<div class="mx-10">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form  action="{{ route('post.edit',['id'=>$id,'post_id'=>$post->id]) }}" method="POST">
                    @csrf
                    <textarea
                        x-data="{ resize: () => { $el.style.height = '150px'; $el.style.height = $el.scrollHeight + 'px' }}"
                        x-init="resize()" @input="resize()"
                        x-on:keydown.enter="if (!$event.shiftKey) $wire.post()" placeholder="Send Message..."
                        class="bg-blueGray-100 max-h-58 w-full rounded-md  focus:outline-none focus:ring-0 resize-none overflow-hidden font-semibold text-xl p-3"
                        name="post"
                        
                        >{{ $post->content }}</textarea>
                        
                    <div class="flex justify-between mt-10">
                        <x-jet-button class="mr-4">
                            {{ __('Edit') }}
                        </x-jet-button>
                    </div>
                </form>
    
@endsection