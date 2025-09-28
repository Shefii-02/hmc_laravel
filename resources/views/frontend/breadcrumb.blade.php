<!-- Breadcrumb Section -->
<div class="page-breadcrumb py-5 text-white" style="background: linear-gradient(rgb(75 185 233 / 89%), rgb(142 199 66)), url(https://via.placeholder.com/1600x400) center / cover no-repeat;">
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

<!-- Corporate Style Page Header -->
{{-- <div class="page-header py-4 bg-light border-bottom" style="background: linear-gradient(rgb(75 185 233 / 89%), rgb(142 199 66)), url(https://via.placeholder.com/1600x400) center / cover no-repeat;">
  <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">

    <!-- Page Title (Left) -->
    <h1 class="h3 fw-bold mb-2 mb-md-0">Our Departments</h1>

    <!-- Breadcrumb (Right) -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Services</a></li>
        <li class="breadcrumb-item active text-dark" aria-current="page">Departments</li>
      </ol>
    </nav>

  </div>
</div> --}}
