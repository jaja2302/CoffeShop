<?php

namespace App\Livewire\User;

use App\Models\Menu;
use App\Models\Category;
use Livewire\Component;
use Filament\Notifications\Notification;

class UserDashboard extends Component
{
    public $showCartModal = false;
    public $categories;
    public $featuredItems;
    
    protected $listeners = ['toggleCart' => 'toggleCart'];

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
        $this->dispatch('$refresh');
        Notification::make()
            ->title('Item ' . $menu->name . ' added to cart')
            ->success()
            ->send();
    }

    public function clearCart()
    {
        session()->put('cart', []);
        Notification::make()
            ->title('Cart has been cleared')
            ->success()
            ->send();
    }

    public function checkout()
    {
        if (count(session('cart', [])) === 0) {
            Notification::make()
                ->title('Cart is empty')
                ->warning()
                ->send();
            return;
        }

        Notification::make()
            ->title('Proceeding to checkout')
            ->success()
            ->send();
    }

    public function render()
    {
        return view('livewire.user.user-dashboard', [
            'cartCount' => $this->getCartCount(),
            'cartItems' => session('cart', [])
        ])->layout('components.layouts.guest');
    }
}

