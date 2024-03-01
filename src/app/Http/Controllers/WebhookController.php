<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registros;


class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Process webhook payload
        // Perform actions based on the webhook data
        $register = new Registros;
        $register->user_id = 4; // Set user_id if applicable
        $register->inventario = 4;
        $register->sku = "test";
        $register->operacion = "testing";
        $register->save();


        return response()->json(['message' => 'ok']);
    }
}
