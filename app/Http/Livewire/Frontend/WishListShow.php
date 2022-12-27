<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListShow extends Component
{
    public function render()
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('livewire.frontend.wish-list-show', [
            'wishlist' => $wishlist
        ]);
    }
}
