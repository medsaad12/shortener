<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{

    /**
     * Store a newly created short link in databse.
     */
    public function store(Request $request)
    {
        try {
            // validation
            $validator = Validator::make($request->all(), [
                'url' => 'required|url',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }
            

            // new record
            $link = new Link ;
            $link->url = $request->url ;
            $link->save();


            // response
            return response()->json([
                'status' => true,
                'message' => 'Short Link created successfully',
                'link' => $link,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'errors' => $th->getMessage(),
            ], 500);
        }
        
    }
    

    /**
     * Redirect to the long url.
     */
    public function redirectToLongUrl(Request $request,$id)
    {
       $link = Link::find($id) ;
       if ($link) {
          return redirect($link->url);
       }else {
          return abort(403 , "Url doesn't exist");
       } 
    }
}
