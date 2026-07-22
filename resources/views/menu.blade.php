<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu | Bella Vista Suites</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --sand: #dec3b3;
            --sky: #d2dce4;
            --cream: #f8f2ef;
            --dark: #2b2221;
            --text: #3f3534;
            --blue: #557589;
            --brown: #9f7d6a;
            --white: #ffffff;
            --shadow: 0 24px 70px rgba(63, 53, 52, 0.20);
            --soft-shadow: 0 16px 45px rgba(63, 53, 52, 0.14);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "Segoe UI", Arial, sans-serif;
        }

        body {
            position: relative;
            min-height: 100vh;
            background:
                linear-gradient(135deg, rgba(222, 195, 179, 0.18), rgba(210, 220, 228, 0.16)),
                url("{{ asset('images/coastal-resort-bg.png') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--dark);
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: linear-gradient(90deg, rgba(248, 242, 239, 0.34), rgba(248, 242, 239, 0.14));
            pointer-events: none;
            z-index: 0;
        }

        a {
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        .page {
            position: relative;
            z-index: 1;
            width: min(1280px, 94%);
            margin: 0 auto;
            padding: 16px 0 50px;
        }

        header {
            width: 100%;
            padding: 14px 20px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.84);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.75);
            box-shadow: var(--soft-shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            position: sticky;
            top: 12px;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--dark);
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 22px;
            display: grid;
            place-items: center;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.82);
            color: var(--dark);
            font-family: Georgia, serif;
            font-size: 24px;
            font-weight: 950;
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.12);
            flex-shrink: 0;
        }

        .brand h1 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 29px;
            color: var(--dark);
            font-weight: 800;
            line-height: 1;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.85);
        }

        .brand span {
            display: block;
            margin-top: 4px;
            color: #7c614f;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.85);
        }

        .top-nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            flex-wrap: wrap;
        }

        .top-nav a,
        .top-nav button {
            text-decoration: none;
            border: none;
            cursor: pointer;
            padding: 11px 16px;
            border-radius: 999px;
            color: var(--dark);
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.80);
            box-shadow: 0 10px 24px rgba(63, 53, 52, 0.08);
            font-size: 12px;
            font-weight: 950;
            transition: 0.22s ease;
        }

        .top-nav a:hover,
        .top-nav button:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.92);
        }

        .top-nav a.active {
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.22);
        }

        .logout-btn {
            color: var(--dark);
        }

        main {
            margin-top: 16px;
        }

        .hero {
            min-height: 245px;
            border-radius: 42px;
            padding: 48px 52px;
            overflow: hidden;
            position: relative;
            background:
                linear-gradient(90deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.58), rgba(255, 255, 255, 0.18)),
                url("https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=1600&q=85");
            background-size: cover;
            background-position: center;
            border: 1px solid rgba(255, 255, 255, 0.72);
            box-shadow: var(--shadow);
            margin-bottom: 22px;
        }

        .hero small {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.84);
            color: #7c614f;
            font-size: 12px;
            font-weight: 950;
            margin-bottom: 14px;
            border: 1px solid rgba(255, 255, 255, 0.84);
            box-shadow: 0 10px 24px rgba(63, 53, 52, 0.08);
        }

        .hero h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(42px, 5vw, 64px);
            line-height: 1;
            letter-spacing: -1.7px;
            color: var(--dark);
            font-weight: 800;
            text-shadow: 0 2px 4px rgba(255, 255, 255, 1), 0 6px 18px rgba(255, 255, 255, 0.95);
        }

        .hero h2 strong {
            color: var(--blue);
            font-style: italic;
            font-weight: 500;
        }

        .hero p {
            margin-top: 14px;
            color: var(--text);
            font-size: 15px;
            font-weight: 850;
            line-height: 1.7;
            max-width: 780px;
            text-shadow: 0 2px 4px rgba(255, 255, 255, 1), 0 5px 16px rgba(255, 255, 255, 0.95);
        }

        .category-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }

        .category-btn {
            border: none;
            cursor: pointer;
            padding: 13px 22px;
            border-radius: 999px;
            color: var(--dark);
            background: rgba(255, 255, 255, 0.90);
            border: 1px solid rgba(255, 255, 255, 0.84);
            box-shadow: var(--soft-shadow);
            font-size: 13px;
            font-weight: 950;
            transition: 0.22s ease;
        }

        .category-btn:hover {
            transform: translateY(-2px);
        }

        .category-btn.active {
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
        }

        .panel {
            padding: 28px;
            border-radius: 38px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--soft-shadow);
        }

        .panel-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(210, 220, 228, 0.75);
        }

        .panel-heading span {
            color: #7c614f;
            font-size: 12px;
            font-weight: 950;
        }

        .panel-heading h2 {
            font-family: Georgia, "Times New Roman", serif;
            color: var(--dark);
            font-size: 40px;
            font-weight: 800;
        }

        .panel-heading p {
            margin-top: 6px;
            color: var(--text);
            font-size: 13px;
            font-weight: 850;
            line-height: 1.5;
        }

        .item-count {
            padding: 12px 18px;
            border-radius: 999px;
            background: rgba(248, 242, 239, 0.92);
            color: var(--dark);
            font-size: 13px;
            font-weight: 950;
            white-space: nowrap;
            border: 1px solid rgba(255, 255, 255, 0.84);
            box-shadow: var(--soft-shadow);
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .menu-card {
            border-radius: 30px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 12px 28px rgba(63, 53, 52, 0.08);
            transition: 0.22s ease;
        }

        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow);
        }

        .menu-image {
            height: 215px;
            position: relative;
            overflow: hidden;
            background: var(--cream);
        }

        .menu-image img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
        }

        .category-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            padding: 8px 12px;
            border-radius: 999px;
            color: white;
            background: rgba(43, 34, 33, 0.65);
            backdrop-filter: blur(10px);
            font-size: 11px;
            font-weight: 950;
            box-shadow: 0 10px 22px rgba(43, 34, 33, 0.22);
        }

        .menu-body {
            padding: 20px;
        }

        .menu-body h3 {
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 28px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .menu-body p {
            color: var(--text);
            font-size: 13px;
            font-weight: 800;
            line-height: 1.55;
            min-height: 42px;
        }

        .menu-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 18px;
        }

        .price {
            color: #315d78;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 28px;
            font-weight: 900;
        }

        .available {
            padding: 8px 11px;
            border-radius: 999px;
            background: rgba(248, 242, 239, 0.92);
            color: var(--dark);
            font-size: 11px;
            font-weight: 950;
            white-space: nowrap;
        }

        .empty {
            padding: 58px 24px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.90);
            color: var(--text);
            text-align: center;
            font-weight: 850;
            border: 1px dashed rgba(85, 117, 137, 0.30);
            box-shadow: var(--soft-shadow);
        }

        .empty h3 {
            font-family: Georgia, "Times New Roman", serif;
            color: var(--dark);
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        @media (max-width: 1050px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-nav {
                justify-content: flex-start;
            }

            .panel-heading {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 760px) {
            .page {
                width: min(100% - 28px, 100%);
            }

            .brand h1 {
                font-size: 23px;
            }

            .hero {
                padding: 30px 24px;
            }

            .hero h2 {
                font-size: 39px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .menu-image {
                height: 230px;
            }

            .top-nav a,
            .top-nav button {
                font-size: 12px;
                padding: 9px 13px;
            }
        }
    </style>
</head>

<body>
@php
    $items = isset($menuItems)
        ? collect($menuItems)
        : \App\Models\MenuItem::query()
            ->where('is_available', true)
            ->latest()
            ->get();

    $items = $items->filter(function ($item) {
        return $item->is_available;
    })->values();

    $unreadCount = auth()->user()->unreadNotifications()->count();

    $defaultImage = 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=900&q=85';

    $defaultImages = [
        'Continental Breakfast' => 'https://images.unsplash.com/photo-1533089860892-a7c6f0a88666?auto=format&fit=crop&w=900&q=85',
        'Filipino Breakfast' => 'https://images.unsplash.com/photo-1627308595229-7830a5c91f9f?auto=format&fit=crop&w=900&q=85',
        'Pancake Morning Set' => 'https://images.unsplash.com/photo-1528207776546-365bb710ee93?auto=format&fit=crop&w=900&q=85',
        'Cheese Omelette Plate' => 'https://images.unsplash.com/photo-1510693206972-df098062cb71?auto=format&fit=crop&w=900&q=85',
        'Healthy Breakfast Bowl' => 'https://images.unsplash.com/photo-1494597564530-871f2b93ac55?auto=format&fit=crop&w=900&q=85',
        'Grilled Chicken Plate' => 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?auto=format&fit=crop&w=900&q=85',
        'Seafood Rice Bowl' => 'https://images.unsplash.com/photo-1559847844-5315695dadae?auto=format&fit=crop&w=900&q=85',
        'Beef Steak Meal' => 'https://images.unsplash.com/photo-1546964124-0cce460f38ef?auto=format&fit=crop&w=900&q=85',
        'Chicken Caesar Salad' => 'https://images.unsplash.com/photo-1550304943-4f24f54ddde9?auto=format&fit=crop&w=900&q=85',
        'Bella Burger Combo' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=900&q=85',
        'Clubhouse Sandwich' => 'https://images.unsplash.com/photo-1553909489-cd47e0907980?auto=format&fit=crop&w=900&q=85',
        'Nachos Supreme' => 'https://images.unsplash.com/photo-1513456852971-30c0b8199d4d?auto=format&fit=crop&w=900&q=85',
        'Fries and Dip' => 'https://images.unsplash.com/photo-1576107232684-1279f390859f?auto=format&fit=crop&w=900&q=85',
        'Cheese Pizza Slice' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=900&q=85',
        'Fruit Parfait Cup' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=900&q=85',
        'Pasta Alfredo' => 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?auto=format&fit=crop&w=900&q=85',
        'Steak Dinner Set' => 'https://images.unsplash.com/photo-1558030006-450675393462?auto=format&fit=crop&w=900&q=85',
        'Seafood Dinner Platter' => 'https://images.unsplash.com/photo-1559737558-2f5a35f4523b?auto=format&fit=crop&w=900&q=85',
        'Roasted Chicken Dinner' => 'https://images.unsplash.com/photo-1598103442097-8b74394b95c6?auto=format&fit=crop&w=900&q=85',
        'Salmon Dinner Plate' => 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?auto=format&fit=crop&w=900&q=85',
        'Iced Coffee' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=900&q=85',
        'Fresh Lemonade' => 'https://images.unsplash.com/photo-1621263764928-df1444c5e859?auto=format&fit=crop&w=900&q=85',
        'Chocolate Cake Slice' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=900&q=85',
        'Mango Float Cup' => 'https://images.unsplash.com/photo-1488477304112-4944851de03d?auto=format&fit=crop&w=900&q=85',
    ];

    $categoryImages = [
        'Breakfast' => 'https://images.unsplash.com/photo-1533089860892-a7c6f0a88666?auto=format&fit=crop&w=900&q=85',
        'Lunch' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=900&q=85',
        'Snacks' => 'https://images.unsplash.com/photo-1553909489-cd47e0907980?auto=format&fit=crop&w=900&q=85',
        'Dinner' => 'https://images.unsplash.com/photo-1558030006-450675393462?auto=format&fit=crop&w=900&q=85',
        'Drinks' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=900&q=85',
        'Dessert' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=900&q=85',
    ];

    $categories = collect(['All'])
        ->merge($items->pluck('category')->unique()->values())
        ->values();
@endphp

<div class="page">
    <header>
        <a href="{{ route('dashboard') }}" class="brand">
            <div class="brand-icon">B</div>

            <div>
                <h1>Bella Vista Suites</h1>
                <span>Luxury Hotel Booking</span>
            </div>
        </a>

        <nav class="top-nav">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Rooms
            </a>

            <a href="{{ route('book-now') }}" class="{{ request()->routeIs('book-now') ? 'active' : '' }}">
                Book Now
            </a>

            <a href="{{ route('my-reservations') }}" class="{{ request()->routeIs('my-reservations') ? 'active' : '' }}">
                My Reservation
            </a>

            <a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'active' : '' }}">
                Menu
            </a>

            <a href="{{ route('notifications') }}" class="{{ request()->routeIs('notifications') ? 'active' : '' }}">
                Notification
                @if($unreadCount > 0)
                    ({{ $unreadCount }})
                @endif
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <main>
        <section class="hero">

            <h2>
                Food <strong>Menu</strong>
            </h2>

            <p>
                Select a category to view available hotel meals, snacks, desserts, and drinks.
            </p>
        </section>

        <div class="category-tabs">
            @foreach($categories as $category)
                <button type="button" class="category-btn {{ $category === 'All' ? 'active' : '' }}" data-category="{{ $category }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <section class="panel">
            <div class="panel-heading">
                <div>
                    <span>Available Menu Items</span>

                    <h2>
                        Food Menu
                    </h2>

                    <p>
                        Browse the food and drink items available at Bella Vista Suites.
                    </p>
                </div>

                <div class="item-count" id="itemCount">
                    {{ $items->count() }} menu item/s
                </div>
            </div>

            @if($items->count() > 0)
                <div class="menu-grid" id="menuGrid">
                    @foreach($items as $item)
                        @php
                            if ($item->image_path) {
                                $imageUrl = str_starts_with($item->image_path, 'http')
                                    ? $item->image_path
                                    : asset('storage/' . $item->image_path);
                            } elseif (isset($defaultImages[$item->name])) {
                                $imageUrl = $defaultImages[$item->name];
                            } elseif (isset($categoryImages[$item->category])) {
                                $imageUrl = $categoryImages[$item->category];
                            } else {
                                $imageUrl = $defaultImage;
                            }
                        @endphp

                        <article class="menu-card" data-category="{{ $item->category }}">
                            <div class="menu-image">
                                <img src="{{ $imageUrl }}" alt="{{ $item->name }}">

                                <span class="category-badge">
                                    {{ $item->category }}
                                </span>
                            </div>

                            <div class="menu-body">
                                <h3>
                                    {{ $item->name }}
                                </h3>

                                <p>
                                    {{ $item->description ?: 'No description provided.' }}
                                </p>

                                <div class="menu-footer">
                                    <span class="price">
                                        ₱{{ number_format($item->price, 2) }}
                                    </span>

                                    <span class="available">
                                        Available
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="empty" id="emptyFiltered" style="display: none; margin-top: 18px;">
                    <h3>No items in this category.</h3>
                    <p>Try choosing another category.</p>
                </div>
            @else
                <div class="empty">
                    <h3>No menu items available.</h3>
                    <p>Please check again later.</p>
                </div>
            @endif
        </section>
    </main>
</div>

<script>
    const categoryButtons = document.querySelectorAll('.category-btn');
    const cards = document.querySelectorAll('#menuGrid .menu-card');
    const itemCount = document.getElementById('itemCount');
    const emptyFiltered = document.getElementById('emptyFiltered');

    categoryButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const selectedCategory = button.dataset.category;
            let visibleCount = 0;

            categoryButtons.forEach(function (btn) {
                btn.classList.remove('active');
            });

            button.classList.add('active');

            cards.forEach(function (card) {
                const cardCategory = card.dataset.category;

                if (selectedCategory === 'All' || selectedCategory === cardCategory) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (itemCount) {
                itemCount.textContent = visibleCount + ' menu item/s';
            }

            if (emptyFiltered) {
                emptyFiltered.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        });
    });
</script>
</body>
</html>