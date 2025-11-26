<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;
use App\Models\block;
use Livewire\WithPagination;

class Blocks extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $blockname;
    public $blockcode;
    public $edit_item_id;
    public $_page = 'index';
    public $button_text = "Add New";

    public function mount()
    {
        $this->_page = 'index';
    }

    public function show_create_form()
    {
        $this->_page = "create";
        $this->reset_fields();
        $this->button_text = "Add New";
    }

    public function show_edit_form($id)
    {
        $this->_page = "edit";
        $this->edit_item_id = $id;
        $item = block::find($id);
        $this->blockname = $item->blockname;
        $this->blockcode = $item->blockcode;
        $this->button_text = "Update Block";
    }

    public function show_index()
    {
        $this->_page = "index";
    }

    public function add_item()
    {
        $this->validate([
            'blockname' => "required|string|max:255",
            'blockcode' => "required|string|max:50|unique:blocks,blockcode",
        ]);
        
        block::create([
            'blockname' => $this->blockname,
            'blockcode' => $this->blockcode,
        ]);
        
        $this->reset_fields();
        session()->flash('message', 'Block Added successfully.');
        $this->_page = "index";
    }

    public function update()
    {
        $this->validate([
            'blockname' => "required|string|max:255",
            'blockcode' => "required|string|max:50",
        ]);

        $item = block::findOrFail($this->edit_item_id);
        $item->blockname = $this->blockname;
        $item->blockcode = $this->blockcode;
        $item->save();
        
        $this->reset_fields();
        $this->_page = "index";
        session()->flash('message', 'Block Updated Successfully.');
    }

    public function delete($IdToDelete)
    {
        block::findOrFail($IdToDelete)->delete();
        session()->flash('message', 'Block Deleted Successfully.');
    }

    public function reset_fields()
    {
        $this->blockname = "";
        $this->blockcode = "";
        $this->edit_item_id = null;
    }

    public function render()
    {
        if ($this->_page == "index") {
            return view('livewire.admins.block.index', [
                'blocks' => block::latest()->paginate(10),
            ])->layout('admins.layouts.app');
            
        } else if ($this->_page == "create") {
            return view('livewire.admins.block.create')->layout('admins.layouts.app');
            
        } else if ($this->_page == "edit") {
            return view('livewire.admins.block.edit')->layout('admins.layouts.app');
        }
    }
}