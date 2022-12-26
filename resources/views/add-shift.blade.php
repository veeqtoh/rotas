@extends('layouts.layout')

@section('title')
    <title>Add Shift - Admin portal</title>
@endsection

@section('addShift')
    active
@endsection

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="mb-2 col-sm mb-sm-0">
                        <h1 class="page-header-title">Add Shifts</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('rotas') }}">Rota</a></li>
                            <li class="breadcrumb-item active">Create new shift</li>
                        </ul>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="{{ route('rotas') }}">
                  <i class="bi-calendar me-1"></i> Rota
                </a>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->

            <livewire:shifts/>

        </div>
        <!-- End Content -->

        @include('layouts.includes.footer')

    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#myID", {
                altInput: true,
                altFormat: "F j, Y",
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                mode: "range",
            });
        });
    </script>
@endpush
