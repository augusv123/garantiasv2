<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class TestController extends Controller
{
	public function view($id)
	{
		//dd($id); //helper de laravel tipo vardump
		$article = Article::find($id);

		$article->category;
		$article->tags;
		$article->user;

		return view('test.index', ['article' => $article]);
	}
}
