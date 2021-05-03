<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CampaignTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api/campaigns/get_campaign/1')
                        ->assertJson([
                            'id'=>1,
                            'title'=>"Monster Energy Campaign",
                            'user_id'=>1,
                            'enabled'=>0,
                            'start_date'=>"2021-05-21",
                            'end_date'=>"2021-05-24",
                            'voucher_code'=>"MONSTER",
                            'created_at'=>"2021-05-02T15:22:14.000000Z",
                            'updated_at'=>"2021-05-02T15:22:14.000000Z"
                        ]);

        $response->assertStatus(200);
    }
}
