@if(count($errors) >0 )
    @foreach($errors->all() as $error)
        <div class="d-flex justify-content-end alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="d-flex justify-content-end alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="d-flex justify-content-end alert alert-danger">
        {{session('error')}}
    </div>
@endif
