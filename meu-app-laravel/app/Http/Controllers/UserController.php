<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\Team;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request) 
    {
        $users = $this->model->getUsers(
            $request->search ?? ''
        );
        
        return view ('users.index', compact('users'));
    }

    public function create()
    {
        return view ('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        if($request['image']) {
            $file = $request['image'];
            $path = $file->store('profile','public');
            $data['image'] = $path;
        }

        $this->model->create($data);

        return redirect()->route('users.index')->with('create', 'Usuário cadastrado com sucesso.');
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        if(!$user = User::find($id)) {
            return redirect()->route('users.index');
        }
        
        $user->load('teams');

        $title = "Usuário {$user->name}";

        /* $team = Team::find($id);
        $team->load('users');
        return $team; */
        return view('users.show', compact('user', 'title'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        if(!$user) {
            return redirect()->route('users.index');
        }
        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        $user = User::find($id);
        if(!$user) {
            return redirect()->route('users.index');
        } else {
            $data = $request->only('name', 'email');
            if ($request->password) {
                $data['password'] = bcrypt($request->password);  
            }

            $data['is_admin'] = $request->admin ? 1 : 0;

            $user->update($data);
            return redirect()->route('users.index')->with('update', 'Usuário Atualizado com sucesso.');
        }

    }

    public function destroy($id) 
    {
        $user = User::find($id);
        if(!$user) {
            return redirect()->route('users.index');
        }
        $user->delete();
        return redirect()->route('users.index')->with('destroy', 'Usuário deletado com sucesso');
    }

    public function admin()
    {
        return view('admin.index');
    }
}
