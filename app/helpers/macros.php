<?php

use Illuminate\Support\Collection;

if (! Collection::hasMacro('setKey')) {
    /*
     * Set the provided key to each item
     */
    Collection::macro('setKey', function ($key) {
        $c = collect();
        $this->each(function ($item) use ($c, $key) {
            $c->push([$key => $item]);
        });

        return $c;
    });
}

if (! Collection::hasMacro('addToItem')) {
    /*
     * Add the provided value to each item
     */
    Collection::macro('addToItem', function ($array) {
        return $this->map(function ($item) use ($array) {
            return array_merge($item, $array);
        });
    });
}
