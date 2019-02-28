<?php
namespace Chenhua\MultiEditor;

/**
 * Created by PhpStorm.
 * Author: ChenHua <http://www.ichenhua.cn>
 * Date: 2018/6/14 19:04
 */

use Illuminate\Support\ServiceProvider;

class MultiEditorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom('resources/views/vendor/editor', 'editor');

        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/editor'),
            __DIR__.'/views' => base_path('resources/views/vendor/editor'),
        ], 'multi_editor');
    }
}
