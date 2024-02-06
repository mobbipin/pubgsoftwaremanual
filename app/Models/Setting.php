<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded=['id'];

    protected static $defaultImage='/common/default-image/defaultLogo.jpg';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
        ->singlefile();

        $this->addMediaCollection('favicon')
        ->singlefile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('original')
        ->fit(Manipulations::FIT_CROP, 1100, 640)
            ->performOnCollections('logo');

        $this->addMediaConversion('medium')
            ->fit(Manipulations::FIT_CROP, 370, 300)
            ->performOnCollections('logo');

        $this->addMediaConversion('small-fav')
            ->fit(Manipulations::FIT_CROP, 36, 36)
            ->performOnCollections('favicon');
    }
    public function getFirstOrDefaultMediaUrl(string $collectionName = 'default', string $conversionName = ''): string
    {
        $url = $this->getFirstMediaUrl($collectionName, $conversionName);

        return $url ?: $this::$defaultImage ?? '';
    }
}
