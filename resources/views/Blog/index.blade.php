<style type="text/css">
    .card-title
    {
        text-align: justify;
    }
</style>
@extends('layouts.app')

@section('content')
        <div class="container-fluid">
                <h5 class="h5 mt-0 text-center">#Farm blog</h5>
            <hr>
            @guest()
                @else
            <div class="container">
                <div class="col-md-12 col-sm-12 d-flex justify-content-end" style="margin: 0 !important;">
                <a class="btn btn-sm btn-success" href="{{ route('blog.create') }}">@fas('plus') post</a>
            </div>
            @endguest
            <div class="container">
               @if(count($post)>0)
                   @foreach($post->take(5) as $data )
                       <div class="card my-lg-2"  style="padding-bottom: -20px !important; padding-top: 20px !important;">
                               <div class="col-md-12 col-sm-12" style="background-color: white;">
                                   <div class="row">
                                   <div class="card-img col-md-1 col-sm-1" style="margin-bottom: 10px;">
                                   <img class="rounded-circle" src="/storage/images/{{ $data->user->cover_image }}" alt="{{ $data->user->level }}" style="width: 48px; height: 48px;">
                                   </div>
                                   <div class="card-title text-truncate align-text-bottom col-md-3 col-sm-3">
                                   <h4 class="lead"  style="padding-bottom: -10px;">
                                       <a  class="card-link text-truncate" href="{{ route('blog.show', $data->id ) }}">
                                           {{ $data->title }}
                                       </a>
                                   </h4>
                               </div>
                                       <div class="col-md-7 col-sm-7">
                                           <p class="text-truncate">
                                               {{ $data->message }}
                                           </p>
                                       </div>
                                       <div class="col-md-1 col-sm-1">
                                           <small class="text-muted" style="margin-right: 0 !important;">
                                               posted  {{ $data->created_at->diffForHumans() }}
                                           </small>
                                       </div>
                                   </div>
                           </div>
                       </div>
                   @endforeach
                   @else
                <p class="text-muted text-center">no posts available</p>
                   @endif
            </div>
        </div>
    @endsection
