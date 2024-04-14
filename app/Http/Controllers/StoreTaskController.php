<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreTaskController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'message' => 'Task stored successfully'
        ]);
    }
}
