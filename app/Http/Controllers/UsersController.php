<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleUser;
use Caffeinated\Shinobi\Models\Role;
Use Toastr;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(4);
        return view('admin.users.index')->with(compact('users'));
    }

    public function create(Request $request)
    {
     
    }

    public function store(Request $request)
    {
     
    }
    public function edit($id)
    {
        $roles = Role::get();
        $users = User::find($id);
        $checked = [];
        foreach($roles as $role){
            $permitido = RoleUser::where("role_id","=",$role->id)->where("user_id","=", $users->id)->get();
            if(count($permitido) > 0){
                array_push($checked,true);
            }else{
                array_push($checked,false);
            }
        }
        return view('admin.users.edit')->with(compact('users','roles','checked'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
     
        $users->roles()->sync($request->get('roles'));
        $users->save();//UPDATE
        $title = "Rol asignado correctamente!";
        Toastr::success($title);
        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        $title = "Usuario Eliminado correctamente!";
        Toastr::success($title);
        return back();
    }

}