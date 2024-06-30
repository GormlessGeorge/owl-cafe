<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use App\Models\RecommendedMenuItem;

class RecommendedMenuItemsTableSeeder extends Seeder
{
    /**
     * Запуск сида.
     *
     * @return void
     */
    public function run()
    {
        // Получаем все пункты меню
        $menuItems = MenuItem::all();

        // Если у нас есть хотя бы 8 пунктов меню
        if ($menuItems->count() >= 8) {
            // Берем первые 8 пунктов меню
            $menuItems = $menuItems->take(8);

            foreach ($menuItems as $menuItem) {
                // Создаем рекомендуемый пункт меню для каждого пункта меню
                RecommendedMenuItem::create([
                    'menu_item_id' => $menuItem->id,
                ]);
            }
        }
    }
}