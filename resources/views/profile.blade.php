@extends('layouts.layout')

@section('title')
    <title>{{ ($user->driver) ? $user->driver->first_name.' '.$user->driver->last_name : $user->customer->first_name.' '.$user->customer->last_name }} | N.U.E Portal</title>
@endsection

@if(Auth::id() == $user->id)
    @section('profile')
        active
    @endsection
@else
    @section('drivers')
        active
    @endsection
@endif

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <div class="row justify-content-lg-center">
                <div class="col-lg-10">
                    <!-- Profile Cover -->
                    <div class="profile-cover">
                        <div class="profile-cover-img-wrapper">
                            <img class="profile-cover-img" src="{{ $user->bannerUrl() }}" alt="Banner" />
                        </div>
                    </div>
                    <!-- End Profile Cover -->

                    <!-- Profile Header -->
                    <div class="text-center mb-5">
                        <!-- Avatar -->
                        <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
                            <img class="avatar-img" src="{{ $user->avatarUrl() }}" alt="avatar" />
                            <span class="avatar-status avatar-status-success"></span>
                        </div>
                        <!-- End Avatar -->

                        <h1 class="page-header-title">{{ ($user->driver) ? $user->driver->first_name.' '.$user->driver->last_name : $user->customer->first_name.' '.$user->customer->last_name }}
                            <i class="{{ ($user->isActive()) ? 'bi-patch-check-fill text-primary' : ''}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i>
                        </h1>

                        <!-- List -->
                        <ul class="list-inline list-px-2">
                            <li class="list-inline-item">
                                <i class="bi-building me-1"></i>
                                <span>{{ ($user->driver) ? 'driver' : '' }}</span>
                            </li>

                            <li class="list-inline-item">
                                <i class="bi-calendar-week me-1"></i>
                                <span>Created {{ $user->created_at->diffForHumans() }}</span>
                            </li>
                        </ul>
                        <!-- End List -->
                    </div>
                    <!-- End Profile Header -->

                    <livewire:user-profile :user="$user"/>

                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Content -->

        @include('layouts.includes.footer')
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
