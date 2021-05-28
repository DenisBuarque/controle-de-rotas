<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Client;

class ClientController extends Controller
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->client->orderBy('id','DESC')->paginate(5);
        return view('clients.index',['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'name' => 'required|string|max:50|unique:clients',
            'phone' => 'nullable|string|max:9',
            'address' => 'required|string|max:256',
            'address_complement' => 'nullable|string|max:256',
            'number' => 'required|string|max:5',
            'postal_code' => 'required|string|max:9',
            'district' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:2',
        ])->validate();

        if($this->client->create($data)){
            $request->session()->flash('alert','Registro inserido com sucesso!');
            return redirect()->route('clients.create');
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
        $client = $this->client->find($id);
        if($client){
            return view('clients.show',['client' => $client]);
        }
        session()->flash('alert','Não encontramos o que procura!');
        return redirect()->route('clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = $this->client->find($id);
        if($client){
            return view('clients.edit',['client' => $client]);
        }
        session()->flash('alert','Não encontramos o que procura!');
        return redirect()->route('clients.index');
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
            'name' => ['required','string','max:50',Rule::unique('clients')->ignore($id)],
            'phone' => 'nullable|string|max:9',
            'address' => 'required|string|max:256',
            'address_complement' => 'nullable|string|max:256',
            'number' => 'required|string|max:5',
            'postal_code' => 'required|string|max:9',
            'district' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:2',
        ])->validate();

        $records = $this->client->find($id);
        if($records)
        {
            if($records->update($data)){
                $request->session()->flash('alert','Registro alterado com sucesso!');
                return redirect()->route('clients.index');
            }else{
                $request->session()->flash('erro','Erro ao alterar o registro!');
                return redirect()->back();
            }
        }
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = $this->client->find($id);
        if($client)
        {
            if($client->delete()){
                session()->flash('alert','Registro excluído com sucesso!');
                return redirect()->route('clients.index');
            }else{
                session()->flash('erro','Erro ao excluir o registro!');
                return redirect()->back();
            }
        }
    }
}
