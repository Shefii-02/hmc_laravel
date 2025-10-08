@extends('layouts.app')
@section('content')

@php
    $breadcrumbs = [
        ['title' => 'Home', 'url' => '/'],
        ['title' => 'Blog', 'url' => route('blog')],
        ['title' => ucfirst($type), 'url' => null],
    ];
@endphp

@include('frontend.breadcrumb', compact('breadcrumbs'))

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $item->title }}</h2>
            <p class="text-muted mb-4">{{ $item->created_at->format('M d, Y') }}</p>

            <img src="{{ $item->image_url }}"
                 class="img-fluid rounded mb-4" alt="{{ $item->title }}">

            <div class="content">
                {!! $item->content !!}
            </div>

            <a href="{{ route('blog', ['tab' => $type . 's']) }}" class="btn btn-outline-primary mt-4">
                ← Back to {{ ucfirst($type) }}s
            </a>
        </div>
    </div>
</div>

@endsection
