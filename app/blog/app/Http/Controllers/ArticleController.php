<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\BlogPost;

class ArticleController extends Controller
{
    public function index()
    {
        return view('blog.articles.index', [
            'articles' => Article::paginate(10)
        ]);
    }

    public function article(Article $article)
    {
        return view('blog.articles.article', [
            'article' => $article
        ]);
    }

    public function create()
    {
        return view('blog.articles.create', [
            'article'    => [],
            'categories' => Category::all()
        ]);
    }

    public function store(BlogPost $request)
    {
        $inputs = $request->all();

        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();

            $move_file = $file->move('files', $name);

            $inputs['file'] = $move_file->getPathname();
        }

        $article = Article::create($inputs);

        if ($request->input('categories')) {
            $article->categories()->attach($request->input('categories'));
        }

        return redirect()->route('article.index');
    }

    public function edit(Article $article)
    {
        return view('blog.articles.edit', [
            'article'    => $article,
            'categories' => Category::all()
        ]);
    }

    public function update(BlogPost $request, Article $article)
    {

        $inputs = $request->all();

        if ($file = $request->file('fileUpload')) {
            $name = $file->getClientOriginalName();

            $move_file = $file->move('files', $name);

            $inputs['file'] = $move_file->getPathname();
        }

        $article->update($inputs);

        $article->categories()->detach();

        if ($request->input('categories')) {
            $article->categories()->attach($request->input('categories'));
        }

        return redirect()->route('article.index');
    }

    public function destroy(Article $article)
    {
        $article->categories()->detach();

        $article->delete();

        return redirect()->route('article.index');
    }
}
