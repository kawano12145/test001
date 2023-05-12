<?php

namespace App\Http\Controllers;

use App\Model\Bbs as ModelBbs;
use Illuminate\Http\Request;
use App\Models\Model\Bbs;

class BbsController extends Controller
{
    // Indexページの表示
    public function index() {

      $bbs = Bbs::all();
        return view('bbs.index', ["bbs" => $bbs]);
    }

    // 投稿された内容を表示するページ
    public function create(Request $request) {


              // バリデーションチェック
              //名前 必須 10文字以内
              //コメント 必須 5文字以上、140文字以内
              $request->validate([
                'name' => 'required|max:20',
                'comment' => 'required|min:5|max:140',
            ]);


        // 投稿内容の受け取って変数に入れる
        $name = $request->input('name');
        $comment = $request->input('comment');
        Bbs::insert(["name" => $name, "comment" => $comment]); // データベーステーブルbbsに投稿内容を入れる

        $bbs = Bbs::all(); // 全データの取り出し
        return view('bbs.index', ["bbs" => $bbs]); // bbs.indexにデータを渡す

        // 変数をビューに渡す
        return view('bbs.index')->with([
            "name" => $name,
            "comment"  => $comment,
        ]);
    }

}
