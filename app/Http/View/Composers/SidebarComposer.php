<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $currentPath = request()->path();
        $sidebarMenu = [
            [
                'title' => 'Dashboard',
                'icon' => 'dashboard',
                'link' => '/',
            ],
            [
                'title' => 'Rating',
                'icon' => 'rating',
                'link' => 'rating',
            ],
            [
                'title' => 'Comments',
                'icon' => 'comment',
                'link' => 'comment',
            ],
            [
                'title' => 'Users',
                'icon' => 'users',
                'link' => 'user',
            ],
            [
                'title' => 'Movie List',
                'icon' => 'movie',
                'link' => 'movie/movie-list.html',
            ],
            [
                'title' => 'TV Shows',
                'icon' => 'tv-show',
                'children' => [
                    [
                        'title' => 'Show Lists',
                        'link' => 'tv-shows/show-list.html',
                    ],
                    [
                        'title' => 'Seasons',
                        'link' => 'tv-shows/season.html',
                    ],
                    [
                        'title' => 'Episodes',
                        'link' => 'tv-shows/episodes.html',
                    ]
                ]
            ],
            [
                'title' => 'Pricing',
                'icon' => 'pricing',
                'link' => 'special-pages/pricing.html',
            ]
        ];

        foreach ($sidebarMenu as &$item) {
            if (isset($item['link'])) {
                $item['active'] = $currentPath === $item['link'];
            } elseif (isset($item['children'])) {
                foreach ($item['children'] as &$child) {
                    $child['active'] = $currentPath === $child['link'];
                }

                // Đánh dấu active cho cha nếu 1 trong các con đang active
                $item['active'] = collect($item['children'])->contains('active', true);
            }
        }

        $view->with('sidebarMenu', $sidebarMenu);
    }
}
