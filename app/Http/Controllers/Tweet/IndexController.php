<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //return view('view先のディレクトリ.ファイル名')
        // -with('変数', '値');
        // 変数に値を持ってファイル先に遷移

        return view('tweet.index')
            ->with('name', 'Laravel')
            ->with('version', '8');

    }
}
