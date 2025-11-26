<?php

namespace App\Http\Livewire\Admins;

use App\Models\doctor;
use App\Models\employee;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Employees extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $name;
    public $email;
    public $qualification;
    public $phone;
    public $gender;
    public $salary;
    public $position;
    public $address;
    public $status;
    public $image;
    
    public $existing_image;
    public $_page;
    public $_edit_employ_id;

    public function mount()
    {
        $this->_page = 'index';
    }

    public function show_create_form()
    {
        $this->_page = "create";
        $this->reset_fields();
    }

    public function show_edit_form($id)
    {
        $this->_page = "edit";
        $this->_edit_employ_id = $id;
        $employ = employee::find($id);
        
        $this->name = $employ->name;
        $this->email = $employ->email;
        $this->qualification = $employ->qualification;
        $this->phone = $employ->phone;
        $this->gender = $employ->gender;
        $this->salary = $employ->salary;
        $this->position = $employ->position;
        $this->address = $employ->address;
        $this->status = $employ->status;
        $this->existing_image = $employ->image;
    }

    public function show_index()
    {
        $this->_page = "index";
    }

    public function add_employee()
    {
        $this->validate([
            "name" => "required|string",
            "email" => "required|email|unique:employees,email",
            "phone" => "required|string|unique:employees,phone",
            "salary" => "required|numeric",
            "address" => "required|string",
            "qualification" => "required|string",
            "position" => "required|string|in:nurse,doctor,accountant,pharmacist,receptionist,cleaner,security,other",
            "status" => "required|string|in:active,inactive",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $imagePath = $this->image->store('employees', 'public');

        $employee = employee::create([
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "salary" => $this->salary,
            "address" => $this->address,
            "qualification" => $this->qualification,
            "position" => $this->position,
            "status" => $this->status,
            "image" => $imagePath
        ]);

        if ($this->position == "doctor") {
            doctor::create([
                "employee_id" => $employee->id
            ]);
        }

        $this->reset_fields();
        session()->flash('message', 'Employee added successfully.');
        $this->_page = "index";
    }

    public function update_employee()
    {
        $this->validate([
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "salary" => "required|numeric",
            "address" => "required|string",
            "qualification" => "required|string",
            "position" => "required|string|in:nurse,doctor,accountant,pharmacist,receptionist,cleaner,security,other",
            "status" => "required|string|in:active,inactive",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $employ = employee::find($this->_edit_employ_id);
        $imagePath = $employ->image;

        if ($this->image) {
            if ($employ->image) {
                Storage::disk('public')->delete($employ->image);
            }
            $imagePath = $this->image->store('employees', 'public');
        }

        $employ->update([
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "salary" => $this->salary,
            "address" => $this->address,
            "qualification" => $this->qualification,
            "position" => $this->position,
            "status" => $this->status,
            "image" => $imagePath
        ]);

        $this->reset_fields();
        session()->flash('message', 'Employee updated successfully.');
        $this->_page = "index";
    }

    public function delete($id)
    {
        $employ = employee::find($id);

        if ($employ) {
            if ($employ->image) {
                Storage::disk('public')->delete($employ->image);
            }
            $employ->delete();
            session()->flash('message', 'Employee deleted successfully.');
        }
    }

    public function reset_fields()
    {
        $this->name = "";
        $this->email = "";
        $this->qualification = "";
        $this->phone = "";
        $this->gender = "";
        $this->salary = "";
        $this->position = "";
        $this->address = "";
        $this->status = "";
        $this->image = null;
        $this->existing_image = null;
        $this->_edit_employ_id = null;
    }

    public function render()
    {
        $positions = ["nurse", "doctor", "accountant", "pharmacist", "receptionist", "cleaner", "security", "other"];
        
        $employeesData = employee::latest()->paginate(10);

        if ($this->_page == "index") {
            return view('livewire.admins.employ.index', [
                'employees' => $employeesData,
                'positions' => $positions
            ])->layout('admins.layouts.app');

        } else if ($this->_page == "create") {
            return view('livewire.admins.employ.create', [
                'positions' => $positions
            ])->layout('admins.layouts.app');

        } else if ($this->_page == "edit") {
            return view('livewire.admins.employ.edit', [
                'positions' => $positions
            ])->layout('admins.layouts.app');
        }
    }
}