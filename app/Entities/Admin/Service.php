<?php

namespace App\Entities\Admin;

use Pingpong\Presenters\Model;

class Service extends Model
{
    /**
     * @var string
     */
    protected $presenter = 'App\Presenters\Admin\Service';

    /**
     * @var array
     */
    protected $fillable = [
        // 'type',
        'user_id',
        // 'category_id',
        'title',
        // 'slug',
        // 'body',
        // 'image',
        // 'published_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\Pingpong\Admin\Entities\User::class);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeNewest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * @param $query
     * @param $id
     *
     * @return mixed
     */
    public function scopeBySlugOrId($query, $id)
    {
        return $query->whereId($id)->orWhere('slug', '=', $id);
    }

    /**
     * Boot the eloquent.
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($data) {
            // $data->deleteImage();
        });
    }

    /**
     * @return bool
     */
    public function deleteImage()
    {
        $file = $this->present()->image_path;

        if (file_exists($file)) {
            @unlink($file);

            return true;
        }

        return false;
    }
}
