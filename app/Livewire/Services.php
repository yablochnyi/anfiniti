<?php

namespace App\Livewire;

use App\Models\ContactPage;
use App\Models\Service;
use App\Models\ServicePage;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Services extends Component
{
    public $data;
    public $services;
    public function mount()
    {
        $this->data = ServicePage::first();

        SEOMeta::setTitle($this->data->seo['title']);
        SEOMeta::setDescription($this->data->seo['meta_description']);
        SEOMeta::addKeyword($this->data->seo['keywords']);

        OpenGraph::setTitle($this->data->seo['og_title']);
        OpenGraph::setDescription($this->data->seo['og_description']);
        OpenGraph::addImage(asset('storage/' . $this->data->seo['og_image']));
        OpenGraph::setType($this->data->seo['og_type']);
        OpenGraph::setUrl($this->data->seo['og_url']);

        $this->services = Service::all();
    }
    public function render()
    {
        return view('livewire.services');
    }
}
