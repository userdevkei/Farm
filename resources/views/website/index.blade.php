@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            <h5 class="h5 mt-0 text-center">Manage home page and the sponsor details.</h5>
        <hr>
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mission-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="true" style="color: black !important;">Home Page Slider</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="staff-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="staff" aria-selected="false" style="color: black !important;">Sponsor Details</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="mission" role="tabpanel" aria-labelledby="mission-tab">
    <div class="d-flex justify-content-end">
        <a class="btn btn-sm btn-success" href="{{ route('website.create') }}">add slider</a>
    </div>
        <div class="card-deck">
            @if(count($website)>0)
            @foreach($website as $data)
                <div class="col-md-3 my-2">
                    <div class="card h-100">
                            <img class="card-img-top" src="/storage/images/{{$data -> cover_image}}" alt="Card image cap" style="min-height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data -> title }}</h5>
                                <p class="card-text text-truncate">{{ $data -> description }}.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-sm-end" style="background-color: green; color: yellow;">
                                <a href="{{ route('website.edit', $data->id ) }}" class="btn btn-sm btn-primary"
                                   style="margin-right: 7px;">edit</a>
                                {!! Form::open(['action' => ['WebsiteController@destroy', $data ->id], 'method' => 'POST']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::Submit('delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close(); !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-muted"> No home slider photos added.</p>
            @endif
        </div>
            </div>
            <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-sm btn-success" href="{{ route('sponsor.create') }}">add sponsor</a>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="card-deck">
                        @if(count($sponsor)>0)
                            @foreach($sponsor as $data)
                                <div class="col-md-3 my-2">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="/storage/images/{{$data -> cover_image}}" alt="Card image cap" style="min-height: 200px;">
                                        <div class="card-body">
                                            <h5 class="card-title text-truncate">{{ $data -> name }}</h5>
                                            <p class="card-text text-truncate">{{ $data -> description }}.</p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-sm-end">
                                            <a href="{{ route('sponsor.edit', $data->id ) }}" class="btn btn-sm btn-primary"
                                               style="margin-right: 7px;">@fas('edit')</a>
                                            {!! Form::open(['action' => ['SponsorController@destroy', $data ->id],
                                            'method' => 'POST']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            <button class="btn btn-sm btn-danger" type="submit" title="delete sponsor">
                                                @fas('trash-alt')</button>
                                            {!! Form::close(); !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="muted"> No home slider photos added.</p>
                        @endif
                    </div>
                </div>
        </div>
    </div>
    @endsection
