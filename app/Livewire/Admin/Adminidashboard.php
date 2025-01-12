<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Adminidashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.adminidashboard')
        ->layout('components.layouts.admin');
    }
}
