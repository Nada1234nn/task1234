<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

        $categories=Category::pluck('id','category_name','description');

        return view('Product.Add',['categories' => $categories]);
    }

    //
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function AddProduct(Request $request)
    {
        if ($request->isMethod('POST')) {
            $formInput = $request->except('image');

//            //validation
//            $this->validate($request, [
//                'product_name' => 'required',
//                'size' => 'required',
//                'description' => 'required|min:12',
//                'price' => 'required',
//                'category_id' => 'required',
//                'image' => 'image|mimes:png,jpg,jpeg,gif|max:1024'
//            ],['required','please,enter value in:attribute field']);

            //Instantiate a new Project called Product
            $product = new Product;

            //Add the products to the Object
            $product->product_name = $request->get('product_name');
            $product->price = $request->get('price');
            $product->describe = $request->get('description');
            $product->quantity_per_unit = $request->get('quantity_per_unit');
            $product->size = $request->get('size');
            $product->category_id = $request->get('category_id');
            $product->user_id=Auth::user()->id;
            //Save all the items to the database
            $product->save();


            //image upload and save in folder in our app
            $image = $request->file('image');
            if ($image) {
                $imageName = $image->getClientOriginalName();
                $image->move('images', $imageName);
                $formInput['image'] = $imageName;
                $product->image = $imageName;
                $product->save();
            }



            return redirect('view');
        }
    }

    public function EditProduct(Request $request,$id){
        if ($request->isMethod('post')){
            if ($request->isMethod('POST')) {
                $formInput = $request->except('image');

                //validation
//            $this->validate($request, [
//                'name' => 'required',
//                'size' => 'required',
//                'description' => 'required|min:12',
//                'price' => 'required',
//                'category_id' => 'required',
//                'image' => 'image|mimes:png,jpg,jpeg,gif|max:100'
//            ]);

                //Instantiate a new Project called Product
            $product =Product::find($id);

            //Add the products to the Object
            $product->product_name = $request->get('product_name');
            $product->price = $request->get('price');
            $product->describe = $request->get('description');
            $product->quantity_per_unit = $request->get('quantity_per_unit');
            $product->size = $request->get('size');
            $product->category_id = $request->get('category_id');
            $product->user_id=Auth::user()->id;
            //Save all the items to the database
            $product->save();
                //image upload and save in folder in our app
                $image = $request->file('image');
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $formInput['image'] = $imageName;
                    $product->image = $imageName;
                    $product->save();
                }
return redirect('view');
        }else{
            $product=Product::find($id);
            $arr=Array('product'=>$product);
            return view('Product.edit',$arr);
        }

    }}



//
//            //image upload
//            $image=$request->file('image');
//            if ($image){
//                $imageName=$image->getClientOriginalName();
//                $image->move('images',$imageName);
//                $forminput['image']=$imageName;
//            }
//            Product::create($forminput);
//            return redirect('view');
// }
//    }


    public function view(){
        $products=Product::all();
       // $arr=Array('products'=>$products);
        return view('Product.view',['products'=>$products]);


    }



//    public function Add(Request $request){
//
//           $formInput=$request->except('image');
//           //image Upload
//            $image=$request->image;
//            if ($image){
//                $imageName=$image->getClientOriginalName();
//                $image->move('images',$imageName);
//                $formInput['image']=$imageName;
//            }
//            Product::created($formInput);
//            return redirect('view');
//
//    }
//    //
}





