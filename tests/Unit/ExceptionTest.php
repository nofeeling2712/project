<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\channelService;
use App\Repositories\Eloquents\ChannelRepository;
use Mockery;
class ExceptionTest extends TestCase
{
    public function divide($a, $b)
    {
        if ($b == 0) {
            throw new \InvalidArgumentException('can not divide for zero', 1);
        }
        return $a / $b;
    }

/**
 * @expectedException Exception
 * @expectedExceptionMessage can not divide for zero
 */
public function testExceptionMessage()
{
    $this->divide(4, 0);
}

    public function testUpdateItem1() {
        // $channel = new \App\Models\Channel;
        // $channel->id = 1;
        // $channel->UserId = 1;
        // $item = new \App\Models\Item;
        // $item->channelId = 1;
        $item_model = Mockery::mock('\App\Models\Channel');
        $repo = new ChannelRepository($item_model);
        $item_model->shouldReceive('findOrFail')->once()->andReturn('foo');
 		$this->assertEquals('foo', $repo->updateItem1());
        // $this->itemService = new ItemService($this->itemRepository);
        // $this->itemService->updateItem1(1);

    }

    // MyRepositoryTest
	public function testUpdateSomeStuff()
	{
	  $channelModel = Mockery::mock('\App\Models\Channel');
	  // $channelModel->shouldReceive('where->exists')->andReturn(false);
	  $repo = new ChannelRepository($channelModel);
	  $channelModel = Mockery::mock('\App\Models\Channel')->makePartial();

	  $channelModel->shouldReceive('save')->once()->andReturn(true);
	  // $channelModel->exists = true;
	  $this->assertTrue($repo->updateStuff($channelModel));
	  // $this->assertEquals('foo', $channelModel->title);

	}
}
