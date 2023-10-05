<?php

namespace App;

class RealtyWidget
{

    public static function init(): void
    {
        register_sidebar( [
            'name' => 'Realty widget',
            'id' => 'widget-realty-archive',
            'before_widget' => '<div class="realty-widget">',
            'after_widget' => '</div>',
        ]);
    }
}