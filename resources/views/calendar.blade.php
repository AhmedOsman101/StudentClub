@extends('layouts.main')



@section('content')
<x-calendar :events="$events" />
@endsection
