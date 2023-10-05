<?php

namespace App\Helper;

class Filter
{
    public static function getAllDistinctMetaValueByMetaKey(string $key = ''): array
    {
        global $wpdb;
        $sql = "SELECT DISTINCT `meta_value` as data
                FROM `{$wpdb->postmeta}` 
                WHERE `meta_key` = '{$key}'
                ORDER BY `meta_value` ASC ;";
        $data = $wpdb->get_results( $sql );
        return array_filter($data);
    }

}