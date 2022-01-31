<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $queryBuilder)
	{
		$news = News::select(News::$availableFields)->get();
		return view('news.index', [
			'newsList' => $news
		]);
	}

	public function show(News $news)
	{
		return view('news.show', [
			'news' => $news
		]);
	}
}
