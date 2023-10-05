<?php

namespace App\Ajax;

final class AjaxRealty
{
    public function __construct()
    {
        add_action('wp_ajax_load_more_realty', [$this, 'handle']);
        add_action('wp_ajax_nopriv_load_more_realty', [$this, 'handle']);
    }

    public function handle(): string
    {

        $paged = ($_POST['pagination'])? sanitize_text_field($_POST['pagination']) : '1';
        $paged++;

        $query = new \WP_Query([
            'posts_per_page' => 3,
            'post_type'      => 'realty',
            'paged' => $paged
        ]);
        ob_start();
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                include RPT_PLUGIN_PATH . 'templates/parts/item-realty.php';
            }
        }

        $output['content'] = ob_get_contents();
        ob_end_clean();
        $output['paged'] = $paged;
        wp_send_json($output);
    }
}