@extends('layouts.app')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap ">
            @livewire('sidebar')

            @livewire('products')
        </div>
    </div>
@endsection