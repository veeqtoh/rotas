@extends('layouts.layout')

@section('title')
    <title>Rotas - Admin portal</title>
@endsection

@section('rotas')
    active
@endsection

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="page-header-title">Rotas</h1>
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                        <a class="btn btn-primary" href="{{ route('addShift') }}">
                            <i class="bi-calendar-plus-fill me-1"></i> New Shift
                        </a>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->

            <!-- Card -->
            <div class="mb-3 card mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <div class="row justify-content-between align-items-center flex-grow-1">
                        <div class="col-md">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-header-title">Rota & Shifts</h4>


                            </div>
                        </div>
                        <!-- End Col -->


                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Header -->

                <div class="content container-fluid">
                    <div id="calendar"></div>
                </div>

            </div>
            <!-- End Card -->


        </div>
        <!-- End Content -->

        @include('layouts.includes.footer')
    </main>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                initialView: 'timeGridWeek',
                slotMinTime: '8:00:00',
                slotMaxTime: '24:00:00',
                displayEventEnd: true,
                events: @json($events),
            });
            calendar.render();
        });
    </script>
@endpush
