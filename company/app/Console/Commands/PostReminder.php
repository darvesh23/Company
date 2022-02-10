<?php

namespace App\Console\Commands;

use App\Jobs\PostReminderJob;
use App\Jobs\SendEmailCompanyJob;
use App\Mail\SendEmailCompany;
use App\Mail\PostReminderMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use League\CommonMark\Extension\Table\Table;

class PostReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminds users to be interactive via post';

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
     * @return int
     */
    public function handle()
    {
         $notposted = User::select('email')->whereNotIn('id', Post::select('user_id'))->get();

         foreach($notposted as $i){
             $data['email'] = "darvesh@whozzat.com";
             dispatch(new PostReminderJob($data));
         }
    }
}
