<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Channel;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
class categorycrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->channel();
        $this->items();
    }

    public function items(){
        $crawlerItem = file_get_html("https://vnexpress.net/rss/suc-khoe.rss");
        $datas = $crawlerItem->find('item');
        $categories = array();
        foreach ($datas as $data) {
            $title = $data->find("title");
            $category['title'] = $title[0]->innertext;

            //xu ly description
            $description = $data->find('description');
            $descriptionXml = $description[0]->xmltext();
            $descriptionHtml = str_get_html($descriptionXml);

            $desa = $descriptionHtml->find("a");
            $category['desa'] = $desa[0]->href;    
            $desimg = $descriptionHtml->find("img");
            $category['desimg']= $desimg[0]->src;

            $category['desplaintext']= substr($descriptionHtml->plaintext,5);


            $pubDate = $data->find("pubDate");
            $category['pubDate'] = $pubDate[0]->innertext;    

            $link = $data->find("guid");
            $category['link'] = $link[0]->innertext;   

            $guid = $data->find("guid");
            $category['guid'] = $guid[0]->innertext; 

            $slash = $data->find("slash:comments");
            $category['slash'] = $slash[0]->innertext;    

            $category['channelId'] = Channel::max('id');
            $categories[] = $category;
        }
        // echo "<pre>";
            foreach ($categories as $key => $value) {
            Item::Create($value);
        }
        // echo "<pre>";

    }

    public function channel(){
        $crawlerChannel = file_get_html('https://vnexpress.net/rss/suc-khoe.rss');
        $channel = $crawlerChannel->find('channel');
        $channelDetailArray = array();
        foreach ($channel as $value) {
            $title = $value->find('title');
            $channelDetail['title'] = $title[0]->innertext;

            $description = $value->find('description');
            $channelDetail['description'] = $description[0]->innertext;

            $imageChannel = $value->find('image');
            foreach ($imageChannel as $image) {
                            $urlImage = $image->find('url');
            $channelDetail['urlImage'] = $urlImage[0]->innertext;
            $titleImage = $image->find('title');
            $channelDetail['titleImage'] = $titleImage[0]->innertext;
            $linkImage = $image->find('link');
            $channelDetail['linkImage'] = $linkImage[0]->innertext;
            }

            $pubDate = $value->find('pubDate');
            $channelDetail['pubDate'] = $pubDate[0]->innertext;

            $generator = $value->find('generator');
            $channelDetail['generator'] = $generator[0]->innertext;

            $channelLink = $value->find('link');
            $channelDetail['link'] = $channelLink[0]->innertext;

            $channelDetail['userId'] = rand(1,3);

            $channelDetailArray[] = $channelDetail;
        }

        foreach ($channelDetailArray as $key => $value) {
            Channel::Create($value);
        }

        // echo "<pre>";
        // print_r($channelDetailArray);
        // echo "<pre>";

    }
}