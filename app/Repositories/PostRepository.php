<?php

namespace App\Repositories;

use App\Events\NewEmailPost;
use App\Models\Posts;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class PostRepository 
{
    private const PAGE_SIZE = 20;

    public function allPosts() {
        $posts = Posts::orderByDesc('id')
                      ->paginate(self::PAGE_SIZE);

        return $posts;
    }
    public function store(Request $request): void {
		$image = null;
		if ($request->hasFile('image')){
			$image = $request->file('image')->store('posts');
		}

		Posts::create([
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
			'title' => $request->title,
			'image' => $image,
			'tag' => $request->tag,
			'status' => $request->status,
			'content' => $request->content,
		]);

		event(new NewEmailPost($request->title));
    }

    public function update(Request $request): void {
		Posts::whereId($request->id)->update([
				'title' => $request->title,
				'category_id' => $request->category_id,
                'user_id' => $request->user_id,
				'tag' => $request->tag,
				'status' => $request->status,
				'content' => $request->content,
			]);
		if ($request->image){
			$image = Posts::find($request->id)->select('image')->get();
			Storage::delete($image);

			Posts::whereId($request->id)->update([
					'image' => $request->file('image')->store('posts')
				]);
		}
    }

    public function destroy(int $id): void {
		$image = Posts::find($id)->select('image')->get();
		
		if ($image){
			Storage::delete($image);
		}

		Posts::destroy($id);
	}
}
