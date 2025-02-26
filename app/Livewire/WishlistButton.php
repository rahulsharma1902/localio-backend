<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use Auth;

class WishlistButton extends Component
{
    public $productId;
    public $isWishlisted = false;


    public function mount($productId)
    {
        $this->productId = $productId;
        $this->isWishlisted = Wishlist::where('user_id', Auth::id())
                                      ->where('product_id', $this->productId)
                                      ->exists();
    }


    public function toggleWishlist()
    {
        if (!Auth::check()) {
            return session()->flash('error', 'Please login to add to wishlist.');
        }

        $wishlist = Wishlist::where('user_id', Auth::id())
                            ->where('product_id', $this->productId)
                            ->first();

        if ($wishlist) {
            $wishlist->delete();
            $this->isWishlisted = false;
        } else {
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $this->productId,
            ]);
            $this->isWishlisted = true;
        }
    }


    public function render()
    {
        return view('livewire.wishlist-button');
    }
}
