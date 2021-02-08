<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Blog;

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
        foreach($json["data"] as $blog){
            Blog::create([
                'title'=>$blog['title'],
                'description'=>$blog['description'],
                'publication_date'=>$blog['publication_date'],
                'user_id'=>1
            ]);
        }
    }
}
