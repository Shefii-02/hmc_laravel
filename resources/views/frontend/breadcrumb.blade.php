<!-- Breadcrumb Section -->
<div class="page-breadcrumb py-5 text-white" style="background: linear-gradient(rgb(75 185 233 / 89%), rgb(142 199 66))">
  <div class="container text-center">
    <h1 class="fw-bold mb-2">{{ $breadcrumbs[count($breadcrumbs)-1]['title'] }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        @foreach($breadcrumbs as $item)
            @if($loop->last)
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $item['title'] }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $item['url'] }}" class="text-white text-decoration-none">{{ $item['title'] }}</a></li>
            @endif
        @endforeach
      </ol>
    </nav>
  </div>
</div>
