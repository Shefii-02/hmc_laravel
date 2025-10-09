@extends('layouts.app')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Lab Result', 'url' => null], // current page
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))

    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Test Name</th>
                                <th>Test Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results ?? [] as $key => $result)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td class="text-capitalize">{{ $result->patient->full_name }}</td>
                                <td class="text-capitalize">{{ $result->test_name }}</td>
                                <td>{{ date('d-M-Y',strtotime($result->test_date)) }}</td>
                                <td class="text-center">
                                    <a href="{{ $result->file_url }}" download="{{ $result->test_name }}.pdf"><i class="bi bi-download text-primary fw-bold"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
