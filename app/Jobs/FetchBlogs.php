<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;

class FetchBlogs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = 'https://sq1-api-test.herokuapp.com/posts';
        $json = json_decode(file_get_contents($url), true);
        foreach($json["data"] as $post){
            Post::create([
                'title'=>$post['title'],
                'description'=>$post['description'],
                'publication_date'=>$post['publication_date'],
                'user_id'=>1
            ]);
        }
    }
}
