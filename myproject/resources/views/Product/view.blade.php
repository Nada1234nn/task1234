@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-3" style="background-color: #f9f9f9;
        border: 1px solid black;  align: center;">
            <h2 align="center"> Products</h2>

        <table class="table table-striped"  col="8" border="1px solid black" row="6" style="text-align: center;">
            <tr>
                <td>Name Product</td>

                <td>Price</td>

                <td>Description</td>

                <td>Quantity per unit</td>

                <td width="300px">Image</td>

                <td></td>
            </tr>
                       @foreach($products as $product)
                  <tr>
                    <td>
                         {{$product->product_name}}
                        </td>

                         <td>
                             {{$product->price}}

                         </td>

                         <td>
                             {{$product->describe}}
                         </td>

                         <td>
                             {{$product->quantity_per_unit}}
                         </td>

                         <td>
                             {{$product->image}}
                         </td>

                          <td>
                              <a href="edit/{{$product->id}}">Edit</a>
                              <hr>
                              <a href="add/{{$product->id}}">Delete</a>
                          </td>
                           </tr>



                    @endforeach


        </table>

        <a href="add"  style="color: #0d3625; text-align:center;">Add New Product</a>
        </div>
    </div>
 @endsection
