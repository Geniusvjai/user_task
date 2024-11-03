<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $roles = RoleModel::get();
        return view('admin.users.users', compact('roles'));
    }

    public function getUsers()
    {
        $users = User::select(['id', 'name', 'email', 'phone', 'role_id', 'profile_img']);

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('check_box', function ($user) {
                return '<div class="form-check">
                            <input class="form-check-input user-checkbox fs-15" type="checkbox" name="checkAll" value="' . $user->id . '">
                        </div>';
            })
            ->editColumn('role_id', function ($user) {
                return $user->role->name;
            })
            ->editColumn('profile_img', function ($user) {
                return '<img class="img-thumbnail rounded-circle" src="' . asset($user->profile_img ?: 'assets/admin/images/users/user-dummy-img.jpg') . '" width="70px">';
            })
            ->addColumn('tools', function ($user) {
                return '
                <ul class="list-inline hstack gap-2 mb-0">
                    <li class="list-inline-item" data-bs-original-title="Edit">
                        <a href="javascript:void(0)" class="text-primary d-inline-block edit-item-btn editBtn" data-id="' . $user->id . '">
                            <i class="ri-pencil-fill fs-16"></i>
                        </a>
                    </li>
                    <li class="list-inline-item" data-bs-original-title="Remove">
                        <a class="text-danger d-inline-block remove-item-btn deleteSingleBtn" href="javascript:void(0)" data-id="' . $user->id . '">
                            <i class="ri-delete-bin-5-fill fs-16"></i>
                        </a>
                    </li>
                </ul>';
            })
            ->rawColumns(['check_box', 'role_id', 'profile_img', 'tools'])
            ->make(true);
    }


    public function createOrUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'phone' => [
                'nullable',
                'regex:/^[6-9]\d{9}$/',
            ],
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $userData = $request->only([
            'role_id',
            'name',
            'email',
            'phone',
            'description'
        ]);

        if ($request->hasFile('profile_img')) {
            $file = $request->file('profile_img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('profile_images');
            $file->move($destinationPath, $fileName);
            $userData['profile_img'] = 'profile_images/' . $fileName;
        }
        $user = User::updateOrCreate(
            ['id' => $request->id],
            $userData
        );

        return response()->json([
            'status' => 'success',
            'message' => $user->wasRecentlyCreated ? 'User created successfully.' : 'User updated successfully.',
        ]);
    }


    public function edit(User $user)
    {
        return response()->json(['status' => true, 'user' => $user]);
    }

    public function destroy(Request $request)
    {
        $ids = $request->input('ids');

        if (User::whereIn('id', $ids)->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Users deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete users.'], 500);
        }
    }

    public function destroySingle($id)
    {
        $user = User::findOrFail($id);

        if ($user->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Category deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete user.'], 500);
        }
    }
}
