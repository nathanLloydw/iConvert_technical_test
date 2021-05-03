<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('campaigns/get_campaigns', [CampaignAPIController::class,'get_campaigns']);

Route::get('campaigns/get_campaign/{id}', [CampaignAPIController::class,'get_campaign']);

Route::post('campaigns/add_campaign', [CampaignAPIController::class,'add_campaign']);

Route::post('campaigns/update_campaign', [CampaignAPIController::class,'update_campaign']);

Route::delete('campaigns/delete_campaign/{id}', [CampaignAPIController::class,'delete_campaign']);