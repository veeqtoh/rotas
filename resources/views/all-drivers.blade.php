@extends('layouts.layout')

@section('title')
    <title>Drivers | Admin Portal</title>
@endsection

@section('drivers')
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
                        <h1 class="page-header-title">All Drivers</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('drivers') }}"></a> Drivers</li>
                            <li class="breadcrumb-item active">All Drivers</li>
                        </ul>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="{{ route('addDriver') }}">
                            <i class="bi-person-plus-fill me-1"></i> Add driver
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
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="mb-2 card-subtitle">Total drivers</h6>

                            <div class="row align-items-center gx-2">
                                <div class="col">
                                    <span class="js-counter display-4 text-dark">{{ $driversCount }}</span>
                                    {{--  <span class="text-body fs-5 ms-1">from 22</span>  --}}
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                    <span class="p-1 badge bg-soft-success text-success">
                                        <i class="bi-graph-up"></i> 5.0%
                                    </span>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <a class="stretched-link" href="{{ route('drivers') }}"></a>
                    </div>
                    <!-- End Card -->
                </div>

            </div>
            <!-- End Stats -->

            <!-- Card -->
            <div class="card">
                <!-- Header -->
                <div class="card-header card-header-content-md-between">
                    <div class="mb-2 mb-md-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search employees" aria-label="Search employees" />
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                    <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">
                        <!-- Datatable Info -->
                        <div id="datatableCounterInfo" style="display: none;">
                            <div class="d-flex align-items-center">
                                <span class="fs-5 me-3">
                                    <span id="datatableCounter">0</span>
                                    Selected
                                </span>
                                <a class="btn btn-outline-danger btn-sm" href="javascript:;"> <i class="bi-trash"></i> Delete </a>
                            </div>
                        </div>
                        <!-- End Datatable Info -->

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-download me-2"></i> Export</button>

                            <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                                <span class="dropdown-header">Options</span>
                                <a id="export-copy" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/illustrations/copy-icon.svg') }}" alt="Image Description" />
                                    Copy
                                </a>
                                <a id="export-print" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/illustrations/print-icon.svg') }}" alt="Image Description" />
                                    Print
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Download options</span>
                                <a id="export-excel" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/brands/excel-icon.svg') }}" alt="Image Description" />
                                    Excel
                                </a>
                                <a id="export-csv" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/components/placeholder-csv-format.svg') }}" alt="Image Description" />
                                    .CSV
                                </a>
                                <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/brands/pdf-icon.svg') }}" alt="Image Description" />
                                    PDF
                                </a>
                            </div>
                        </div>
                        <!-- End Dropdown -->

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-white btn-sm w-100" id="usersFilterDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="bi-filter me-1"></i> Filter <span class="badge bg-soft-dark text-dark rounded-circle ms-1">2</span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm-end dropdown-card card-dropdown-filter-centered" aria-labelledby="usersFilterDropdown" style="min-width: 22rem;">
                                <!-- Card -->
                                <div class="card">
                                    <div class="card-header card-header-content-between">
                                        <h5 class="card-header-title">Filter drivers</h5>

                                        <!-- Toggle Button -->
                                        <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm ms-2">
                                            <i class="bi-x-lg"></i>
                                        </button>
                                        <!-- End Toggle Button -->
                                    </div>

                                    <div class="card-body">
                                        <form>
                                            <div class="mb-4">
                                                <small class="text-cap text-body">Role</small>

                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Check -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="usersFilterCheckAll" checked />
                                                            <label class="form-check-label" for="usersFilterCheckAll">
                                                                All
                                                            </label>
                                                        </div>
                                                        <!-- End Check -->
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col">
                                                        <!-- Check -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="usersFilterCheckEmployee" />
                                                            <label class="form-check-label" for="usersFilterCheckEmployee">
                                                                Employee
                                                            </label>
                                                        </div>
                                                        <!-- End Check -->
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>

                                            <div class="row">
                                                <div class="col-sm mb-4">
                                                    <small class="text-cap text-body">Position</small>

                                                    <!-- Select -->
                                                    <div class="tom-select-custom">
                                                        <select
                                                            class="js-select js-datatable-filter form-select form-select-sm"
                                                            data-target-column-index="2"
                                                            data-hs-tom-select-options='{
                                                "placeholder": "Any",
                                                "searchInDropdown": false,
                                                "hideSearch": true,
                                                "dropdownWidth": "10rem"
                                                }'
                                                        >
                                                            <option value="">Any</option>
                                                            <option value="Accountant">Accountant</option>
                                                            <option value="Co-founder">Co-founder</option>
                                                            <option value="Designer">Designer</option>
                                                            <option value="Developer">Developer</option>
                                                            <option value="Director">Director</option>
                                                        </select>
                                                        <!-- End Select -->
                                                    </div>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-sm mb-4">
                                                    <small class="text-cap text-body">Status</small>

                                                    <!-- Select -->
                                                    <div class="tom-select-custom">
                                                        <select
                                                            class="js-select js-datatable-filter form-select form-select-sm"
                                                            data-target-column-index="4"
                                                            data-hs-tom-select-options='{
                                                "placeholder": "Any status",
                                                "searchInDropdown": false,
                                                "hideSearch": true,
                                                "dropdownWidth": "10rem"
                                                }'
                                                        >
                                                            <option value="">Any status</option>
                                                            <option value="Completed" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success"></span>Completed</span>'>Completed</option>
                                                            <option value="In progress" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-warning"></span>In progress</span>'>In progress</option>
                                                            <option value="To do" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger"></span>To do</span>'>To do</option>
                                                        </select>
                                                    </div>
                                                    <!-- End Select -->
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-12 mb-4">
                                                    <span class="text-cap text-body">Location</span>

                                                    <!-- Select -->
                                                    <div class="tom-select-custom">
                                                        <select class="js-select form-select"></select>
                                                    </div>
                                                    <!-- End Select -->
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Row -->

                                            <div class="d-grid">
                                                <a class="btn btn-primary" href="javascript:;">Apply</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                        </div>
                        <!-- End Dropdown -->
                    </div>
                </div>
                <!-- End Header -->

                <!-- Table -->
                <div class="table-responsive datatable-custom position-relative">
                    <table
                        id="datatable"
                        class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                        data-hs-datatables-options='{
                            "columnDefs": [{
                                "targets": [0, 7],
                                "orderable": false
                                }],
                            "order": [],
                            "info": {
                                "totalQty": "#datatableWithPaginationInfoTotalQty"
                            },
                            "search": "#datatableSearch",
                            "entries": "#datatableEntries",
                            "pageLength": 15,
                            "isResponsive": false,
                            "isShowPaging": false,
                            "pagination": "datatablePagination"
                            }'
                    >
                        <thead class="thead-light">
                            <tr>
                                <th class="table-column-pe-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll" />
                                        <label class="form-check-label" for="datatableCheckAll"></label>
                                    </div>
                                </th>
                                <th class="table-column-ps-0">Name</th>
                                <th>Position</th>
                                <th>Employed</th>
                                <th>Status</th>
                                <th>Portfolio</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($allDrivers as $user)
                            <tr>
                                <td class="table-column-pe-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll1" />
                                        <label class="form-check-label" for="datatableCheckAll1"></label>
                                    </div>
                                </td>
                                <td class="table-column-ps-0">
                                    <a class="d-flex align-items-center" href="{{ route('profile.edit', $user) }}">
                                        <div class="avatar avatar-circle">
                                            <img class="avatar-img" src="{{ $user->user->avatarUrl() }}" alt="avatar">
                                        </div>
                                        <div class="ms-3">
                                            <span class="mb-0 d-block h5 text-inherit">{{ ($user->staff) ? $user->staff->first_name.' '.$user->staff->last_name : $user->customer->first_name.' '.$user->customer->last_name }}
                                                <i class="{{ ($user->isActive()) ? 'bi-patch-check-fill text-primary' : ''}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i>
                                            </span>
                                            <span class="d-block fs-5 text-body">{{ $user->email }}</span>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <span class="mb-0 d-block h5">{{ ($user->staff) ? 'Staff' : 'Customer' }}</span>
                                    <span class="d-block fs-5">{{ ($user->staff) ? $user->staff->department->name : $user->orders->count().' completed orders'}}</span>
                                </td>
                                <td>{{ ($user->staff) ? $user->staff->employment_date->diffForHumans() : 'Not Applicable' }}</td>
                                <td>
                                    <span class="legend-indicator {{  ($user->isActive()) ? 'bg-success' : 'bg-warning' }}"></span>{{  ($user->isActive()) ? 'Active' : 'Inactive' }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="fs-5 me-2">{{ ($user->staff) ? '72%' : '100%' }}</span>
                                        <div class="progress table-progress">
                                            <div class="progress-bar {{ ($user->staff) ? '' : 'bg-success' }}" role="progressbar" style="width: {{ ($user->staff) ? '72%' : '100%' }};" aria-valuenow="{{ ($user->staff) ? '72' : '100' }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ ($user->staff) ? ucfirst($user->staff->staff_type) : 'Customer' }}</td>
                                <td>
                                    <a href="{{ route('profile.edit', $user) }}" class="btn btn-white btn-sm"><i class="bi-pencil-fill me-1"></i> Details</a>
                                </td>
                            </tr>
                            @empty
                            {{--  <p>No employees data found</p>  --}}
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                        <div class="col-sm mb-2 mb-sm-0">
                            <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                <span class="me-2">Showing:</span>

                                <!-- Select -->
                                <div class="tom-select-custom">
                                    <select
                                        id="datatableEntries"
                                        class="js-select form-select form-select-borderless w-auto"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                                        "searchInDropdown": false,
                                        "hideSearch": true
                                    }'
                                    >
                                        <option value="10">10</option>
                                        <option value="15" selected>15</option>
                                        <option value="20">20</option>
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
                    <!-- End Row -->
                </div>
                <!-- End Footer -->
            </div>
            <!-- End Card -->

        </div>
        <!-- End Content -->

        @include('layouts.includes.footer')

    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
