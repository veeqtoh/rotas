<div>
    <!-- Step Form -->
    <form class="py-md-5">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8">

                <!-- Content Step Form -->
                <div id="addUserStepFormContent">
                    <!-- Card -->
                    <div id="step-3" class="card card-lg active">
                        <!-- Body -->
                        <fieldset class="form-control">
                            <legend class="form-control">Shift 1</legend>

                            <div class="card-body">

                                <!-- Driver -->
                                <div class="row mb-4">
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="bi-person nav-icon"></i>
                                            <div class="flex-grow-1">Driver</div>
                                        </div>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-sm">
                                        <!-- Select -->
                                        <div class="tom-select-custom">
                                            <select wire:model.defer='driver_id.0' name="driver_id.0" class="js-select form-select w-auto" autocomplete="off" id="eventColorLabel" data-hs-tom-select-options='{
                                                "searchInDropdown": false,
                                                "placeholder": "-- Select driver --"
                                              }' required>
                                                <option value="">-- Select a Driver--</option>
                                                @foreach ($drivers as $driver)
                                                <option value="{{ $driver->id }}" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-dark me-2"></span>{{ $driver->first_name.' '.$driver->last_name }}</span>'>{{ $driver->first_name.' '.$driver->last_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('driver_id.0') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Driver -->

                                <!-- Van -->
                                <div class="row mb-4">
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="bi-truck nav-icon"></i>
                                            <div class="flex-grow-1">Van</div>
                                        </div>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-sm">
                                        <!-- Select -->
                                        <div class="tom-select-custom">
                                            <select wire:model.defer='van_id.0' name="van_id.0" class="js-select form-select w-auto" autocomplete="off" id="eventColorLabel" data-hs-tom-select-options='{
                                                          "searchInDropdown": false,
                                                          "placeholder": "-- Select van --"
                                                        }' required>
                                                <option value="">-- Select a Van--</option>
                                                @foreach ($vans as $van)
                                                <option value="{{ $van->id }}" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-dark me-2"></span>{{ $van->reg.' ('.$van->brand.' '.$van->model.' '.$van->year.')' }}</span>'>{{ $van->reg.' ('.$van->brand.' '.$van->model.' '.$van->year.')' }}</option>
                                                @endforeach
                                            </select>
                                            @error('van_id.0') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Van -->

                                <!-- Date -->
                                <div class="row mb-4">
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="bi-calendar nav-icon"></i>
                                            <div class="flex-grow-1">Date</div>
                                        </div>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-sm">
                                        <!-- Select -->
                                        <!-- Flatpickr -->
                                        <input wire:model='dates.0' name="dates.0" type="text" id="myID" class="flatpickr-custom form-control mb-2" placeholder="Select dates and times">
                                        @error('dates.0') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Date -->

                                <!-- Description -->
                                <div class="mb-4 row">
                                    <label for="description" class="col-sm-3 col-form-label form-label">Description</label>

                                    <div class="col-sm-9">
                                        <textarea wire:model.defer='description.0' class="form-control" name="description.0" id="description"
                                            cols="10" rows="3" placeholder="Describe shift duty" aria-label="Describe shift duty">
                                        </textarea>
                                        @error('description.0') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Description -->
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="ms-auto">
                                    <button wire:click.prevent='add({{$i}})' type="button" class="btn btn-ghost-danger">
                                        <i class="bi-plus"></i> Add another shift
                                    </button>
                                </div>
                            </div>
                        </fieldset>

                        @foreach ($inputs as $key => $value)
                        <fieldset class="form-control">
                            <legend class="form-control">Shift {{ $key + 2 }}</legend>

                            <div class="card-body">

                                <!-- Driver -->
                                <div class="row mb-4">
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="bi-person nav-icon"></i>
                                            <div class="flex-grow-1">Driver</div>
                                        </div>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-sm">
                                        <!-- Select -->
                                        <div class="tom-select-custom">
                                            <select wire:model.defer='driver_id.{{ $value }}' name="driver_id.{{ $value }}" class="js-select form-select w-auto" autocomplete="off" id="eventColorLabel" data-hs-tom-select-options='{
                                                "searchInDropdown": false,
                                                "placeholder": "-- Select driver --"
                                              }' required>
                                                <option value="">-- Select a Driver--</option>
                                                @foreach ($drivers as $driver)
                                                <option value="{{ $driver->id }}" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-dark me-2"></span>{{ $driver->first_name.' '.$driver->last_name }}</span>'>{{ $driver->first_name.' '.$driver->last_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('driver_id.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Driver -->

                                <!-- Van -->
                                <div class="row mb-4">
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="bi-truck nav-icon"></i>
                                            <div class="flex-grow-1">Van</div>
                                        </div>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-sm">
                                        <!-- Select -->
                                        <div class="tom-select-custom">
                                            <select wire:model.defer='van_id.{{ $value }}' name="van_id.{{ $value }}" class="js-select form-select w-auto" autocomplete="off" id="eventColorLabel" data-hs-tom-select-options='{
                                                          "searchInDropdown": false,
                                                          "placeholder": "-- Select van --"
                                                        }' required>
                                                <option value="">-- Select a Van--</option>
                                                @foreach ($vans as $van)
                                                <option value="{{ $van->id }}" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-dark me-2"></span>{{ $van->reg.' ('.$van->brand.' '.$van->model.' '.$van->year.')' }}</span>'>{{ $van->reg.' ('.$van->brand.' '.$van->model.' '.$van->year.')' }}</option>
                                                @endforeach
                                            </select>
                                            @error('van_id.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Van -->

                                <!-- Date -->
                                <div class="row mb-4">
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="bi-calendar nav-icon"></i>
                                            <div class="flex-grow-1">Date</div>
                                        </div>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-sm">
                                        <!-- Select -->
                                        <!-- Flatpickr -->
                                        <input wire:model='dates.{{ $value }}' name="dates.{{ $value }}" type="text" id="myID" class="flatpickr-custom form-control mb-2" placeholder="Select dates and times">
                                        @error('dates.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Date -->

                                <!-- Description -->
                                <div class="mb-4 row">
                                    <label for="description{{ $value }}" class="col-sm-3 col-form-label form-label">Address line 1</label>

                                    <div class="col-sm-9">
                                        <textarea wire:model.defer='description.{{ $value }}' class="form-control" name="description.{{ $value }}" id="description{{ $value }}"
                                            cols="10" rows="3" placeholder="Next of kin residential address" aria-label="Next of kin residential address">
                                        </textarea>
                                        @error('description.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                        {{--  <input type="text" class="form-control" name="addressLine1" id="addressLine1Label" placeholder="Your address" aria-label="Your address" />  --}}
                                    </div>
                                </div>
                                <!-- End Description -->

                            </div>

                            <div class="d-flex align-items-center">
                                <div class="ms-auto">
                                    <button wire:click.prevent="remove({{$key}})" type="button" class="btn btn-ghost-danger">
                                        <i class="bi-dash"></i> Remove this Shift
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                        @endforeach

                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer d-flex align-items-center">
                            <div class="ms-auto">
                                <button wire:click='create' type="button" class="btn btn-primary">
                                    Make Shift <i class="bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->

                </div>
                <!-- End Content Step Form -->

            </div>
        </div>
        <!-- End Row -->
    </form>
    <!-- End Step Form -->

    <!-- Toast -->
    <div x-data="{ open: false }" x-init="
        @this.on('notify-saved', () => {
            if (open === false) setTimeout(() => { open = false }, 2500);
            open = true; wire:
            toastr.success('Shifts created!');
        });" x-show.transition.out.duration.1500ms="open" style="display: none;">

        <div id="successToast" class="position-fixed toast show" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
            <div class="toast-header">
                <div class="d-flex align-items-center flex-grow-1">
                <div class="flex-shrink-0">
                    <img class="avatar avatar-sm avatar-circle" src="{{ asset('admin-assets/svg/illustrations/oc-hi-five.svg') }}" alt="Image description">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0">Shifts created!</h5>
                    <small class="ms-auto">{{ now()->diffForHumans() }}</small>
                </div>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Toast -->

</div>
