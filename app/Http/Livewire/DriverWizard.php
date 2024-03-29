<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Driver;
use Livewire\Component;
use App\Models\NextOfKin;
use App\Models\Certification;
use Livewire\WithFileUploads;
use App\Events\DriverCreatedEvent;
use Illuminate\Support\Facades\Hash;

class DriverWizard extends Component
{
    use WithFileUploads;

    public $currentStep = 1;

    // Driver data
    public $email;
    public $avatar;
    public $first_name;
    public $last_name;
    public $other_name;
    public $gender;
    public $phone_1;
    public $phone_2;
    public $personal_email;
    public $date_of_birth;
    public $nationality;
    public $employment_date;
    public $address_line_1;
    public $address_line_2;
    public $marital_status;

    // Next of Kins
    public $title, $full_name, $relationship, $phone_number_1, $phone_number_2, $email_address, $residential_address;
    public $inputs = [];
    public $i = 1;

    // Certifications
    public $certificate_title, $src, $issue_date = '', $expiry_date = '';
    public $certInputs = [];
    public $cI = 1;

    protected $messages = [
        'email.required' => 'A valid email is required',
        'avatar.image' => 'File must be an image',
        'avatar.max' => 'File must not be larger than 5mb',
        'first_name.required' => 'First name is required',
        'last_name.required' => 'Last name is required',
        'gender.required' => 'Select a gender',
        'phone_1.required' => 'Phone number is required',
        'date_of_birth.required' => 'Date of birth is required',
        'nationality.required' => 'Nationality is required',
        'employment_date.required' => 'Employment date is required',
        'residential_address.required' => 'Address is required',
        'marital_status.required' => 'Marital status is required',
        'address_line_1.required' => 'Residential address is required',
        'full_name.0.required' => 'Full name is required',
        'phone_number_1.0.required' => 'Phone is required',
        'email_address.0.required' => 'Email is required',
        'residential_address.0.required' => 'Address is required',
        'relationship.0.required' => 'Relationship is required',
        'src.0.required' => 'Upload a valid Certificate file',
        'src.0.mimes:jpeg,bmp,png,gif,svg,pdf' => 'File must be in pdf or picture format',
        'src.0.mimes:max:5000' => 'File must not be larger than 5mb',
        'certificate_title.0.required' => 'Provide a valid title',
    ];

    public function firstStepSubmit()
    {
        // dd($this->email, $this->avatar, $this->department_id, $this->first_name, $this->last_name, $this->other_name, $this->gender, $this->phone_1, $this->phone_2, $this->staff_type, $this->grade_id);
        // Validate driver data
        $this->validate([
            'email' => 'required|string|email',
            'avatar' => 'nullable|image|max:5000',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'other_name' => 'sometimes',
            'gender' => 'required',
            'phone_1' => 'required',
            'phone_2' => 'sometimes',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        // Validate more driver details
        $this->validate([
            'personal_email' => 'sometimes',
            'date_of_birth' => 'sometimes',
            'nationality' => 'sometimes',
            'employment_date' => 'sometimes',
            'marital_status' => 'sometimes',
            'address_line_1' => 'sometimes',
            'address_line_2' => 'sometimes',
        ]);

        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        // Validate Next of Kins
        $this->validate([
            'title.0' => 'sometimes',
            'full_name.0' => 'required',
            'phone_number_1.0' => 'required',
            'phone_number_2.0' => 'sometimes',
            'email_address.0' => 'required',
            'residential_address.0' => 'required',
            'relationship.0' => 'required',
        ]);

        $this->currentStep = 4;
    }

    public function fourthStepSubmit()
    {
        // Validate certifications
        $this->validate([
            'certificate_title.0' => 'required',
            'src.0' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf|max:5000',
        ]);
        $this->currentStep = 5;
    }

    public function submitForm()
    {
        $user = User::create([
            'username' => strstr($this->email, '@', true),
            'email' => strtolower(trim($this->email)),
            'password' => Hash::make('Pass2022'),
            'email_verified_at' => now(),
            'role' => 'driver',
        ]);

        $this->avatar && $user->update([
            'avatar' => $this->avatar->store('/'.$user->username, 'avatars'),
        ]);

        $driver = Driver::create([
            'user_id' => $user->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_name' => $this->other_name,
            'gender' => $this->gender,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'personal_email' => $this->personal_email,
            'date_of_birth' => $this->date_of_birth,
            'nationality' => $this->nationality,
            'employment_date' => $this->employment_date,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'marital_status' => $this->marital_status,
        ]);

        foreach ($this->full_name as $key => $value) {
            NextOfKin::create([
                'driver_id' => $driver->id,
                'title' => !empty($this->title[$key]) ? $this->title[$key] : '',
                'residential_address' => !empty($this->residential_address[$key]) ? $this->residential_address[$key] : '',
                'phone_number_1' => !empty($this->phone_number_1[$key]) ? $this->phone_number_1[$key] : '',
                'phone_number_2' => !empty($this->phone_number_2[$key]) ? $this->phone_number_2[$key] : '',
                'email_address' => !empty($this->email_address[$key]) ? $this->email_address[$key] : '',
                'full_name' => !empty($this->full_name[$key]) ? $this->full_name[$key] : '',
                'relationship' => !empty($this->relationship[$key]) ? $this->relationship[$key] : '',
            ]);
        }

        foreach ($this->certificate_title as $key => $value) {
            Certification::create([
                'driver_id' => $driver->id,
                'certificate_title' => $this->certificate_title[$key],
                'mime' => $this->src[$key]->getClientOriginalExtension(),
                'src' => $this->src[$key]->store('/'.$user->username, 'certificates'),
                'issue_date' => !empty($this->issue_date[$key]) ? $this->issue_date[$key] : '',
                'original_name' => strstr($this->src[$key]->getClientOriginalName(), '.', true),
                'expiry_date' => !empty($this->expiry_date[$key]) ? $this->expiry_date[$key] : '',
            ]);
        }

        event(new DriverCreatedEvent($user));

        $this->reset();
        $this->src = '';
        $this->avatar = '';
        $this->emitSelf('notify-saved');

        $this->currentStep = 6;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function addCert($cI)
    {
        $cI = $cI + 1;
        $this->cI = $cI;
        array_push($this->certInputs ,$cI);
    }

    public function removeCert($cI)
    {
        unset($this->certInputs[$cI]);
    }

    public function resetAvatar()
    {
        $this->avatar = '';
    }

    public function render()
    {
        return view('livewire.driver-wizard');
    }
}
