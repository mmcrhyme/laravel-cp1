<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
// 以下を追加
use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Services\TweetService; //Tweetserviceのインポート

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        //return view('view先のディレクトリ.ファイル名')
        // -with('変数', '値');
        // 遷移先の変数に値（このファイル内で定義した変数）を持ってファイル先に遷移

        // return view('tweet.index')
        //     ->with('name', 'Laravel')
        //     ->with('version', '8');

        // 第二弾として以下を追加
        // $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        // dd($tweets);
        //Tweetモデルからtweetsテーブルのデータを全て取り出して$tweetsにいれる
        //dd(変数)はver_dumpみたいなもん。

        // サービスコンテナを利用する場合
        // $tweetService = new TweetService(); //TweetServiceのインスタンスを作成
        $tweets = $tweetService->getTweets(); //ツイートの一覧を取得

        return view ('tweet.index')
            ->with('tweets', $tweets);
        

    }
}
