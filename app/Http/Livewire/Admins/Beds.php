<?php

namespace App\Http\Livewire\Admins;

use App\Models\beds as ModelsBeds;
use App\Models\rooms;
use App\Models\patient;
use Livewire\Component;
use Livewire\WithPagination;

class Beds extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $room_id;
    public $patient_id;
    public $alloted_time;
    public $discharge_time;
    public $edit_bed_id;
    public $_page = 'index';

    public function mount()
    {
        $this->_page = 'index';
    }

    public function show_create_form()
    {
        $this->_page = "create";
    }

    public function show_edit_form($id)
    {
        $this->_page = "edit";
        $Room = ModelsBeds::findOrFail($id);
        $this->edit_bed_id = $id;
        $this->room_id = $Room->room_id;
        $this->patient_id = $Room->patient_id;
        $this->alloted_time = $Room->alloted_time;
        $this->discharge_time = $Room->discharge_time;
    }

    public function show_index()
    {
        $this->_page = "index";
    }

    public function add_bed()
    {
        $this->validate([
            'room_id' => 'required|numeric',
            'patient_id' => 'required|numeric',
            'alloted_time' => "required",
        ]);

        ModelsBeds::create([
            'room_id' => $this->room_id,
            'patient_id' => $this->patient_id,
            'alloted_time' => $this->alloted_time,
            'status' => 'alloted',
        ]);

        $this->reset_fields();
        session()->flash('message', 'Bed Assigned successfully.');
        $this->_page = "index";
    }

    public function update($id)
    {
        $this->validate([
            'room_id' => 'required|numeric',
            'patient_id' => 'required|numeric',
            'alloted_time' => "required",
        ]);

        $bed = ModelsBeds::findOrFail($this->edit_bed_id);
        
        $bed->update([
            'room_id' => $this->room_id,
            'patient_id' => $this->patient_id,
            'alloted_time' => $this->alloted_time,
            'discharge_time' => $this->discharge_time,
            'status' => $this->discharge_time ? 'available' : 'alloted' 
        ]);

        $this->reset_fields();
        session()->flash('message', 'Bed Updated Successfully.');
        $this->_page = "index";
    }

    public function delete($id)
    {
        ModelsBeds::findOrFail($id)->delete();
        session()->flash('message', 'Bed Allocation Deleted Successfully.');
    }

    public function reset_fields()
    {
        $this->room_id = "";
        $this->patient_id = "";
        $this->alloted_time = "";
        $this->discharge_time = "";
        $this->edit_bed_id = null;
    }

    public function render()
    {
        if ($this->_page == "index") {
            return view('livewire.admins.beds.index', [
                'beds' => ModelsBeds::latest()->paginate(10)
            ])->layout('admins.layouts.app');

        } else if ($this->_page == "create") {
            return view('livewire.admins.beds.create', [
                'patients' => patient::all(),
                'rooms' => rooms::where('status', 'available')->get(),
            ])->layout('admins.layouts.app');

        } else if ($this->_page == "edit") {
            return view('livewire.admins.beds.edit', [
                'patients' => patient::all(),
                'rooms' => rooms::all(),
            ])->layout('admins.layouts.app');
        }
    }
}