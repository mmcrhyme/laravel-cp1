<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use Illuminate\Support\Facades\Validator; //この2行を追加！
use Illuminate\Support\Facades\Auth;      //この2行を追加！

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        //
        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        $tweet->title = $request->title();
        $tweet->problem = $request->problem();
        $tweet->solution = $request->solution();
        $tweet->save();
        return redirect()
            ->route('tweet.update.index', ['tweetId'=>$tweet->id])
            ->with('feedback.success','ツイートを編集しました');
    }
}
