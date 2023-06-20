{{-- viewの下にTweetディレクトリを作成し、その中にindex.blade.phpを作成 --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('つぶやきアプリ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($tweets as $tweet)
                        <p>{{ 'タイトル：' }}{{ $tweet -> title }}</p><br>
                        <p>{{ '問題：' }}{{ $tweet -> problem }}</p><br>
                        <p>{{ '解決法：' }}{{ $tweet -> solution }}</p><br>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>