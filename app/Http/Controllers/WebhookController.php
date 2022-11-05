<?php
namespace App\Http\Controllers;

use App\Webhook;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function inventory19021996(Request $request)
    {
        $webhook = Webhook::create(['data' => json_encode($request->all())]);
        return response($webhook, 200);
    }
}
