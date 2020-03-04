<?php

namespace App\Http\Controllers;

use App\Http\Requests\KuchikomiRequest;
use App\Models\Item;
use App\Models\Kuchikomi;
use Illuminate\Http\Request;

class KuchikomiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ('create');
        // return view('kuchikomis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KuchikomiRequest $request)
    // public function store(Request $request)
    {
        // dd($request);
        $kuchikomi = new Kuchikomi;

        $kuchikomi->fill([
            'user_id' => 1,           // dummy
            'name' => $request->comment_user_name,
            'item_id' => $request->post_id,
            'email' => 'aaa@test.jp',   // dummy
            'img' => 'test',            // dummy
            'body' => $request->comment_body,
        ]);
        $kuchikomi->save();

        return redirect()->back()->with('flash_message', 'クチコミを投稿しました。');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
