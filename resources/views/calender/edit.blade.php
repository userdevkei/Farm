@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h5 class="h5 mt-0 text-center">Add #Farm Calendar Event</h5>
        <hr>
        <div class="d-flex justify-content-center">
            <div class="col-sm-6 col-sm-6">
                <div class="card">
                    <div class="card-header">Update event | Update calendar event</div>
                    <div class="card-body">
                        {!! Form::open(['method' => 'POST', 'action' => ['CalendarController@update', $event->id]]) !!}
                        <div class="form-group row">
                            {!! Form::label('region', 'Region :',['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::select('region',['Central' => 'Central', 'Coast' => 'Coast', 'Eastern' => 'Eastern',                                        'Nairobi' => 'Nairobi', 'North Eastern' => 'North Eastern', 'Nyanza' => 'Nyanza', 'Rift Valley' => 'Rift                               Valley', 'Western' => 'Western'],$event->region,['class' => 'col-md-8 col-sm-8 form-control',                                          'placeholder' => 'Select a region']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('season', 'Season :',['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::select('season',['Rainy' => 'Rainy', 'Hot Dry' => 'Hot Dry', 'Cold Dry' => 'Cold Dry'],                                     $event->season,['class' => 'col-md-8 col-sm-8 form-control', 'placeholder' => 'Select a season']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('duration', 'Duration :',['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            <small class="text-muted" style="margin: 5px;">from</small>
                            {!! Form::date('from',$event->from,['class' => 'col-md-3 col-sm-3 form-control',
                            'style' => 'margin-right: 7px;']) !!}
                            <small class="text-muted align-text-bottom" style="margin: 5px;">to</small>
                            {!! Form::date('to',$event->to,['class' => 'col-md-3 col-sm-3 form-control', 'placeholder' => 'ending',                                        'style' => 'margin-left: 7px;']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('rain', 'Rainfall :',['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::select('rain',['Below 500mm' => 'Below 500mm','501mm - 1000mm' => '501mm - 1000mm',                                         '1001mm - 1500mm' => '1001mm - 1500mm', '1501mm - 2500mm' => '1501mm - 2500mm',
                            'Above 2501mm' => 'Above 2501mm'],$event->rain,['class' => 'col-md-8 col-sm-8 form-control',
                            'placeholder' => 'Select amount of rain']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('duration', 'Tasks :',['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::textarea('activities',$event->activities,['class' => 'col-md-8 col-sm-8 form-control',
                             'rows' => '3','placeholder' => 'crops to plant or activities suitable during this season']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('harvest', 'Harvest :',['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::select('harvest',['Low - Medium' => 'Low - Medium', 'Medium - High' => 'Medium - High',                                     'Low - High' => 'Low - High','No Harvest' => 'No Harvest'],$event->harvest,['class' => 'col-md-8 col-sm-8 form-control',
                            'placeholder' => 'Select type harvest expected']) !!}
                        </div>
                        <div class="row mb-0">
                            {!! Form::hidden('_method', 'PUT') !!}
                            <button class="btn btn-sm btn-success offset-md-3" type="submit"
                                    title="edit this calendar event">@fas('save') event</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
