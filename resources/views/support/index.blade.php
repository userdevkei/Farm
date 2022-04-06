@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h5 class="h5 mt-0 text-center">#Farm get support from investors</h5>
    <hr>
    <div class="d-flex justify-content-sm-end" style="margin-bottom: 10px !important;">
    <a class="btn btn-sm btn-info" href="{{ route('support.create') }}"
       title="request support">@fas('plus') support</a>
    </div>
    <div class="table">
    @if(count($support)>0)

            <table class="table table-responsive-sm table-striped table-borderless">
                <thead>
                <th>Type</th>
                <th>Specialization</th>
                <th>Product</th>
                <th>Request</th>
                <th>Investor</th>
                <th>Investment</th>
                <th>Amount</th>
                <th>Security</th>
                <th>Status</th>
                <th class="text-center" colspan="3">Action</th>
                </thead>
                <tbody>
                    @foreach($support as $support)
                        <tr>
                            <td>{{ $support->type }}</td>
                            <td>{{ $support->farming }}</td>
                            <td>{{ $support->product }}</td>
                            <td>{{ $support->support }}</td>
                            <td>{{ $support->investor }}</td>
                            <td>{{ $support->investment }}</td>
                            <td>{{ $support->amount }}</td>
                            <td>{{ $support->security }}</td>
                            <td>
                            @if($support->status == 0)
                                <p style="color: orange;">pending</p>
                                @else
                                    <p style="color: green;">Approved</p>
                                @endif
                            </td>
                            <td>
                                @if(!Auth::guest())
                                    @if(auth()->user()->level == 'Farmer')
                            <a class="btn btn-sm btn-warning" href="#" title="view this request">@fas('eye')</a>
                            </td>
                            <td>
                            <a class="btn btn-sm btn-info" href="#" title="edit this request">@fas('edit')</a>
                            </td>
                            <td>
                            <a class="btn btn-sm btn-danger" href="#" title="delete this request">@fas('trash-alt')</a>
                                @elseif(auth()->user()->level == 'Investor')
                                    <td>
                                    <a class="btn btn-sm btn-info" href="#" title="edit this request">@fas('eye')</a>
                                    </td>
                                    <td>
                                <a class="btn btn-sm btn-success" href="#" title="delete this request">@fas('thumbs-up')</a>
                                    </td>
                                    @endif
                            @endif
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        @else
    <p class="text-muted text-center">no support requests yet</p>
        @endif
</div>
    @endsection
