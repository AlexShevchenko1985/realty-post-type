<?php

namespace App\Helper;

use WP_Term;

class Helper
{
    public static function tableOfContents(): array
    {
        $content = get_post_field('post_content', get_the_ID());
        preg_match_all('@<h2.*?>(.*?)<\/h2>@', $content, $matches, PREG_PATTERN_ORDER);
        return array_filter($matches[1]);
    }

    public static function getAttachmentThumbnailUrl(int $post_id = null, string $size = 'thumbnail', $thumbnail_id = null): array
    {

        $id = (null !== $thumbnail_id)? $thumbnail_id : get_post_thumbnail_id($post_id);

        $thumbnail_array = image_downsize($id, $size);

        if(!$thumbnail_array){
            return [];
        }
        $thumbnail_path['image'] = $thumbnail_array[0];
        $thumbnail_path['alt'] = get_post_meta( $id, '_wp_attachment_image_alt', true);
        return $thumbnail_path;
    }

    public static function getSvg(string $name): string
    {
        if(file_exists(RPT_PLUGIN_PATH . 'src/images/svg/' . $name . '.svg')){
            return RPT_PLUGIN_URL . 'src/images/svg/' . $name . '.svg';
        }
        return '';
    }

    public static function getPostTax(string $tax = 'district-category'): ?array
    {
        $cur_terms = get_the_terms( get_the_ID(), $tax );
        if(empty($cur_terms)){
            return null;
        }
        return array_map(fn (WP_Term $cur_term): ?string => $cur_term->name, $cur_terms);
    }

}