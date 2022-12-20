<div>
    <!-- Nav -->
    <div class="mb-5 js-nav-scroller hs-nav-scroller-horizontal">
        <span class="hs-nav-scroller-arrow-prev" style="display: none;">
            <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="bi-chevron-left"></i>
            </a>
        </span>

        <span class="hs-nav-scroller-arrow-next" style="display: none;">
            <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="bi-chevron-right"></i>
            </a>
        </span>

        <ul class="nav nav-tabs align-items-center">
            <li class="nav-item">
                <a wire:click.prevent="updateView('basic')" href="#!" class="nav-link {{ $currentView == 'basic' ? 'active' : '' }}">Profile</a>
            </li>

            @if($user->driver)
                <li class="nav-item">
                    <a wire:click.prevent="updateView('nok')" href="#!" class="nav-link {{ $currentView == 'nok' ? 'active' : '' }}">Emmergency contacts</a>
                </li>
                <li class="nav-item">
                    <a wire:click.prevent="updateView('certifications')" href="#!" class="nav-link {{ $currentView == 'certifications' ? 'active' : '' }}">Certifications
                        <span class="badge bg-soft-dark text-dark rounded-circle ms-1">{{ $user->driver->certifications->count() }}</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a wire:click.prevent="updateView('orders')" href="#!" class="nav-link {{ $currentView == 'orsers' ? 'active' : '' }}">Orders</a>
                </li>
            @endif

            <li class="nav-item ms-auto">
                <div class="gap-2 d-flex">
                    <!-- Form Check -->
                    {{--  <div class="form-check form-check-switch">
                        <input class="form-check-input" type="checkbox" value="" id="connectCheckbox" />
                        <label class="form-check-label btn-sm" for="connectCheckbox">
                            <span class="form-check-default"> <i class="bi-person-plus-fill"></i> Connect </span>
                            <span class="form-check-active"> <i class="bi-check-lg me-2"></i> Connected </span>
                        </label>
                    </div>  --}}
                    <!-- End Form Check -->
                    @if(Auth::id() == $user->id)
                    <a class="btn btn-white btn-sm" href="{{ route('settings', $user) }}">
                        <i class="bi-person-plus-fill me-1"></i> Edit profile
                    </a>
                    @endif

                    <a class="btn btn-icon btn-sm btn-white" href="#">
                        <i class="bi-list-ul me-1"></i>
                    </a>

                    <!-- Dropdown -->
                    <div class="dropdown nav-scroller-dropdown">
                        <button type="button" class="btn btn-white btn-icon btn-sm" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-three-dots-vertical"></i>
                        </button>

                        <div class="mt-1 dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">

                            @if(Auth::id() == $user->id)
                            <span class="dropdown-header">Settings</span>
                            <a class="dropdown-item" href="{{ route('it.settings', $user) }}"> <i class="bi-pen-fill dropdown-item-icon"></i> Update profile </a>
                            <div class="dropdown-divider"></div>
                            @endif


                            <span class="dropdown-header">Feedback</span>

                            <a class="dropdown-item" href="#"> <i class="bi-flag dropdown-item-icon"></i> Report </a>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>
            </li>
        </ul>
    </div>
    <!-- End Nav -->

    <section id="basic" style="{{ $currentView != 'basic' ? 'display: none;' : '' }}">
        <!-- Basic Tab -->
        <div class="row" >
            <div class="col-lg-4">
                <!-- Card -->
                <div class="mb-3 card card-body mb-lg-5">
                    <h5>Complete your profile</h5>

                    <!-- Progress -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="progress flex-grow-1">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 82%;" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="ms-4">82%</span>
                    </div>
                    <!-- End Progress -->
                </div>
                <!-- End Card -->

                <!-- Sticky Block Start Point -->
                <div id="accountSidebarNav"></div>

                <!-- Card -->
                <div
                    class="mb-3 js-sticky-block card mb-lg-5"
                    data-hs-sticky-block-options='{
                        "parentSelector": "#accountSidebarNav",
                        "breakpoint": "lg",
                        "startPoint": "#accountSidebarNav",
                        "endPoint": "#stickyBlockEndPoint",
                        "stickyOffsetTop": 20
                    }'
                        >
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Profile</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <ul class="mb-0 list-unstyled list-py-2 text-dark">
                            <li class="pb-0"><span class="card-subtitle">About</span></li>
                            <li><i class="bi-person dropdown-item-icon"></i> {{ ($user->driver) ? $user->driver->first_name.' '.$user->driver->last_name : $user->customer->first_name.' '.$user->customer->last_name }}</li>
                            <li><i class="bi-briefcase dropdown-item-icon"></i> {{ ($user->driver) ? $user->department->name : 'No Department' }}</li>
                            <li><i class="bi-building dropdown-item-icon"></i> {{ ($user->driver) ? 'driver' : 'Customer' }}</li>

                            <li class="pt-4 pb-0"><span class="card-subtitle">Contacts</span></li>
                            <li><i class="bi-at dropdown-item-icon"></i> {{ $user->email }}</li>
                            <li>
                                <i class="bi-phone dropdown-item-icon"></i>
                                {{ ($user->driver) ? $user->driver->phone_1 : $user->customer->phone_1 }}
                            </li>
                            @if($user->driver && $user->driver->phone_2)
                            <li>
                                <i class="bi-phone dropdown-item-icon"></i>
                                {{ $user->driver->phone_2 }}
                            </li>
                            @elseif($user->customer && $user->customer->phone_2)
                            <li>
                                <i class="bi-phone dropdown-item-icon"></i>
                                {{ $user->driver->phone_2 }}
                            </li>
                            @endif

                            {{--   <li class="pt-4 pb-0"><span class="card-subtitle">Teams</span></li>
                            <li><i class="bi-people dropdown-item-icon"></i> Member of 7 teams</li>
                            <li><i class="bi-stickies dropdown-item-icon"></i> Working on 8 projects</li>  --}}
                        </ul>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                @if($user->driver)
                    <!-- End Row -->
                    <section id="team">
                        <div class="row">
                            <div class="mb-3 col-sm-12 mb-sm-0">
                                <!-- Card -->
                                <div class="card h-100">
                                    <!-- Header -->
                                    <div class="card-header">
                                        <h4 class="card-header-title">Team members</h4>
                                    </div>
                                    <!-- End Header -->

                                    <!-- Body -->
                                    <div class="card-body">
                                        <ul class="mb-0 list-unstyled list-py-3">
                                            <!-- Item -->
                                            @forelse($colleagues as $colleague)
                                            <li>
                                                <div class="d-flex align-items-center">
                                                    <a class="d-flex align-items-center me-2" href="{{ route('it.userDetails', $colleague) }}">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                                                {{--  <span class="avatar-initials">R</span>  --}}
                                                                <img class="avatar-img" src="{{ $colleague->avatarUrl()}}" alt="{{ $colleague->username }}">
                                                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h5 class="mb-0 text-hover-primary">{{ $colleague->driver->first_name }} {{ $colleague->driver->last_name }}</h5>
                                                            <span class="fs-6 text-body">{{ $colleague->department->name }}</span>
                                                        </div>
                                                    </a>
                                                    <div class="ms-auto">
                                                        <!-- Form Check -->
                                                        <div class="form-check form-check-switch">
                                                            <input class="form-check-input" type="checkbox" value="" id="connectionsCheckbox1" checked />
                                                            <label class="form-check-label btn-icon btn-xs rounded-circle" for="connectionsCheckbox1">
                                                                <span class="form-check-default">
                                                                    <i class="bi-person-plus-fill"></i>
                                                                </span>
                                                                <span class="form-check-active">
                                                                    <i class="bi-check-lg"></i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <!-- End Form Check -->
                                                    </div>
                                                </div>
                                            </li>
                                            @empty
                                                <p>No team member avaialable</p>
                                            @endforelse

                                            <!-- End Item -->
                                        </ul>
                                    </div>
                                    <!-- End Body -->

                                    {{--  <!-- Footer -->
                                    <a class="text-center card-footer" href="user-profile-connections.html"> View all connections <i class="bi-chevron-right"></i> </a>
                                    <!-- End Footer -->  --}}
                                </div>
                                <!-- End Card -->
                            </div>
                        </div>
                    </section>
                    <!-- End Row -->
                @endif

            </div>

            <div class="col-lg-8">
                <div class="gap-3 d-grid gap-lg-5">
                    <!-- Card -->
                    <div class="card">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title">Activity timeline</h4>

                            <!-- Dropdown -->
                            <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="contentActivityStreamDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                {{--  <div class="mt-1 dropdown-menu dropdown-menu-end" aria-labelledby="contentActivityStreamDropdown">
                                    <span class="dropdown-header">Settings</span>

                                    <a class="dropdown-item" href="#"> <i class="bi-share-fill dropdown-item-icon"></i> Share connections </a>
                                    <a class="dropdown-item" href="#"> <i class="bi-info-circle dropdown-item-icon"></i> Suggest edits </a>

                                    <div class="dropdown-divider"></div>

                                    <span class="dropdown-header">Feedback</span>

                                    <a class="dropdown-item" href="#"> <i class="bi-chat-left-dots dropdown-item-icon"></i> Report </a>
                                </div>  --}}
                            </div>
                            <!-- End Dropdown -->
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body card-body-height" style="height: 30rem;">
                            <!-- Step -->
                            <ul class="mb-0 step step-icon-xs">
                                @forelse ($audits as $audit)
                                <!-- Step Item -->
                                <li class="step-item">
                                    <div class="step-content-wrapper">
                                        <span class="step-icon step-icon-pseudo step-icon-soft-dark"></span>

                                        <div class="step-content">
                                            <h5 class="step-title">
                                                <a class="text-dark" href="#!">{{ $audit->action }}</a>
                                            </h5>

                                            <p class="mb-1 fs-5">
                                                {{ $audit->details }}
                                            </p>
                                            <span class="text-muted small text-uppercase">{{ $audit->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Step Item -->
                                @empty
                                    <p>No activity yet</p>
                                @endforelse


                                <!-- Step Item -->
                                <li id="collapseActivitySection" class="step-item collapse">
                                    <div class="step-content-wrapper">
                                        <span class="step-icon step-icon-pseudo step-icon-soft-dark"></span>

                                        <div class="step-content">
                                            <h5 class="step-title">
                                                <a class="text-dark" href="#">Project status updated</a>
                                            </h5>

                                            <p class="mb-1 fs-5">
                                                Updated <a class="text-uppercase" href="#"><i class="bi-journal-bookmark-fill"></i> Fr-3</a> as
                                                <span class="badge bg-soft-secondary text-secondary rounded-pill"><span class="legend-indicator bg-secondary"></span>"To do"</span>
                                            </p>

                                            <span class="text-muted small text-uppercase">Feb 10</span>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Step Item -->
                            </ul>
                            <!-- End Step -->
                        </div>
                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer">
                            <a class="link link-collapse" data-bs-toggle="collapse" href="#collapseActivitySection" role="button" aria-expanded="false" aria-controls="collapseActivitySection">
                                <span class="link-collapse-default">View more</span>
                                <span class="link-collapse-active">View less</span>
                            </a>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title">Leave request history</h4>

                            <!-- Dropdown -->
                            <div class="dropdowm">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="projectReportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="mt-1 dropdown-menu dropdown-menu-end" aria-labelledby="projectReportDropdown">
                                    <span class="dropdown-header">Settings</span>

                                    <a class="dropdown-item" href="#"> <i class="bi-share-fill dropdown-item-icon"></i> Share connections </a>
                                    <a class="dropdown-item" href="#"> <i class="bi-info-circle dropdown-item-icon"></i> Suggest edits </a>

                                    <div class="dropdown-divider"></div>

                                    <span class="dropdown-header">Feedback</span>

                                    <a class="dropdown-item" href="#"> <i class="bi-chat-left-dots dropdown-item-icon"></i> Report </a>
                                </div>
                            </div>
                            <!-- End Dropdown -->
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Type</th>
                                        <th style="width: 40%;">Status</th>
                                        <th class="table-text-end">Days requested</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <span class="avatar avatar-xs avatar-soft-info avatar-circle">
                                                    <span class="avatar-initials">M</span>
                                                </span>
                                                <div class="ms-3">
                                                    <h5 class="mb-0">Maternity Leave</h5>
                                                    <small>Updated 2 hours ago</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="me-3">80%</span>
                                                <div class="progress table-progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-text-end">30</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <span class="avatar avatar-xs avatar-soft-info avatar-circle">
                                                    <span class="avatar-initials">A</span>
                                                </span>
                                                <div class="ms-3">
                                                    <h5 class="mb-0">Annual Leave</h5>
                                                    <small>Updated 2 hours ago</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="me-3">100%</span>
                                                <div class="progress table-progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-text-end">60</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                        <!-- Footer -->
                        <a class="text-center card-footer" href="#!"> View all requests <i class="bi-chevron-right"></i> </a>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->
                </div>

                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>
            </div>
        </div>
        <!-- End Basic Tab -->
    </section>

    @if($user->driver)
        <section id="team" style="{{ $currentView != 'nok' ? 'display: none;' : '' }}">
            <!-- Card -->
                <div class="mb-3 card mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-md">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-header-title">Emmergency contacts</h4>

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
                                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search contacts" aria-label="Search users">
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
                                    <th>Relationship</th>
                                    <th>Phones</th>
                                    <th>Email</th>
                                    <th>Added</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($user->driver->nextOfKins as $nok)
                                <tr>
                                    <td class="table-column-pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="usersDataCheck16">
                                            <label class="form-check-label" for="usersDataCheck16"></label>
                                        </div>
                                    </td>
                                    <td class="table-column-ps-0">
                                        <a class="d-flex align-items-center" href="#!">
                                            <div class="flex-shrink-0">
                                                <div class="avatar avatar-sm avatar-soft-danger avatar-circle">
                                                    <span class="avatar-initials">{{ ucfirst(str_limit($nok->full_name, $limit = 1, $end = '')) }}</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="mb-0 text-inherit">{{ $nok->full_name }}</h5>
                                                <span class="d-block fs-5">{{ $nok->title }}</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="legend-indicator bg-success"></span>{{ $nok->relationship }}
                                    </td>
                                    <td>
                                        <span class="mb-0 d-block h5">{{ $nok->phone_number_1 }}</span>
                                        <span class="d-block fs-5">{{ $nok->phone_number_2 }}</span>
                                    </td>
                                    <td>{{ $nok->email_address }}</td>
                                    <td>{{ $nok->created_at->diffForHumans() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                            <i class="bi-pencil-fill me-1"></i> Edit
                                        </button>
                                    </td>
                                </tr>
                                @empty

                                @endforelse

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
        </section>

        <section id="certifications" style="{{ $currentView != 'certifications' ? 'display: none;' : '' }}">
            <!-- Header -->
            <div class="mb-2 row align-items-center">
                <div class="col">
                    <h2 class="mb-0 h4">Files</h2>
                </div>

                <div class="col-auto">
                    <!-- Nav -->
                    <ul class="nav nav-segment" id="connectionsTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="grid-tab" data-bs-toggle="tab" href="#grid" role="tab" aria-controls="grid" aria-selected="true" title="Column view">
                                <i class="bi-grid"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="list-tab" data-bs-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false" title="List view">
                                <i class="bi-view-list"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- End Nav -->
                </div>
            </div>
            <!-- End Header -->

            <!-- Tab Content -->
            <div class="tab-content" id="connectionsTabContent">
                <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                    <!-- Folders -->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">

                        @forelse($user->driver->certifications as $certification)
                            <div class="mb-3 col mb-lg-5">
                                <!-- Card -->
                                <div class="text-center card card-sm card-hover-shadow card-header-borderless h-100">
                                    <div class="border-0 card-header card-header-content-between">
                                        <span class="small">{{ number_format(Storage::disk('certificates')->size($certification->src)/1000 )}}kb</span>

                                        <!-- Dropdown -->
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="filesGridDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi-three-dots-vertical"></i>
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesGridDropdown1" style="min-width: 13rem;">
                                                <span class="dropdown-header">Settings</span>

                                                <a class="dropdown-item" href="#"> <i class="bi-share dropdown-item-icon"></i> Share file </a>
                                                <a class="dropdown-item" href="#"> <i class="bi-folder-plus dropdown-item-icon"></i> Move to </a>
                                                <a class="dropdown-item" href="#"> <i class="bi-star dropdown-item-icon"></i> Add to stared </a>
                                                <a class="dropdown-item" href="#"> <i class="bi-pencil dropdown-item-icon"></i> Rename </a>
                                                <a wire:click.prevent='downloadFile({{ $certification }})' class="dropdown-item"> <i class="bi-download dropdown-item-icon"></i> Download </a>

                                                <div class="dropdown-divider"></div>

                                                <a class="dropdown-item" href="#"> <i class="bi-chat-left-dots dropdown-item-icon"></i> Report </a>
                                                <a class="dropdown-item" href="#"> <i class="bi-trash dropdown-item-icon"></i> Delete </a>
                                            </div>
                                        </div>
                                        <!-- End Dropdown -->
                                    </div>

                                    <div class="card-body">
                                        @if(pathinfo($certification->src, PATHINFO_EXTENSION) == 'pdf')
                                        <img class="avatar avatar-4x3" src="{{ asset('backend-assets/svg/brands/pdf-icon.svg') }}" alt="{{ $certification->title }}" />
                                        @elseif(pathinfo($certification->src, PATHINFO_EXTENSION) == 'docx')
                                        <img class="avatar avatar-4x3" src="{{ asset('backend-assets/svg/brands/google-docs-icon.svg') }}" alt="{{ $certification->title }}" />
                                        @elseif(pathinfo($certification->src, PATHINFO_EXTENSION) == 'jpg')
                                        <img class="avatar avatar-4x3" src="{{ asset('backend-assets/svg/brands/jpg-icon.svg') }}" alt="{{ $certification->title }}" />
                                        @endif

                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $certification->certificate_title }}</h5>
                                        @if($certification->issue_date)
                                        <p class="small">Issued {{ $certification->issue_date->diffForHumans() }}</p>
                                        @endif
                                        @if($certification->expiry_date)
                                        <p class="small text-danger">Expires {{ $certification->expiry_date->diffForHumans() }}</p>
                                        @endif
                                    </div>

                                    <a class="stretched-link" href="{{ Storage::disk('certificates')->url($certification->src) }}" target="_blank"></a>
                                </div>
                                <!-- End Card -->
                            </div>
                            <!-- End Col -->
                        @empty
                            <p>No Certifications found</p>
                        @endforelse

                    </div>
                    <!-- End Folders -->
                </div>

                <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                    <ul class="list-group">
                        @forelse($user->driver->certifications as $cert)
                        <!-- List Item -->
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    @if(pathinfo($certification->src, PATHINFO_EXTENSION) == 'pdf')
                                    <img class="avatar avatar-xs avatar-4x3" src="{{ asset('backend-assets/svg/brands/pdf-icon.svg') }}" alt="{{ $cert->certificate_title }}" />
                                    @elseif(pathinfo($certification->src, PATHINFO_EXTENSION) == 'docx')
                                    <img class="avatar avatar-xs avatar-4x3" src="{{ asset('backend-assets/svg/brands/google-docs-icon.svg') }}" alt="{{ $cert->certificate_title }}" />
                                    @elseif(pathinfo($certification->src, PATHINFO_EXTENSION) == 'jpg')
                                    <img class="avatar avatar-xs avatar-4x3" src="{{ asset('backend-assets/svg/brands/jpg-icon.svg') }}" alt="{{ $cert->certificate_title }}" />
                                    @endif
                                </div>
                                <!-- End Col -->

                                <div class="col">
                                    <h5 class="mb-0">
                                        <a class="text-dark" href="{{ Storage::disk('certificates')->url($cert->src) }}" target="_blank">{{ $cert->certificate_title }}</a>
                                    </h5>
                                    <ul class="list-inline list-separator small text-body">
                                        @if($cert->issue_date)
                                        <li class="list-inline-item">Issued {{ $cert->issue_date->diffForHumans() }}</li>
                                        @endif
                                        @if($cert->expiry_date)
                                        <li class="list-inline-item text-danger">Expires {{ $cert->expiry_date->diffForHumans() }}</li>
                                        @endif

                                        <li class="list-inline-item">{{ number_format(Storage::disk('certificates')->size($cert->src)/1000 )}}kb</li>
                                    </ul>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-white btn-sm" id="filesListDropdown9" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="d-none d-sm-inline-block me-1">More</span>
                                            <i class="bi-chevron-down"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filesListDropdown9" style="min-width: 13rem;">
                                            <span class="dropdown-header">Settings</span>

                                            <a class="dropdown-item" href="#"> <i class="bi-share dropdown-item-icon"></i> Share file </a>
                                            <a class="dropdown-item" href="#"> <i class="bi-folder-plus dropdown-item-icon"></i> Move to </a>
                                            <a class="dropdown-item" href="#"> <i class="bi-star dropdown-item-icon"></i> Add to stared </a>
                                            <a class="dropdown-item" href="#"> <i class="bi-pencil dropdown-item-icon"></i> Rename </a>
                                            <a wire:click.prevent='download({{ $cert }})' class="dropdown-item"> <i class="bi-download dropdown-item-icon"></i> Download </a>

                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="#"> <i class="bi-chat-left-dots dropdown-item-icon"></i> Report </a>
                                            <a class="dropdown-item" href="#"> <i class="bi-trash dropdown-item-icon"></i> Delete </a>
                                        </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </li>
                        <!-- End List Item -->
                        @empty
                        <p>No Certificates uploaded at this time</p>
                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- End Tab Content -->
        </section>
    @else
        <section id="orders" style="{{ $currentView != 'orders' ? 'display: none;' : '' }}">
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
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search orders" aria-label="Search users" />
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                    <div class="gap-2 d-grid d-sm-flex">
                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-download me-2"></i> Export</button>

                            <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                                <span class="dropdown-header">Options</span>
                                <a id="export-copy" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/illustrations/copy-icon.svg" alt="Image Description" />
                                    Copy
                                </a>
                                <a id="export-print" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/illustrations/print-icon.svg" alt="Image Description" />
                                    Print
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Download options</span>
                                <a id="export-excel" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/brands/excel-icon.svg" alt="Image Description" />
                                    Excel
                                </a>
                                <a id="export-csv" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/components/placeholder-csv-format.svg" alt="Image Description" />
                                    .CSV
                                </a>
                                <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/brands/pdf-icon.svg" alt="Image Description" />
                                    PDF
                                </a>
                            </div>
                        </div>
                        <!-- End Dropdown -->

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-white btn-sm w-100" id="showHideDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <i class="bi-table me-1"></i> Columns <span class="badge bg-soft-dark text-dark rounded-circle ms-1">7</span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end dropdown-card" aria-labelledby="showHideDropdown" style="width: 15rem;">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="gap-3 d-grid">
                                            <!-- Form Switch -->
                                            <label class="row form-check form-switch" for="toggleColumn_order">
                                                <span class="col-8 col-sm-9 ms-0">
                                                    <span class="me-2">Order</span>
                                                </span>
                                                <span class="col-4 col-sm-3 text-end">
                                                    <input type="checkbox" class="form-check-input" id="toggleColumn_order" checked />
                                                </span>
                                            </label>
                                            <!-- End Form Switch -->

                                            <!-- Form Switch -->
                                            <label class="row form-check form-switch" for="toggleColumn_date">
                                                <span class="col-8 col-sm-9 ms-0">
                                                    <span class="me-2">Date</span>
                                                </span>
                                                <span class="col-4 col-sm-3 text-end">
                                                    <input type="checkbox" class="form-check-input" id="toggleColumn_date" checked />
                                                </span>
                                            </label>
                                            <!-- End Form Switch -->

                                            <!-- Form Switch -->
                                            <label class="row form-check form-switch" for="toggleColumn_customer">
                                                <span class="col-8 col-sm-9 ms-0">
                                                    <span class="me-2">Customer</span>
                                                </span>
                                                <span class="col-4 col-sm-3 text-end">
                                                    <input type="checkbox" class="form-check-input" id="toggleColumn_customer" checked />
                                                </span>
                                            </label>
                                            <!-- End Form Switch -->

                                            <!-- Form Switch -->
                                            <label class="row form-check form-switch" for="toggleColumn_payment_status">
                                                <span class="col-8 col-sm-9 ms-0">
                                                    <span class="me-2">Payment status</span>
                                                </span>
                                                <span class="col-4 col-sm-3 text-end">
                                                    <input type="checkbox" class="form-check-input" id="toggleColumn_payment_status" checked />
                                                </span>
                                            </label>
                                            <!-- End Form Switch -->

                                            <!-- Form Switch -->
                                            <label class="row form-check form-switch" for="toggleColumn_fulfillment_status">
                                                <span class="col-8 col-sm-9 ms-0">
                                                    <span class="me-2">Fulfillment status</span>
                                                </span>
                                                <span class="col-4 col-sm-3 text-end">
                                                    <input type="checkbox" class="form-check-input" id="toggleColumn_fulfillment_status" checked />
                                                </span>
                                            </label>
                                            <!-- End Form Switch -->

                                            <!-- Form Switch -->
                                            <label class="row form-check form-switch" for="toggleColumn_payment_method">
                                                <span class="col-8 col-sm-9 ms-0">
                                                    <span class="me-2">Payment method</span>
                                                </span>
                                                <span class="col-4 col-sm-3 text-end">
                                                    <input type="checkbox" class="form-check-input" id="toggleColumn_payment_method" checked />
                                                </span>
                                            </label>
                                            <!-- End Form Switch -->

                                            <!-- Form Switch -->
                                            <label class="row form-check form-switch" for="toggleColumn_total">
                                                <span class="col-8 col-sm-9 ms-0">
                                                    <span class="me-2">Total</span>
                                                </span>
                                                <span class="col-4 col-sm-3 text-end">
                                                    <input type="checkbox" class="form-check-input" id="toggleColumn_total" />
                                                </span>
                                            </label>
                                            <!-- End Form Switch -->

                                            <!-- Form Switch -->
                                            <label class="row form-check form-switch" for="toggleColumn_actions">
                                                <span class="col-8 col-sm-9 ms-0">
                                                    <span class="me-2">Actions</span>
                                                </span>
                                                <span class="col-4 col-sm-3 text-end">
                                                    <input type="checkbox" class="form-check-input" id="toggleColumn_actions" checked />
                                                </span>
                                            </label>
                                            <!-- End Form Switch -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Dropdown -->
                    </div>
                </div>
                <!-- End Header -->

                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table
                        id="datatable"
                        class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                        style="width: 100%;"
                        data-hs-datatables-options='{
                                "columnDefs": [{
                                    "targets": [0],
                                    "orderable": false
                                }],
                                "order": [],
                                "info": {
                                "totalQty": "#datatableWithPaginationInfoTotalQty"
                                },
                                "search": "#datatableSearch",
                                "entries": "#datatableEntries",
                                "pageLength": 12,
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
                                <th class="table-column-ps-0">Order</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Payment status</th>
                                <th>Fulfillment status</th>
                                <th>Payment method</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="table-column-pe-0">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="ordersCheck1" />
                                        <label class="form-check-label" for="ordersCheck1"></label>
                                    </div>
                                </td>
                                <td class="table-column-ps-0">
                                    <a href="ecommerce-order-details.html">#35463</a>
                                </td>
                                <td>Aug 17, 2020, 5:48 (ET)</td>
                                <td>
                                    <a class="text-body" href="ecommerce-customer-details.html">Jase Marley</a>
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success"> <span class="legend-indicator bg-success"></span>Paid </span>
                                </td>
                                <td>
                                    <span class="badge bg-soft-info text-info"> <span class="legend-indicator bg-info"></span>Fulfilled </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('backend-assets/svg/brands/mastercard.svg') }}" alt="Image Description" />
                                        <span class="text-dark">&bull;&bull;&bull;&bull; 4242</span>
                                    </div>
                                </td>
                                <td>$256.39</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-white btn-sm" href="ecommerce-order-details.html"> <i class="bi-eye"></i> View </a>

                                        <!-- Button Group -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="ordersExportDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                            <div class="mt-1 dropdown-menu dropdown-menu-end" aria-labelledby="ordersExportDropdown1">
                                                <span class="dropdown-header">Options</span>
                                                <a class="js-export-copy dropdown-item" href="javascript:;">
                                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/illustrations/copy-icon.svg" alt="Image Description" />
                                                    Copy
                                                </a>
                                                <a class="js-export-print dropdown-item" href="javascript:;">
                                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/illustrations/print-icon.svg" alt="Image Description" />
                                                    Print
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <span class="dropdown-header">Download options</span>
                                                <a class="js-export-excel dropdown-item" href="javascript:;">
                                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/brands/excel-icon.svg" alt="Image Description" />
                                                    Excel
                                                </a>
                                                <a class="js-export-csv dropdown-item" href="javascript:;">
                                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/components/placeholder-csv-format.svg" alt="Image Description" />
                                                    .CSV
                                                </a>
                                                <a class="js-export-pdf dropdown-item" href="javascript:;">
                                                    <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/brands/pdf-icon.svg" alt="Image Description" />
                                                    PDF
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="javascript:;"> <i class="bi-trash dropdown-item-icon"></i> Delete </a>
                                            </div>
                                        </div>
                                        <!-- End Unfold -->
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                        <div class="mb-2 col-sm mb-sm-0">
                            <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                <span class="me-2">Showing:</span>

                                <!-- Select -->
                                <div class="tom-select-custom">
                                    <select
                                        id="datatableEntries"
                                        class="w-auto js-select form-select form-select-borderless"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                                        "searchInDropdown": false,
                                        "hideSearch": true
                                        }'
                                    >
                                        <option value="12" selected>12</option>
                                        <option value="14">14</option>
                                        <option value="16">16</option>
                                        <option value="18">18</option>
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
        </section>
    @endif

</div>
