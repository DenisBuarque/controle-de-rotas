<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Service;

class ServiceController extends Controller
{
    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->service->orderBy('id','DESC')->paginate(5);
        return view('services.index',['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'name' => 'required|string|max:50|unique:services',
            'price' => 'required|string|max:15',
        ])->validate();

        if($this->service->create($data)){
            $request->session()->flash('alert','Registro inserido com sucesso!');
            return redirect()->route('services.create');
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
        $service = $this->service->find($id);
        if($service){
            return view('services.show',['service' => $service]);
        }
        session()->flash('alert','Não encontramos o que procura!');
        return redirect()->route('services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = $this->service->find($id);
        if($service){
            return view('services.edit',['service' => $service]);
        }
        session()->flash('alert','Não encontramos o que procura!');
        return redirect()->route('services.index');
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
            'name' => ['required','string','max:50',Rule::unique('services')->ignore($id)],
            'price' => ['required','string','max:15'],
        ])->validate();

        $records = $this->service->find($id);
        if($records)
        {
            if($records->update($data)){
                $request->session()->flash('alert','Registro alterado com sucesso!');
                return redirect()->route('services.index');
            }else{
                $request->session()->flash('erro','Erro ao alterar o registro!');
                return redirect()->back();
            }
        }
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = $this->service->find($id);
        if($service)
        {
            if($service->delete()){
                session()->flash('alert','Registro excluído com sucesso!');
                return redirect()->route('services.index');
            }else{
                session()->flash('erro','Erro ao excluir o registro!');
                return redirect()->back();
            }
        }
    }

}
