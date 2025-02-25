<?php

namespace App\Livewire\Components;

use App\Models\Setting;
use Livewire\Component;

class Partner extends Component
{
    public $data;
    public $partners;

    public function mount()
    {
        $this->partners = \App\Models\Partner::all();
        $this->data = Setting::first();
    }

    public function render()
    {
        return view('livewire.components.partner');
    }
}
