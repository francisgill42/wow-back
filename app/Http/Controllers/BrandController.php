<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Auth;
use DB;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        $categories = Category::orderBy('id','desc')->select('id','category_name')->get();

        $brands = DB::table('brands')
                        ->select('id','brand_name','parent_id as category_ids')
                        ->orderBy('id','desc')
                        ->get();

        foreach ($brands as $value) {
           $value->categories = \DB::table('categories')
                                        ->select('id','category_name')
                                        ->whereIn('id',json_decode($value->category_ids))
                                        ->get();
        }

        return response()->json(['categories' => $categories,'brands' => $brands]);
    }

    public function store(Request $request)
    {
            $new_record = Brand::create([
            'brand_name' => $request->brand_name,
            'parent_id' => json_encode($request->category_ids)
            ]);
            $brand = DB::table('brands')
                        ->select('id','brand_name','parent_id as category_ids')
                        ->where('id',$new_record->id)
                        ->first();

            $brand->categories = \DB::table('categories')
                        ->select('id','category_name')
                        ->whereIn('id',json_decode($brand->category_ids))
                        ->get();

            return response()->json([
                'response_status'=>true,
                'message' => 'record has been created',
                'new_record' => $brand

                                 
            ]);
    }



    public function update(Request $request,$brand_id)
    {
        $updated = \DB::table('brands')->where('id',$brand_id)->update([
            'brand_name' => $request->brand_name,
            'parent_id' => json_encode($request->category_ids)
         ]);


            $brand = DB::table('brands')
                        ->select('id','brand_name','parent_id as category_ids')
                        ->where('id',$brand_id)
                        ->first();

            $brand->categories = \DB::table('categories')
                        ->select('id','category_name')
                        ->whereIn('id',json_decode($brand->category_ids))
                        ->get();

            return response()->json([
                'response_status'=>true,
                'message' => 'record has been created',
                'updated_record' => $brand

                                 
            ]);

       
  
    }


    public function destroy($brand_id)
    {
                return (Brand::find($brand_id)->delete()) 
                ? [ 'response_status' => true,  'message' => 'record has been deleted' ] 
                : [ 'response_status' => false, 'message' => 'record cannot delete' ];
    }
}
