<?php

namespace App\Livewire;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Portfolio extends Component
{
    public $data;
    public function mount($slug)
    {
        $this->data = \App\Models\Portfolio::where('slug', $slug)->first();

        SEOMeta::setTitle($this->data->seo['title']);
        SEOMeta::setDescription($this->data->seo['meta_description']);
        SEOMeta::addKeyword($this->data->seo['keywords']);

        OpenGraph::setTitle($this->data->seo['og_title']);
        OpenGraph::setDescription($this->data->seo['og_description']);
        OpenGraph::addImage(asset('storage/' . $this->data->seo['og_image']));
        OpenGraph::setType($this->data->seo['og_type']);
        OpenGraph::setUrl($this->data->seo['og_url']);

    }
    public function render()
    {
        return view('livewire.portfolio');
    }
}
