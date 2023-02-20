<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\BoardCreateRequest;


class PostController extends Controller
{

    //indexメソッド
    public function index(){
        $list = DB::table('posts')->get();
        return view('post.index',['list' => $list]);
    }


    //新規投稿表示メソッド(create-form)
    public function createForm(){
        return view('post.createForm');
    }


    // 新規作成(create)
    public function create(Request $request){
        $request->validate([
            'newName' => 'required|string|regex:/^[^#<>0-9０-９　]+$/u',
            'newPost' => 'required|string|max:100|regex:/^[^#<>　^;_]/u'
        ],
        [
            'newName.required' => '※名前は入力必須です。',
            'newName.regex' => '※名前は正しい形式で入力してください。',
            'newPost.required' => '※投稿内容は入力必須です。',
            'newPost.regex' => '※投稿内容は正しい形式で入力してください。',
            'newPost.max' => '※投稿内容は100文字以内で入力してください。'
        ]);

        $name = $request->input('newName');
        $post = $request->input('newPost');

        DB::table('posts')->insert(['user_name' => $name,
            'contents' => $post
        ]);
        return redirect('/index');
    }


    // 検索フォーム(search)
    public function search(Request $request){
        if(empty($keyword)){
            $keyword = $request->input('keyword');
            $list = DB::table('posts')
                ->where('contents','like','%'.$keyword.'%')
                ->get();
            return view('post.index',['list' => $list]);
        }elseif(!empty($keyword)){
            $keyword = $request->input('keyword');
            $list = DB::table('posts')->get();
            return view('post.index',['list' => $list]);
        }
    }


    // 更新ページ(update-form)
    public function updateForm($id){
        $post = DB::table('posts')
        ->where('id', $id)
        ->first();
        return view('post.updateForm', ['post' => $post]);
    }


    // 更新機能(update)
    public function update(Request $request){
        $request->validate([
            'upName' => 'required|string|regex:/^[^#<>0-9０-９　]+$/u',
            'upPost' => 'required|string|max:100|regex:/^[^#<>　^;_]/u'
        ],
        [
            'upName.required' => '※名前は入力必須です。',
            'upName.regex' => '※名前は正しい形式で入力してください。。',
            'upPost.required' => '※投稿内容は入力必須です。',
            'upPost.regex' => '※投稿内容正しい形式で入力してください。',
            'upPost.max' => '※投稿内容は100文字以内で入力してください。'
        ]);

        $param = [
            'user_name' => $request->upName,
            'contents' => $request->upPost,
        ];
        DB::table('posts')
        ->where('id',$request->id)
        ->update($param);
        return redirect('/index');
    }


    // 削除(delete)
    public function delete($id){
        DB::table('posts')
        ->where('id',$id)
        ->delete();
        return redirect('/index');
    }


}
