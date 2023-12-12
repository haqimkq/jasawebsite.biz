<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SpunArticle;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('spunArticles')->get();
        return view('master.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('master.articles.create');
    }

    public function store(Request $request)
    {
        $titleText = $request->input('title');
        $articleText = $request->input('article');

        $article = new Article();
        $article->article = $articleText;
        $article->title = $titleText;
        $article->save();
        return redirect()->route('articles.index');
    }

    public function generate($article, Request $request)
    {
        $count = $request->count;
        $articles = Article::findOrFail($article);
        $articleText = $articles->article;
        $titleText = $articles->title;
        $spunArticles = $this->generateSpunArticles($articleText, $titleText, $count);
        $uniqueSpunArticles = array_unique($spunArticles);

        foreach ($uniqueSpunArticles as $spunArticle) {
            $articles->spunArticles()->create([
                'spun_article' => $spunArticle,
                'spun_title' => $this->spinText($titleText),
            ]);
        }

        return redirect()->route('articles.index');
    }


    private function generateSpunArticles($articleText, $titleText, $count)
    {
        $spunArticles = [];
        for ($i = 0; $i < $count; $i++) {
            $spunArticles[] = $this->spinText($articleText, $titleText);
        }
        return $spunArticles;
    }


    private function spinText($text, $titleText = null)
    {
        $pattern = '/{([^{}]*)}/';
        while (preg_match($pattern, $text, $matches)) {
            $options = explode('|', $matches[1]);
            $selectedOption = $options[array_rand($options)];
            $text = preg_replace($pattern, $selectedOption, $text, 1);
        }

        if ($titleText) {
            $text = str_replace('{title}', $titleText, $text); // Replace {title} placeholder with actual title
        }

        return $text;
    }

    public function edit(Article $article)
    {
        return view('master.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate(
            [
                'title' => 'required',
                'article' => 'required',
            ]
        );
        // dd($request);
        $article->fill($request->post())->save();
        return redirect()->route('articles.index')->with(['success' => 'Artikel Berhasil Dirubah']);
    }

    public function destroy($article)
    {
        $item = Article::findOrFail($article);
        echo ($item);
        $item->delete();
        return redirect()->back()->with(['success' => 'Artikel Berhasil Dihapus']);
    }

    public function generateShow($article)
    {
        $spin = Article::with('spunArticles')->where('id', $article)->get();
        return view('master.articles.show', compact('spin'));
    }
    public function generateEdit(SpunArticle $article)
    {
        return view('master.articles.generateEdit', compact('article'));
    }

    public function generateUpdate(Request $request, SpunArticle $article)
    {
        $request->validate(
            [
                'spun_title' => 'required',
                'spun_article' => 'required',
            ]
        );
        $article->fill($request->post())->save();
        return redirect()->route('article.show', $article->article_id)->with(['success' => 'Artikel Berhasil Dirubah']);
    }

    public function artikel()
    {
        $article = SpunArticle::first();
        return view('master.articles.article', compact('article'));
    }
}
