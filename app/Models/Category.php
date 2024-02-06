<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use HasFactory,HasSlug, InteractsWithMedia ;

    protected $fillable=['name','level','status','slug','parent_id'];

    protected $casts=[
        'status'=>'boolean',
    ];

    protected static $defaultImage='/common/default-image/defaultImage.png';

    public function children()
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function scopeMain($query)
    {
        return $query->where('parent_id', null);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('original')
            ->fit(Manipulations::FIT_CROP, 1100, 640)
            ->performOnCollections('image');

        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->performOnCollections('image');
    }

    public function getFirstOrDefaultMediaUrl(string $collectionName = 'default', string $conversionName = ''): string
    {
        $url = $this->getFirstMediaUrl($collectionName, $conversionName);

        return $url ?: $this::$defaultImage ?? '';
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value==='on' ? 1 : 0 ;
    }
}
