<?php

namespace App\Traits;
use App\Models\Log;
use Auth;
  
trait LogTrait {

    public function storeLog($response)
    {
        $log = Log::create([
            'name' => $response['name'],
            'symbol' => $response['symbol'],
            'open' => $response['open'],
            'high' => $response['high'],
            'low' => $response['low'],
            'close' => $response['close'],
            'user_id' => Auth::user()->id,
        ]);
    }

}