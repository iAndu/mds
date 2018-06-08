<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Auth;
use App\Message;
use App\User;

class ChatController extends Controller
{
    public function index(Request $request, Group $group, User $user = null) {
        if (!Auth::user()->groups()->find($group->id)) {
	    abort(403);
	}
	
	$groupUsers = $group->users()->get()->where('id', '!=', Auth::id());
	$partner = isset($user) ? $user : $groupUsers->first();
	$messages = Auth::user()->messagesWith($partner);

	Auth::user()->receivedMessages()->where('from', $partner->id)->update(['seen' => true]);
	
	return view('chat.chat', ['users' => $groupUsers, 'messages' => $messages->sortBy('created_at'), 'partner' => $partner, 'group' => $group]);
    }

    public function send(Request $request)
    {
	$message = Message::create([
	    'message' => $request->message,
	    'from' => Auth::id(),
	    'to' => $request->partner
	]);

	return response()->json($message);
    }

    public function get(Request $request)
    {
	$messages = Auth::user()->receivedMessages()->where('from', $request->partner)->where('seen', false);
	$response = $messages->get();
	$messages->update(['seen' => true]);

	return response()->json($response);
    }
}
