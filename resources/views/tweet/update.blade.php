{{-- viewの下にTweetディレクトリを作成し、その中にindex.blade.phpを作成 --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('つぶやきを編集する') }}
        </h2>
    </x-slot>

        <div>
            <a href="{{ route('tweet.index') }}">戻る</a>
            <p>投稿フォーム</p>
            @if (session('feedback.success'))
                <p style="color:green;">{{ session('feedback.success') }}</p>
            @endif
            <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
                @method('PUT')
                @csrf
                <label for="tweet_content">つぶやき</label>
                <span>140文字まで</span>
                <input type="text" name="title" id="tweet_title" value="{{ $tweet->title }}">
                <textarea type="text" name="problem" id="tweet_problem" placeholder="つぶやきを入力" cols="30" rows="10">{{ $tweet->problem }}</textarea>
                <textarea type="text" name="solution" id="tweet_solution" placeholder="つぶやきを入力" cols="30" rows="10">{{ $tweet->solution }}</textarea>
                @error('problem','solution')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
                <button type="submit">編集</button>
            </form>
        </div>
</x-app-layout>