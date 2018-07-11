<?php
namespace App\Services;

use App\Repositories\Contracts\ChannelRepositoryInterface;
use User;
/**
 * 
 */
class ChannelService 
{
    protected $channelRepositoryInterface;
    public function __construct(ChannelRepositoryInterface $channelRepositoryInterface)
    {
        $this->channelRepositoryInterface = $channelRepositoryInterface;
    }

    public function getChannels()
    {
        return $this->channelRepositoryInterface->getChannels();
    }

    public function findChannelById($id)
    {
        return $this->channelRepositoryInterface->findChannelById($id);
    }
}
?>