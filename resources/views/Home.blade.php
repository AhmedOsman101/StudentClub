@extends('layouts.main')

@section('headers')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="body">
    <div class="first_part">
        @livewire("State")
        @livewire("Productivity")

    </div>
    <div class="rank">

        @livewire("homeRank")
    </div>

</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection
