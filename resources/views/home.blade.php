@extends('layout.mainlayout')

@section('title', 'Home')

@section('content')

    <div class="container">
        <h4>Anda Login sebagai {{ Auth::user()->name }} sebagai {{ Auth::user()->role->name }} </h4>
    </div>

@endsection
