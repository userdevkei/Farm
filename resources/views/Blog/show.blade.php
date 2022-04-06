<style type="text/css">
    .overflow-auto {
        height: 450px;
        overflow-y: scroll;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <h5 class="h5 mt-0 text-center">Thread about {{ $post->title }}</h5>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-10 col-sm-10">
                                <img class="rounded-circle" src="/storage/images/{{$post ->user->cover_image }}"                                                     alt="CP" style="width: 48px; height: 48px;">
                                <small class="text-muted" style="margin-left: 10px;">
                                    {{ $post->user->level }} {{ $post->user->name }}
                                </small>
                            </div>
                            <p>{{ $post->created_at->diffForHumans() }}</p>
                            <div class="col-md-2 col-sm2">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="card-img">
                                    <img src="/storage/images/{{$post->cover_image}}" alt="{{ $post->title }}"                                      style="max-height: 200px; min-height: 200px; max-width: 200px; min-width: 200px;">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p class="lead">
                                    {{ $post->message }}
                                </p>
                            </div>
                        </div>
                        @if(!Auth::guest())
                            @if(Auth::user()->id == $post->user_id)
                                <div class="d-flex justify-content-sm-end">
                                    <a href="{{ route('blog.edit', $post->id ) }}" class="btn btn-sm btn-primary"
                                       title="edit this product" style="margin-right: 7px;">@fas('edit')</a>
                                    {!! Form::open(['action' => ['BlogController@destroy', $post ->id], 'method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-sm btn-danger" title="delete this blog post">
                                        @fas('trash-alt')</button>
                                    {!! Form::close(); !!}
                                </div>
                            @endif
                        @endif
                        @if(!Auth::guest())
                        <hr>
                        <p class="text-center font-weight-bold">Add comment</p>
                                {!! Form::open(['method' => 'POST', 'action' => 'CommentsController@store']) !!}
                                {!! Form::textarea('comment','',['class' => 'col-md-12 col-sm-12 form-control form-control-sm',
                                'rows' => '3']) !!}
                                {!! Form::hidden('comment_id',$post->id) !!}
                                {!! Form::submit('comment',['class' => 'btn btn-sm btn-success offset-md-10' ,'style' =>
                                'margin-top: 10px !important; margin-bottom: -20px !important;']) !!}
                                {!! Form::close() !!}
                            @endguest
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-5">
                <div class="container-fluid">
                    <p class="mt-0 font-weight-bold text-center" style="margin: -7px !important;">Thread Comments</p>
                    <hr>
                    <div class="overflow-auto">
                        @if(count($comment)>0)
                            @foreach($comment as $comment)
                                <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
                                    <strong>{{ $comment->user->name }}</strong> at <small>{{ $comment->created_at->diffForHumans() }}</small>
                                    <p>{{ $comment->comment }}</p>
                                    <a href="" id="reply"></a>
                                    <!--form method="post" action="">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="body" class="form-control form-control-sm" />
                                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                                            <input type="submit" class="btn btn-sm btn-success float-right" value="Reply" />
                                        </div>
                                    </form-->
                                </div>
                            @endforeach
                            @else
                        <p class="font-weight-light font-italic text-center">be the first to comment on this post</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
