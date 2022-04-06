@extends('layouts.app')

@section('content')
       <div class="container-fluid">
           <h5 class="h5 mt-0 text-center">Book the services of {{ $service->name }}</h5>
           <hr>
                <div class="d-flex justify-content-center">
                    <div class="col-md-6 col-sm-6">
                        <br>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Book a {{ $service->specialization }} specialist.</div>
                            <div class="card-body">
                                {!! Form::open(['method' => 'POST', 'action' => 'ServicesController@store',
                                'enctype' => 'multipart/form-data']) !!}
                                <div class="form-group row">
                                    {!! Form::label('service', ('Service :'), ['class' => 'col-md-3 col-sm-3 text-right']) !!}
                                    {!! Form::text('service','',['class' => 'col-md-8 col-sm-8 form-control',
                                    'placeholder' => 'whats the problem eg. type of fertilizer to use']) !!}
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('description', ('Description :'), ['class' => 'col-md-3 col-sm-3 text-right']) !!}
                                    {!! Form::textarea('description','',['class' => 'col-md-8 col-sm-8 form-control',
                                    'rows' => '3' , 'placeholder' => 'Describe your the problem']) !!}
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('image', ('Upload photo :'), ['class' => 'col-md-3 col-sm-3 text-right']) !!}
                                    {!! Form::file('cover_image',['class' => 'col-md-8 col-sm-8 form-control']) !!}
                                </div>
                                    {!! Form::hidden('officer_id', $service->id ) !!}
                                    {!! Form::hidden('status', 'Pending') !!}
                                <div class="row form-group">
                                    {!! Form::submit('book service',['class' => 'btn btn-sm btn-success offset-md-3']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
       </div>
    @endsection
