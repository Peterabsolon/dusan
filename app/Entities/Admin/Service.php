<?php

namespace App\Entities\Admin;

use DB;
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
        'user_id',
        'title',
        'slug',
        'body',
        'photo_services',
        'video_services',
        'dj_services',
        'image',
        'note',
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

    public function deletePrices($service_id)
    {
        DB::table('prices')->where('service_id', $service_id)->delete();
    }

    public function deletePackages($service_id)
    {
        DB::table('packages')->where('service_id', $service_id)->delete();
    }    

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createPrices($service_id, $data)
    {
        foreach($data['prices_left'] as $price) {
            DB::table('prices')->insert(
                array(
                    'service_id' => $service_id,
                    'title' => $price['title'],
                    'price' => $price['price'],
                    'position' => 'left'
                )
            );   
        }

        foreach($data['prices_right'] as $price) {
            DB::table('prices')->insert(
                array(
                    'service_id' => $service_id,
                    'title' => $price['title'],
                    'price' => $price['price'],
                    'position' => 'right'
                )
            );   
        }        

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createPackages($service_id, $data)
    {
        foreach($data['packages'] as $package)
        {
            DB::table('packages')->insert(
                array(
                    'service_id' => $service_id,
                    'body' => $package['body'],
                    'price' => $package['price']
                )
            );            
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updatePrices($service_id, $data)
    {
        DB::table('prices')->where('service_id', $service_id)->delete();

        foreach($data['prices_left'] as $price) {
            DB::table('prices')->insert(
                array(
                    'service_id' => $service_id,
                    'title' => $price['title'],
                    'price' => $price['price'],
                    'position' => 'left'
                )
            );   
        }

        foreach($data['prices_right'] as $price) {
            DB::table('prices')->insert(
                array(
                    'service_id' => $service_id,
                    'title' => $price['title'],
                    'price' => $price['price'],
                    'position' => 'right'
                )
            );   
        }          

        return $this; 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updatePackages($service_id, $data)
    {
        DB::table('packages')->where('service_id', $service_id)->delete();

        foreach($data['packages'] as $package)
        {
            DB::table('packages')->insert(
                array(
                    'service_id' => $service_id,
                    'body' => $package['body'],
                    'price' => $package['price']
                )
            );            
        }

        return $this;
    }    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices_left()
    {
        return $this->hasMany('App\Entities\Admin\Price')->where('position', 'left');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices_right()
    {
        return $this->hasMany('App\Entities\Admin\Price')->where('position', 'right');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packages()
    {
        return $this->hasMany('App\Entities\Admin\Package');
    }
}
