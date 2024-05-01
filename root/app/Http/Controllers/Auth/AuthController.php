<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return View
     */
    public function newLogin()
    {
        return view('login.new_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createUser(UserRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('danger','未入力の項目があります')->withInput();
        }
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('danger','パスワードと確認用パスワードが一致しません')->withInput();
        }
                $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
                ]);
        return redirect(
            route('login.show')
        )->with('success', '新規ユーザーの登録が完了しました。');
    }

    /**
     * @return View
     */
    public function showLogin()
    {
        return view('login.login_form');
    }

    /**
     * @param App\Http\Requests\UserRequest
     *$request
     */
    public function login(UserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $user = $this->user->getUserByEmail($credentials['email']);

        if (!is_null($user)) {
            if ($this->user->isAccountLocked($user)) {
                return back()->withErrors([
                    'danger' => 'アカウントがロックされています。'
                ]);
            }
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $this->user->resetErrorCount($user);
                return redirect(route('admin.saunas.index'))->with('success', 'ログインに成功しました!');
            }

            $user->error_count =
                $this->user->addErrorCount($user->error_count);
            if ($this->user->lookAccount($user)) {
                return back()->withErrors([
                    'danger' => 'アカウントがロックされました。解除したい場合は運営者に連絡して下さい。'
                ]);
            }
            $user->save();
        }
        return back()->withErrors([
            'danger' => 'メールアドレスかパスワードが間違っています。'
        ]);
    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.show')->with('danger', 'ログアウトしました!');
    }
}
