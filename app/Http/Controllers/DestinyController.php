<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Destiny;
use App\Models\Client;
use App\Models\Service;
use App\Models\User;

class DestinyController extends Controller
{
    private $destiny;

    public function __construct(Destiny $destiny)
    {
        $this->destiny = $destiny;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinies = $this->destiny->orderBy('id','DESC')->paginate(5);
        return view('destinies.index',['destinies' => $destinies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $services = Service::all();
        $users = User::all();
        return view('destinies.create',[
            'clients' => $clients,
            'services' => $services,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            'checked' => 'nullable',
            'client_id' => 'required',
            'service_id' => 'required',
            'user_id' => 'required',
        ])->validate();

        if(empty($data['checked'])){
            $data['checked'] = 'Inative';
        }

        $client = Client::find($data['client_id']);
        $service = Service::find($data['service_id']);
        $user = User::find($data['user_id']);

        $data['content'] = $client->name.' '.$client->address.' '.$client->district.' '.$client->city.' '.$client->address_complement.' '.$service->name.' '.$user->name;

        if($this->destiny->create($data)){
            $request->session()->flash('alert','Registro inserido com sucesso!');
            return redirect()->route('destinies.create');
        }else{
            $request->session()->flash('erro','Erro ao inserir o registro!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destiny = $this->destiny->find($id);
        if($destiny){
            return view('destinies.show',['destiny' => $destiny]);
        }
        session()->flash('alert','Não encontramos o que procura!');
        return redirect()->route('destinies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::all();
        $services = Service::all();
        $users = User::all();

        $destiny = $this->destiny->find($id);
        if($destiny){
            return view('destinies.edit',[
                'destiny' => $destiny,
                'clients' => $clients,
                'services' => $services,
                'users' => $users
            ]);
        }
        session()->flash('alert','Não encontramos o que procura!');
        return redirect()->route('destinies.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        Validator::make($data, [
            'checked' => 'nullable',
            'client_id' => 'required',
            'service_id' => 'required',
            'user_id' => 'required',
        ])->validate();

        if(empty($data['checked'])){
            $data['checked'] = 'Inative';
        }

        $client = Client::find($data['client_id']);
        $service = Service::find($data['service_id']);
        $user = User::find($data['user_id']);

        $data['content'] = $client->name.' '.$client->address.' '.$client->district.' '.$client->city.' '.$client->address_complement.' '.$service->name.' '.$user->name;

        $records = $this->destiny->find($id);
        if($records)
        {
            if($records->update($data)){
                $request->session()->flash('alert','Registro alterado com sucesso!');
                return redirect()->route('destinies.index');
            }else{
                $request->session()->flash('erro','Erro ao alterar o registro!');
                return redirect()->back();
            }
        }
        return redirect()->route('destinies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destiny = $this->destiny->find($id);
        if($destiny)
        {
            if($destiny->delete()){
                session()->flash('alert','Registro excluído com sucesso!');
                return redirect()->route('destinies.index');
            }else{
                session()->flash('erro','Erro ao excluir o registro!');
                return redirect()->back();
            }
        }
    }
}
