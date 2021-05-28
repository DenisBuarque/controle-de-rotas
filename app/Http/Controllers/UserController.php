<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Permission;

class UserController extends Controller
{
    private $user;
    private $permission;

    public function __construct(User $user, Permission $permission)
    {
        $this->user = $user;
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->orderBy('id','DESC')->paginate(5);
        return view('users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->permission->all();
        return view('users.create',['permissions' => $permissions]);
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
            'name' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|max:20|confirmed',
        ])->validate();

        $data['password'] =  bcrypt($request->password);

        $records = $this->user->create($data);
        if($records){
            if(isset($data['permission']) && count($data['permission']))
            {
                foreach($data['permission'] as $key => $value):
                    $records->permissions()->attach($value);
                endforeach;
            }
            $request->session()->flash('alert','Registro inserido com sucesso!');
            return redirect()->route('users.create');
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
        $user = $this->user->find($id);
        if($user){
            return view('users.show',['user' => $user]);
        }
        session()->flash('alert','Não encontramos o que procura!');
        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = $this->permission->all();

        $user = $this->user->find($id);
        if($user){
            return view('users.edit',['user' => $user, 'permissions' => $permissions]);
        }
        session()->flash('alert','Não encontramos o que procura!');
        return redirect()->route('users.index');
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

        if(!$data['password']):
            unset($data['password']);
        endif;
        
        Validator::make($data, [
            'name' => ['required','string','max:50',Rule::unique('users')->ignore($id)],
            'email' => ['required','string','email','max:100',Rule::unique('users')->ignore($id)],
            'password' => 'sometimes|required|string|min:6|max:20|confirmed',
        ])->validate();

        if($request->password){
            $data['password'] =  bcrypt($request->password);
        }

        $records = $this->user->find($id);
        if($records)
        {
            $permissions = $records->permissions;
            if(count($permissions)){
                foreach($permissions as $key => $value):
                    // chama a função permissions do modelo Permission.php e usa detach() apara apaga registro
                    $records->permissions()->detach($value->id);
                endforeach;
            }

            if(isset($data['permission']) && count($data['permission']))
            {
                foreach($data['permission'] as $key => $value):
                    $records->permissions()->attach($value);
                endforeach;
            }
            
            if($records->update($data)){
                $request->session()->flash('alert','Registro alterado com sucesso!');
                return redirect()->route('users.index');
            }else{
                $request->session()->flash('erro','Erro ao alterar o registro!');
                return redirect()->back();
            }
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = $this->user->find($id);
        if($user)
        {
            if($user->delete()){
                $request->session()->flash('alert','Registro excluído com sucesso!');
                return redirect()->route('users.index');
            }else{
                $request->session()->flash('erro','Erro ao excluir o registro!');
                return redirect()->back();
            }
        }
    }
}
