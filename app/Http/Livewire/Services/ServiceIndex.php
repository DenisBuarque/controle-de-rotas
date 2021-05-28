<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;

class ServiceIndex extends Component
{
    use WithPagination;

    public $limit = 5;
    public $search;

    public function render()
    {
        $services = Service::where('name','LIKE','%'.$this->search.'%')->orderBy('id','DESC')->paginate($this->limit);
        return view('livewire.services.service-index',['services' => $services]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
