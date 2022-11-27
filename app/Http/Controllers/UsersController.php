<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = User::latest()->get();
            return datatables()->of(User::select('*'))
            ->addColumn('action', 'users.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));

        Alert::success('Success', 'User updated successfully!');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();
        Alert::warning('Delete Title','Account Removed Successfully!');
        return redirect()->route('users.index');
    }


    public function uploadUser($id){
        $data = user::find($id);

        $data->uploader = 'yes';
        $data->save();
        Alert::success('Success', 'User has been set as a file uploader!');

        return redirect()->back();
    }


    public function uploadRemove($id){
        $data = user::find($id);

        $data->uploader = null;
        $data->save();
        Alert::warning('Remove Privileges', 'File upload privileges has been removed.');

        return redirect()->back();
    }


}
