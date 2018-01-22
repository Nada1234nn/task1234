@extends('layouts.app')

@section('content')

    {{--@if (isset($article) && isset($_GET['id']))--}}

    {{--$thumb_name = $product->thumb;--}}

    {{--@else--}}
    {{--$thumb_name = 'no_thumb.jpg';--}}
    {{--@endif--}}



    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <h2 align="center"> Edit product</h2>

            <form method="post" action="/edit/{{$product->id}}">
                {{csrf_field()}}

                <div class="form-group">
                    {{Form::label('product_name', 'Name')}}
                    {{ Form::text('product_name','$product->product_name',array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('price', 'Price')}}
                    {{ Form::text('price','$product->price',array('class'=>'form-control'))}}
                </div>


                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{ Form::text('description','$product->describe',array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('quantity_per_unit', 'Quantity per unit')}}
                    {{ Form::text('quantity_per_unit','$product->quantity_per_unit',array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('size', 'Size')}}
                    {{ Form::select('size',['small'=>'small','medium'=>'medium','large'=>'large'],'$product->size',['class'=>'form-control'])}}
                </div>
                <div class="form-group" >

                    {{Form::label('category_id', 'Categories')}}

                    <select class="form-control" name="category" id="category_id">

                        @foreach($categories as $id => $category)
                            {{--// {{Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Select category'])}}--}}

                            <option id="category_id" value={{ $id }}<{{ $category }}</option>
                        @endforeach

                    </select>
                </div>



                <div class="form-group">
                    {{Form::label('image', 'Image')}}
                    {{ Form::file('image','$product->image',array('class'=>'form-control'))}}
                </div>

                {{Form::submit('Save',array('class'=>'btn btn-primary'))}}

            </form>
        </div>


    </div>
    <input type="hidden" name="_token" value=" {{csrf_token()}}">

    <div class="box-infos ">
        <img class="thumb-preview" src="images/">
        <a href="#" class="badge thumb-reset" onclick="resetThumb( event);">Reset</a>


    </div>
    {{--<style type="text/css">--}}
    {{--.thumb-preview{--}}
    {{--height: 150px;--}}
    {{--width: 200px;--}}
    {{--border-radius: 5px;--}}
    {{--}--}}
    {{--.box-infos{--}}
    {{--//border: 1px solid #5D8CAE;--}}
    {{--border-top: 0;--}}
    {{--padding: 10px;--}}
    {{--margin-top:60px;--}}
    {{--margin-bottom:0;--}}
    {{--//min-height: 200px;--}}
    {{--}--}}
    {{--input[type=file].hidden-input-file{--}}
    {{--display: none;--}}
    {{--}--}}
    {{--.thumb-reset{--}}
    {{--display: none;--}}
    {{--width: 190px;--}}
    {{--position: relative;--}}
    {{--height: 30px;--}}
    {{--line-height: 24px;--}}
    {{--top:-35px;--}}
    {{--}--}}
    {{--</style>--}}


@endsection
