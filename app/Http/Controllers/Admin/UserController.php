<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Exception;

class UserController extends Controller
{

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function index()
    {
        $users = User::paginate(30);

        return view('admin/user/index', [
            'users' => $users
        ]);
    }

    public function edit(User $user)
    {
        return view('admin/user/edit', ['user' => $user]);
    }

    public function create()
    {
        return view('admin/user/create');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }

        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $data = $request->except(['password']);
        $data['password'] = bcrypt($request->password);
        try {
            $user->update($data);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }

        return redirect(route('user.index'))->with('success', 'User was updated successfully');
    }

    public function store(UpdateUserRequest $request)
    {
        try {
            $request->merge(['password' => bcrypt($request->get('password'))]);
            $user = User::create($request->all());
            $user->save();

        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }

        return redirect(route('user.index'))->with('success', 'User has been created');
    }
}
