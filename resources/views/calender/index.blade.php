@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h5 class="h5 mt-0 text-center">#Farm Regional calendar</h5>
        <hr>

        @if(!Auth::guest())
            @if(Auth::user()->level == 'Admin')
            <div class="d-flex justify-content-end">
                <a class="btn btn-sm btn-primary" href="{{ route('calendar.create') }}">@fas('plus') event</a>
            </div>
                @else
                @endif
        @endif
        <div class="card-deck">
            @if(count($event)>0)
                @foreach($event as $event)
                <div class="col-md-4 my-2">
                    <div class="card h-100">
                        <div class="card-header"> {{ $event->region }} Region </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <div class="card-title font-weight-bold text-right">
                                        Season :
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <div class="card-text">
                                        {{ $event->season }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-3 text-right">
                                    <div class="card-title font-weight-bold">
                                        Period :
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <div class="card-text">
                                        {{ $event->from }} to {{ $event->to }}
                                    </div>
                                </div>
                            </div>
                            @guest()
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 text-right">
                                        <div class="card-title font-weight-bold">
                                            Rainfall :
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7">
                                        <div class="card-text">
                                            --
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 text-right">
                                        <div class="card-title font-weight-bold">
                                            Harvest :
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7">
                                        <div class="card-text">
                                            --
                                        </div>
                                    </div>
                                </div>
                                <div class="card-title text-center font-weight-bold">Recommendation</div>
                                <div class="card-text text-center font-italic">
                                    #Farm calender recommends --
                                </div>
                                @else
                            <div class="row">
                                <div class="col-md-3 col-sm-3 text-right">
                                    <div class="card-title font-weight-bold">
                                        Rainfall :
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <div class="card-text">
                                        {{ $event->rain }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-3 text-right">
                                    <div class="card-title font-weight-bold">
                                        Harvest :
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <div class="card-text">
                                          {{ $event->harvest }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-title text-center font-weight-bold">Recommendation</div>
                            <div class="card-text text-center font-italic">
                                #Farm calender recommends {{ $event->activities }}
                            </div>
                                @endguest
                            </div>
                        @if(!Auth::guest())
                            @if(Auth::user()->level == 'Admin')
                            <div class="card-footer">
                                <div class="d-flex justify-content-sm-end">
                                    <a class="btn btn-sm btn-info" href="{{ route('calendar.edit',$event->id) }}"
                                       title="update this calendar event" style="margin-right: 10px;">@fas('edit')</a>
                                    {!! Form::open(['method' => 'POST', 'action' => ['CalendarController@destroy',$event->id]]) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <button class="btn btn-sm btn-danger" type="submit" title="remove this calendar event">
                                        @fas('trash-alt')</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            @else
                            @endif
                        @endif
                    </div>
                </div>
                @endforeach
            @else
            <p class="text-center text-muted">there are no calendar events added</p>
            @endif
    </div>
        @guest()
            <p class="lead font-weight-bold font-italic text-center">
                to view all the data provided please <a class="card-link" href="{{ route('login') }}"> sign in</a> or<a class="card-link" href="{{ route('register') }}">create an account</a> </p>
            @endguest
    </div>
    @endsection
