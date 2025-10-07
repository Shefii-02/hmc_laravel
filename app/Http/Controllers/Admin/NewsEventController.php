<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\MediaHelper;
use Exception;
use Illuminate\Support\Facades\DB;

class NewsEventController extends Controller
{
    public function index()
    {
        $newsEvents = NewsEvent::where('company_id', 1)
            ->orderBy('published_at', 'desc')
            ->paginate(20);
        return view('backend.news_events.index', compact('newsEvents'));
    }

    public function create()
    {
        return view('backend.news_events.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer',
            'status' => 'required|in:draft,published',
        ]);

        DB::beginTransaction();
        try {
            $fileId = null;
            if ($request->hasFile('image_file')) {
                $fileId = MediaHelper::uploadCompanyFile(1, 'news_events', $request->file('image_file'));
            }

            $validated['company_id'] = 1;
            $validated['slug'] = Str::slug($validated['title']);
            $validated['image'] = $fileId;

            NewsEvent::create($validated);

            DB::commit();

            return redirect()->route('admin.blogs.news-events.index')->with('success', 'News/Event created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Creation failed: ' . $e->getMessage());
        }
    }

    public function edit(NewsEvent $newsEvent)
    {
        return view('backend.news_events.form', compact('newsEvent'));
    }

    public function update(Request $request, NewsEvent $newsEvent)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer',
            'status' => 'required|in:draft,published',
        ]);

        try {
            if ($request->hasFile('image_file')) {
                if ($newsEvent->image) {
                    MediaHelper::removeCompanyFile($newsEvent->image);
                }
                $fileId = MediaHelper::uploadCompanyFile(1, 'news_events', $request->file('image_file'));
                $newsEvent->image = $fileId;
            }

            $newsEvent->update([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'description' => $validated['description'] ?? null,
                'published_at' => $validated['published_at'] ?? null,
                'order' => $validated['order'] ?? 0,
                'status' => $validated['status'],
            ]);

            return redirect()->route('admin.blogs.news-events.index')->with('success', 'News/Event updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    public function destroy(NewsEvent $newsEvent)
    {
        try {
            if ($newsEvent->image) {
                MediaHelper::removeCompanyFile($newsEvent->image);
            }
            $newsEvent->delete();

            return redirect()->route('admin.blogs.news-events.index')->with('success', 'News/Event deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }
}
