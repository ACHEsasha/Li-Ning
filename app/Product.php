<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Catch_;

class Product extends Model {
    /**
     * Связь «товар принадлежит» таблицы `products` с таблицей `categories`
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Связь «многие ко многим» таблицы `products` с таблицей `baskets`
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
}
