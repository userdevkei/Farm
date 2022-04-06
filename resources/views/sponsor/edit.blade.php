@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <h5 class="h5 mt-0">Edit details of home page slider image</h5>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <div class="col-md-6 col-sm-6">
                <div class="card" style="margin-top: 40px;">
                    <div class="card-body">
                        {!! Form::open(['method' => 'POST', 'action' => ['WebsiteController@update', $sponsor -> id],'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group row">
                            {!! Form::label('title', ('Title :'), ['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::text('title', $sponsor->name ,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('description', ('Description :'), ['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::textarea('description', $sponsor->description ,['class' => 'col-md-8 col-sm-8 form-control', 'rows' => 3]) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('cover_image', ('Slider Image :'), ['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::File('cover_image',['class' => 'col-md-8 col-sm-8 form-control'], $sponsor->cover_image) !!}
                        </div>
                        <div class="form-group row mb-0">
                            {!! Form::hidden('_method', 'PUT') !!}
                            {!! Form::submit('Update Slider',['class' => 'btn btn-success col-md-8 offset-md-3']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
