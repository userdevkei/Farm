@extends('layouts.app')
@section('content')
    <div class="container-fluid">
            <h5 class="h5 mt-0 text-center">Update #Farm {{ $user->level }} Status</h5>
        <hr>
        <br>
        <br>
        <div class="d-flex justify-content-center">
            <div class=" col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-header">Status | Update subscription status. </div>
                    <div class="card-body">
                        {!! Form::open(['action' => ['UsersController@userStatus', $user->id], 'method' => 'POST']) !!}
                        <div class="form-group row">
                            {!! Form::label('name','User Name :',['class'=>'col-md-5 col-sm-5
                            col-form-label text-right font-weight-bold']) !!}
                            {!! Form::text('job_name', $user->name,['class' => 'form-control-plaintext
                            col-md-7 col-sm-7 ', 'readonly']) !!}
                        </div>
                        {{ Form::hidden('id'), $user->id }}
                        <div class="form-group row">
                            {!! Form::label('name','User Email :',['class'=>'col-md-5 col-sm-5
                            col-form-label text-right font-weight-bold']) !!}
                            {!! Form::text('job_name', $user->email,['class' => 'form-control-plaintext
                            col-md-7 col-sm-7 ', 'readonly']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('name','User Contact :',['class'=>'col-md-5 col-sm-5
                            col-form-label text-right font-weight-bold']) !!}
                            {!! Form::text('job_name', $user->phone,['class' => 'form-control-plaintext
                            col-md-7 col-sm-7 ', 'readonly']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('name','User Status :',['class'=>'col-md-5 col-sm-5
                            col-form-label text-right font-weight-bold']) !!}
                            {!! Form::select('status',['0'=>'Pending', '1'=>'Approved'], $user->status,
                            ['class' => 'col-md-4 col-sm-4 form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-5">
                                <button class="btn btn-sm btn-success" type="submit">@fas('save') status</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
