<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * 管理者情報修正の確認画面の出力
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirm(Request $request)
    {
        // TODO: バリデーション
        return view('users.confirm', ['request' => $request]);
    }

    /**
     * 管理者情報を更新する
     * @param  Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $action = $request->input('action');

        // dd($request);

        // actionの値が'submit'以外なら入力フォームにリダイレクトする
        if ($action !== 'submit') {
            return redirect()->route('users.edit')->withInput();
        } else {
            $user = new User();

            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'body' => $request->body,
            ]);

            $user->save();

            return redirect('users')->with('flash_message', '管理者情報を修正しました。');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
