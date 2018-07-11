<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Channel;

class ChannelsControllerTest extends TestCase
{
    /**
     * 
     *
     * @return void
     */
    public function testPaginate() {
        $this->withoutMiddleware();
        factory(\App\Models\User::class, 5)->create();
        $channel = factory(\App\Models\Channel::class)->create();
        factory(\App\Models\Item::class, 50)->create();
        $response = $this->get("index/".$channel->id."/?page=2");
        $response->assertStatus(200);

        $response = $this->get("index/".$channel->id."/?page=3");
        $response->assertStatus(200);

        $response = $this->get("index/".$channel->id."/?page=4");
        $response->assertStatus(200);

        $response = $this->get("index/".$channel->id."/?page=5");
        $response->assertStatus(200);
    }
}

