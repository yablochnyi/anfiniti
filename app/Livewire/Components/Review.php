<?php

namespace App\Livewire\Components;

use App\Models\Setting;
use Livewire\Component;

class Review extends Component
{
    public $reviews;
    public $data;

    public function mount()
    {
        $this->reviews = \App\Models\Review::all();
        $this->data = Setting::first();
    }

    public function render()
    {
        return view('livewire.components.review');
    }
}
