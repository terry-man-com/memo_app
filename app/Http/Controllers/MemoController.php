<?php

namespace App\Http\Controllers;

// Memoクラスを読み込む
use App\Models\Memo;
use Illuminate\Http\Request;

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

    public function store(Request $request)
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
}
