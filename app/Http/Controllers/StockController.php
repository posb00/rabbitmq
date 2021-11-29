<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\StockResource;
use App\Traits\LogTrait;
use Illuminate\Support\Arr;
use Auth;
use App\Notifications\StockRequest;

class StockController extends Controller
{
    use LogTrait;

    
    public function getStock(Request $request)
    {   
        if($request->has('q') && !empty($request->q)){
           return $this->queryStock($request->q);
        }
        else{
            return response()->json('please provide a ticker',400);
        }

    }

//function to call the endpoint and get the DATA
    public function queryStock(string $q)
    {
        try {
            
            $url = "https://stooq.com/q/l/?s={$q}&f=sd2t2ohlcvn&h&e=json";
            $response = Http::get($url)['symbols'][0];
            
            //check is response was succesfull
           if(Arr::exists($response,'name')){
                
                //Log the request
                $this->storeLog($response);

                //Send Email
                Auth::user()->notify(new StockRequest($response));
                
                //return a API Resource for the response
                return new StockResource($response);
            }
    
            return response()->json('Not Found: ' .$q,404);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }


    }
}