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
                        'link' => 'tv-shows/show-list.html',
                    ],
                    [
                        'title' => 'Mùa phim',
                        'link' => 'tv-shows/season.html',
                    ],
                    [
                        'title' => 'Tập phim',
                        'link' => 'tv-shows/episodes.html',
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
            ]
        ];

        foreach ($sidebarMenu as &$item) {
            if (isset($item['link'])) {
                $item['active'] = Str::startsWith($currentPath, ltrim($item['link'], '/'));
            } elseif (isset($item['children'])) {
                foreach ($item['children'] as &$child) {
                    $child['active'] = Str::startsWith($currentPath, ltrim($child['link'], '/'));
                }

                // Đánh dấu active cho cha nếu 1 trong các con đang active
                $item['active'] = collect($item['children'])->contains('active', true);
            }
        }

        $view->with('sidebarMenu', $sidebarMenu);
    }
}
