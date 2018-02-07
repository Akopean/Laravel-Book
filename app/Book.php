<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Book extends Model
{
    use Translatable,
        Resizable,
        HasRelationships;

    const PUBLISHED = 'PUBLISHED';

    /**
     * Scope a query to only include published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    /**
     * Scope queries to books that have been published
     * @param Builder $query
     * @return $this
     */
 /*   public function scopePublished(Builder $query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

*/
    /**
     * Get the tags associated with the given book
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public  function tags() {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get the category associated with the given book
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public  function category() {
        return $this->belongsTo(Voyager::modelClass('Category'));
    }
}
