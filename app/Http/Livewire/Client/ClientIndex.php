<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;

class ClientIndex extends Component
{
    use WithPagination;

    public $limit = 5;
    public $search;

    public function render()
    {
        $clients = Client::where('name','LIKE','%'.$this->search.'%')
                         ->orWhere('address','LIKE','%'.$this->search.'%')
                         ->orWhere('district','LIKE','%'.$this->search.'%')
                         ->orWhere('city','LIKE','%'.$this->search.'%')
                         ->orderBy('id','DESC')->paginate($this->limit);
        return view('livewire.client.client-index',['clients' => $clients]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
