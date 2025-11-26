<?php

namespace App\Http\Livewire\Admins;

use App\Models\appointment as AppointmentModel;
use App\Models\patient;
use App\Models\doctor;
use Livewire\Component;

class Appointment2 extends Component
{
    public $patient;
    public $doctor;
    public $start_timeee;
    public $endtime;
    public $edit_appointment_id;
    public $button_text = "Add New Appointment";

    public function add_appointment()
    {
        if ($this->edit_appointment_id) {
            $this->update($this->edit_appointment_id);
        } else {
            $this->validate([
                'patient' => 'required|numeric',
                'doctor' => 'required|numeric',
            ]);
            
            AppointmentModel::create([
                'patient_id' => $this->patient,
                'doctor_id' => $this->doctor,
                'intime' => $this->start_timeee,
                'outtime' => $this->endtime,
            ]);

            $this->reset_fields();
            session()->flash('message', 'Appointment Created successfully.');
        }
    }

    public function edit($id)
    {
        $appointment = AppointmentModel::findOrFail($id);
        $this->edit_appointment_id = $id;
        $this->patient = $appointment->patient_id;
        $this->doctor = $appointment->doctor_id;
        $this->start_timeee = $appointment->intime;
        $this->endtime = $appointment->outtime;
        $this->button_text = "Update Appointment";
    }

    public function update($id)
    {
        $this->validate([
            'patient' => 'required|numeric',
            'doctor' => 'required|numeric',
        ]);

        $appointment = AppointmentModel::findOrFail($id);
        $appointment->patient_id = $this->patient;
        $appointment->doctor_id = $this->doctor;
        $appointment->intime = $this->start_timeee;
        $appointment->outtime = $this->endtime;
        $appointment->save();

        $this->reset_fields();
        session()->flash('message', 'Appointment Updated Successfully.');
        $this->button_text = "Add New Appointment";
    }

    public function delete($id)
    {
        AppointmentModel::find($id)->delete();
        session()->flash('message', 'Appointment Deleted Successfully.');
        $this->reset_fields();
    }

    public function reset_fields()
    {
        $this->patient = "";
        $this->doctor = "";
        $this->start_timeee = "";
        $this->endtime = "";
        $this->edit_appointment_id = null;
        $this->button_text = "Add New Appointment";
    }

    public function render()
    {
        return view('livewire.admins.appointment', [
            'patients' => patient::all(),
            'doctors' => doctor::all(),
            'appointments' => AppointmentModel::all(),
        ])->layout('admins.layouts.app');
    }
}