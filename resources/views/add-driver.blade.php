@extends('layouts.layout')

@section('title')
    <title>Add Driver - Admin portal</title>
@endsection

@section('addDriver')
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
                        <h1 class="page-header-title">Add Driver</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('drivers') }}">Drivers overview</a></li>
                            <li class="breadcrumb-item active">Create new driver account</li>
                        </ul>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="{{ route('drivers') }}">
                  <i class="bi-people me-1"></i> Drivers Overview
                </a>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->

            <livewire:driver-wizard/>

        </div>
        <!-- End Content -->

        @include('layouts.includes.footer')

    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
