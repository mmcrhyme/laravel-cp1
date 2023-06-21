<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_id' => ['required', 'string', 'max:32'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_id' => $request->user_id,
            'fname' => $request->fname,
            'bio' => $request->bio,
            'admin' => $request->admin,
        ]);

        // Logで$requestに入ってきている値を見る。logはstorage/logs/laravel.logにある。
            // Log::debug($request);
            // Log::info($request);
            // Log::error($request); 

        if ($request->hasFile('fname')) {
            $file = $request->file('fname');
            $fileName = $file->getClientOriginalName(); // オリジナルのファイル名を取得する
            // アップロードされたファイルを指定のディレクトリに保存する
            $file->move('../storage/images', $fileName);
    
            $data['fname'] = $fileName;
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
