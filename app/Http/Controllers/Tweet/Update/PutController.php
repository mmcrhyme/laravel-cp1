<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use Illuminate\Support\Facades\Validator; //この2行を追加！
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Services\TweetService;
use Illuminate\Support\Facades\Auth;   

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, TweetService $tweetService)
    {
        //
        if(!$tweetService->checkOwnTweet(Auth::user()->id, $request->id())){
            throw new AccessDeniedHttpException();
        }
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
