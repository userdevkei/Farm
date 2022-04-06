@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h5 class="h5 mt-0 text-center">Update #Farm market data</h5>
        <hr>
        <div class="d-flex justify-content-center">
            <div class="col-md-7 col-sm-7">
                <div class="card">
                    <div class="card-header">#Farm | Update a market</div>
                    <div class="card-body">
                        {!! Form::open(['method' => 'POST', 'action' => ['MarketController@update',$market->id],
                        'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group row">
                            {!! Form::label('market',('Market Name :'),['class' => 'col-md-3 col-sm-4 text-right']) !!}
                            {!! Form::text('market',$market->market,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('day',('Market Day :'),['class' => 'col-md-3 col-sm-4 text-right']) !!}
                            {!! Form::date('day',$market->day,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('type',('Product Type :'),['class' => 'col-md-3 col-sm-4 text-right']) !!}
                            {!! Form::select('type',['Farm Produce' => 'Farm Produce', 'Animal Produce' => 'Animal Produce'],
                            $market->type,['class' => 'col-md-8 col-sm-8 form-control', 'placeholder' => 'Select type of product']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('product',('Product Name :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::text('product',$market->product,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('quantity',('Quantity :'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::number('quantity',$market->quantity,['class' => 'col-md-4 col-sm-4 form-control']) !!}
                            {!! Form::select('units',['Grams' => 'Grams','Kgs' => 'Kgs', 'Litres' => 'Litres', 'Bags' => 'Bags',
                            'Crates' => 'Crates', 'Nets' => 'Nets'],$market->units,['class' => 'col-md-4 col-sm-4 form-control',
                            'placeholder' => 'Units'])!!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('price',('Prices :'),['class' => 'col-md-3 col-sm-4 text-right']) !!}
                            {!! Form::text('b_price',$market->b_price,['class' => 'col-md-4 col-sm-4 form-control', 'placeholder' =>
                            'Market buying price']) !!}
                            {!! Form::text('s_price',$market->s_price,['class' => 'col-md-4 col-sm-4 form-control', 'placeholder' =>
                            'Market selling price']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('image',('Cover Image :'),['class' => 'col-md-3 col-sm-4 text-right']) !!}
                            {!! Form::file('cover_image',['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="row mb-0 form-group">
                            {!! Form::hidden('_method', 'PUT') !!}
                            <button class="btn btn-sm btn-success offset-md-3" type="submit" title="update this product">
                                @fas('save') product</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
