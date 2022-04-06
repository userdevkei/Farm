@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <h5 class="h5 mt-0 text-center">Get help from the extension officers from #Farm</h5>
                <hr>
                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="mission-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="true" style="color: black !important;">All Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="staff-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="staff" aria-selected="false" style="color: black !important;">Booked Services</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                        @if(count($officer)>0)
                            <div class="table">
                                <table class="table table-responsive-sm table-borderless table-striped">
                                    <thead>
                                    <th>User Image</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email Address</th>
                                    <th>Location</th>
                                    <th>Specialist</th>
                                    <th>Flexibility</th>
                                    <th colspan="2">Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($officer as $user)
                                        <tr>
                                            <td><img class="rounded-circle" src="/storage/images/{{$user->cover_image}}" alt="image" style="width: 36px; height: 36px;"></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->county }} - {{ $user->sub_county }} - {{ $user->ward }}</td>
                                            <td>{{ $user->specialization }}</td>
                                            <td>{{ $user->flexibility }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="{{ route('service.show', $user->id) }}">@fas('thumbs-up') book</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center text-muted">
                                there are no extension officers currently registered with #Farm
                            </p>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
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

                                                {{ $user->name }}
                                            </div>
                                            <div class="card-footer">
                                                {{ $service->status }}
                                                <a class="btn btn-sm btn-info float-right" href="{{ route('service.edit', $user->id) }}">
                                                    @fas('edit') edit</a>
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
                </div>
            </div>
    @endsection
