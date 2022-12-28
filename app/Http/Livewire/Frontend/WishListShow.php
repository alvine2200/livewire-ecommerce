<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListShow extends Component
{
    public $wishlist_id;
    public function mounts($wishlist_id)
    {
        $this->wishlist_id = $wishlist_id;
    }
    public function removeWishList($wishlist_id)
    {
        $wish = Wishlist::findOrFail($wishlist_id)->first();
        $wish->delete();
        $this->emit('wishlistUpdated');
        session()->flash('status', 'Wishlist removed successfully');
        $this->dispatchBrowserEvent('status', [
            'text' => 'Wishlist removed successfully',
            'type' => 'success',
            'status' => 200,
        ]);
        return back();
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('livewire.frontend.wish-list-show', [
            'wishlist' => $wishlist
        ]);
    }
}
