<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'discount' => $this->discount,
            'totalPrice' => round($this->price - $this->discount / 100 * $this->price, 2),
            'stock' => $this->stock == 0 ? 'Out Of Stock' : $this->stock,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('rating') / $this->reviews->count(), 1) : 'No Reviews Yet',
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
