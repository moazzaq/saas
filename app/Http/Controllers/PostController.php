<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Mail\SendPostEmail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate();

        return view('posts.index', compact('posts'));
    }

    public function send_to_email(Post $post)
    {
        return view('posts.send_email', compact('post'));
    }

    public function do_send_to_email(EmailRequest $request, Post $post)
    {
        if (Str::contains($request->emails, [','])){
            $emails = explode(',', $request->emails);
        }else{
            $emails[] = $request->emails;
        }

        foreach($emails as $email){
            Mail::to($email)->send(new SendPostEmail($post, $request->body));
        }

        $post->emails()->create([
            'user_id' => auth()->id(),
            'emails' => $request->emails,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index')->with([
            'message' => 'Email sent successfully',
            'alert-type' => 'success'
        ]);


    }
}
