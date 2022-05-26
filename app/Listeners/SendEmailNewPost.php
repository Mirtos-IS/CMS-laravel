<?php

namespace App\Listeners;

use App\Events\NewEmailPost;
use App\Mail\NewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
class SendEmailNewPost
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewEmailPost  $event
     * @return void
	 *
	 * Handler for send email for one specific use after a new post is made
     */
    public function handle(NewEmailPost $event): void
    {
		//
		$post_title = $event->post_title;
		$user = Auth::user();

		$email = new NewPost($post_title);

		$user = (object)[
			'email' => $user['user_email'],
			'name' => $user['user_name']
		];

		$email->subject = "New Post";

		$when = now()->addSeconds(6);
		Mail::to($user)->later($when, $email);
    }
}
