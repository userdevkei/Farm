@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h5 class="h5 mt-0 text-center">#Farm client requests</h5>
    <hr>
    <div class="d-flex justify-content-center">
        @if(count($service)>0)
            @foreach($service as $service)
                <div class="col-3 my-2">
                    <div class="card h-100">
                        <div class="card-header">
                            <img class="rounded-circle" src="/storage/images/{{$service->cover_image}}"
                                 style="width: 36px; height: 36px;"> {{ $service->service }}
                        </div>
                        <div class="card-body">
                            {{ $service->description }}

                        </div>
                        <div class="card-footer">
                            {{ $service->status }}
                            <a class="btn btn-sm btn-info float-right" href="#"
                            title="update this request">@fas('edit') status</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @else
            <p class="text-center text-muted">
                there are no extension officers currently registered with #Farm
            </p>
        @endif
    </div>
</div>
    @endsection
