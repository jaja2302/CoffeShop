<?php

namespace App\Livewire\User;


use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class Checkout extends Component
{
    public function mount()
    {
        if (!session()->has('cart') || count(session('cart')) === 0) {
            return $this->redirect(route('dashboard.user'));
        }

        if (!Auth::check()) {
            return $this->redirect(route('login'));
        }
    }

    public function processCheckout()
    {
        try {
            // Simpan seluruh cart sebagai satu row dengan JSON
            OrderItem::create([
                'user_id' => Auth::id(),
                'items' => json_encode(session('cart')),
            ]);

            // Kosongkan cart
            session()->forget('cart');

            Notification::make()
                ->title('Order berhasil dibuat!')
                ->success()
                ->send();

            return $this->redirect(route('dashboard.user'));
        } catch (\Exception $e) {
            Notification::make()
                ->title('Terjadi kesalahan saat membuat order')
                ->danger()
                ->send();
        }
    }

    public function render()
    {
        return view('livewire.user.checkout', [
            'cartItems' => session('cart', []),
            'total' => collect(session('cart', []))->sum(function($item) {
                return $item['price'] * $item['quantity'];
            })
        ])->layout('components.layouts.guest');
    }
} 