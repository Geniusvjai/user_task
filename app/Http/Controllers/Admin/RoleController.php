<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Validator;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.masters.roles');
    }

    public function getRoles()
    {
        // Fetch only required columns
        $roles = RoleModel::select(['id', 'name']);

        return DataTables::of($roles)
            ->addIndexColumn()
            ->addColumn('check_box', function ($role) {
                return '<div class="form-check">
                            <input class="form-check-input role-checkbox fs-15" type="checkbox" name="checkAll" value="' . $role->id . '">
                        </div>';
            })
            ->addColumn('tools', function ($role) {
                return '
                <ul class="list-inline hstack gap-2 mb-0">
                    <li class="list-inline-item" data-bs-original-title="Edit">
                        <a href="javascript:void(0)" class="text-primary d-inline-block edit-item-btn editBtn" data-id="' . $role->id . '">
                            <i class="ri-pencil-fill fs-16"></i>
                        </a>
                    </li>
                    <li class="list-inline-item" data-bs-original-title="Remove">
                        <a class="text-danger d-inline-block remove-item-btn deleteSingleBtn" href="javascript:void(0)" data-id="' . $role->id . '">
                            <i class="ri-delete-bin-5-fill fs-16"></i>
                        </a>
                    </li>
                </ul>';
            })
            ->rawColumns(['check_box','tools'])
            ->make(true);
    }


    public function createOrUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name,' . $request->id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $role = RoleModel::updateOrCreate(
            ['id' => $request->id],
            $request->only(['name'])
        );
        return response()->json([
            'status' => 'success',
            'message' => $role->wasRecentlyCreated ? 'Role created successfully.' : 'Role updated successfully.'
        ]);
    }
    public function edit(RoleModel $role)
    {
        return response()->json(['status' => true, 'role' => $role]);
    }

    public function destroy(Request $request)
    {
        $ids = $request->input('ids');

        if (RoleModel::whereIn('id', $ids)->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Roles deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete role.'], 500);
        }
    }

    public function destroySingle($id)
    {
        $role = RoleModel::findOrFail($id);

        if ($role->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Role deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete role.'], 500);
        }
    }
}
