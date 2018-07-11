<?php

namespace App\Http\Controllers;
use App\Services\ItemService;
use App\Services\ChannelService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Gate;
use App\Events\DeleteItem;

class ItemsController extends Controller
{
    protected $itemService;
    protected $channelService;

    public function __construct(ItemService $itemService, ChannelService $channelService) 
    {
    	$this->itemService = $itemService;
        $this->channelService = $channelService;
        $this->middleware('auth');
    }

    public function updateItem(ItemRequest $request){
    	$this->itemService->updateItem($request);
        return redirect()->action(
            'ChannelsController@index',['channelId' => $request->channelId]);
    }

    public function formUpdate($id){
        $item = $this->itemService->findItemById($id);
 
    if (Gate::allows('update-item', $item)) {
        return view('edit.EditItem', compact('item'));
    } else {
      echo 'Not Allowed';
    }
    }

    public function deleteItem($id){
        $item = $this->itemService->findItemById($id);
        if(Gate::allows('delete-item', $item)) {
            $this->itemService->deleteItem($id);
            event(new DeleteItem($item));
            return redirect()->back();
        } else {
            echo 'not Allowed';
        }

    }

    public function create($channelId){

        return view('Add.AddItem', compact('channelId'));
    }

    public function store(ItemRequest $request){
        $success = $this->itemService->createItem($request);
        if ($success) {
            flash('Welcome Aboard!', 'success');
            return redirect()->route('index', [$request->channelId]);
        } else {
            flash('Request Failed!', 'error');
            return redirect()->back();
        }
       
    }

    public function searchItem(Request $request){
        $items = $this->itemService->searchItem($request);
        $channels = $this->channelService->all();
        return view('index', compact('channels', 'items'));
    }

}
