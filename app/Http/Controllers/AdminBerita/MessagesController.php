<?php

namespace App\Http\Controllers\AdminBerita;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Berita\Message;
class MessagesController extends Controller
{
    public function submit(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required'
    	]);

    	//Create New Message
    	$message = new Message;
    	$message->name = $request->input('name');
    	$message->email = $request->input('email');
    	$message->message = $request->input('message');
    	//Save Message
    	$message->save();

    	//redirect
    	return redirect('/')->with('SUCCESS', 'Message Sent');
    }	

    public function getMessages(){
    	$messages = Message::all();

    	return view('messages')->with('messages', $messages);
    }
}
