<?php

namespace App\Ajax;

final class AjaxRealty
{
    public function __construct()
    {
        add_action('wp_ajax_load_more_realty', [$this, 'handle']);
        add_action('wp_ajax_nopriv_load_more_realty', [$this, 'handle']);
    }

    public function handle(): void
    {

        $paged             = ($_POST['pagination'])? sanitize_text_field($_POST['pagination']) : '1';
        $location          = ($_POST['locationCoordinates'])? sanitize_text_field($_POST['locationCoordinates']) : '';
        $number_of_floors  = ($_POST['numberOfFloors'])? sanitize_text_field($_POST['numberOfFloors']) : '';
        $type_of_structure = ($_POST['typeOfStructure'])? sanitize_text_field($_POST['typeOfStructure']) : '';

        $query = ['posts_per_page' => 3, 'post_type'  => 'realty', 'paged' => $paged,];
        $meta_args = [];

        if(!empty($location)){
            $meta_args[] = $this->formMetaData('location_coordinates', $location, 'LIKE');
        }
        if(!empty($number_of_floors)){
            $meta_args[] = $this->formMetaData('number_of_floors', $number_of_floors);
        }
        if(!empty($type_of_structure)){
            $meta_args[] = $this->formMetaData('type_of_structure', $type_of_structure);
        }

        $query['meta_query'] = $meta_args;
        $query = new \WP_Query($query);

        ob_start();
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                include RPT_PLUGIN_PATH . 'templates/parts/item-realty.php';
            }
        }else{
            include RPT_PLUGIN_PATH . 'templates/parts/no-item-realty.php';
        }
        $output['content'] = ob_get_contents();
        ob_end_clean();
        $output['paged'] = $paged;
        $output['max_num_pages'] = $query->max_num_pages;

        wp_send_json($output);
    }

    public function formMetaData(string $key, string $value, string $compare = '='): array
    {
        return [
            [
                'key'     => $key,
                'value'   => $value,
                'compare' => $compare
            ]
        ];
    }
}

