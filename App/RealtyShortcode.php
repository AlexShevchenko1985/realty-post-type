<?php

namespace App;

class RealtyShortcode
{

    public static function realtyFiler(): string
    {
        ob_start();

        include RPT_PLUGIN_PATH . 'templates/parts/filter.php';

        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

}