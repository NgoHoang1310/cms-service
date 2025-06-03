<?php
namespace App\Http\View\Composers;

use Illuminate\Support\Str;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $currentPath = request()->path();
        $sidebarMenu = [
            [
                'title' => 'Bảng điều khiển',
                'icon' => 'dashboard',
                'link' => '/',
            ],
            [
                'title' => 'Tài khoản',
                'icon' => 'users',
                'link' => '/users',
            ],
            [
                'title' => 'Phim lẻ',
                'icon' => 'movie',
                'link' => '/movies',
            ],
            [
                'title' => 'Phim bộ',
                'icon' => 'tv-show',
                'children' => [
                    [
                        'title' => 'Danh sách phim',
                        'link' => '/series',
                        'match' => ['series', 'series/create', 'series/[0-9]+/edit'],
                    ],
                    [
                        'title' => 'Mùa phim',
                        'link' => '/series/seasons',
                        'match' => [
                            'series/seasons',
                            'series/[0-9]+/seasons.*',
                        ],
                    ],
                    [
                        'title' => 'Tập phim',
                        'link' => '/series/episodes',
                        'match' => [
                            'series/episodes',
                            'series/[0-9]+/episodes.*',
                            'series/[0-9]+/seasons/[0-9]+/episodes.*',
                        ],
                    ]
                ]
            ],
            [
                'title' => 'Danh mục phim',
                'icon' => 'pricing',
                'link' => '/categories',
            ],
            [
                'title' => 'Thể loại phim',
                'icon' => 'pricing',
                'link' => '/genres',
            ],
            [
                'title' => 'Gói cước',
                'icon' => 'pricing',
                'link' => '/plans',
            ],
            [
                'title' => 'Giao dịch',
                'icon' => 'payment',
                'link' => '/payments',
            ]

        ];

        foreach ($sidebarMenu as &$item) {
            if (isset($item['link'])) {
                $item['active'] = Str::startsWith($currentPath, ltrim($item['link'], '/'));
            } elseif (isset($item['children'])) {
                foreach ($item['children'] as &$child) {
                    $child['active'] = false;

                    // Nếu có field `match`, dùng regex để kiểm tra
                    if (isset($child['match'])) {
                        foreach ($child['match'] as $pattern) {
                            if (preg_match('#^' . $pattern . '$#', $currentPath)) {
                                $child['active'] = true;
                                break;
                            }
                        }
                    } else {
                        $child['active'] = Str::startsWith($currentPath, ltrim($child['link'], '/'));
                    }
                }

                // Đánh dấu active cho cha nếu 1 trong các con đang active
                $item['active'] = collect($item['children'])->contains('active', true);
            }
        }

        $view->with('sidebarMenu', $sidebarMenu);
    }
}
