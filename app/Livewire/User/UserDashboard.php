<?php

namespace App\Livewire\User;

use App\Models\Menu;
use App\Models\Category;
use Livewire\Component;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

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

    public function toggleCart($show = null)
    {
        if ($show !== null) {
            $this->showCartModal = $show;
        } else {
            $this->showCartModal = !$this->showCartModal;
        }
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

        // Check if user is logged in
        if (!Auth::check()) {
            // Store cart in session for after login
            session()->put('checkout_pending', true);
            
            Notification::make()
                ->title('Please login or register to continue checkout')
                ->warning()
                ->actions([
                    \Filament\Notifications\Actions\Action::make('login')
                        ->button()
                        ->url(route('login')),
                    \Filament\Notifications\Actions\Action::make('register')
                        ->button()
                        ->url(route('register')),
                ])
                ->persistent()
                ->send();

            // Explicitly close cart modal
            $this->toggleCart(false);
            return;
        }

        // Jika user sudah login, lanjutkan ke proses checkout
        $this->proceedToCheckout();
    }

    protected function proceedToCheckout()
    {
        try {
            Notification::make()
                ->title('Proceeding to checkout')
                ->success()
                ->send();
            
            // Menggunakan redirect() helper dengan parameter absolute true
            return redirect()->route('checkout');
            
            // Atau alternatif lain jika di atas tidak berhasil:
            // return $this->redirectRoute('checkout');
        } catch (\Exception $e) {
            $this->toggleCart(false);
            Notification::make()
                ->title('Error during checkout')
                ->danger()
                ->send();
        }
    }

    public function incrementItem($menuId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity']++;
            session()->put('cart', $cart);
            $this->dispatch('$refresh');
            
            Notification::make()
                ->title('Quantity updated')
                ->success()
                ->send();
        }
    }

    public function decrementItem($menuId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$menuId])) {
            if ($cart[$menuId]['quantity'] > 1) {
                $cart[$menuId]['quantity']--;
                session()->put('cart', $cart);
                $this->dispatch('$refresh');
                
                Notification::make()
                    ->title('Quantity updated')
                    ->success()
                    ->send();
            } else {
                $this->removeItem($menuId);
            }
        }
    }

    public function removeItem($menuId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$menuId])) {
            $itemName = $cart[$menuId]['name'];
            unset($cart[$menuId]);
            session()->put('cart', $cart);
            $this->dispatch('$refresh');
            
            Notification::make()
                ->title("Removed {$itemName} from cart")
                ->success()
                ->send();
        }
    }

    public function render()
    {
        return view('livewire.user.user-dashboard', [
            'cartCount' => $this->getCartCount(),
            'cartItems' => session('cart', [])
        ])->layout('components.layouts.guest');
    }
}

