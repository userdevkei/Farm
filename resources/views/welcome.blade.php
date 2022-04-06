<style type="text/css">
    .signin
    {
        position: center;
    }
</style>
@extends('layouts.app')

@section('content')
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000"
         style="margin-top: -23px;">
                @if(count($website) > 0)
                    <div class="carousel-inner">
                        @foreach($website->take(7) as $data)
                            <div class="carousel-item @if($loop->first) active @endif ">
                                <img src="{{url('/storage/images/', $data->cover_image)}}" class="d-block w-100 h-25"
                                     alt="{{ $data->title }}" style="max-height: 600px; min-height: 600px;">
                                <div class="carousel-caption @if($loop->first) active @endif">
                                    <h3 class="text-capitalize" style="color: red;"> {{ $data-> title }} </h3>
                                    <p class="lead" style="color: green;"> {{ $data->description }} </p>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <p>No slider images added.</p>
                    </div>
                @endif

                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    <hr>
    <div class="container-fluid" style="min-height: 300px;">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-center">
                        <h5 class="h5 mt-0">About us.</h5>
                    </div>
                    <hr>
                    <p class="lead">
                        #Farm is a platform developed with an aim of helping farmers achieve their goals. Helps farmers get specialised services and can meet potential investors.
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-center">
                        <h5 class="h5 mt-0">Mission.</h5>
                    </div>
                    <hr>
                    <p class="lead">
                        To help solve farmers' problems using technology
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-center">
                        <h5 class="h5 mt-0">Vision.</h5>
                    </div>
                    <hr>
                    <p class="lead">
                        Bring inspiration and innovation to every farmer by bringing them together to learn, assist and grow together.
                    </p>
                </div>
            </div>
        </div>
    <hr>
        <div class="d-flex justify-content-center">
            <h5 class="h5 mt-0">Our Sponsors</h5>
        </div>
        <div class="d-flex justify-content-center">
        <div class="card-deck">
            @if(count($sponsor)>0)
                @foreach($sponsor as $data)
                    <div class="col-md-3 my-2">
                        <div class="card h-100">
                           <img class="card-img-top" src="/storage/images/{{$data -> cover_image}}" alt="Card image cap" style="min-height: 200px; max-height: 200px; min-width: 100%;">
                            <div class="card-footer">
                                <p class="text-capitalize text-center" style="padding-top: 5px;"> {{ $data -> name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
            <p class="muted">you are under no sponsorship currently</p>
                @endif
        </div>
    </div>
    </div>
    @endsection
