<?php

namespace App\Http\Controllers;

include 'helper/functions.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\NewPost;
use App\Events\NewEmailPost;

class EmailController extends Controller 
{

	public function email(Request $request){
		return new NewPost($request->name);
	}

	public function sendemail(Request $request){ 
		$eventSendEmail = new NewEmailPost(
			$request->post_title
		);
		event($eventSendEmail);

		return redirect()->back();
	}

}
