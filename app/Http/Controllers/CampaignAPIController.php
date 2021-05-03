<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CampaignAPIController extends Controller
{
    public function get_campaigns()
    {
        $user = Auth::user();
        $campaigns = DB::table('campaigns')->where(['user_id' => $user->id])->get();
    
        return $campaigns;
    }

    public function get_campaign($id)
    {
        $campaign = Campaign::find($id);
    
        return $campaign;
    }

    public function add_campaign(Request $request)
    {
        $path = null;
        $user = Auth::user();
        
        if($request->file('banner_file'))
        {
            $path = $request->file('banner_file')->getClientOriginalName();
            $request->file('banner_file')->storeAs('public/campaign_banners', $path);
            $path = '../storage/campaign_banners/'.$path;
        }
        
        $newCampaign = new Campaign;

        $newCampaign->title = $request->title;
        $newCampaign->banner = $path;
        $newCampaign->user_id = $user->id;
        $newCampaign->Enabled = 0;
        $newCampaign->start_date = $request->start_date;
        $newCampaign->end_date = $request->end_date;
        $newCampaign->voucher_code = $request->voucher_code;
        $newCampaign->created_at = Carbon::now();
        $newCampaign->updated_at = Carbon::now();

        $newCampaign->save();

        return $request;
    }

    public function delete_campaign($id)
    {
        $campaign = Campaign::find($id);
        $campaign->delete();

        return $campaign;
    }

    public function update_campaign(Request $request)
    {
        $campaign = Campaign::find($request->id);

        if($request->file('banner_file'))
        {
            $path = $request->file('banner_file')->getClientOriginalName();
            $request->file('banner_file')->storeAs('public/campaign_banners', $path);
            $path = '../storage/campaign_banners/'.$path;
        }
        
        $campaign->title = $request->title;
        $campaign->banner = $path;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;
        $campaign->voucher_code = $request->voucher_code;
        $campaign->updated_at = Carbon::now();

        $campaign->save();
    }
}
