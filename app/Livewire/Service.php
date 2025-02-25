<?php

namespace App\Livewire;

use App\Models\AboutPage;
use App\Models\ContactPage;
use App\Models\ServicePage;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Service extends Component
{
    public $data;
    public $randomServices;

    public $faqs;
    public $phoneWithEmail;

    public function mount($slug)
    {
        $this->data = \App\Models\Service::where('slug', $slug)->firstOrFail();

        SEOMeta::setTitle($this->data->seo['title']);
        SEOMeta::setDescription($this->data->seo['meta_description']);
        SEOMeta::addKeyword($this->data->seo['keywords']);

        OpenGraph::setTitle($this->data->seo['og_title']);
        OpenGraph::setDescription($this->data->seo['og_description']);
        OpenGraph::addImage(asset('storage/' . $this->data->seo['og_image']));
        OpenGraph::setType($this->data->seo['og_type']);
        OpenGraph::setUrl($this->data->seo['og_url']);

        $this->randomServices = \App\Models\Service::where('slug', '!=', $slug)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $this->faqs = \App\Models\Faq::all();

        $this->phoneWithEmail = ContactPage::first();

    }

    public function render()
    {
        return view('livewire.service');
    }
}
