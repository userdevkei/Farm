@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Account | Investor Registration') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('investors.store') }}">
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
                                {!! Form::label('investor', ('Investor'), ['class'=> 'col-md-3 col-form-label text-md-right']) !!}
                                <div class="col-md-8">
                                    {!! Form::select('investor', array('Individual' => 'Individual', 'Company' => 'Company', 'Government' => 'Government'),'', ['class'=> 'form-control', 'placeholder' => 'Type of Investor']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('investment', ('Investment'), ['class'=> 'col-md-3 col-form-label text-md-right']) !!}
                                <div class="col-md-8">
                                    {!! Form::select('investment', array('Farm Inputs' => 'Farm Inputs', 'Money' => 'Money', 'Both..'=> 'Both'),'', ['class'=> 'form-control', 'placeholder' => 'Type of Investment']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="interest" class="col-md-3 col-form-label text-md-right">{{ __('Interest') }}</label>

                                <div class="col-md-8">
                                    <input id="interest" type="text" class="form-control @error('interest') is-invalid @enderror" name="interest" value="{{ old('interest') }}" required placeholder="Interested in Investing in What? eg. Maize" autocomplete="interest">

                                    @error('interest')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <input id="level" type="hidden" name="level" value="Investor">

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Type Password of at Least 6 Characters" required autocomplete="new-password">

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype Password for Confirmation" required autocomplete="new-password">
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
