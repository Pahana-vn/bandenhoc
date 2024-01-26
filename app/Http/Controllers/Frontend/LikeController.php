<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    protected $like;
    function __construct(Like $like)
    {
        $this->like = $like;
    }

    function index()
    {

        return view('frontend.pages.wishlist', [
            'likes' => $this->like->where('account_id', auth()->user()->id)
                ->with('product')->latest()->get()
        ]);
    }

    function store(Request $request)
    {
        try {
            $product_id = $request->input('product_id');
            $user_id = Auth::user()->id;
            $likeExists = $this->findLike($product_id, $user_id)->exists();
            if ($likeExists) {
                $this->findLike($product_id, $user_id)->delete();
                $response = [
                    'success' => true,
                    'unlike' => true,
                    'message' => 'Give up your favorite products',
                ];
            } else {
                $this->like->create([
                    'product_id' => $product_id,
                    'account_id' => $user_id,
                ]);
                $response = [
                    'success' => true,
                    'message' => 'Favorite products have been added',
                ];
            }
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage(),
                ],
                500,

            );
        }
    }





    function findLike($product_id, $user_id)
    {
        return  $this->like->where('product_id', $product_id)->where('account_id', $user_id);
    }
}
