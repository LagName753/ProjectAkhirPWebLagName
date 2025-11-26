<?php

namespace App\Http\Livewire\Admins;

use App\Models\requestedAppointment;
use App\Models\appointment;
use App\Models\patient;
use App\Models\doctor;
use Livewire\Component;
use Livewire\WithPagination;

class RequestedAppointments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $patients_id;
    public $doctor_id;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $message;
    
    public $start_timeee;
    public $endtime;

    public $edit_request_id;
    public $button_text = "Update Request";

    public function edit($id)
    {
        $request = requestedAppointment::findOrFail($id);
        $this->edit_request_id = $id;
        $this->name = $request->name;
        $this->email = $request->email;
        $this->phone = $request->phone;
        $this->address = $request->address;
        $this->message = $request->message;
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
        ]);

        $request = requestedAppointment::findOrFail($id);
        $request->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'message' => $this->message,
        ]);

        $this->reset_fields();
        session()->flash('message', 'Request Updated Successfully.');
    }

    public function approve($id)
    {
        $request = requestedAppointment::findOrFail($id);

        $patient = patient::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'age' => 0,
                'gender' => 'unknown',
            ]
        );

        session()->flash('message', 'Request Approved! Please create official appointment now.');
    }

    public function delete($id)
    {
        requestedAppointment::findOrFail($id)->delete();
        session()->flash('message', 'Request Deleted Successfully.');
    }

    public function reset_fields()
    {
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->address = "";
        $this->message = "";
        $this->edit_request_id = null;
    }

    public function render()
    {
        return view('livewire.admins.requested-appointments.index', [
            'requested_appointments' => requestedAppointment::latest()->paginate(10),
        ])->layout('admins.layouts.app');
    }
}