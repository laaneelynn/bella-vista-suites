<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu Management | Bella Vista Suites</title>
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
            --danger: #b93c3c;
            --success: #246b4a;
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
            background: linear-gradient(90deg, rgba(248, 242, 239, 0.40), rgba(248, 242, 239, 0.14));
            pointer-events: none;
            z-index: 0;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        .page {
            position: relative;
            z-index: 1;
            width: min(1280px, 94%);
            margin: 0 auto;
            padding: 16px 0 45px;
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

        .brand-logo {
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
        }

        .brand-text h1 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 29px;
            color: var(--dark);
            font-weight: 800;
            line-height: 1;
        }

        .brand-text span {
            display: block;
            margin-top: 4px;
            color: #7c614f;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-transform: uppercase;
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

        .alert {
            padding: 13px 16px;
            border-radius: 18px;
            background: rgba(255, 238, 238, 0.94);
            color: #8e3232;
            font-weight: 850;
            border: 1px solid rgba(142, 50, 50, 0.18);
            margin-bottom: 14px;
            line-height: 1.5;
            box-shadow: var(--soft-shadow);
        }

        .success-alert {
            background: rgba(224, 245, 232, 0.94);
            color: #315d4d;
            border-color: rgba(49, 93, 77, 0.18);
        }

        .hero {
            min-height: 260px;
            border-radius: 42px;
            overflow: hidden;
            padding: 48px 52px;
            background:
                linear-gradient(90deg, rgba(255, 255, 255, 0.90), rgba(255, 255, 255, 0.62), rgba(255, 255, 255, 0.20)),
                url("https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=1600&q=85");
            background-size: cover;
            background-position: center;
            border: 1px solid rgba(255, 255, 255, 0.72);
            box-shadow: var(--shadow);
            margin-bottom: 22px;
        }

        .eyebrow {
            color: #7c614f;
            font-size: 12px;
            font-weight: 950;
            letter-spacing: 1.7px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .hero h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(42px, 5vw, 64px);
            line-height: 1;
            letter-spacing: -1.6px;
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
            font-size: 14px;
            line-height: 1.7;
            font-weight: 850;
            max-width: 760px;
            text-shadow: 0 2px 4px rgba(255, 255, 255, 1), 0 5px 16px rgba(255, 255, 255, 0.95);
        }

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 20px;
        }

        .stat-card {
            padding: 20px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--soft-shadow);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            background: rgba(248, 242, 239, 0.92);
            color: var(--blue);
            font-size: 25px;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .stat-card span {
            display: block;
            color: var(--text);
            font-size: 12px;
            font-weight: 900;
            margin-bottom: 5px;
        }

        .stat-card h3 {
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 30px;
            font-weight: 900;
            line-height: 1;
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

        .heading-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
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

        .add-btn {
            border: none;
            cursor: pointer;
            padding: 13px 18px;
            border-radius: 999px;
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            font-size: 13px;
            font-weight: 950;
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.22);
            transition: 0.22s ease;
        }

        .add-btn:hover {
            transform: translateY(-2px);
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .menu-card {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 18px;
            padding: 18px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 12px 28px rgba(63, 53, 52, 0.08);
            transition: 0.22s ease;
        }

        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow);
        }

        .food-image {
            width: 150px;
            height: 150px;
            border-radius: 26px;
            overflow: hidden;
            background: var(--cream);
            border: 1px solid rgba(210, 220, 228, 0.70);
            box-shadow: 0 12px 28px rgba(63, 53, 52, 0.11);
        }

        .food-image img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
        }

        .menu-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 12px;
        }

        .menu-info h3 {
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 28px;
            font-weight: 800;
            line-height: 1.05;
        }

        .menu-info p {
            margin-top: 6px;
            color: var(--text);
            font-size: 13px;
            font-weight: 800;
            line-height: 1.5;
        }

        .menu-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .badge {
            display: inline-flex;
            width: fit-content;
            padding: 8px 11px;
            border-radius: 999px;
            background: rgba(248, 242, 239, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.84);
            color: var(--dark);
            font-size: 11px;
            font-weight: 950;
            white-space: nowrap;
        }

        .badge.available {
            background: #dcfce7;
            color: #166534;
        }

        .badge.hidden {
            background: #ffe4e6;
            color: #be123c;
        }

        .price {
            color: #315d78;
            background: rgba(210, 220, 228, 0.50);
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .edit-btn,
        .delete-btn,
        .save-btn,
        .cancel-btn {
            border: none;
            cursor: pointer;
            padding: 10px 14px;
            border-radius: 14px;
            font-size: 12px;
            font-weight: 950;
            transition: 0.22s ease;
        }

        .edit-btn {
            color: var(--dark);
            background: rgba(248, 242, 239, 0.92);
            border: 1px solid rgba(210, 220, 228, 0.80);
        }

        .delete-btn {
            color: white;
            background: #b93c3c;
        }

        .save-btn {
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
        }

        .cancel-btn {
            color: var(--dark);
            background: rgba(248, 242, 239, 0.92);
            border: 1px solid rgba(210, 220, 228, 0.80);
        }

        .edit-btn:hover,
        .delete-btn:hover,
        .save-btn:hover,
        .cancel-btn:hover {
            transform: translateY(-2px);
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

        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 500;
            background: rgba(43, 34, 33, 0.45);
            backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-box {
            width: min(720px, 96%);
            max-height: 88vh;
            overflow-y: auto;
            padding: 28px;
            border-radius: 34px;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 30px 90px rgba(43, 34, 33, 0.30);
        }

        .modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid rgba(210, 220, 228, 0.75);
        }

        .modal-header h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 36px;
            color: var(--dark);
            font-weight: 800;
        }

        .modal-header p {
            margin-top: 6px;
            color: var(--text);
            font-size: 13px;
            font-weight: 850;
            line-height: 1.5;
        }

        .close-modal {
            min-width: 42px;
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            background: rgba(248, 242, 239, 0.92);
            color: var(--blue);
            font-size: 24px;
            font-weight: 950;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .form-grid .full {
            grid-column: 1 / -1;
        }

        .form-group {
            display: grid;
            gap: 6px;
        }

        label {
            color: var(--dark);
            font-size: 12px;
            font-weight: 950;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid rgba(210, 220, 228, 0.95);
            outline: none;
            border-radius: 16px;
            padding: 12px 14px;
            background: rgba(248, 242, 239, 0.90);
            color: var(--dark);
            font-size: 13px;
            font-weight: 850;
        }

        textarea {
            min-height: 95px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--blue);
            background: white;
            box-shadow: 0 0 0 4px rgba(210, 220, 228, 0.46);
        }

        .check-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 900;
            color: var(--dark);
        }

        .check-row input {
            width: auto;
        }

        .modal-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }

        @media (max-width: 1100px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-nav {
                justify-content: flex-start;
            }

            .dashboard-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .panel-heading {
                flex-direction: column;
                align-items: flex-start;
            }

            .heading-actions {
                justify-content: flex-start;
            }
        }

        @media (max-width: 760px) {
            .page {
                width: min(100% - 28px, 100%);
            }

            .brand-text h1 {
                font-size: 23px;
            }

            .hero {
                padding: 30px 24px;
            }

            .hero h2 {
                font-size: 39px;
            }

            .dashboard-stats {
                grid-template-columns: 1fr;
            }

            .menu-card {
                grid-template-columns: 1fr;
            }

            .food-image {
                width: 100%;
                height: 220px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-grid .full {
                grid-column: auto;
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
    $items = collect($menuItems ?? []);
    $unreadCount = auth()->user()->unreadNotifications()->count();

    $availableCount = $items->filter(fn ($item) => $item->is_available)->count();
    $hiddenCount = $items->filter(fn ($item) => ! $item->is_available)->count();
    $categoryCount = $items->pluck('category')->unique()->count();

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

    $categories = [
        'All',
        'Breakfast',
        'Lunch',
        'Snacks',
        'Dinner',
        'Drinks',
        'Dessert',
    ];
@endphp

<div class="page">
    <header>
        <a href="{{ route('dashboard') }}" class="brand">
            <div class="brand-logo">B</div>

            <div class="brand-text">
                <h1>Bella Vista Suites</h1>
                <span>Admin Dashboard</span>
            </div>
        </a>

        <nav class="top-nav">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.calendar') }}" class="{{ request()->routeIs('admin.calendar') ? 'active' : '' }}">
                Calendar
            </a>

            <a href="{{ route('admin.reservations') }}" class="{{ request()->routeIs('admin.reservations') ? 'active' : '' }}">
                Reservations
            </a>

            <a href="{{ route('admin.menu.index') }}" class="{{ request()->routeIs('admin.menu.index') ? 'active' : '' }}">
                Menu Management
            </a>

            <a href="{{ route('admin.notifications') }}" class="{{ request()->routeIs('admin.notifications') ? 'active' : '' }}">
                Notifications
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
        @if(session('success'))
            <div class="alert success-alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <section class="hero">

            <h2>
                Menu <strong>Management</strong>
            </h2>

            <p>
                Add, update, hide, show, and remove hotel food or drink items using a clean coastal admin interface.
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
                    <span>Existing Menu Items</span>

                    <h2>
                        Manage Menu
                    </h2>

                    <p>
                        These menu cards are connected to the user Menu page.
                    </p>
                </div>

                <div class="heading-actions">
                    <button type="button" class="add-btn" id="openAddModal">
                        + Add Food / Drink
                    </button>

                    <div class="item-count" id="itemCount">
                        {{ $items->count() }} item/s
                    </div>
                </div>
            </div>

            @if($items->count() > 0)
                <div class="menu-grid" id="menuTableBody">
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
                            <div class="food-image">
                                <img src="{{ $imageUrl }}" alt="{{ $item->name }}">
                            </div>

                            <div class="menu-info">
                                <div>
                                    <h3>{{ $item->name }}</h3>

                                    <p>
                                        {{ $item->description ?: 'No description provided.' }}
                                    </p>
                                </div>

                                <div class="menu-meta">
                                    <span class="badge">{{ $item->category }}</span>
                                    <span class="badge price">₱{{ number_format($item->price, 2) }}</span>

                                    @if($item->is_available)
                                        <span class="badge available">Available</span>
                                    @else
                                        <span class="badge hidden">Hidden</span>
                                    @endif
                                </div>

                                <div class="actions">
                                    <button
                                        type="button"
                                        class="edit-btn"
                                        data-category="{{ $item->category }}"
                                        data-name="{{ $item->name }}"
                                        data-price="{{ $item->price }}"
                                        data-description="{{ $item->description }}"
                                        data-available="{{ $item->is_available ? '1' : '0' }}"
                                        data-update-url="{{ route('admin.menu.update', $item) }}"
                                    >
                                        Edit
                                    </button>

                                    <form method="POST" action="{{ route('admin.menu.destroy', $item) }}" onsubmit="return confirm('Delete this menu item?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-btn">
                                            Delete
                                        </button>
                                    </form>
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
                    <h3>No menu items yet.</h3>
                    <p>Click the Add Food / Drink button to create your first menu item.</p>
                </div>
            @endif
        </section>
    </main>
</div>

<div class="modal-overlay" id="addModal">
    <div class="modal-box">
        <div class="modal-header">
            <div>
                <h2>Add Food / Drink</h2>

                <p>
                    Add a new food or drink item for the user Menu page.
                </p>
            </div>

            <button type="button" class="close-modal" id="closeAddModal">
                ×
            </button>
        </div>

        <form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label>Category</label>

                    <select name="category" required>
                        <option value="">Select category</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Drinks">Drinks</option>
                        <option value="Dessert">Dessert</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Food or Drink Name</label>
                    <input type="text" name="name" placeholder="Example: Iced Coffee" required>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" min="1" step="0.01" placeholder="Example: 150" required>
                </div>

                <div class="form-group">
                    <label>Image Upload</label>
                    <input type="file" name="image" accept="image/png,image/jpeg,image/jpg,image/webp">
                </div>

                <div class="form-group full">
                    <label>Description</label>
                    <textarea name="description" placeholder="Describe the menu item..."></textarea>
                </div>

                <label class="check-row full">
                    <input type="checkbox" name="is_available" value="1" checked>
                    Available on user menu
                </label>
            </div>

            <div class="modal-actions">
                <button type="submit" class="save-btn">
                    Save Menu Item
                </button>

                <button type="button" class="cancel-btn" id="cancelAddModal">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<div class="modal-overlay" id="editModal">
    <div class="modal-box">
        <div class="modal-header">
            <div>
                <h2>Edit Food / Drink</h2>

                <p>
                    Update the selected menu item details.
                </p>
            </div>

            <button type="button" class="close-modal" id="closeEditModal">
                ×
            </button>
        </div>

        <form method="POST" action="" enctype="multipart/form-data" id="editForm">
            @csrf
            @method('PATCH')

            <div class="form-grid">
                <div class="form-group">
                    <label>Category</label>

                    <select name="category" id="editCategory" required>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Drinks">Drinks</option>
                        <option value="Dessert">Dessert</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Food or Drink Name</label>
                    <input type="text" name="name" id="editName" required>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" id="editPrice" min="1" step="0.01" required>
                </div>

                <div class="form-group">
                    <label>Change Image</label>
                    <input type="file" name="image" accept="image/png,image/jpeg,image/jpg,image/webp">
                </div>

                <div class="form-group full">
                    <label>Description</label>
                    <textarea name="description" id="editDescription"></textarea>
                </div>

                <label class="check-row full">
                    <input type="checkbox" name="is_available" value="1" id="editAvailable">
                    Available on user menu
                </label>
            </div>

            <div class="modal-actions">
                <button type="submit" class="save-btn">
                    Update Menu Item
                </button>

                <button type="button" class="cancel-btn" id="cancelEditModal">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const categoryButtons = document.querySelectorAll('.category-btn');
    const cards = document.querySelectorAll('#menuTableBody .menu-card');
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
                    card.style.display = 'grid';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (itemCount) {
                itemCount.textContent = visibleCount + ' item/s';
            }

            if (emptyFiltered) {
                emptyFiltered.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        });
    });

    const addModal = document.getElementById('addModal');
    const openAddModal = document.getElementById('openAddModal');
    const closeAddModal = document.getElementById('closeAddModal');
    const cancelAddModal = document.getElementById('cancelAddModal');

    function showAddModal() {
        addModal.classList.add('show');
    }

    function hideAddModal() {
        addModal.classList.remove('show');
    }

    openAddModal.addEventListener('click', showAddModal);
    closeAddModal.addEventListener('click', hideAddModal);
    cancelAddModal.addEventListener('click', hideAddModal);

    addModal.addEventListener('click', function (event) {
        if (event.target === addModal) {
            hideAddModal();
        }
    });

    const editModal = document.getElementById('editModal');
    const editButtons = document.querySelectorAll('.edit-btn');
    const editForm = document.getElementById('editForm');
    const editCategory = document.getElementById('editCategory');
    const editName = document.getElementById('editName');
    const editPrice = document.getElementById('editPrice');
    const editDescription = document.getElementById('editDescription');
    const editAvailable = document.getElementById('editAvailable');
    const closeEditModal = document.getElementById('closeEditModal');
    const cancelEditModal = document.getElementById('cancelEditModal');

    function showEditModal() {
        editModal.classList.add('show');
    }

    function hideEditModal() {
        editModal.classList.remove('show');
    }

    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            editForm.action = button.dataset.updateUrl;
            editCategory.value = button.dataset.category;
            editName.value = button.dataset.name;
            editPrice.value = button.dataset.price;
            editDescription.value = button.dataset.description || '';
            editAvailable.checked = button.dataset.available === '1';

            showEditModal();
        });
    });

    closeEditModal.addEventListener('click', hideEditModal);
    cancelEditModal.addEventListener('click', hideEditModal);

    editModal.addEventListener('click', function (event) {
        if (event.target === editModal) {
            hideEditModal();
        }
    });
</script>
</body>
</html>