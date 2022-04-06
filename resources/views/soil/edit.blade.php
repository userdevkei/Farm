@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h5 class="h5 mt-0 text-center">#Farm Test Results</h5>
        <hr>
        <div class="d-flex justify-content-center">
            <div class="col-md-7 col-md-7">
                <div class="card">
                    <div class="card-header">#Farm | Edit soil test results</div>
                    <div class="card-body">
                        {!! Form::open(['action' => 'POST', 'action' => ['SoilController@update',$soil->id],
                        'enctype' => 'multipart/form-data']) !!}
                        <div class="row form-group">
                            {!! Form::label('name',('Soil name :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::text('soil',$soil->name,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('color',('Soil Color :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::text('color',$soil->color,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('name',('Results :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::select('ph',['1 - 3.5' => 'Strong Basic', '3.6 - 6.9' => 'Weak Basic', '7' => 'Neutral',
                            '8.0 - 11.5' => 'Week Acidic', '11.6 - 14.0' => 'Strong Acidic'],$soil->ph,
                            ['class' => 'col-md-3 col-sm-3 form-control',
                            'placeholder' => 'pH value', 'style' => 'margin-right: 15px;']) !!}
                            {!! Form::select('drainage',['Good'=>'Good', 'Medium'=>'Medium','Poor'=>'Poor'],$soil->drainage,
                            ['class' => 'col-md-2 col-sm-2 form-control','placeholder'=> 'Drainage', 'style' => 'margin-right: 15px;
                            margin-left: 15px;']) !!}
                            {!! Form::select('aeration',['Good'=>'Good', 'Medium'=>'Medium','Poor'=>'Poor'],$soil->aeration,
                            ['class' => 'col-md-2 col-sm-2 form-control','placeholder'=> 'Aeration', 'style' => 'margin-left: 15px;']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('crop',('Crops Support :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::text('crops',$soil->s_crops,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('image',('Soil Image :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::file('cover_image',['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="row mb-0 form-group">
                            {!! Form::hidden('_method', 'PUT') !!}
                            <button type="submit" class="btn btn-sm btn-success offset-md-3" title="update this soil test">
                            @fas('save') soil</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
