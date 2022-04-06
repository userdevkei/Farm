@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            <h5 class="h5 mt-0 text-center">#Farm markets today</h5>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->level == 'Admin')
        <div class="d-flex justify-content-end">
            <a class="btn btn-sm btn-success" href="{{ route('market.create') }}">@fas('plus') market</a>
        </div>
            @else
                @endif
        @endif
            <div class="card-deck">
                @if(count($market) > 0)
                    @foreach($market as $data)
                        <div class="col-md-3 my-2">
                            <div class="card h-100">
                                <div class="card-header text-center">{{ $data->market }} on {{ $data->day }}</div>
                                <img class="card-img-top" src="/storage/images/{{$data -> cover_image}}"
                                     alt="{{ $data->prodct }}"
                                     style="min-height: 100px; max-height: 100px; min-width: 100%;">
                                <div class="card-body">
                                    <div class="row">
                                    <h5 class="card-title" style="margin-right: 5px;">{{ $data -> type }}</h5> -
                                    <p class="card-text text-truncate" style="margin-left: 5px;">{{ $data -> product }}.</p>
                                    </div>
                                    <div class="row">
                                       <div class="card-title font-weight-bold" style="margin-right: 10px;">Quantity :</div>
                                        {{ $data->quantity }} {{ $data->units }}
                                    </div>
                                    @guest()
                                        <div class="row">
                                            <div class="card-title font-weight-bold" style="margin-right: 10px;">Buying :</div>
                                            -- / {{ $data->units }}
                                        </div>
                                        <div class="row">
                                            <div class="card-title font-weight-bold" style="margin-right: 10px;">Selling :</div>
                                            -- / {{ $data->units }}
                                        </div>
                                        @else
                                    <div class="row">
                                        <div class="card-title font-weight-bold" style="margin-right: 10px;">Buying :</div>
                                        {{ $data->b_price }} / {{ $data->units }}
                                    </div>
                                    <div class="row">
                                        <div class="card-title font-weight-bold" style="margin-right: 10px;">Selling :</div>
                                        {{ $data->s_price }} / {{ $data->units }}
                                    </div>
                                    @endguest
                                </div>
                                @if(!Auth::guest())
                                @if(Auth::user()->level == 'Admin')
                                <div class="card-footer d-flex justify-content-sm-end">
                                    <a href="{{ route('market.edit', $data->id ) }}" class="btn btn-sm btn-primary"
                                       title="edit this product" style="margin-right: 7px;">@fas('edit')</a>
                                    {!! Form::open(['action' => ['MarketController@destroy', $data ->id], 'method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-sm btn-danger" title="delete this product">
                                        @fas('trash-alt')</button>
                                    {!! Form::close(); !!}
                                </div>
                                    @else
                                @endif
                                    @endif
                            </div>

                        </div>

                    @endforeach
                @else
                    <p class="text-muted"> no market data updated yet.</p>
                @endif
            </div>
        @guest()
            <p class="lead font-weight-bold font-italic text-center">
                to view all the data provided please <a class="card-link" href="{{ route('login') }}"> sign in</a> or<a class="card-link" href="{{ route('register') }}">create an account</a> </p>
            @endguest
        </div>
    @endsection
