<?php
namespace App\Repositories\Eloquents;

// use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Contracts\ChannelRepositoryInterface;
use App\Models\Channel;

class ChannelRepository implements ChannelRepositoryInterface
{
	protected $channelModel;
	public function __construct(Channel $channelModel) {
		$this->channelModel = $channelModel;
	}

	public function getChannels(){
		return $this->channelModel->all();
	}
	
	public	function findChannelById($id){
		// try {
			return $this->channelModel->find();
		// 	$this->success();
		// } catch  (Exception $exception ) {
		// 	$this->fail( "asd" );
		// }
		// return $item;
	}

	public function updateItem1() {
        return $this->channelModel->findOrFail(1);
    }

    public function updateStuff(Channel $channelModel)
	{
	  // if (!$this->channelModel->where('id', '=', $channelModel->id)) {
		  $channelModel->title = 'foo';
		  dd('adf');
		  return $channelModel->save();
		// }
		// return false;
	}
}
