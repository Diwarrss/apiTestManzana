<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $orders = Order::with('foods', 'user')->where('user_id', Auth::user()->id)->get();

      if (!$orders->count()) {
         return response()->json([
            'message' => 'Record not found.',
            'data' => $orders
         ], 201);
      }

      return response()->json([
         'message' => 'List of data',
         'data' => $orders
      ], 200);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      try {
         DB::beginTransaction();
         $user['user_id'] = Auth::user()->id;
         $order = Order::create($user);

         if ($order) {
            $items = $request->data;
            foreach ($items as $key => $item) {
               $row = OrderFood::create([
                  'order_id' => $order->id,
                  'food_id' => $item['id'],
                  'quantity' => $item['quantity']
               ]);
               $row->save();
            }
            $response =  response()->json([
               'message' => 'Object created successfully',
               'data' => Order::with('foods', 'user')->where('id', $order->id)->first()
            ], 201);
         } else {
            $response =  response()->json([
               'message' => 'No content',
               'data' => []
            ], 204);
         }
         DB::commit();

         return $response;
      } catch (\Throwable $th) {
         DB::rollBack();
         throw $th;
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
   }
}
