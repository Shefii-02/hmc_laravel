<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\MediaHelper;

use Exception;
use Illuminate\Support\Facades\DB;

class VlogController extends Controller
{
    public function index()
    {
        $vlogs = Vlog::where('company_id', 1)->orderBy('order', 'asc')->paginate(20);
        return view('backend.vlogs.index', compact('vlogs'));
    }

    public function create()
    {
        return view('backend.vlogs.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
        ]);

        DB::beginTransaction();
        try {
            $thumbnailPath = null;
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = MediaHelper::uploadCompanyFile(1, 'vlogs', $request->file('thumbnail'));
            }

            $validated['company_id'] = 1;
            $validated['slug'] = Str::slug($validated['title']);
            $validated['thumbnail'] = $thumbnailPath;

            $video_url = null;
            if ($request->filled('video_url')) {
                $video_url = $this->getYouTubeVideoId($request->input('video_url'));
            }
            $validated['video_url'] = $video_url;

            Vlog::create($validated);

            DB::commit();
            return redirect()->route('admin.blogs.vlogs.index')->with('success', 'Vlog created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Creation failed: ' . $e->getMessage());
        }
    }

    public function edit(Vlog $vlog)
    {
        return view('backend.vlogs.form', compact('vlog'));
    }

    public function update(Request $request, Vlog $vlog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'nullable|url',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
        ]);

        try {
            if ($request->hasFile('thumbnail')) {
                if ($vlog->thumbnail) {
                    MediaHelper::removeCompanyFile($vlog->thumbnail);
                }
                $vlog->thumbnail = MediaHelper::uploadCompanyFile(1, 'vlogs', $request->file('thumbnail'));
            }
            if ($request->filled('video_url')) {
                $video_url = $this->getYouTubeVideoId($request->input('video_url'));
            }

            $validated['video_url'] = $video_url;

            $vlog->update([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'video_url' => $validated['video_url'] ?? null,
                'description' => $validated['description'] ?? null,
                'order' => $validated['order'] ?? 0,
                'published_at' => $validated['published_at'] ?? null,
                'status' => $validated['status'],
            ]);

            return redirect()->route('admin.blogs.vlogs.index')->with('success', 'Vlog updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    public function destroy(Vlog $vlog)
    {
        try {
            if ($vlog->thumbnail) {
                MediaHelper::removeCompanyFile($vlog->thumbnail);
            }
            $vlog->delete();

            return redirect()->route('admin.blogs.vlogs.index')->with('success', 'Vlog deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }

    protected function getYouTubeVideoId($url)
    {
        // Parse the URL
        $parsedUrl = parse_url($url);

        // Validate the host
        $validHosts = ['www.youtube.com', 'youtube.com', 'm.youtube.com', 'youtu.be'];
        if (!isset($parsedUrl['host']) || !in_array($parsedUrl['host'], $validHosts)) {
            return false; // Not a valid YouTube URL
        }

        // Handle short URLs (youtu.be)
        if ($parsedUrl['host'] === 'youtu.be') {
            return isset($parsedUrl['path']) ? ltrim($parsedUrl['path'], '/') : false;
        }

        // Handle YouTube Shorts URLs
        if (isset($parsedUrl['path']) && str_starts_with($parsedUrl['path'], '/shorts/')) {
            return str_replace('/shorts/', '', $parsedUrl['path']);
        }

        // Handle regular YouTube video URLs (youtube.com)
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
            return $queryParams['v'] ?? false;
        }

        return false; // No valid video ID found
    }
}
