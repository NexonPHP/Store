@extends('layouts.base')

@section('title')
    Installation
@endsection

@section('content')

    @if(config('app.install.step', -1) == 1 || -1)
        <div>
            @livewire('database-form')
        </div>
    @elseif(config('app.install.step', -1) == 2)
        <div>
            @livewire('database-form')
        </div>
    @elseif(config('app.install.step', -1) == 3)
        <div>
            @livewire('database-form')
        </div>
    @endif

@endsection
