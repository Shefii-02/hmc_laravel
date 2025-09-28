@extends('layouts.app')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            // ['title' => 'Services', 'url' => '/services'], // optional
            ['title' => 'Blog', 'url' => null], // current page
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))

    @php
        $tabs = [
            'news-and-events' => ['title' => 'News & Events', 'icon' => 'bi bi-newspaper'],
            'articles' => ['title' => 'Articles', 'icon' => 'bi bi-journal-text'],
            'vlogs' => ['title' => 'Vlogs', 'icon' => 'bi bi-camera-video'],
        ];

        $currentTab = request()->query('tab', 'news-and-events');
    @endphp




    <!-- Tabs Navigation -->
    <div class="container py-5">
        <ul class="nav nav-tabs mb-4" id="blogTab" role="tablist">
            @foreach ($tabs as $key => $tabItem)
                <li class="nav-item" role="presentation">
                    <a href="{{ url()->current() . '?tab=' . $key }}"
                        class="nav-link {{ $currentTab === $key ? 'active' : '' }}" role="tab"
                        aria-selected="{{ $currentTab === $key ? 'true' : 'false' }}">
                        <i class="{{ $tabItem['icon'] }} me-1"></i> {{ $tabItem['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content">
            <div class="tab-pane fade show active">
                <div class="row g-4">
                    @foreach ($items  ?? [] as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="{{ $item->image_url ?? 'https://via.placeholder.com/350x200' }}"
                                    class="card-img-top" alt="{{ $item->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($item->description ?? '', 100) }}</p>
                                    <a href="{{ route('blog.show', $item->slug) }}" class="btn btn-primary btn-sm">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ isset($items) ? $items->appends(['tab' => $currentTab])->links() : '' }}
                </div>
            </div>
        </div>
    </div>

@endsection
