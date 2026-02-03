<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // Toggle favorite (add/remove)
    public function store($articleId)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('article_id', $articleId)
            ->first();

        if ($favorite) {
            // If already favorited, remove
            $favorite->delete();
        } else {
            // Add favorite
            Favorite::create([
                'user_id' => Auth::id(),
                'article_id' => $articleId
            ]);
        }

        return back();
    }

    // Show favorite list
    public function index()
    {
        $favorites = Favorite::with('article.category')
            ->where('user_id', Auth::id())
            ->paginate(5);

        return view('favorites.index', compact('favorites'));
    }
}
