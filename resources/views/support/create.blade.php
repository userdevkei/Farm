@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h5 class="h5 mt-0 text-center">#Farm fill the form to request for support</h5>
        <hr>
        <div class="d-flex justify-content-center">
            <div class="col-md-6 col-sm-6">
        <div class="card">
            <div class="card-header">#Farm | Support request form</div>
            <div class="card-body">
                {!! Form::open(['action' => 'SupportController@store', 'method' =>'POST']) !!}
                <div class="row form-group">
                    {!! Form::label('type',('Farming type :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                    {!! Form::select('type',['Small Scale' => 'Small Scale', 'Large Scale' => 'Large Scale'], '',
                    ['class' => 'col-md-8 col-sm-8 form-control', 'placeholder' => 'Select type of farming']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('farming',('Specialization :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                    {!! Form::select('farming',['Animal Farming' => 'Animal Farming', 'Crop Farming' => 'Crop Farming'], '',
                    ['class' => 'col-md-8 col-sm-8 form-control', 'placeholder' => 'Select area of specialization']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('product',('Produce :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                    {!! Form::text('product','',['class' => 'col-md-8 col-sm-8 form-control', 'placeholder' =>
                    'The end farming product eg. eggs']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('support',('Support :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                    {!! Form::select('support',['Farm inputs' => 'Farm inputs', 'Money' => 'Money','Both' => 'Both'], '',
                    ['class' => 'col-md-8 col-sm-8 form-control', 'placeholder' => 'Select type of support']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('farming',('Comments :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                    {!! Form::textarea('description','',['class' => 'col-md-8 col-sm-8 form-control', 'rows' => '3', 'placeholder'
                    => 'Explain what you are planning on doing with the support']) !!}
                </div>
                <div class="row form-group mb-0">
                    <button class="btn btn-sm btn-success offset-md-3" type="submit" title="submit support request">
                        @fas('save') request</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
    @endsection
