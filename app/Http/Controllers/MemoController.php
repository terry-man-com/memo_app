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
    

    // showページへ移動
    public function show($id) 
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }
}
