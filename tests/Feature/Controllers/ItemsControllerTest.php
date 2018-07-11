<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemsControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateItem () {
        // $this->withoutMiddleware();
        $user =    factory(\App\Models\User::class)->create();
        $channel = factory(\App\Models\Channel::class)->create();
        $item =    factory(\App\Models\Item::class)->create();


        // $response = $this->post('/item/'.$item->id.'/update');
        // $response->assertStatus(302);

        $response = $this->get('/item/create/'.$channel->id,[
                '_token' => csrf_token(),
            ]);
        $response->assertStatus(200);
    }
}

