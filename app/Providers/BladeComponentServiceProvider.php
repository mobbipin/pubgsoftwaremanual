<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // CMS Layouts
        Blade::component('cms.admin._layouts.admin_master', 'cms-master-layout');

        // CMS Admin Partials
        Blade::component('cms.admin._layouts._partials.top-bar', 'cms-top-bar');
        Blade::component('cms.admin._layouts._partials.side-bar', 'cms-side-bar');
        Blade::component('cms.admin._layouts._partials.right-bar', 'cms-right-bar');

        // UI Elements
        Blade::component('cms._components.ui-elements.breadcrumb', 'breadcrumb');
        Blade::component('cms._components.ui-elements.error', 'error');
        Blade::component('cms._components.ui-elements.team-card', 'team-card');

        // Form Elements
        Blade::component('cms._components.ui-elements.form-base', 'form-base');
        Blade::component('cms._components.form-elements.input-field', 'input-field');
        Blade::component('cms._components.form-elements.select-field', 'select-field');
        Blade::component('cms._components.form-elements.select-field-name', 'select-field-name');
        Blade::component('cms._components.form-elements.text-area-field', 'text-area-field');
        Blade::component('cms._components.form-elements.file-field', 'file-field');
        Blade::component('cms._components.form-elements.button', 'button');
        Blade::component('cms._components.form-elements.switch', 'switch');
        Blade::component('cms._components.form-elements.file-browser-image', 'file-browser-image');
        Blade::component('cms._components.form-elements.file-gallery-image', 'file-gallery-image');
        Blade::component('cms._components.form-elements.select-2', 'select-searchable');
        Blade::component('cms._components.form-elements.radio-field', 'radio-field');

        // Scripts Elements
        Blade::component('cms._components.scripts.categories', 'categories');
        Blade::component('cms._components.scripts.file-manager', 'file-manager');
        Blade::component('cms._components.scripts.sfile-manager', 'sfile-manager');


        //new layout
        Blade::component('new_layout.master', 'new-master-layout');
        Blade::component('new_layout.components.header', 'new-header');
        Blade::component('new_layout.components.subHeader', 'new-subHeader');
        Blade::component('new_layout.components.miniSubHeader', 'new-mini-subHeader');
        Blade::component('new_layout.components.yellowBar', 'new-yellow-bar');
        Blade::component('new_layout.components.statHeader', 'new-stat-header');
        Blade::component('new_layout.components.mapHeader', 'new-map-header');
    }
}
