<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 以下を追加
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use Illuminate\Support\Facades\Validator; //この2行を追加！
use Illuminate\Support\Facades\Auth;      //この2行を追加！

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $tweet = new Tweet;
        $tweet->user_id = Auth::user()->id;
        $tweet->user_name = Auth::user()->name;
        $tweet->fname = Auth::user()->fname;
        $tweet->title = $request->title();
        $tweet->problem = $request->problem();
        $tweet->solution = $request->solution();
        $tweet->impression = 0;
        $tweet->save();
        return redirect()->route('tweet.index');
    }
}
