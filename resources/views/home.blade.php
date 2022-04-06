@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @if(auth()->user()->level == 'Admin')
        <h5 class="h5 mt-0 text-center">Admin | Dashboard</h5>
        <hr>
    <div class="d-flex justify-content-center">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-4">
{{--            {!! $chart->html() !!}--}}
        </div>
        <div class="col-md-4 col-sm-4">
{{--            {!! $chart1->html() !!}--}}
        </div>
        <div class="col-md-4 col-sm-4">
{{--            {!! $chart2->html() !!}--}}
        </div>
    </div>
</div>
    </div>
    @elseif(auth()->user()->level == 'Officer')
        <a class="navbar-brand" href="{{ url('/Officer') }}">Extension Officer</a>
    @elseif(auth()->user()->level == 'Farmer')
        <a class="navbar-brand" href="{{ url('/Farmer') }}">Farmer</a>
    @else
        <a class="navbar-brand" href="{{ url('/Investor') }}">Investor</a>
    @endif
</div>
{{--{!! Charts::scripts() !!}--}}
{{--{!! $chart->script() !!}--}}
{{--{!! $chart1->script() !!}--}}
@endsection
