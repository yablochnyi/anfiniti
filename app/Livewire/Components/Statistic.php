<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Statistic extends Component
{
    public $data;
    public $setting;

    public function mount()
    {
        $this->data = \App\Models\Statistic::all();
        $this->setting = \App\Models\Setting::first();
    }
    public function render()
    {
        return view('livewire.components.statistic');
    }
}
