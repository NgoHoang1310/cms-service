<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = [
            [
                'id' => 1,
                'avatar' => 'https://i.pravatar.cc/150?img=1',
                'name' => 'Ngô Hoàng',
                'phone' => '0343027930',
                'email' => 'ngohoang1310@gmail.com',
                'country' => 'Việt Nam',
                'status' => 'Đang hoạt động',
                'company' => 'Vuasoft',
                'joinDate' => '12/04/2025',
            ],
            [
                'id' => 2,
                'avatar' => 'https://i.pravatar.cc/150?img=2',
                'name' => 'Trần Văn A',
                'phone' => '0987654321',
                'email' => 'vana@example.com',
                'country' => 'Việt Nam',
                'status' => 'Đang hoạt động',
                'company' => 'TechNova',
                'joinDate' => '10/01/2025',
            ],
            [
                'id' => 3,
                'avatar' => 'https://i.pravatar.cc/150?img=3',
                'name' => 'Lê Thị B',
                'phone' => '0912345678',
                'email' => 'lethib@example.com',
                'country' => 'Việt Nam',
                'status' => 'Tạm ngưng',
                'company' => 'FPT',
                'joinDate' => '22/02/2025',
            ],
            [
                'id' => 4,
                'avatar' => 'https://i.pravatar.cc/150?img=4',
                'name' => 'Nguyễn Văn C',
                'phone' => '0901122334',
                'email' => 'nguyenvanc@example.com',
                'country' => 'Việt Nam',
                'status' => 'Đang hoạt động',
                'company' => 'VNG',
                'joinDate' => '05/03/2025',
            ],
            [
                'id' => 5,
                'avatar' => 'https://i.pravatar.cc/150?img=5',
                'name' => 'Phạm Thị D',
                'phone' => '0933445566',
                'email' => 'phamthid@example.com',
                'country' => 'Việt Nam',
                'status' => 'Đang hoạt động',
                'company' => 'TMA Solutions',
                'joinDate' => '01/04/2025',
            ],
            [
                'id' => 6,
                'avatar' => 'https://i.pravatar.cc/150?img=6',
                'name' => 'Hoàng Minh',
                'phone' => '0977889900',
                'email' => 'hoangminh@example.com',
                'country' => 'Việt Nam',
                'status' => 'Tạm ngưng',
                'company' => 'CMC Corp',
                'joinDate' => '15/01/2025',
            ],
            [
                'id' => 7,
                'avatar' => 'https://i.pravatar.cc/150?img=7',
                'name' => 'Đỗ Trung',
                'phone' => '0922334455',
                'email' => 'dotrung@example.com',
                'country' => 'Việt Nam',
                'status' => 'Đang hoạt động',
                'company' => 'Misa',
                'joinDate' => '20/02/2025',
            ],
            [
                'id' => 8,
                'avatar' => 'https://i.pravatar.cc/150?img=8',
                'name' => 'Bùi Thị Yến',
                'phone' => '0966778899',
                'email' => 'buyen@example.com',
                'country' => 'Việt Nam',
                'status' => 'Đang hoạt động',
                'company' => 'Haravan',
                'joinDate' => '18/03/2025',
            ],
            [
                'id' => 9,
                'avatar' => 'https://i.pravatar.cc/150?img=9',
                'name' => 'Trịnh Công Sơn',
                'phone' => '0911223344',
                'email' => 'tcs@example.com',
                'country' => 'Việt Nam',
                'status' => 'Tạm ngưng',
                'company' => 'Zalo',
                'joinDate' => '25/03/2025',
            ],
            [
                'id' => 10,
                'avatar' => 'https://i.pravatar.cc/150?img=10',
                'name' => 'Lương Bích Hữu',
                'phone' => '0909090909',
                'email' => 'huuluong@example.com',
                'country' => 'Việt Nam',
                'status' => 'Đang hoạt động',
                'company' => 'Tiki',
                'joinDate' => '02/04/2025',
            ],
        ];
        
        return view('user/user',[
            'model' => $model,
        ] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
