<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 以下を追加
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Services\TweetService;
use Illuminate\Support\Facades\Auth;   

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        //
        $tweetId = (int) $request->route('tweetId');
        if(!$tweetService->checkOwnTweet(Auth::user()->id, $tweetId)){
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        return view('tweet.update')
            ->with('tweet', $tweet);
    }
}
