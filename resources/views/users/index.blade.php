@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h5 class="h5 mt-0 text-center">
            #Farm Users
        </h5>
        <hr>
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mission-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="true" style="color: black !important;">Farmers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="staff-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="staff" aria-selected="false" style="color: black !important;">Extension Officers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="membership-tab" data-toggle="tab" href="#membership" role="tab" aria-controls="membership" aria-selected="false" style="color: black !important;">Investors</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                @if(count($farmer)>0)
                    <div class="table">
                        <table class="table table-responsive-sm table-borderless table-striped">
                            <thead>
                            <th>User Image</th>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Contact</th>
                            <th>Email Address</th>
                            <th>Location</th>
                            <th>Type of Farming</th>
                            <th>Crop</th>
                            <th>User Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($farmer as $user)
                                <tr>
                                    <td><img class="rounded-circle" src="/storage/images/{{$user->cover_image}}" alt="image" style="width: 48px; height: 48px;"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->id_number }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->county }} - {{ $user->sub_county }} - {{ $user->ward }}</td>
                                    <td>{{ $user->farming }}</td>
                                    <td>{{ $user->crop }}</td>
                                    <td>
                                        @if($user->status == '0')
                                            <span class="" style="color: orange;">Pending</span>
                                        @else
                                            <span class="" style="color: green;">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('officers.show', $user->id) }}"
                                           title="change user status">@fas('edit')</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center text-muted">
                        there are no farmers currently registered with #Farm
                    </p>
                @endif
            </div>
            <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
                @if(count($officer)>0)
                    <div class="table">
                        <table class="table table-responsive-sm table-borderless table-striped">
                            <thead>
                            <th>User Image</th>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Contact</th>
                            <th>Email Address</th>
                            <th>Location</th>
                            <th>Specialist</th>
                            <th>Flexibility</th>
                            <th>User Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($officer as $user)
                                <tr>
                                    <td><img class="rounded-circle" src="/storage/images/{{$user->cover_image}}" alt="image" style="width: 36px; height: 36px;"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->id_number }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->county }} - {{ $user->sub_county }} - {{ $user->ward }}</td>
                                    <td>{{ $user->specialization }}</td>
                                    <td>{{ $user->flexibility }}</td>
                                    <td>
                                        @if($user->status == '0')
                                            <span class="" style="color: orange;">Pending</span>
                                        @else
                                            <span class="" style="color: green;">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('officers.show', $user->id) }}"
                                           title="change user status">@fas('edit')</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center text-muted">
                        there are no extension officer currently registered with #Farm
                    </p>
                @endif
            </div>
            <div class="tab-pane fade" id="membership" role="tabpanel" aria-labelledby="membership-tab">
                @if(count($investor)>0)
                    <div class="table">
                        <table class="table table-responsive-sm table-borderless table-striped">
                            <thead>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email Address</th>
                            <th>Type of Investor</th>
                            <th>Type of Investment</th>
                            <th>Interested Product</th>
                            <th>User Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($investor as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->investor }}</td>
                                    <td>{{ $user->investment }}</td>
                                    <td>{{ $user->support_crop }}</td>
                                    <td>
                                        @if($user->status == '0')
                                            <span class="" style="color: orange;">Pending</span>
                                        @else
                                            <span class="" style="color: green;">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('officers.show', $user->id) }}"
                                           title="change user status">@fas('edit')</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center text-muted">
                        there are no investors currently registered with #Farm
                    </p>
                @endif
            </div>
        </div>
    </div>
    @endsection
