<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MenuItemController extends Controller
{
    public function userIndex(): View
    {
        $menuItems = MenuItem::query()
            ->where('is_available', true)
            ->latest()
            ->get();

        return view('menu', compact('menuItems'));
    }

    public function adminIndex(): View
    {
        $this->adminOnly();

        $menuItems = MenuItem::query()
            ->latest()
            ->get();

        return view('admin-menu-management', compact('menuItems'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->adminOnly();

        $validated = $request->validate([
            'category' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:500'],
            'price' => ['required', 'numeric', 'min:1'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_available' => ['nullable'],
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu-items', 'public');
        }

        MenuItem::create([
            'category' => $validated['category'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'image_path' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        return back()->with('success', 'Menu item added successfully.');
    }

    public function update(Request $request, MenuItem $menuItem): RedirectResponse
    {
        $this->adminOnly();

        $validated = $request->validate([
            'category' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:500'],
            'price' => ['required', 'numeric', 'min:1'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_available' => ['nullable'],
        ]);

        $imagePath = $menuItem->image_path;

        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $request->file('image')->store('menu-items', 'public');
        }

        $menuItem->update([
            'category' => $validated['category'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'image_path' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        return back()->with('success', 'Menu item updated successfully.');
    }

    public function destroy(MenuItem $menuItem): RedirectResponse
    {
        $this->adminOnly();

        if ($menuItem->image_path && Storage::disk('public')->exists($menuItem->image_path)) {
            Storage::disk('public')->delete($menuItem->image_path);
        }

        $menuItem->delete();

        return back()->with('success', 'Menu item deleted successfully.');
    }

    private function adminOnly(): void
    {
        if (! Auth::check()) {
            abort(403);
        }

        $user = Auth::user();

        if (! $user instanceof User || ! $user->isAdmin()) {
            abort(403);
        }
    }
}