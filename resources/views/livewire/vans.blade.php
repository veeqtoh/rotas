<div>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="mb-2 col-sm mb-sm-0">
                    <h1 class="page-header-title">Vans</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Vans</li>
                    </ul>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#addVanModal">
                        <i class="bi-truck me-1"></i> Add van
                    </a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

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
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search vans" aria-label="Search vans" />
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
                            <th class="table-column-ps-0">Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>RegNo</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($vans as $van)
                        <tr>
                            <td class="table-column-pe-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll1" />
                                        <label class="form-check-label" for="datatableCheckAll1"></label>
                                    </div>
                                </td>
                            <td class="table-column-ps-0">
                                <span class="mb-0 d-block h5">{{ $van->brand }}</span>
                            </td>
                            <td>
                                <span class="mb-0 d-block h5">{{ $van->model }}</span>
                            </td>
                            <td>
                                <span class="mb-0 d-block h5">{{ $van->year }}</span>
                            </td>
                            <td>
                                <span class="mb-0 d-block h5">{{ $van->reg }}</span>
                            </td>

                            <td>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#editVanModal{{ $van->id }}" class="btn btn-white btn-sm"><i class="bi-pencil-fill me-1"></i> Edit</a>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteVanModal{{ $van->id }}" class="btn btn-white btn-sm"><i class="bi-trash-fill me-1"></i> Delete</a>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editVanModal{{ $van->id }}" tabindex="-1" aria-labelledby="editVanModalLabel{{ $van->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="editVanModalLabel{{ $van->id }}">Update {{ $van->reg.' ('.$van->brand.' '.$van->model.' '.$van->year.')' }}</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- Body -->
                                    <div class="modal-body">
                                        <form wire:submit.prevent='update({{ $van->id }})'>
                                            <!-- Brand -->
                                            <div class="row mb-4">
                                                <div class="col-sm-3 mb-2 mb-sm-0">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <i class="bi-truck nav-icon"></i>
                                                        <div class="flex-grow-1">Brand</div>
                                                    </div>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-sm">
                                                    <label for="brand" class="visually-hidden form-label">Van Brand</label>

                                                    <input wire:model.defer='brand' name="brand" type="text" class="form-control" id="brand" placeholder="{{ $van->brand }}" aria-label="Brand">
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Brand -->

                                            <!-- Model -->
                                            <div class="row mb-4">
                                                <div class="col-sm-3 mb-2 mb-sm-0">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <i class="bi-truck nav-icon"></i>
                                                        <div class="flex-grow-1">Model</div>
                                                    </div>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-sm">
                                                    <label for="model" class="visually-hidden form-label">Van Model</label>

                                                    <input wire:model.defer='model' name="model" type="text" class="form-control" id="model" placeholder="{{ $van->model }}" aria-label="Van Model">
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Model -->

                                            <!-- Year -->
                                            <div class="row mb-4">
                                                <div class="col-sm-3 mb-2 mb-sm-0">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <i class="bi-truck nav-icon"></i>
                                                        <div class="flex-grow-1">Year</div>
                                                    </div>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-sm">
                                                    <label for="year" class="visually-hidden form-label">Van Year</label>

                                                    <input wire:model.defer='year' name="year" type="number" class="form-control" id="year" placeholder="{{ $van->year }}" aria-label="Van Year">
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Year -->

                                            <!-- Reg -->
                                            <div class="row mb-4">
                                                <div class="col-sm-3 mb-2 mb-sm-0">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <i class="bi-truck nav-icon"></i>
                                                        <div class="flex-grow-1">Reg</div>
                                                    </div>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-sm">
                                                    <label for="reg" class="visually-hidden form-label">Van Reg</label>

                                                    <input wire:model.defer='reg' name="reg" type="text" class="form-control" id="reg" placeholder="{{ $van->reg }}" aria-label="Van Reg">
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Reg -->

                                    </div>
                                    <!-- End Body -->

                                    <!-- Footer -->
                                    <div class="modal-footer gap-3">
                                        <button type="button" id="discardFormt" class="btn btn-white" data-bs-dismiss="modal">Discard</button>
                                        <button type="submit" id="processEvent" class="btn btn-primary">Update van</button>
                                    </div>
                                    <!-- End Footer -->
                                </form>

                                </div>
                            </div>
                        </div>
                        <!-- End Edit Modal -->

                        <!-- Delete Van Modal -->
                        <div class="modal fade" id="deleteVanModal{{ $van->id }}" tabindex="-1" aria-labelledby="deleteVanModalLabel{{ $van->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="deleteVanModalLabel{{ $van->id }}">Delete {{ $van->reg.' ('.$van->brand.' '.$van->model.' '.$van->year.')' }} ?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- Body -->
                                    <div class="modal-body">
                                        <p>Are you sure?</p>
                                        <p>This action will delete all associated shifts with this van and is irreversible.</p>
                                    </div>
                                    <!-- End Body -->
                                    <!-- Footer -->
                                    <div class="card-footer d-sm-flex align-items-sm-center">
                                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-ghost-secondary">
                                            <i class="bi-chevron-left"></i> Cancel
                                        </button>

                                        <div class="ms-auto">
                                            <button wire:click='delete({{ $van->id }})' type="button" class="btn btn-danger">
                                                Yes, delete <i class="bi-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- End Footer -->
                                </div>
                            </div>
                        </div>
                        <!-- End delete folder Modal -->

                        @empty
                        {{--  <p>No driver data found</p>  --}}
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

    <!-- Create a new Van Modal -->
    <div class="modal fade" id="addVanModal" tabindex="-1" aria-labelledby="addVanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addVanModalLabel">Add Van to Fleet</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <form wire:submit.prevent='addVan'>
                        <!-- Brand -->
                        <div class="row mb-4">
                            <div class="col-sm-3 mb-2 mb-sm-0">
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi-truck nav-icon"></i>
                                    <div class="flex-grow-1">Brand</div>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-sm">
                                <label for="brand" class="visually-hidden form-label">Van Brand</label>

                                <input wire:model.defer='brand' name="brand" type="text" class="form-control" id="brand" placeholder="Van Brand" aria-label="Brand" required>
                                @error('brand') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Brand -->

                        <!-- Model -->
                        <div class="row mb-4">
                            <div class="col-sm-3 mb-2 mb-sm-0">
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi-truck nav-icon"></i>
                                    <div class="flex-grow-1">Model</div>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-sm">
                                <label for="model" class="visually-hidden form-label">Van Model</label>

                                <input wire:model.defer='model' name="model" type="text" class="form-control" id="model" placeholder="Van Model" aria-label="Van Model">
                                @error('model') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Model -->

                        <!-- Year -->
                        <div class="row mb-4">
                            <div class="col-sm-3 mb-2 mb-sm-0">
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi-truck nav-icon"></i>
                                    <div class="flex-grow-1">Year</div>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-sm">
                                <label for="year" class="visually-hidden form-label">Van Year</label>

                                <input wire:model.defer='year' name="year" type="number" class="form-control" id="year" placeholder="Van Year" aria-label="Van Year">
                                @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Year -->

                        <!-- Reg -->
                        <div class="row mb-4">
                            <div class="col-sm-3 mb-2 mb-sm-0">
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi-truck nav-icon"></i>
                                    <div class="flex-grow-1">Reg</div>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-sm">
                                <label for="reg" class="visually-hidden form-label">Van Reg</label>

                                <input wire:model.defer='reg' name="reg" type="text" class="form-control" id="reg" placeholder="Van Reg" aria-label="Van Reg">
                                @error('reg') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Reg -->

                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer gap-3">
                    <button type="button" id="discardFormt" class="btn btn-white" data-bs-dismiss="modal">Discard</button>
                    <button type="submit" id="processEvent" class="btn btn-primary">Create van</button>
                </div>
                <!-- End Footer -->
            </form>

            </div>
        </div>
    </div>
    <!-- End Create a new Van Modal -->

    <!--Updated Toast -->
    <div x-data="{ open: false }" x-init="
        @this.on('notify-updated', () => {
            if (open === false) setTimeout(() => { open = false }, 2500);
            open = true;

        });" x-show.transition.out.duration.1500ms="open" style="display: none;">

        <div id="renamedToast" class="position-fixed toast show" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
            <div class="toast-header">
                <div class="d-flex align-items-center flex-grow-1">
                <div class="flex-shrink-0">
                    <img class="avatar avatar-sm avatar-circle" src="{{ asset('admin-assets/img/others/success-icon.png') }}" alt="Image description">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0">Van updated!</h5>
                    <small class="ms-auto">{{ now()->diffForHumans() }}</small>
                </div>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Updated Toast -->

    <!--Deleted Toast -->
    <div x-data="{ open: false }" x-init="
        @this.on('notify-deleted', () => {
            if (open === false) setTimeout(() => { open = false }, 2500);
            open = true;

        });" x-show.transition.out.duration.1500ms="open" style="display: none;">

        <div id="deletedToast" class="position-fixed toast show" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
            <div class="toast-header">
                <div class="d-flex align-items-center flex-grow-1">
                <div class="flex-shrink-0">
                    <img class="avatar avatar-sm avatar-circle" src="{{ asset('admin-assets/img/others/success-icon.png') }}" alt="Image description">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0">Van deleted!</h5>
                    <small class="ms-auto">{{ now()->diffForHumans() }}</small>
                </div>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Deleted Toast -->

    <!--created Toast -->
    <div x-data="{ open: false }" x-init="
        @this.on('notify-created', () => {
            if (open === false) setTimeout(() => { open = false }, 2500);
            open = true;

        });" x-show.transition.out.duration.1500ms="open" style="display: none;">

        <div id="renamedToast" class="position-fixed toast show" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
            <div class="toast-header">
                <div class="d-flex align-items-center flex-grow-1">
                <div class="flex-shrink-0">
                    <img class="avatar avatar-sm avatar-circle" src="{{ asset('admin-assets/img/others/success-icon.png') }}" alt="Image description">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0">Van created!</h5>
                    <small class="ms-auto">{{ now()->diffForHumans() }}</small>
                </div>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End created Toast -->

    @push('scripts')
        <script>
            window.addEventListener('notify-updated', event => {
                $('#editVanModal'+event.detail.van).modal('hide');
                $('.modal-backdrop').remove();
            });
            window.addEventListener('notify-deleted', event => {
                $('#deleteVanModal'+event.detail.van).modal('hide');
                $('.modal-backdrop').remove();
            });
            window.addEventListener('notify-created', event => {
                $('#addVanModal').modal('hide');
                $('.modal-backdrop').remove();
            });
        </script>
    @endpush
</div>
