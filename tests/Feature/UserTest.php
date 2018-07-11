<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\User;
class UserTest extends TestCase
{
    public function testGetInstance()
    {
        $controller = \App::make(\App\Http\Controllers\ChannelsController::class);
        $this->assertNotNull($controller);
    }
}
