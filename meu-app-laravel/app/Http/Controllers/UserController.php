<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index() 
    {
        $users = User::all();
        
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

        $this->model->create($data);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
       /*  $user = User::where('id', $id)->first(); */
        if(!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        $title = "Usuário {$user->name}";

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
            $user->update($data);
            return redirect()->route('users.index');
        }
    }

    public function destroy($id) {
        $user = User::find($id);
        if(!$user) {
            return redirect()->route('users.index');
        }
        $user->delete();
        return redirect()->route('users.index');
    }
}
