<?php

namespace App\Entities;

use DB;
use Pingpong\Presenters\Model;

class Reference extends Model
{
    /**
     * @var string
     */
    protected $presenter = 'App\Presenters\Admin\Reference';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'sort_order'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Entities\Photo');
    }    

    /**
     * @return void
     */
    public function deletePhotos($reference_id)
    {
        DB::table('photos')->where('reference_id', $reference_id)->delete();
    }    

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createPhoto($image, $reference_id)
    {
        DB::table('photos')->insert(
            array(
                'reference_id' => $reference_id,
                'image' => $image
            )
        );

        return $this;
    }
}
