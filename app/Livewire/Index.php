<?php

namespace App\Livewire;

use App\Models\Home;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Index extends Component
{
    public $home;
    public $services;
    public $portfolios;
    public function mount()
    {
        $this->home = Home::first();

        SEOMeta::setTitle($this->home->seo['title']);
        SEOMeta::setDescription($this->home->seo['meta_description']);
        SEOMeta::addKeyword($this->home->seo['keywords']);

        OpenGraph::setTitle($this->home->seo['og_title']);
        OpenGraph::setDescription($this->home->seo['og_description']);
        OpenGraph::addImage(asset('storage/' . $this->home->seo['og_image']));
        OpenGraph::setType($this->home->seo['og_type']);
        OpenGraph::setUrl($this->home->seo['og_url']);

        $this->services = \App\Models\Service::inRandomOrder()
            ->limit(6)
            ->get();

        $this->portfolios = \App\Models\Portfolio::inRandomOrder()
            ->limit(4)
            ->get();
    }
    public function render()
    {
        return view('livewire.index');
    }
}
