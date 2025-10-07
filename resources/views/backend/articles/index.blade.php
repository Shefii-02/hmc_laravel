@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <!-- Breadcrumb starts -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    <i class="ri-home-3-line"></i>
                </a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                / Articles
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.blogs.articles.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add Articles
            </a>
        </div>
    </div>
@endsection


@section('content')
    <div class="container">
        <!-- Table starts -->
        <div class="table-responsive">
            <table id="scrollVertical" class="table m-0 align-middle">

                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $article->title }}</td>
                            <td>
                                @if ($article->image_url)
                                    <img src="{{ $article->image_url }}" width="100" class="rounded">
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $article->status == 'published' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($article->status) }}
                                </span>
                            </td>
                            <td>{{ $article->order }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.blogs.articles.edit', $article->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form action="{{ route('admin.blogs.articles.destroy', $article->id) }}"
                                        id="form_{{ $article->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $article->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No articles found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
