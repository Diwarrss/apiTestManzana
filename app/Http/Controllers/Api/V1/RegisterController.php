<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(RegisterRequest $request)
   {
      try {
         DB::beginTransaction();
         $data = $request->all();
         $data['password'] = Hash::make($request->password);
         $user = User::create($data);
         DB::commit();

         if ($user) {
            return response()->json([
               'message' => 'Object created successfully',
               'data' => $user
            ], 201);
         } else {
            return response()->json([
               'message' => 'No content',
               'data' => []
            ], 204);
         }
      } catch (\Throwable $th) {
         DB::rollBack();
         throw $th;
      }
   }
}
