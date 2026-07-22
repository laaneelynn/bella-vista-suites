<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $menuItems = [
            [
                'category' => 'Breakfast',
                'name' => 'Continental Breakfast',
                'description' => 'Toast, eggs, fruits, coffee, and fresh juice for a light morning meal.',
                'price' => 299,
                'image_path' => 'https://images.unsplash.com/photo-1533089860892-a7c6f0a88666?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Breakfast',
                'name' => 'Filipino Breakfast',
                'description' => 'Garlic rice, egg, longganisa, tomato, and hot coffee.',
                'price' => 349,
                'image_path' => 'https://images.unsplash.com/photo-1627308595229-7830a5c91f9f?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Breakfast',
                'name' => 'Pancake Morning Set',
                'description' => 'Fluffy pancakes served with butter, syrup, fruits, and coffee.',
                'price' => 279,
                'image_path' => 'https://images.unsplash.com/photo-1528207776546-365bb710ee93?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Breakfast',
                'name' => 'Cheese Omelette Plate',
                'description' => 'Soft omelette with cheese, toast, salad, and warm coffee.',
                'price' => 319,
                'image_path' => 'https://images.unsplash.com/photo-1510693206972-df098062cb71?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Breakfast',
                'name' => 'Healthy Breakfast Bowl',
                'description' => 'Fresh fruits, yogurt, granola, honey, and chia toppings.',
                'price' => 269,
                'image_path' => 'https://images.unsplash.com/photo-1494597564530-871f2b93ac55?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],

            [
                'category' => 'Lunch',
                'name' => 'Grilled Chicken Plate',
                'description' => 'Grilled chicken served with rice, vegetables, and house sauce.',
                'price' => 399,
                'image_path' => 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Lunch',
                'name' => 'Seafood Rice Bowl',
                'description' => 'Fresh seafood toppings over warm rice with a light savory sauce.',
                'price' => 459,
                'image_path' => 'https://images.unsplash.com/photo-1559847844-5315695dadae?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Lunch',
                'name' => 'Beef Steak Meal',
                'description' => 'Tender beef slices with rice, vegetables, and rich steak sauce.',
                'price' => 499,
                'image_path' => 'https://images.unsplash.com/photo-1546964124-0cce460f38ef?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Lunch',
                'name' => 'Chicken Caesar Salad',
                'description' => 'Fresh lettuce, grilled chicken, croutons, parmesan, and creamy dressing.',
                'price' => 329,
                'image_path' => 'https://images.unsplash.com/photo-1550304943-4f24f54ddde9?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Lunch',
                'name' => 'Bella Burger Combo',
                'description' => 'Juicy burger served with fries and refreshing iced tea.',
                'price' => 379,
                'image_path' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],

            [
                'category' => 'Snacks',
                'name' => 'Clubhouse Sandwich',
                'description' => 'Layered sandwich with chicken, egg, vegetables, and fries.',
                'price' => 249,
                'image_path' => 'https://images.unsplash.com/photo-1553909489-cd47e0907980?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Snacks',
                'name' => 'Nachos Supreme',
                'description' => 'Crispy nachos topped with cheese, meat, vegetables, and dip.',
                'price' => 229,
                'image_path' => 'https://images.unsplash.com/photo-1513456852971-30c0b8199d4d?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Snacks',
                'name' => 'Fries and Dip',
                'description' => 'Golden fries served with creamy house dip.',
                'price' => 179,
                'image_path' => 'https://images.unsplash.com/photo-1576107232684-1279f390859f?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Snacks',
                'name' => 'Cheese Pizza Slice',
                'description' => 'Warm cheese pizza slice with herbs and tomato sauce.',
                'price' => 199,
                'image_path' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Snacks',
                'name' => 'Fruit Parfait Cup',
                'description' => 'Layered yogurt, fruits, granola, and honey in a chilled cup.',
                'price' => 189,
                'image_path' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],

            [
                'category' => 'Dinner',
                'name' => 'Pasta Alfredo',
                'description' => 'Creamy pasta served with garlic bread and parmesan.',
                'price' => 389,
                'image_path' => 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Dinner',
                'name' => 'Steak Dinner Set',
                'description' => 'Premium steak served with mashed potatoes and vegetables.',
                'price' => 799,
                'image_path' => 'https://images.unsplash.com/photo-1558030006-450675393462?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Dinner',
                'name' => 'Seafood Dinner Platter',
                'description' => 'Mixed seafood platter served with rice and fresh sides.',
                'price' => 699,
                'image_path' => 'https://images.unsplash.com/photo-1559737558-2f5a35f4523b?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Dinner',
                'name' => 'Roasted Chicken Dinner',
                'description' => 'Roasted chicken with rice, vegetables, and special gravy.',
                'price' => 529,
                'image_path' => 'https://images.unsplash.com/photo-1598103442097-8b74394b95c6?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Dinner',
                'name' => 'Salmon Dinner Plate',
                'description' => 'Pan-seared salmon served with vegetables and lemon butter sauce.',
                'price' => 749,
                'image_path' => 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],

            [
                'category' => 'Drinks',
                'name' => 'Iced Coffee',
                'description' => 'Chilled coffee with milk and ice, perfect for a refreshing break.',
                'price' => 150,
                'image_path' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Drinks',
                'name' => 'Fresh Lemonade',
                'description' => 'Fresh lemon drink served cold with a light citrus flavor.',
                'price' => 120,
                'image_path' => 'https://images.unsplash.com/photo-1621263764928-df1444c5e859?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Dessert',
                'name' => 'Chocolate Cake Slice',
                'description' => 'Soft chocolate cake slice topped with creamy chocolate frosting.',
                'price' => 180,
                'image_path' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
            [
                'category' => 'Dessert',
                'name' => 'Mango Float Cup',
                'description' => 'Chilled mango dessert with cream, graham, and fresh mango layers.',
                'price' => 160,
                'image_path' => 'https://images.unsplash.com/photo-1488477304112-4944851de03d?auto=format&fit=crop&w=900&q=85',
                'is_available' => true,
            ],
        ];

        foreach ($menuItems as $item) {
            MenuItem::updateOrCreate(
                [
                    'name' => $item['name'],
                    'category' => $item['category'],
                ],
                $item
            );
        }
    }
}