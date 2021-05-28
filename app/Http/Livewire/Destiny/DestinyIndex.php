<?php

namespace App\Http\Livewire\Destiny;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Destiny;

class DestinyIndex extends Component
{
    use WithPagination;

    public $limit = 5;
    public $search;

    public function render()
    {
        $query = null;

        $destinies = Destiny::orWhere('content','LIKE','%'.$this->search.'%')
                            ->orWhere('checked','LIKE','%'.$this->search.'%')
                            ->orderBy('id','DESC')
                            ->paginate($this->limit);

        return view('livewire.destiny.destiny-index', ['destinies' => $destinies]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
