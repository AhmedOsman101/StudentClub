@extends('layouts.main')
@section('headers')
<link rel="icon" type="image/png" href="{{asset('images/Student Club Logo.png')}}" />
<link rel="stylesheet" href="{{ asset('css/rank.css')}}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
@endsection

@section('content')
<div class="body">
    @livewire('Rank')
</div>
@endsection
