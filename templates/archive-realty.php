<?php
get_header();
global $wp_query;
?>
    <div class="tbc-realty-archive">
        <div id="primary" class="content-area">
            <div class="container realty-container">
                <div class="insights_main_cont">
                    <h2 class="insights_top_title title-1"><?php echo __('Realty', 'tbc'); ?></h2>
                    <div class="insights_top_categories_cont">

                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar('widget-realty-archive');
                        } ?>

                        <div class="item-realty-wrap">
                            <div id="realty-block-content" class="archive_insights_and_subscribe desktop">

                                <?php
                                query_posts(['posts_per_page' => 3, 'post_type' => 'realty']);
                                if (have_posts()):
                                    while (have_posts()) :
                                        the_post();
                                        include RPT_PLUGIN_PATH . 'templates/parts/item-realty.php';
                                    endwhile;
                                else : ?>
                                    <?php echo __('No Articles', 'tbc'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="realty-btn-wrapper">
                                <?php

                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                if ($wp_query->max_num_pages > $paged): ?>
                                <div    data-max-pagination="<?php echo $wp_query->max_num_pages; ?>"
                                        data-pagination="<?php echo $paged;?>"
                                        id="realty-loader"> <?php echo __('Read more', 'tbc'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();