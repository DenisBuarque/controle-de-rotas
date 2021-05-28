<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserIndex extends Component
{
    use WithPagination;

    public $limit = 5;
    public $search;

    public function render()
    {
        $users = User::where('name','LIKE','%'.$this->search.'%')->orderBy('id','DESC')->paginate($this->limit);
        return view('livewire.users.user-index',['users' => $users]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
