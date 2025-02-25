<?php

namespace App\Livewire\Components;

use Livewire\Component;

class WhyChooseUs extends Component
{
    public $data;

    public function mount()
    {
        $this->data = \App\Models\WhyChooseUs::first();
    }

    public function render()
    {
        return view('livewire.components.why-choose-us');
    }
}
