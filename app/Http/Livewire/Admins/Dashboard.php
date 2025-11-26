<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;
use App\Models\employee;
use App\Models\appointment;
use App\Models\patient;
use App\Models\block;
use App\Models\department;
use App\Models\rooms;
use App\Models\beds;
use App\Models\requestedAppointment;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admins.dashboard', [
            'employees' => employee::count(),
            'appointments' => appointment::count(),
            'patients' => patient::count(),
            'blocks' => block::count(),
            'departments' => department::count(),
            'rooms' => rooms::count(),
            'beds' => beds::count(),
            'requestedAppointment' => requestedAppointment::count(),
            
        ])->layout('admins.layouts.app');
    }
}