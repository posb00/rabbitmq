<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Http\Resources\HistoryResource;
use Auth;

class HistoryController extends Controller
{
    public function history()
    {
        $history =  Log::where('user_id',Auth::user()->id)->latest()->get();

        return HistoryResource::collection($history);
    }
}