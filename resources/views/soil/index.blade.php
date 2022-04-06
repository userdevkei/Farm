@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h5 class="h5 mt-0 text-center">#Farm tested soils</h5>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->level == 'Admin')
        <div class="d-flex justify-content-end">
            <a class="btn btn-sm btn-primary" href="{{ route('soil.create') }}">@fas('plus') soil test</a>
        </div>
                @elseif(Auth::user()->level == 'Officer')
        <div class="d-flex justify-content-end">
            <a class="btn btn-sm btn-primary" href="{{ route('soil.create') }}">@fas('plus') soil test</a>
        </div>
                @else
            @endif
        @endguest
            <div class="card-deck">
                @if(count($soil) > 0)
                    @foreach($soil as $soil)
                        <div class="col-md-3 my-2">
                            <div class="card h-100">
                                <div class="card-header">{{ $soil->color }} {{ $soil->name }}</div>
                                <img class="card-img-top" src="/storage/images/{{ $soil -> cover_image }}" alt="Card image cap" style="min-height: 200px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 text-right">
                                            <div class="card-title font-weight-bold">
                                               Tested  :
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <div class="row">
                                                pH value -
                                                <div class="card-text font-italic"> {{ $soil->ph }}</div>
                                            </div>
                                            <div class="row">
                                                Drainage -
                                            <div class="card-text font-italic">{{ $soil->drainage }}</div>
                                            </div>
                                            <div class="row">
                                                Aeration -
                                            <div class="card-text font-italic">{{ $soil->aeration }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @guest()
                                        <div class="card-title font-weight-bold">Crops Supported</div>
                                        <div class="card-text font-italic text-center">--</div>
                                        @else
                                    <div class="card-title font-weight-bold">Crops Supported</div>
                                    <div class="card-text font-italic text-center">{{ $soil->s_crops }}</div>
                                        @endguest
                                </div>
                                @if(!Auth::guest())
                                    @if(Auth::user()->level == 'Admin')
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-sm btn-info" style="margin-right: 15px;"
                                           href="{{ route('soil.edit',$soil->id) }}" title="update the soil tests">@fas('edit')</a>
                                        {!! Form::open(['method' => 'POST', 'action' => ['SoilController@destroy',$soil->id]]) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button class="btn btn-sm btn-danger" type="submit"
                                                title="remove this soil test">@fas('trash-alt')</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                        @elseif(Auth::user()->level == 'Officer')
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-sm btn-info" style="margin-right: 15px;"
                                           href="{{ route('soil.edit',$soil->id) }}">edit</a>
                                        <a class="btn btn-sm btn-danger" href="#">delete</a>
                                    </div>
                                </div>
                                        @else
                                        @endif
                                    @endguest
                            </div>
                        </div>
                        @endforeach
                    @else
                    <p class="text-muted">no tested soils currently</p>
                    @endif
            </div>
        @guest()
            <p class="lead font-weight-bold font-italic text-center">
                to view all the data about supported crops please <a class="card-link" href="{{ route('login') }}">sign in</a> or<a class="card-link" href="{{ route('register') }}">create an account</a> </p>
        @endguest
    </div>
    @endsection
