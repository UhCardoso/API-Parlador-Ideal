<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post;
    protected $user;

    public function __construct(Post $post, User $user) {
        $this->post = $post;
        $this->user = $user;
    }

    public function index() {
        $posts = Post::with('user')->get();

        return PostResource::collection($posts);
    }

    public function store(Request $request, $userId) {
        if(!$user = $this->user->find($userId)) {
            return redirect()->back();
        }

        // check if the user ID of the current session is the same as the user ID request
        if(Auth::user()->id == $userId) {
            $post = $user->posts()->create([
                'description' => $request->description
            ]);
        } else {
            return redirect()->back();
        }

        return new PostResource($post);
    }

    public function update(Request $request, $userId, $id) {
        if(!$post = $this->post->find($id)) {
            return redirect()->back();
        }

        // check if the user ID of the current session is the same as the user ID request
        if(Auth::user()->id == $userId) {
            $post->update([
                'description' => $request->description
            ]);
        } else {
            return redirect()->back();
        }
        
        return  new PostResource($post);
    }

    public function destroy(Request $request, $userId, $id) {
        // check if the user ID of the current session is the same as the user ID request
        if(Auth::user()->id == $userId) {
            $this->post->findOrFail($id)->delete();
        } else {
            return redirect()->back();
        }
        
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

}
