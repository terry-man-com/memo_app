<?php

namespace App\Http\Controllers;

// Memoクラスを読み込む
use App\Models\Memo;
use App\Http\Requests\MemoRequest;

class MemoController extends Controller
{
    // indexページへ移動
    public function index() 
    {
        // モデル名::テーブル全件取得
        $memos = Memo::all();
        return view('memos.index', ['memos' => $memos]);
    }
    
    public function create()
    {
        return view('memos.create');
    }

    public function store(MemoRequest $request)
    {
        // インスタンスの生成
        $memo = new Memo;

        // 値の用意
        $memo->title = $request->title;
        $memo->body  = $request->body;

        $memo->save();

        // 登録後、indexに戻る処理
        return redirect('/memos');
    }

    // showページへ移動
    public function show($id) 
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }

    public function edit($id)
    {
        $memo = Memo::find($id);
        return view('memos.edit', ['memo' => $memo]);
}

    public function update(MemoRequest $request, $id)
    {
        // ここはidで探して持ってくる
        $memo = Memo::find($id);

        $memo->title = $request->title;
        $memo->body  = $request->body;

        // 保存
        $memo->save();

        return redirect('/memos');
    }

    public function destroy($id)
    {
        $memo = Memo::find($id);
        $memo->delete();

        return redirect('/memos');
    }
}
