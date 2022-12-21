<div>
    <!-- Step Form -->
    <form class="py-md-5">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <!-- Step -->
                <ul id="addUserStepFormProgress" class="mb-3 step step-sm step-icon-sm step-inline step-item-between mb-md-5">
                    <li class="step-item {{ $currentStep == 1 ? 'active' : '' }}">
                        <a class="step-content-wrapper" href="#!">
                            <span class="step-icon step-icon-soft-dark">1</span>
                            <div class="step-content">
                                <span class="step-title">Basic</span>
                            </div>
                        </a>
                    </li>

                    <li class="step-item {{ $currentStep == 2 ? 'active' : '' }}">
                        <a class="step-content-wrapper" href="#!">
                            <span class="step-icon step-icon-soft-dark">2</span>
                            <div class="step-content">
                                <span class="step-title">More</span>
                            </div>
                        </a>
                    </li>

                    <li class="step-item {{ $currentStep == 3 ? 'active' : '' }}">
                        <a class="step-content-wrapper" href="#!">
                            <span class="step-icon step-icon-soft-dark">3</span>
                            <div class="step-content">
                                <span class="step-title">Contacts</span>
                            </div>
                        </a>
                    </li>

                    <li class="step-item {{ $currentStep == 4 ? 'active' : '' }}">
                        <a class="step-content-wrapper" href="#!">
                            <span class="step-icon step-icon-soft-dark">4</span>
                            <div class="step-content">
                                <span class="step-title">Uploads</span>
                            </div>
                        </a>
                    </li>

                    <li class="step-item {{ $currentStep == 5 ? 'active' : '' }}">
                        <a class="step-content-wrapper" href="#!">
                            <span class="step-icon step-icon-soft-dark">5</span>
                            <div class="step-content">
                                <span class="step-title">Confirmation</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- End Step -->

                <!-- Content Step Form -->
                <div id="addUserStepFormContent">
                    <!-- Card -->
                    <div id="step-1" class="card card-lg {{ $currentStep == 1 ? 'active' : '' }}" style="{{ $currentStep != 1 ? 'display: none;' : '' }}">
                        <!-- Body -->
                        <div class="card-body">

                            <!-- Avatar Form -->
                            <div class="mb-4 row">
                                <label class="col-sm-3 col-form-label form-label">Avatar</label>

                                <div class="col-sm-9">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <label class="avatar avatar-xl avatar-circle avatar-uploader me-5" for="avatarUploader">
                                            @if ($avatar)
                                            <img wire:loading.class.delay='opacity-75' id="avatarImg" class="avatar-img" src="{{ $avatar->temporaryUrl() }}" alt="avatar">
                                            @else
                                            <img id="avatarImg" class="avatar-img" src="{{ asset('admin-assets/img/160x160/img1.jpg') }}" alt="avatar">
                                            @endif
                                            <input wire:model='avatar' type="file" name="avatar" accept="image/png, image/jpeg" class="js-file-attach avatar-uploader-input" id="avatarUploader" >

                                            <span class="avatar-uploader-trigger">
                                                <i class="shadow-sm bi-pencil avatar-uploader-icon"></i>
                                            </span>
                                        </label>
                                        <!-- End Avatar -->

                                        <button wire:click='resetAvatar' type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                    </div>
                                    @error('avatar') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->

                            <!-- Names Form -->
                            <div class="mb-4 row">
                                <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full name
                                    <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Full name of staff."></i>
                                </label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-vertical">
                                        <input wire:model.defer='first_name' type="text" class="form-control" name="firstName" id="firstNameLabel" placeholder="First name" aria-label="First name" required>
                                        <input wire:model.defer='last_name' type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Last name" aria-label="Last name" required>
                                        <input wire:model.defer='other_name' type="text" class="form-control" name="otherName" id="otherNameLabel" placeholder="Other name" aria-label="Other name">
                                    </div>
                                    @error('first_name') <span class="text-danger">{{ $message }} | </span> @enderror
                                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->

                            <!-- Email Form -->
                            <div class="mb-4 row">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Official Email
                                    <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Official email of staff."></i>
                                </label>

                                <div class="col-sm-9">
                                    <input wire:model.defer='email' type="email" class="form-control" name="email" id="emailLabel" placeholder="staff@rotas.com" aria-label="staff@rotas.com">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->

                            <!-- Phone_1 Form -->
                            <div class="mb-4 js-add-field row" >
                                <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Primary phone <span class="form-label-secondary"></span></label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-vertical">
                                        <input wire:model.defer='phone_1' type="text" class="js-input-mask form-control" name="phone" id="phoneLabel" placeholder="+(xxx)xxx-xxx-xxxx" aria-label="+(xxx)xxx-xxx-xxxx" required>
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-end">
                                            <select class="js-select form-select" autocomplete="off" data-hs-tom-select-options='{
                                                    "searchInDropdown": false,
                                                    "hideSearch": true,
                                                    "dropdownWidth": "8rem"
                                                }'>
                                                <option value="Mobile" selected>Mobile</option>
                                                <option value="Home">Home</option>
                                                <option value="Work">Work</option>
                                                <option value="Fax">Fax</option>
                                                <option value="Direct">Direct</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    @error('phone_1') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->

                            <!-- Phone_2 Form -->
                            <div class="mb-4 js-add-field row" >
                                <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Other phone <span class="form-label-secondary"></span></label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-vertical">
                                        <input wire:model.defer='phone_2' type="text" class="js-input-mask form-control" name="phone" id="phoneLabel" placeholder="+(xxx)xxx-xxx-xxxx" aria-label="+(xxx)xxx-xxx-xxxx">
                                        @error('phone_2') <span class="error">{{ $message }}</span> @enderror
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-end">
                                            <select class="js-select form-select" autocomplete="off" data-hs-tom-select-options='{
                                                    "searchInDropdown": false,
                                                    "hideSearch": true,
                                                    "dropdownWidth": "8rem"
                                                }'>
                                                <option value="Mobile" selected>Mobile</option>
                                                <option value="Home">Home</option>
                                                <option value="Work">Work</option>
                                                <option value="Fax">Fax</option>
                                                <option value="Direct">Direct</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                </div>
                            </div>

                            <!-- Gender Form -->
                            <div class="mb-4 row">
                                <label class="col-sm-3 col-form-label form-label">Gender</label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-vertical">
                                        <!-- Radio Check -->
                                        <label class="form-control" for="maleRadio">
                                            <span class="form-check">
                                                <input wire:model='gender' value="Male" type="radio" class="form-check-input" name="userAccountTypeRadio" id="maleRadio">
                                                <span class="form-check-label">Male</span>
                                            </span>
                                        </label>
                                        <!-- End Radio Check -->

                                        <!-- Radio Check -->
                                        <label class="form-control" for="femaleRadio">
                                            <span class="form-check">
                                                <input wire:model='gender' value="Female" type="radio" class="form-check-input" name="userAccountTypeRadio" id="femaleRadio">
                                                <span class="form-check-label">Female</span>
                                            </span>
                                        </label>
                                        <!-- End Radio Check -->
                                    </div>
                                </div>
                                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- End Form -->

                        </div>
                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer d-flex justify-content-end align-items-center">
                            <button wire:click="firstStepSubmit" type="button" class="btn btn-primary">
                                Next <i class="bi-chevron-right"></i>
                            </button>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div id="step-2" class="card card-lg {{ $currentStep == 2 ? 'active' : '' }}" style="{{ $currentStep != 2 ? 'display: none;' : '' }}">
                        <!-- Body -->
                        <div class="card-body">

                            <!-- Form -->
                            <div class="mb-4 row">
                                <label for="personalEmailLabel" class="col-sm-3 col-form-label form-label">Personal email
                                    <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Personal email address of staff."></i>
                                </label>

                                <div class="col-sm-9">
                                    <input wire:model.defer='personal_email' type="email" class="form-control" name="email" id="personalEmailLabel" placeholder="staff@gmail.com" aria-label="staff@gmail.com">
                                    @error('personal_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->
                            <!-- Form -->
                            <div class="mb-4 row">
                                <label for="dateOfBirth" class="col-sm-3 col-form-label form-label">Date of birth</label>

                                <div class="col-sm-9">
                                    <input wire:model.defer='date_of_birth' type="date" class="form-control" name="date_of_birth" id="dateOfBirth">
                                    @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->
                            <!-- Form -->
                            <div class="mb-4 row">
                                <label for="addressLine1Label" class="col-sm-3 col-form-label form-label">Address line 1</label>

                                <div class="col-sm-9">
                                    <textarea wire:model.defer='address_line_1' class="form-control" name="address_line_1" id="addressLine1Label"
                                        cols="10" rows="3" placeholder="Staff residential address" aria-label="Staff residential address">
                                    </textarea>
                                    @error('address_line_1') <span class="text-danger">{{ $message }}</span> @enderror
                                    {{--  <input type="text" class="form-control" name="addressLine1" id="addressLine1Label" placeholder="Your address" aria-label="Your address" />  --}}
                                </div>
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4 row">
                                <label for="addressLine2Label" class="col-sm-3 col-form-label form-label">Address line 2 <span class="form-label-secondary">(Optional)</span></label>

                                <div class="col-sm-9">
                                    <input wire:model.defer='address_line_2' type="text" class="form-control" name="addressLine2" id="addressLine2Label" placeholder="Your address" aria-label="Your address" />
                                    @error('address_line_2') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4 row">
                                <label for="nationalityLabel" class="col-sm-3 col-form-label form-label">
                                    Nationality <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Staff nationality of origin"></i>
                                </label>

                                <div class="col-sm-9">
                                    <input wire:model.defer='nationality' type="text" class="form-control" name="nationality" id="nationalityLabel" placeholder="Nigerian" aria-label="Nigerian"/>
                                    @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->
                            <!-- Form -->
                            <div class="mb-4 row">
                                <label class="col-sm-3 col-form-label form-label">Marital status</label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-vertical">
                                        <!-- Radio Check -->
                                        <label class="form-control" for="married">
                                            <span class="form-check">
                                                <input wire:model.defer='marital_status' value="married" type="radio" class="form-check-input" name="marital_status" id="married">
                                                <span class="form-check-label">Married</span>
                                            </span>
                                        </label>
                                        <!-- End Radio Check -->

                                        <!-- Radio Check -->
                                        <label class="form-control" for="divorced">
                                            <span class="form-check">
                                                <input wire:model.defer='marital_status' value="divorced" type="radio" class="form-check-input" name="marital_status" id="divorced">
                                                <span class="form-check-label">Divorced</span>
                                            </span>
                                        </label>
                                        <!-- End Radio Check -->
                                        <!-- Radio Check -->
                                        <label class="form-control" for="single">
                                            <span class="form-check">
                                                <input wire:model.defer='marital_status' value="single" type="radio" class="form-check-input" name="marital_status" id="single">
                                                <span class="form-check-label">Single</span>
                                            </span>
                                        </label>
                                        <!-- End Radio Check -->
                                    </div>
                                    @error('marital_status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->
                            <!-- Form -->
                            <div class="row">
                                <label for="employmentDateLabel" class="col-sm-3 col-form-label form-label">
                                    Date employed <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Staff employment Date"></i>
                                </label>

                                <div class="col-sm-9">
                                    <input wire:model.defer='employment_date' type="date" class="form-control" name="employment_date" id="employmentDateLabel" />
                                    @error('employment_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- End Form -->
                        </div>
                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer d-flex align-items-center">
                            <button wire:click="back(1)" type="button" class="btn btn-ghost-secondary">
                                <i class="bi-chevron-left"></i> Previous step
                            </button>

                            <div class="ms-auto">
                                <button wire:click='secondStepSubmit' type="button" class="btn btn-primary">
                                    Next <i class="bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div id="step-3" class="card card-lg {{ $currentStep == 3 ? 'active' : '' }}" style="{{ $currentStep != 3 ? 'display: none;' : '' }}">
                        <!-- Body -->
                        <fieldset class="form-control">
                            <legend class="form-control">Next of kin 1</legend>

                            <div class="card-body">
                                <!-- Form -->
                                <div class="mb-4 js-add-field row" >
                                    <label for="nextOfKinFullName" class="col-sm-3 col-form-label form-label">Full name
                                        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Full name of next of Kin."></i>
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-vertical">
                                            <input wire:model.defer='full_name.0' type="text" class="js-input-mask form-control" name="full_name.0" id="nextOfKinFullName" placeholder="Full name" aria-label="Full name">
                                            <!-- Select -->
                                            <div class="tom-select-custom tom-select-custom-end">
                                                <select wire:model='title.0' 'title.0' class="js-select form-select" autocomplete="off" required data-hs-tom-select-options='{
                                                        "searchInDropdown": false,
                                                        "hideSearch": true,
                                                        "dropdownWidth": "8rem"
                                                    }'>
                                                    <option value="Chief">Chief</option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                    <option value="Ms.">Ms.</option>
                                                    <option value="Sir">Sir</option>
                                                    <option value="Rev">Rev</option>
                                                    <option value="Elder">Elder</option>
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                        @error('full_name.0') <span class="text-danger">{{ $message }}</span> @enderror
                                        @error('title.0') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->
                                <!-- Form -->
                                <div class="mb-4 row">
                                    <label for="nextOfKinRelationship" class="col-sm-3 col-form-label form-label">Relationship
                                        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Relationship to Next of Kin."></i>
                                    </label>

                                    <div class="col-sm-9">
                                        <input wire:model="relationship.0" type="text" class="form-control" name="relationship.0" id="nextOfKinRelationship" placeholder="Relationship to Next of Kin" aria-label="Relationship to Next of Kin">
                                        @error('relationship.0') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->
                                <!-- Form -->
                                <div class="mb-4 row">
                                    <label for="nextOfKinResidentialAddress" class="col-sm-3 col-form-label form-label">Address line 1</label>

                                    <div class="col-sm-9">
                                        <textarea wire:model.defer='residential_address.0' class="form-control" name="residential_address.0" id="nextOfKinResidentialAddress"
                                            cols="10" rows="3" placeholder="Next of kin residential address" aria-label="Next of kin residential address">
                                        </textarea>
                                        @error('residential_address.0') <span class="text-danger">{{ $message }}</span> @enderror
                                        {{--  <input type="text" class="form-control" name="addressLine1" id="addressLine1Label" placeholder="Your address" aria-label="Your address" />  --}}
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="mb-4 row">
                                    <label for="nextOfKinEmailAddress" class="col-sm-3 col-form-label form-label">Email
                                        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Email of next of kin."></i>
                                    </label>

                                    <div class="col-sm-9">
                                        <input wire:model.defer='email_address.0' type="email" class="form-control" name="email_address.0" id="nextOfKinEmailAddress" placeholder="staff@nueoffshore.com" aria-label="staff@nueoffshore.com">
                                        @error('email_address.0') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="mb-4 js-add-field row" >
                                    <label for="nextOfKinPhone1" class="col-sm-3 col-form-label form-label">Primary phone <span class="form-label-secondary"></span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-vertical">
                                            <input wire:model.defer='phone_number_1.0' type="text" class="js-input-mask form-control" name="phone_number_1.0" id="nextOfKinPhone1" placeholder="+(xxx)xxx-xxx-xxxx" aria-label="+(xxx)xxx-xxx-xxxx" required>
                                        </div>
                                        @error('phone_number_1.0') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->
                                <!-- Form -->
                                <div class="mb-4 js-add-field row" >
                                    <label for="nextOfKinPhone2" class="col-sm-3 col-form-label form-label">Other phone <span class="form-label-secondary"></span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-vertical">
                                            <input wire:model.defer='phone_number_2.0' type="text" class="js-input-mask form-control" name="phone_number_2.0" id="nextOfKinPhone2" placeholder="+(xxx)xxx-xxx-xxxx" aria-label="+(xxx)xxx-xxx-xxxx">
                                        </div>
                                        @error('phone_number_2.0') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="ms-auto">
                                    <button wire:click.prevent='add({{$i}})' type="button" class="btn btn-ghost-danger">
                                        <i class="bi-plus"></i> Add another Next of kin
                                    </button>
                                </div>
                            </div>
                        </fieldset>

                        @foreach ($inputs as $key => $value)
                        <fieldset class="form-control">
                            <legend class="form-control">Next of kin {{ $key + 2 }}</legend>

                            <div class="card-body">
                                <!-- Form -->
                                <div class="mb-4 js-add-field row" >
                                    <label for="nextOfKinFullName{{ $value }}" class="col-sm-3 col-form-label form-label">Full name
                                        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Full name of next of Kin."></i>
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-vertical">
                                            <input wire:model.defer='full_name.{{ $value }}' type="text" class="js-input-mask form-control" name="full_name.{{ $value }}" id="nextOfKinFullName{{ $value }}" placeholder="Full name" aria-label="Full name">
                                            <!-- Select -->
                                            <div class="tom-select-custom tom-select-custom-end">
                                                <select wire:model='title.{{ $value }}' id="'title.{{ $value }}'" class="js-select form-select" autocomplete="off" required data-hs-tom-select-options='{
                                                        "searchInDropdown": false,
                                                        "hideSearch": true,
                                                        "dropdownWidth": "8rem"
                                                    }'>
                                                    <option value="Chief">Chief</option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                    <option value="Ms.">Ms.</option>
                                                    <option value="Sir">Sir</option>
                                                    <option value="Rev">Rev</option>
                                                    <option value="Elder">Elder</option>
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                        @error('full_name.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                        @error('title.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->
                                <!-- Form -->
                                <div class="mb-4 row">
                                    <label for="nextOfKinRelationship{{ $value }}" class="col-sm-3 col-form-label form-label">Relationship
                                        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Relationship to Next of Kin."></i>
                                    </label>

                                    <div class="col-sm-9">
                                        <input wire:model="relationship.{{ $value }}" type="text" class="form-control" name="relationship.{{ $value }}" id="nextOfKinRelationship{{ $value }}" placeholder="Relationship to Next of Kin" aria-label="Relationship to Next of Kin">
                                        @error('relationship.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->
                                <!-- Form -->
                                <div class="mb-4 row">
                                    <label for="nextOfKinResidentialAddress{{ $value }}" class="col-sm-3 col-form-label form-label">Address line 1</label>

                                    <div class="col-sm-9">
                                        <textarea wire:model.defer='residential_address.{{ $value }}' class="form-control" name="residential_address.{{ $value }}" id="nextOfKinResidentialAddress{{ $value }}"
                                            cols="10" rows="3" placeholder="Next of kin residential address" aria-label="Next of kin residential address">
                                        </textarea>
                                        @error('residential_address.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                        {{--  <input type="text" class="form-control" name="addressLine1" id="addressLine1Label" placeholder="Your address" aria-label="Your address" />  --}}
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="mb-4 row">
                                    <label for="nextOfKinEmailAddress{{ $value }}" class="col-sm-3 col-form-label form-label">Email
                                        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Email of next of kin."></i>
                                    </label>

                                    <div class="col-sm-9">
                                        <input wire:model.defer='email_address.{{ $value }}' type="email" class="form-control" name="email_address.{{ $value }}" id="nextOfKinEmailAddress{{ $value }}" placeholder="nextofkin@gmail.com" aria-label="nextofkin@gmail.com">
                                        @error('email_address.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="mb-4 js-add-field row" >
                                    <label for="nextOfKinPhone1{{ $value }}" class="col-sm-3 col-form-label form-label">Primary phone <span class="form-label-secondary"></span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-vertical">
                                            <input wire:model.defer='phone_number_1.{{ $value }}' type="text" class="js-input-mask form-control" name="phone_number_1.{{ $value }}" id="nextOfKinPhone1{{ $value }}" placeholder="+(xxx)xxx-xxx-xxxx" aria-label="+(xxx)xxx-xxx-xxxx">
                                        </div>
                                        @error('phone_number_1.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->
                                <!-- Form -->
                                <div class="mb-4 js-add-field row" >
                                    <label for="nextOfKinPhone2{{ $value }}" class="col-sm-3 col-form-label form-label">Other phone <span class="form-label-secondary"></span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-vertical">
                                            <input wire:model.defer='phone_number_2.{{ $value }}' type="text" class="js-input-mask form-control" name="phone_number_2.{{ $value }}" id="nextOfKinPhone2{{ $value }}" placeholder="+(xxx)xxx-xxx-xxxx" aria-label="+(xxx)xxx-xxx-xxxx">
                                        </div>
                                        @error('phone_number_2.{{ $value }}') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- End Form -->
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="ms-auto">
                                    <button wire:click.prevent="remove({{$key}})" type="button" class="btn btn-ghost-danger">
                                        <i class="bi-dash"></i> Remove this Next of kin
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                        @endforeach

                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer d-flex align-items-center">
                            <button wire:click="back(2)" type="button" class="btn btn-ghost-secondary">
                                <i class="bi-chevron-left"></i> Previous step
                            </button>

                            <div class="ms-auto">
                                <button wire:click='thirdStepSubmit' type="button" class="btn btn-primary">
                                    Next <i class="bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div id="step-4" class="card card-lg {{ $currentStep == 4 ? 'active' : '' }}" style="{{ $currentStep != 4 ? 'display: none;' : '' }}">
                        <!-- Body -->
                        <fieldset class="form-control">
                            <legend class="form-control">Certification 1</legend>

                            <div class="card-body">
                                <!-- Form -->
                                <div class="mb-4 js-add-field row" >
                                    <label for="certificate_title.0" class="col-sm-3 col-form-label form-label">Title
                                        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Title of Document."></i>
                                    </label>

                                    <div class="col-sm-9">
                                        <!-- Select -->
                                        <div class="mb-2 tom-select-custom">
                                            <select wire:model.defer='certificate_title.0' class="js-select form-select" id="certificate_title.0" required>
                                                <option selected value="">-- Select an item below --</option>
                                                <option value="Curriculum Vitae">CV</option>
                                                <option value="Driver's Licence">Driver's Licence</option>
                                                <option value="NIN">NIN</option>
                                                <option value="Passport">Passport</option>
                                                <option value="Proof of Address">Proof of Address</option>
                                                <option value="Educational Qualification">Educational Qualification</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            @error('certificate_title.0') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <x-input.group label="Certificate file" for="src.0" :error="$errors->first('src.0')" tip="Attach soft copy of certificate">
                                    <x-input.filepond wire:model="src.0" id="src.0" required />
                                </x-input.group>
                                <!-- End Form -->

                                <!-- Form -->
                                <x-input.group label="Issue date" for="issue_date.0" :error="$errors->first('issue_date.0')" tip="Date the certificate was issued">
                                    <x-input.date wire:model="issue_date.0" />
                                </x-input.group>
                                <!-- End Form -->

                                <!-- Form -->
                                <x-input.group label="Expiry date" for="expiry_date.0" :error="$errors->first('expiry_date.0')" tip="Date the certificate expires">
                                    <x-input.date wire:model="expiry_date.0" />
                                </x-input.group>
                                <!-- End Form -->

                            </div>

                            <div class="d-flex align-items-center">
                                <div class="ms-auto">
                                    <button wire:click.prevent='addCert({{$cI}})' type="button" class="btn btn-ghost-danger">
                                        <i class="bi-plus"></i> Add another Certification
                                    </button>
                                </div>
                            </div>
                        </fieldset>

                        @foreach ($certInputs as $certKey => $certValue)
                        <fieldset class="form-control">
                            <legend class="form-control">Certification {{ $certKey + 2 }}</legend>

                            <div class="card-body">
                                <!-- Form -->
                                <div class="mb-4 js-add-field row" >
                                    <label for="certificate_title.{{ $certValue }}" class="col-sm-3 col-form-label form-label">Title
                                        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Title of Document."></i>
                                    </label>

                                    <div class="col-sm-9">
                                        <!-- Select -->
                                        <div class="mb-2 tom-select-custom">
                                            <select wire:model.defer='certificate_title.{{ $certValue }}' class="js-select form-select" id="certificate_title.{{ $certValue }}" required>
                                                <option selected value="">-- Select an item below --</option>
                                                <option value="cv">CV</option>
                                                <option value="first_degree">First Degree</option>
                                                <option value="second_degree">Second Degree</option>
                                                <option value="third_degree">Third Degree</option>
                                                <option value="STCW">STCW</option>
                                                <option value="other">Other</option>
                                            </select>
                                            @error('certificate_title.{{ $certValue }}') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <x-input.group label="Certificate file" for="src.{{ $certValue }}" :error="$errors->first('src.{{ $certValue }}')" tip="Attach soft copy of certificate">
                                    <x-input.filepond wire:model="src.{{ $certValue }}" required />
                                </x-input.group>
                                <!-- End Form -->

                                <!-- Form -->
                                <x-input.group label="Issue date" for="issue_date.{{ $certValue }}" :error="$errors->first('issue_date.{{ $certValue }}')" tip="Date the certificate was issued">
                                    <x-input.date wire:model="issue_date.{{ $certValue }}"/>
                                </x-input.group>
                                <!-- End Form -->

                                <!-- Form -->
                                <x-input.group label="Expiry date" for="expiry_date.{{ $certValue }}" :error="$errors->first('expiry_date.{{ $certValue }}')" tip="Date the certificate expires">
                                    <x-input.date wire:model="expiry_date.{{ $certValue }}" />
                                </x-input.group>
                                <!-- End Form -->

                            </div>

                            <div class="d-flex align-items-center">
                                <div class="ms-auto">
                                    <button wire:click.prevent="removeCert({{$certKey}})" type="button" class="btn btn-ghost-danger">
                                        <i class="bi-dash"></i> Remove this Next of kin
                                    </button>
                                </div>
                            </div>
                        </fieldset>

                        @endforeach

                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer d-flex align-items-center">
                            <button wire:click="back(3)" type="button" class="btn btn-ghost-secondary">
                                <i class="bi-chevron-left"></i> Previous step
                            </button>

                            <div class="ms-auto">
                                <button wire:click='fourthStepSubmit' type="button" class="btn btn-primary">
                                    Next <i class="bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div id="step-5" class="card card-lg {{ $currentStep == 5 ? 'active' : '' }}" style="{{ $currentStep != 5 ? 'display: none;' : '' }}">
                        <!-- Profile Cover -->
                        <div class="profile-cover">
                                <div class="profile-cover-img-wrapper">
                                    <img class="profile-cover-img" src="{{ asset('admin-assets/img/1920x400/img1.jpg') }}" alt="Image Description">
                                </div>
                        </div>
                        <!-- End Profile Cover -->

                    <!-- Avatar -->
                    <div class="avatar avatar-xxl avatar-circle avatar-border-lg profile-cover-avatar">
                        @if($avatar)
                        <img class="avatar-img" src="{{ $avatar->temporaryUrl() }}" alt="avatar">
                        @else
                        <img class="avatar-img" src="{{ asset('admin-assets/img/160x160/img1.jpg') }}" alt="avatar">
                        @endif
                    </div>
                      <!-- End Avatar -->

                    <!-- Body -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-6 text-sm-end">Full name:</dt>
                            <dd class="col-sm-6">{{ ucfirst($first_name) }} {{ ucfirst($other_name) }} {{ ucfirst($last_name) }}</dd>

                            <dt class="col-sm-6 text-sm-end">Email:</dt>
                            <dd class="col-sm-6">{{ $email }}</dd>

                            <dt class="col-sm-6 text-sm-end">Phone:</dt>
                            <dd class="col-sm-6">{{ $phone_1 }}</dd>

                            <dt class="col-sm-6 text-sm-end">Address line 1:</dt>
                            <dd class="col-sm-6">{{ $address_line_1 }}</dd>

                            <dt class="col-sm-6 text-sm-end">Address line 2:</dt>
                            <dd class="col-sm-6">{{ $address_line_2 ? $address_line_2 : '-' }}</dd>

                        </dl>
                        <!-- End Row -->
                    </div>
                    <!-- End Body -->

                      <!-- Footer -->
                      <div class="card-footer d-sm-flex align-items-sm-center">
                        <button wire:click="back(4)" type="button" class="btn btn-ghost-secondary">
                            <i class="bi-chevron-left"></i> Previous step
                        </button>

                        <div class="ms-auto">
                            <button wire:click='submitForm' type="button" class="btn btn-primary">
                                Looks good! <i class="bi-chevron-right"></i>
                            </button>
                        </div>
                      </div>
                      <!-- End Footer -->
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Content Step Form -->

                <!-- Message Body -->
                <div id="step=6" style="{{ $currentStep != 6 ? 'display: none;' : '' }}">
                    <div class="text-center">
                        <img class="mb-3 img-fluid" src="{{ asset('admin-assets/svg/illustrations/oc-hi-five.svg') }}" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
                        <img class="mb-3 img-fluid" src="{{ asset('admin-assets/svg/illustrations-light/oc-hi-five.svg') }}" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">

                        <div class="mb-4">
                        <h2>Successful!</h2>
                            <p>New <span class="fw-semi-bold text-dark">Driver</span> account has been successfully created.</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a class="btn btn-white me-3" href="{{ route('drivers') }}">
                                <i class="bi-chevron-left ms-1"></i> Back to drivers
                            </a>
                            <a wire:click="back(1)" class="btn btn-primary">
                                <i class="bi-person-plus-fill me-1"></i> Add another driver
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Message Body -->
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
            toastr.success('Category created!');
        });" x-show.transition.out.duration.1500ms="open" style="display: none;">

        <div id="successToast" class="position-fixed toast show" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
            <div class="toast-header">
                <div class="d-flex align-items-center flex-grow-1">
                <div class="flex-shrink-0">
                    <img class="avatar avatar-sm avatar-circle" src="{{ asset('admin-assets/img/others/success-icon.png') }}" alt="Image description">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0">User account created!</h5>
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
