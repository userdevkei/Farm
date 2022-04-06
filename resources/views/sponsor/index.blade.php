@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <h5 class="h5 mt-0">Our sponsors</h5>
        </div>
        <hr>
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
                                <div class="card-footer d-flex justify-content-sm-around" style="background-color: green; color: yellow;">
                                    <a href="{{ route('sponsor.edit', $data->id ) }}" class="btn btn-sm btn-primary">@fas('edit')</a>
                                    {!! Form::open(['action' => ['SponsorController@destroy', $data ->id], 'method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::button('<i class="font-weight-bold" aria-hidden="true">-</i>', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) !!}
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
@endsection
