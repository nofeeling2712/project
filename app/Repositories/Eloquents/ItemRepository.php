<?php
	namespace App\Repositories\Eloquents;
	use App\Repositories\Contracts\ItemRepositoryInterface;
	use App\Models\Item;
	/**
	 * 
	 */
	class ItemRepository implements ItemRepositoryInterface
	{
		protected $itemModel;
		public function __construct (Item $itemModel) {
			$this->itemModel = $itemModel;
		}
		public function getItems ($request){
            if($request->content) {

                        $items = $this->itemModel->    
                        where('title', 'like', "%" .$request->content ."%")
                         ->orwhere('desa', 'like', "%" .$request->content ."%")
                         ->orwhere('desplaintext', 'like', "%" .$request->content ."%")
                        ->where('channelId',$request->channelId)
                         ->orderBy('id', 'desc')->paginate(5);

            }else{
                $items = $this->itemModel->where('channelId',"=" ,$request->channelId)
                                ->orderBy('id', 'desc')->paginate(5);
            }
            
                        
            $items->appends(['channelId'=> $request->channelId, 'content' => $request->content]);
            return $items;
		}
		
		public function findItemById ($id) {
			return $this->itemModel->where('id', $id)->first();	 
		}


        public function createItem ($request) {          
            return $this->itemModel->create($request->all());
        }

		public function updateItem ($request) {
			$item = $this->findItemById($request->id);
			$item->update($request->all());
	    	return $item;
    	}

	    public function deleteItem($id) {
	    	$item = $this->findItemById($id);
	    	$item->delete();
    	}
	}
?>