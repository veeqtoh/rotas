@extends('layouts.layout')

@section('title')
    <title>Dashboard - Admin portal</title>
@endsection

@section('dashboard')
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
                        <h1 class="page-header-title">Dashboard</h1>
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                        <a class="btn btn-primary" href="{{ route('addDriver') }}">
                            <i class="bi-person-plus-fill me-1"></i> Add drivers
                        </a>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->

            <!-- Stats -->
            <div class="row">
                <div class="mb-3 col-sm-6 col-lg-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="{{ route('drivers') }}">
                        <div class="card-body">
                            <h6 class="card-subtitle">Total Users</h6>

                            <div class="mb-1 row align-items-center gx-2">
                                <div class="col-6">
                                    {{--  <h2 class="card-title text-inherit">{{ $usersCount }}</h2>  --}}
                                </div>
                                <!-- End Col -->

                                <div class="col-6">
                                    <!-- Chart -->
                                    <div class="chartjs-custom" style="height: 3rem;">
                                        <canvas class="js-chart" data-hs-chartjs-options='{
                                            "type": "line",
                                            "data": {
                                                "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                                "datasets": [{
                                                    "data": [21,20,24,20,18,17,15,17,18,30,31,30,30,35,25,35,35,40,60,90,90,90,85,70,75,70,30,30,30,50,72],
                                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                                    "borderColor": "#377dff",
                                                    "borderWidth": 2,
                                                    "pointRadius": 0,
                                                    "pointHoverRadius": 0
                                                    }]
                                                },
                                                "options": {
                                                    "scales": {
                                                        "yAxes": [{
                                                        "display": false
                                                        }],
                                                        "xAxes": [{
                                                        "display": false
                                                        }]
                                                    },
                                                    "hover": {
                                                    "mode": "nearest",
                                                    "intersect": false
                                                    },
                                                    "tooltips": {
                                                    "postfix": "k",
                                                    "hasIndicator": true,
                                                    "intersect": false
                                                    }
                                                }
                                            }'>
                                        </canvas>
                                    </div>
                                    <!-- End Chart -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->

                            <span class="badge bg-soft-success text-success">
                                <i class="bi-graph-up"></i> 12.5%
                            </span>
                            <span class="text-body fs-6 ms-1">admins & drivers inclusive</span>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>

                <div class="mb-3 col-sm-6 col-lg-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="#">
                        <div class="card-body">
                            <h6 class="card-subtitle">Rotas</h6>

                            <div class="mb-1 row align-items-center gx-2">
                                <div class="col-6">
                                    <h2 class="card-title text-inherit">92,913</h2>
                                </div>
                                <!-- End Col -->

                                <div class="col-6">
                                    <!-- Chart -->
                                    <div class="chartjs-custom" style="height: 3rem;">
                                        <canvas class="js-chart" data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                    "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                    "datasets": [{
                                    "data": [21,20,24,15,17,30,30,35,35,35,40,60,12,90,90,85,70,75,43,75,90,22,120,120,90,85,100,92,92,92,92],
                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                    }]
                                },
                                "options": {
                                    "scales": {
                                        "yAxes": [{
                                        "display": false
                                        }],
                                        "xAxes": [{
                                        "display": false
                                        }]
                                    },
                                    "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                    },
                                    "tooltips": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                    }
                                }
                                }'>
                        </canvas>
                                    </div>
                                    <!-- End Chart -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->

                            <span class="badge bg-soft-secondary text-body">0.0%</span>
                            <span class="text-body fs-6 ms-1">from 2,913</span>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
            </div>
            <!-- End Stats -->

            <!-- Card -->
            <div class="mb-3 card mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <div class="row justify-content-between align-items-center flex-grow-1">
                        <div class="col-md">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-header-title">User Accounts</h4>

                                <!-- Datatable Info -->
                                <div id="datatableCounterInfo" style="display: none;">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-6 me-3">
                                            <span id="datatableCounter">0</span> Selected
                                        </span>
                                        <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                                            <i class="tio-delete-outlined"></i> Delete
                                        </a>
                                    </div>
                                </div>
                                <!-- End Datatable Info -->
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <!-- Filter -->
                            <div class="row align-items-sm-center">
                                <div class="col-sm-auto">
                                    <div class="row align-items-center gx-0">
                                        <div class="col">
                                            <span class="text-secondary me-2">Status:</span>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Select -->
                                            <div class="tom-select-custom tom-select-custom-end">
                                                <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="2" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                                                        "searchInDropdown": false,
                                                        "hideSearch": true,
                                                        "dropdownWidth": "10rem"
                                                        }'>
                                                    <option value="null" selected>All</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-auto">
                                    <div class="row align-items-center gx-0">
                                        <div class="col">
                                            <span class="text-secondary me-2">Signed up:</span>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Select -->
                                            <div class="tom-select-custom tom-select-custom-end">
                                                <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="5" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                                                            "searchInDropdown": false,
                                                            "hideSearch": true,
                                                            "dropdownWidth": "10rem"
                                                            }'>
                                                    <option value="null" selected>All</option>
                                                    <option value="1 year ago">1 year ago</option>
                                                    <option value="6 months ago">6 months ago</option>
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                </div>
                                <!-- End Col -->

                                <div class="col-md">
                                    <form>
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend input-group-text">
                                                <i class="bi-search"></i>
                                            </div>
                                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                                        </div>
                                        <!-- End Search -->
                                    </form>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Filter -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Header -->

                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                        "columnDefs": [{
                        "targets": [0, 1, 4],
                        "orderable": false
                        }],
                        "order": [],
                        "info": {
                        "totalQty": "#datatableWithPaginationInfoTotalQty"
                        },
                        "search": "#datatableSearch",
                        "entries": "#datatableEntries",
                        "pageLength": 8,
                        "isResponsive": false,
                        "isShowPaging": false,
                        "pagination": "datatablePagination"
                    }'>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="table-column-pe-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                        <label class="form-check-label" for="datatableCheckAll"></label>
                                    </div>
                                </th>
                                <th class="table-column-ps-0">Full name</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Signed up</th>
                                <th>Last logged in</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($allUsers as $user)
                            <tr>
                                <td class="table-column-pe-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="usersDataCheck16">
                                        <label class="form-check-label" for="usersDataCheck16"></label>
                                    </div>
                                </td>
                                <td class="table-column-ps-0">
                                    <a class="d-flex align-items-center" href="{{ route('profile', $user) }}">
                                        <div class="flex-shrink-0">
                                            <div class="avatar avatar-sm avatar-soft-danger avatar-circle">
                                                {{--  <span class="avatar-initials">M</span>  --}}
                                                <img class="avatar-img" src="{{ $user->avatarUrl() }}" alt="{{ $user->username }}">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="mb-0 text-inherit">{{ ($user->driver) ? $user->driver->first_name.' '.$user->driver->last_name : $user->admin->first_name.' '.$user->admin->last_name }}</h5>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <span class="legend-indicator {{  ($user->isActive()) ? 'bg-success' : 'bg-warning' }}"></span>{{  ($user->isActive()) ? 'Active' : 'Inactive' }}
                                </td>
                                <td>
                                    <span class="mb-0 d-block h5">{{ ($user->driver) ? 'Driver' : 'Admin' }}</span>
                                    {{--  <span class="d-block fs-5">{{ ($user->driver) ? $user->driver->department->name : ''}}</span>  --}}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ $user->last_login ? $user->last_login->diffForHumans() : 'Never logged in' }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <!-- Pagination -->
                    <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                        <div class="mb-2 col-sm mb-sm-0">
                            <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                <span class="me-2">Showing:</span>

                                <!-- Select -->
                                <div class="tom-select-custom">
                                    <select id="datatableEntries" class="w-auto js-select form-select form-select-borderless" autocomplete="off" data-hs-tom-select-options='{
                                                "searchInDropdown": false,
                                                "hideSearch": true
                                            }'>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                        <option value="8" selected>8</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <!-- End Select -->

                                <span class="text-secondary me-2">of</span>

                                <!-- Pagination Quantity -->
                                <span id="datatableWithPaginationInfoTotalQty"></span>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-sm-auto">
                            <div class="d-flex justify-content-center justify-content-sm-end">
                                <!-- Pagination -->
                                <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Pagination -->
                </div>
                <!-- End Footer -->
            </div>
            <!-- End Card -->

            <div class="row">
                <div class="mb-3 col-lg-6 mb-lg-0">
                    <!-- Card -->
                    <div class="card h-100">
                        <!-- Header -->
                        <div class="card-header card-header-content-sm-between">
                            <h4 class="mb-2 card-header-title mb-sm-0">Transactions</h4>

                            <!-- Daterangepicker -->
                            <button id="js-daterangepicker-predefined" class="btn btn-ghost-secondary btn-sm dropdown-toggle">
                                <i class="bi-calendar-week"></i>
                                <span class="js-daterangepicker-predefined-preview ms-1"></span>
                            </button>
                            <!-- End Daterangepicker -->
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="mx-auto chartjs-custom" style="height: 20rem;">
                                <canvas class="js-chart-datalabels" data-hs-chartjs-options='{
                                "type": "bubble",
                                "data": {
                                    "datasets": [
                                    {
                                        "label": "Label 1",
                                        "data": [
                                        {"x": 55, "y": 65, "r": 99}
                                        ],
                                        "color": "#fff",
                                        "backgroundColor": "rgba(55, 125, 255, 0.9)",
                                        "borderColor": "transparent"
                                    },
                                    {
                                        "label": "Label 2",
                                        "data": [
                                        {"x": 33, "y": 42, "r": 65}
                                        ],
                                        "color": "#fff",
                                        "backgroundColor": "rgba(100, 0, 214, 0.8)",
                                        "borderColor": "transparent"
                                    },
                                    {
                                        "label": "Label 3",
                                        "data": [
                                        {"x": 46, "y": 26, "r": 38}
                                        ],
                                        "color": "#fff",
                                        "backgroundColor": "#00c9db",
                                        "borderColor": "transparent"
                                    }
                                    ]
                                },
                                "options": {
                                    "scales": {
                                    "yAxes": [{
                                        "gridLines": {
                                        "display": false
                                        },
                                        "ticks": {
                                        "display": false,
                                        "max": 100,
                                        "beginAtZero": true
                                        }
                                    }],
                                    "xAxes": [{
                                    "gridLines": {
                                        "display": false
                                        },
                                        "ticks": {
                                        "display": false,
                                        "max": 100,
                                        "beginAtZero": true
                                        }
                                    }]
                                    },
                                    "tooltips": false
                                }
                                }'></canvas>
                            </div>
                            <!-- End Chart -->

                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <span class="legend-indicator bg-primary"></span> New
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                    <span class="legend-indicator" style="background-color: #7000f2;"></span> Pending
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                    <span class="legend-indicator bg-info"></span> Failed
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-6">
                    <!-- Card -->
                    <div class="card h-100">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title">Reports overview</h4>

                            <!-- Dropdown -->
                            <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="reportsOverviewDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="mt-1 dropdown-menu dropdown-menu-end" aria-labelledby="reportsOverviewDropdown1">
                                    <span class="dropdown-header">Settings</span>

                                    <a class="dropdown-item" href="#">
                                        <i class="bi-share-fill dropdown-item-icon"></i> Share reports
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-download dropdown-item-icon"></i> Download
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-alt dropdown-item-icon"></i> Connect other apps
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <span class="dropdown-header">Feedback</span>

                                    <a class="dropdown-item" href="#">
                                        <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                    </a>
                                </div>
                            </div>
                            <!-- End Dropdown -->
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <span class="mb-4 h1 d-block">$7,431.14 USD</span>

                            <!-- Progress -->
                            <div class="mb-2 progress rounded-pill">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Gross value"></div>
                                <div class="opacity-50 progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Net volume from sales"></div>
                                <div class="opacity-25 progress-bar" role="progressbar" style="width: 9%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="New volume from sales"></div>
                            </div>

                            <div class="mb-4 d-flex justify-content-between">
                                <span>0%</span>
                                <span>100%</span>
                            </div>
                            <!-- End Progress -->

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-lg table-nowrap card-table">
                                    <tr>
                                        <th scope="row">
                                            <span class="legend-indicator bg-primary"></span>Gross value
                                        </th>
                                        <td>$3,500.71</td>
                                        <td>
                                            <span class="badge bg-soft-success text-success">+12.1%</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <span class="opacity-50 legend-indicator bg-primary"></span>Net volume from sales
                                        </th>
                                        <td>$2,980.45</td>
                                        <td>
                                            <span class="badge bg-soft-warning text-warning">+6.9%</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <span class="opacity-25 legend-indicator bg-primary"></span>New volume from sales
                                        </th>
                                        <td>$950.00</td>
                                        <td>
                                            <span class="badge bg-soft-danger text-danger">-1.5%</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <span class="legend-indicator"></span>Other
                                        </th>
                                        <td>32</td>
                                        <td>
                                            <span class="badge bg-soft-success text-success">1.9%</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- End Table -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
        <!-- End Content -->

        @include('layouts.includes.footer')
    </main>
@endsection




{{--  <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>  --}}
