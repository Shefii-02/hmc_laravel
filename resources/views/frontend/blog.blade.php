@extends('layouts.app')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Blog', 'url' => null],
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))

    <div class="container py-5">
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-4" id="blogTab" role="tablist">
            @foreach ($tabs as $key => $tabItem)
                <li class="nav-item" role="presentation">
                    <a href="{{ url('blog') . '?tab=' . $key }}"
                        class="nav-link {{ $tab === $key ? 'active' : '' }}" role="tab"
                        aria-selected="{{ $tab === $key ? 'true' : 'false' }}">
                        <i class="{{ $tabItem['icon'] }} me-1"></i> {{ $tabItem['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content">
            <div class="tab-pane fade show active">
                @if ($tab === 'vlogs')
                    <!-- 🎥 Vlogs Section -->
                    <div class="row g-4">
                        @forelse ($items as $vlog)
                            <div class="col-md-6 col-lg-4">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="ratio ratio-16x9">
                                        <iframe
                                            src="https://www.youtube.com/embed/{{ Str::afterLast($vlog->video_url, '=') }}"
                                            title="{{ $vlog->title }}" allowfullscreen></iframe>
                                    </div>
                                    {{-- <div class="card-body">
                                        <h5 class="card-title">{{ $vlog->title }}</h5>
                                        <p class="card-text text-muted">{{ Str::limit($vlog->description ?? '', 80) }}</p>
                                    </div> --}}
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center">No vlogs found.</p>
                        @endforelse
                    </div>

                @else
                    <!-- 📰 Articles / News Section -->
                    <div class="row g-4">
                        @forelse ($items as $item)
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <img src="{{ $item->image_url ?? 'https://via.placeholder.com/350x200' }}"
                                        class="card-img-top" alt="{{ $item->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <p class="card-text text-muted">{{ Str::limit($item->description ?? '', 100) }}</p>
                                        <a href="{{ route('blog.show', $item->slug) }}" class="btn  btn-sm">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center">No {{ $tab }} found.</p>
                        @endforelse
                    </div>
                @endif

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $items->appends(['tab' => $tab])->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
