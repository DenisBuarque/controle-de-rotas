<?php

namespace App\Http\Livewire\Map;

use Livewire\Component;
use App\Models\Destiny;

class MapIndex extends Component
{
    public $cheked;

    public function updateChecked($id)
    {
        $destiny = Destiny::find($id);

        if($destiny->checked == 'Active'){
            Destiny::where('id', $id)->update(['checked' => 'Finish']);
        }else{
            Destiny::where('id', $id)->update(['status' => 'Active']);
        }

        return redirect()->route('map.index');

    }

    public function render()
    {
        $user_id = auth()->user()->id;
        $destinies = Destiny::where('checked','Active')
                            ->where('user_id',$user_id)
                            ->get();

        return view('livewire.map.map-index',['destinies' => $destinies]);
    }

    public function updatingChecked()
    {
        $this->resetPage();
    }
}
