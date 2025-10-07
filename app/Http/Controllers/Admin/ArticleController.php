<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\MediaHelper;
use DB;
use Exception;
use Illuminate\Support\Facades\DB as FacadesDB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('company_id', 1)
            ->orderBy('order', 'asc')
            ->paginate(20);

        return view('backend.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('backend.articles.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer',
            'status' => 'required|in:draft,published',
        ]);

        DB::beginTransaction();
        try {
            $fileId = null;
            if ($request->hasFile('image')) {
                $fileId = MediaHelper::uploadCompanyFile(1, 'articles', $request->file('image'));
            }

            $validated['company_id'] = 1;
            $validated['slug'] = Str::slug($validated['title']);
            $validated['image'] = $fileId;

            Article::create($validated);

            DB::commit();
            return redirect()->route('admin.blogs.articles.index')->with('success', 'Article created successfully.');
        } catch (Exception $e) {
            FacadesDB::rollBack();
            return redirect()->back()->with('error', 'Creation failed: ' . $e->getMessage());
        }
    }

    public function edit(Article $article)
    {
        return view('backend.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer',
            'status' => 'required|in:draft,published',
        ]);

        try {
            if ($request->hasFile('image')) {
                if ($article->image) {
                    MediaHelper::removeCompanyFile($article->image);
                }
                $fileId = MediaHelper::uploadCompanyFile(1, 'articles', $request->file('image'));
                $article->image = $fileId;
            }

            $article->update([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'content' => $validated['content'] ?? null,
                'order' => $validated['order'] ?? 0,
                'status' => $validated['status'],
            ]);

            return redirect()->route('admin.blogs.articles.index')->with('success', 'Article updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    public function destroy(Article $article)
    {
        try {
            if ($article->image) {
                MediaHelper::removeCompanyFile($article->image);
            }
            $article->delete();

            return redirect()->route('admin.blogs.articles.index')->with('success', 'Article deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }
}
