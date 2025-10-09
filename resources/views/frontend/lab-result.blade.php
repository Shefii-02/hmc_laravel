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
                <div class="col-lg-6">
                    <form action="{{ route('lab-result-get') }}" method="POST">
                        @csrf
                        <div class="card rounded-5 shadow-lg p-3">
                            <div class="card-body">
                                <div id="patientDetails">
                                    <h5>Patient Information</h5>
                                    <input type="hidden" name="patient_id" id="patient_id">
                                    <div class="mb-3">
                                        <label class="form-label">Patient Name</label>
                                        <input type="text" name="full_name" id="full_name" required class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" name="phone" id="phone" required class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" id="email" required class="form-control">
                                    </div>
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
