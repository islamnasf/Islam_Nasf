<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use Illuminate\Support\Facades\Auth; //ده مسار الauth
use Illuminate\Http\Request;

use App\Http\Requests;

class manage extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddArticle(Request $REQUEST){
        if($REQUEST -> isMethod('post')){
            $ar =new Article();
            $ar ->title=$REQUEST->input('title');
            $ar ->body=$REQUEST->input('body');
            $ar ->user_id=Auth::user()->id;
            $ar->save();
        return view('manage.AddArticle');


        }
       /* if($REQUEST -> isMethod('post')){
            $ar = new Article();
            $ar -> title=$REQUEST->input('title');
            $ar -> body=$REQUEST->input('body');
            $ar ->user_id=Auth::user()->id;
            $ar->save();
            return redirect('home');
        }*/
        return view('manage.AddArticle');
    }
    public function view(){
        $articles=Article::all();
        $ar=array('articles'=>$articles);
        return view('manage.view',$ar);
    }
    /*public function read(REQUEST $request , $id){
        if($request -> isMethod('post')){
            $ar=new Comment();
            $ar -> comment=$request->input('body');
            $ar -> article_id =  $id;
            $ar->save();

            
        }
        $articles=Article::find('id');
        $ar=Array('article'=>$articles);

        return view("manage.read",$ar);
    }*/

    public  function  read(Request $request ,$id){
        if ($request->isMethod('post')){
            $ar= new Comment();
            $ar->comment=$request->input('body');

            $ar->article_id= $id;

            $ar->save();
            // return redirect("view");
        }

       $article=Article::find($id);
       $comments = DB::select('select * from comments');
       $co=Array('comments'=>$comments);



        $ar=Array('article'=>$article);

        return view("manage.read",$ar,$co );
    }

}
