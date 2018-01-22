@extends('layouts.app')

@section('content')

    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}" ></script>
    <script type="text/javascript">
        //function ready prevent implement code to end load page
        $(function(){
            $('#errorMsg').hide();
            var files;
            $('input[name="image"').change(function (e) {
                files=e.target.files;
            });
           $ ('#form').submit(function (e) {

              e.preventDefault();
               var product_name=$('input[name="product_name"]').val();
               var price=$('input[name="price"]').val();
              var description=$('input[name="description"]').val();
               var quantity_per_unit=$('input[name="quantity_per_unit"]').val();
               var size=$('input[name="size"]').val();
               var category_id=$('input[name="category_id"]').val();
               var _token=$('input[name="_token"]').val();
               //save all data in form
               var data=new FormData();
               data.append('product_name',product_name);
               data.append('price',price);
               data.append('description',description);
               data.append('quantity_per_unit',quantity_per_unit);
               data.append('size',size);
               data.append('category_id',category_id);
               data.append('_token',_token);
               $.each(files,function (k,v) {
                   data.append('image',v);
               });
               $.ajax({
                   url:'AddProduct',
                   type:'post',
                   data:data,
                   contentType:"multipart/form-data",
                   processData:false,
                   success:function (data) {
                       alert('Add Product successsfully!:');
                   },
                   error:function (data) {
                       var errors=data.responseJSON;
                       $('#errorMsg').show();
                       $('#errorMsg').html('');
                       $.each(errors,function (k,v) {
                          $('#errorMsg').append(v+"</br>");
                       });
                   }
               });


           });
        });
    </script>
    {{--@if (isset($article) && isset($_GET['id']))--}}

        {{--$thumb_name = $product->thumb;--}}

    {{--@else--}}
        {{--$thumb_name = 'no_thumb.jpg';--}}
        {{--@endif--}}



        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <h2 align="center"> Insert new product</h2>
                {{--@if ($errors->any())--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--@endif--}}
                <form id="form" method="post" action="view">
    {{csrf_field()}}

                <div class="form-group">
                    {{Form::label('product_name', 'Name')}}
                    {{ Form::text('product_name',null,array('class'=>'form-control'))}}
                </div>

                    <div class="form-group">
                        {{Form::label('price', 'Price')}}
                        {{ Form::text('price',null,array('class'=>'form-control'))}}
                    </div>


                    <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{ Form::text('description',null,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('quantity_per_unit', 'Quantity per unit')}}
                    {{ Form::text('quantity_per_unit',null,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('size', 'Size')}}
                    {{ Form::select('size',['small'=>'small','medium'=>'medium','large'=>'large'],null,['class'=>'form-control'])}}
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
                    <input type="hidden" name="_token" value=" {{csrf_token()}}">

                    {{Form::label('image', 'Image')}}
                    {{ Form::file('image',array('id'=>'imageF','name'=>'image','class'=>'form-control'))}}
                </div>

                {{Form::submit('Save',array('class'=>'btn btn-primary')) }}
                </form>
            </div>


        </div>
<div class="alert alert-danger" id="errorMsg"></div>
    <div class="box-infos ">
        <img class="col-lg-2 " src="images/no_thumb.jpg"
             style="height: 200px; width: 300px; border-radius: 5px;
         position: absolute;
        bottom: 2.5%;
        left: 50%; margin-left: -50%;
    margin-right: auto;"/>
    {{--<a href="#" class="badge thumb-reset" onclick="resetThumb( event);">Reset</a>--}}


    </div>
@endsection
    @section('script')

    {{--<style type="text/css">--}}
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
