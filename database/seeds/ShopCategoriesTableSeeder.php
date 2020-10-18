<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ShopCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 6; $i++) {
            $cName = "Категория №" . $i;
            $parent_id = ($i > 3) ? rand(1, 3) : null;
            $category[] = [
                'title' => $cName,
                'slug' => Str::slug($cName),
                'parent_id' => $parent_id,
            ];
        }
        DB::table('shop_categories')->insert($category);
    }
}
