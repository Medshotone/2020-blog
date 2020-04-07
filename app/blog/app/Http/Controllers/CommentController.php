<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use App\Comment;
use App\Http\Requests\StoreCommentPostRequest;

class CommentController extends Controller
{
    public function storeCategoryComments(StoreCommentPostRequest $request)
    {
        $category = Category::findOrFail($request->parent_id);

        $comment = new Comment();
        $comment->author = $request->author;
        $comment->content = $request->content;

        $return_comment = $category->comments()->save($comment);

        return response()->json([
            'message' => 'Огромный успех! Новый комментарий создан',
            'comment' => $return_comment
        ]);
    }

    public function showCategoryComments(Category $category)
    {
        return response()->json($category->comments);
    }

    public function storeArticleComments(StoreCommentPostRequest $request)
    {
        $article = Article::findOrFail($request->parent_id);

        $comment = new Comment();
        $comment->author = $request->author;
        $comment->content = $request->content;

        $return_comment = $article->comments()->save($comment);

        return response()->json([
            'message' => 'Огромный успех! Новый комментарий создан',
            'comment' => $return_comment
        ]);
    }

    public function showArticleComments(Article $article)
    {
        return response()->json($article->comments);
    }
}
