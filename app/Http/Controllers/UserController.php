<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::query();
        $users = $query->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(UserRequest $request, FirebaseService $firebaseService)
        {
            try {
                // Khởi tạo data từ request
                $data = $request->only(['user_name', 'email', 'password', 'role', 'phone_number', 'birthday', 'avatar_link']);
                $firebaseData = $request->only(['user_name', 'email', 'password', 'avatar_link']);

                // Cập nhật Firebase
                $user = $firebaseService->createUser($firebaseData);
                if(!$user) {
                    return redirect()->back()->with('error', 'Tạo tài khoản thất bại. Vui lòng thử lại sau.');
                }
                $data['uuid'] = $user->uid;
                $data['provider'] = $user->providerData[0]->providerId;
                $model = new User();
                $model->fill($data);
                $model->save();

                return redirect()->route('users.index')->with('success', 'Tạo tài khoản thành công');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Tạo tài khoản thất bại: ' . $e->getMessage());
            }
        }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user, FirebaseService $firebaseService)
    {
        try {
            // Khởi tạo data từ request
            $data = $request->only(['user_name', 'email', 'password', 'phone_number', 'birthday', 'role', 'status', 'avatar_link']);
            $firebaseData = $request->only(['user_name', 'email', 'password', 'avatar_link']);

            // Cập nhật Firebase
            if(!$firebaseService->updateUserProfile($user->uuid, $firebaseData)) {
                return redirect()->back()->with('error', 'Cập nhật tài khoản thất bại. Vui lòng thử lại sau.');
            }

            // Cập nhật database
            $user->update($data);

            return redirect()->route('users.index')->with('success', 'Cập nhật tài khoản thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật tài khoản thất bại: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $auth = app('firebase.auth');
        DB::beginTransaction();
        try {
            $auth->deleteUser($user->uuid);
            $user->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully.'
            ]);

        } catch (\Exception $exception) {
            // Handle exception
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Deletion failed: ' . $exception->getMessage()
            ]);
        }
    }
}
