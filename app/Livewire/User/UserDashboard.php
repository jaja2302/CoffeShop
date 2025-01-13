<?php

namespace App\Livewire\User;

use App\Models\Menu;
use App\Models\Category;
use Livewire\Component;

class UserDashboard extends Component
{
    public $showCartModal = false;
    public $categories;
    public $featuredItems;
    
    public function mount()
    {
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }
        
        $this->categories = Category::with('menuItems')->get();
        $this->featuredItems = Menu::where('featured', true)->get();
    }

    public function getCartCount()
    {
        return count(session('cart', []));
    }

    public function toggleCart()
    {
        $this->showCartModal = !$this->showCartModal;
    }

    public function addToCart($menuId)
    {
        $menu = Menu::find($menuId);
        if (!$menu) return;

        $cart = session()->get('cart', []);

        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity']++;
        } else {
            $cart[$menuId] = [
                'name' => $menu->name,
                'quantity' => 1,
                'price' => $menu->price,
                'image' => $menu->image
            ];
        }

        session()->put('cart', $cart);
    }

    public function render()
    {
        return view('livewire.user.user-dashboard', [
            'cartCount' => $this->getCartCount(),
            'cartItems' => session('cart', [])
        ])->layout('components.layouts.guest');
    }
}

