@extends('layouts.app')

@section('content')
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <h5 class="h5 mt-0">#Farm blog</h5>
            </div>
            <hr>
            <div class="d-flex justify-content-center">
                <div class="col-md-6 col-sm-6">
                    <br>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            Create your post here
                        </div>
                        <div class="card-body">
                            {!! Form::open(['method' => 'POST', 'action' => 'BlogController@store',
                            'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group row">
                                {!! Form::label('title',('Heading :'), ['class' => 'col-md-3 col-sm-3 text-right']) !!}
                                {!! Form::text('title','',['class' => 'col-md-8 col-sm-8 form-control text-capitalize'], 'autofocus') !!}
                            </div>
                            <div class="form-group row">
                                {!! Form::label('message',('Message :'), ['class' => 'col-md-3 col-sm-3 text-right']) !!}
                                {!! Form::textarea('message','',['class' => 'col-md-8 col-sm-8 form-control', 'rows' => '3']) !!}
                            </div>
                            <div class="form-group row">
                                {!! Form::label('image',('Image :'), ['class' => 'col-md-3 col-sm-3 text-right']) !!}
                                {!! Form::file('cover_image',['class' => 'col-md-8 col-sm-8 form-control text-capitalize']) !!}
                            </div>
                            <div class="row mb-0 form-group">
                                <button type="submit" class="btn btn-sm btn-success offset-md-3" title="create post">
                                    @fas('save') post</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
