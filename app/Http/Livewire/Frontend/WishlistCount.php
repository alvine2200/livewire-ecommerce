<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wishlistCount;
    protected $listeners = ['wishlistUpdated' => 'checkWishListCount'];

    public function checkWishListCount()
    {
        if (Auth::check()) {
            return $this->wishlistCount = Wishlist::where('user_id', Auth::user()->id)->count();
        } else {
            return $this->wishlistCount = 0;
        }
    }
    public function render()
    {
        $this->wishlistCount = $this->checkWishListCount();
        return view('livewire.frontend.wishlist-count', [
            'wishlistCount' => $this->wishlistCount,
        ]);
    }
}
