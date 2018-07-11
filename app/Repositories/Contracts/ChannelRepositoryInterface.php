<?php
namespace App\Repositories\Contracts;

interface ChannelRepositoryInterface
{
    public function getChannels();
    
    public function findChannelById($id);
}