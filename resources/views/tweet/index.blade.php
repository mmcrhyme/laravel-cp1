{{-- viewの下にTweetディレクトリを作成し、その中にindex.blade.phpを作成 --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('つぶやきアプリ') }}
        </h2>
    </x-slot>

    <div>
        <p>投稿フォーム</p>
        @if (session('feedback.success'))
            <p style="color:green;">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('tweet.create') }}" method="post">
            @csrf
            <label for="tweet_content">つぶやき</label>
            <span>140文字まで</span>
            <input type="text" name="title" id="tweet_title" placeholder="タイトルを入力">
            <textarea type="text" name="problem" id="tweet_problem" placeholder="問題を入力" cols="30" rows="10"></textarea>
            <textarea type="text" name="solution" id="tweet_solution" placeholder="解決法を入力" cols="30" rows="10"></textarea>
            @error('problem','solution')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">投稿</button>
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($tweets as $tweet)
                        <details>
                            <summary>{{ $tweet->title }}</summary>
                                <p>{{ 'タイトル：' }}{{ $tweet -> title }}</p><br>
                                <p>{{ '問題：' }}{{ $tweet -> problem }}</p><br>
                                <p>{{ '解決法：' }}{{ $tweet -> solution }}</p><br>
                                <div>
                                    <a href="{{ route('tweet.update.index', ['tweetId'=>$tweet->id]) }}">編集</a>
                                </div>
                                <form action="{{ route('tweet.delete', ['tweetId'=>$tweet->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit">削除</button>
                                </form>
                        </details>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>