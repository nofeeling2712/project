<?php
	namespace App\Repositories\Contracts;

	interface ItemRepositoryInterface{

		public function getItems($request);

		public function findItemById($id);

		public function createItem($request);
		
		public function updateItem($request);

		public function deleteItem($id);
	}

?>