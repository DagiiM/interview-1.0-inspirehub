<?php

namespace App\Jobs;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadedVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data=[];
    protected $ministry;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data,$ministry)
    {
        $this->data = $data;
        $this->ministry = $ministry;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $video = Video::create($this->data);

        $video->assignMinistry($this->ministry);

        return back()->with('success','Upload Successful');
    }
}
