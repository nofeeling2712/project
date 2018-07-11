<?php

namespace App\Services;
use App\Repositories\Contracts\ItemRepositoryInterface;
use App\Models\Item;
class ItemService
{	
	private $itemRepositoryInterface;
	public function __construct(
		ItemRepositoryInterface $itemRepositoryInterface
	)
	{
		$this->itemRepositoryInterface = $itemRepositoryInterface;
	}

	public function getItems($request) {
    	return $this->itemRepositoryInterface->getItems($request);
    }

    public function findItemById($id) {
        return $this->itemRepositoryInterface->findItemById($id);
    }

    public function createItem($request) {
        return $this->itemRepositoryInterface->createItem($request);
    }

    public function updateItem($request) {
    	return $this->itemRepositoryInterface->updateItem($request);
    }

    public function deleteItem($id) {
        return $this->itemRepositoryInterface->deleteItem($id);
    }
}