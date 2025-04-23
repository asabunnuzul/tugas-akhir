<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Logout extends Component
{
    public function mount()
    {
        Auth::logout();

        Session::invalidate();
        Session::regenerateToken();

        $this->redirectRoute('/', navigate: true);
    }
}
