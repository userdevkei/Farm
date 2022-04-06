@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Account | Farmer Registration') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="enter your official name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_number" class="col-md-3 col-form-label text-md-right">{{ __('ID Number') }}</label>

                            <div class="col-md-8">
                                <input id="id_number" type="number" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required autocomplete="id_number" placeholder="Enter Your Identification Number" autofocus>

                                @error('idno')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-8">
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" placeholder="Use Format 2547XXXXXXXX" autofocus>

                                @error('contact')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Example email@mail.com" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-3 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <input id="county" type="text" class="form-control text-capitalize @error('county') is-invalid @enderror" name="county" value="{{ old('county') }}" required autocomplete="county" placeholder="Your County" autofocus>

                                        @error('county')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <input id="sub_county" type="text" class="form-control text-capitalize @error('sub_county') is-invalid @enderror" name="sub_county" value="{{ old('sub_county') }}" required autocomplete="sub_county" placeholder="Your Sub County" autofocus>

                                        @error('sub_county')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <input id="ward" type="text" class="form-control text-capitalize @error('ward') is-invalid @enderror" name="ward" value="{{ old('ward') }}" required autocomplete="ward" placeholder="Your Ward" autofocus>

                                        @error('ward')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="form-group row">
                        {!! Form::label('farming', ('Farming'), ['class'=> 'col-md-3 col-form-label text-md-right']) !!}
                        <div class="col-md-8">
                        {!! Form::select('farming', array('Small Scale' => 'Small Scale', 'Large Scale' => 'Large Scale'),'', ['class'=> 'form-control', 'placeholder' => 'Type of Farming Practised']) !!}
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="crop" class="col-md-3 col-form-label text-md-right">{{ __('Product') }}</label>

                            <div class="col-md-8">
                                <input id="crop" type="text" class="form-control text-capitalize @error('crop') is-invalid @enderror" name="crop" value="{{ old('crop') }}" required autocomplete="crop" placeholder="Main Type of Crop Farmer is Growing" autofocus>

                                @error('contact')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cover_image" class="col-md-3 col-form-label text-md-right">{{__('User Image')}}</label>
                            <div class="col-md-8">
                                <input id="cover_image" type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image">
                                @error('cover_image')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input id="level" type="hidden" name="level" value="Farmer">
                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                              name="password" required autocomplete="new-password" placeholder="Password With at Least 6 Characters">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                       required autocomplete="new-password" placeholder="Password Confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    @fas('user-plus') {{ __('Sign up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
