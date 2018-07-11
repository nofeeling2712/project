<?php
// namespace App\Repositories\Eloquents;
// use App\Repositories\Contracts\RepositoryInterface;
// use Illuminate\Container\Container as App;
// use Illuminate\Database\Eloquent\Model;
// abstract class BaseRepository implements RepositoryInterface{
// 	protected $app;
// 	protected $model;

// 	public function __construct(App $app){
// 		$this->app = $app;
// 		$this->makeModel();
// 	}
// 	abstract public function model();
// 	public function makeModel()
// 	{
// 		$model = $this->app->make($this->model());

// 		if (!$model instanceof Model) {
// 			throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
// 		}

// 		return $this->model = $model;
// 	}
// 	public function all(){
// 		$datas = $this->model->all();
// 		return $datas;
// 	}
// 	public function index($id){
// 		$data = $this->model->find($id);
// 		return $data;
// 	}
// }
?>