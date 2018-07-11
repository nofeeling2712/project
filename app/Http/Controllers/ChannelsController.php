<?php

namespace App\Http\Controllers;

use App\Services\ChannelService;
use App\Services\ItemService;
use Illuminate\Http\Request;
class ChannelsController extends Controller
{
    protected $channelService;
    public function __construct(ChannelService $channelService, ItemService $itemService){
        $this->channelService = $channelService;
        $this->itemService = $itemService;
        $this->middleware('auth');
    }

    public function getChannels(){
        $channels = $this->channelService->getChannels();
        return view('test', ['channels'=>$channels]);
    }

    public function index(int $channelId = 1, Request $request){
        $channels = $this->channelService->getChannels();
        $request['channelId'] = $channelId;       
        $items = $this->itemService->getItems($request);
        return view('index', compact('channels','items', 'channelId'));
    }
        public function searchAjax(Request $request) {
        return $this->itemService->getItems($request);
    }
}

