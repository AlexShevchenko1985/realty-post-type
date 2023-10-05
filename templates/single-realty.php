<?php

use App\Helper\Helper;

get_header();
$house_name = get_field('house_name', get_the_ID());
?>
    <div class="tbc-realty tbc-realty-single">

        <div id="header-top" class="inner__header">
            <?php
            $image = Helper::getAttachmentThumbnailUrl(get_the_ID(), 'medium_large');
            if (!empty($image['image'])): ?>
            <div class="bg-holder" style="background-image: url(<?php echo $image['image'] ?>)">
                <?php endif; ?>
            </div>
            <div class="container realty-container">
                <h1 class="inner__header_title"><?php the_title(); ?></h1>
            </div>
        </div>

        <div class="realty-container">
            <div class="icons-list-wrap topics content-alignment-rows style-bg-white">
                <div class="container">
                    <div class="content-alignment-wrapper">
                        <div class="icons-list__heading ">
                            <h3 class="heading"><?php echo $house_name; ?></h3>
                            <div class="description"><p> <?php echo get_the_content(); ?></p></div>
                        </div>
                        <?php
                        $location_coordinates = get_field('location_coordinates', get_the_ID());
                        $number_of_floors = get_field('number_of_floors', get_the_ID());
                        $type_of_structure = get_field('type_of_structure', get_the_ID());
                        ?>

                        <div class="icons-list__holder row">
                            <?php if ($location_coordinates): ?>
                            <div class="icons-list__item  col-4">
                                <div class="image">
                                    <img width="30" height="30"
                                         src="<?php echo Helper::getSvg('location')?>"
                                         class="attachment-thumbnail size-thumbnail lozad loaded"
                                         alt=""
                                         loading="lazy"
                                         data-src="https://tiger21-website.test/wp-content/uploads/2023/04/Vector-55.svg"
                                         data-srcset="" srcset="" data-loaded="true"></div>
                                    <p><?php echo __('Location: ', 'tbc'); ?><?php echo $location_coordinates; ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if (Helper::getPostTax()): ?>
                                <div class="icons-list__item  col-4">
                                    <div class="image">
                                        <img width="30" height="30"
                                             src="<?php echo Helper::getSvg('district')?>"
                                             class="attachment-thumbnail size-thumbnail lozad loaded"
                                             alt=""
                                             loading="lazy"
                                             data-src="https://tiger21-website.test/wp-content/uploads/2023/04/Vector-55.svg"
                                             data-srcset="" srcset="" data-loaded="true"></div>
                                        <p><?php echo __('District: ', 'tbc'); ?><?php echo implode(', ', Helper::getPostTax()); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ($number_of_floors): ?>
                                <div class="icons-list__item  col-4">
                                    <div class="image">
                                        <img width="30" height="30"
                                             src="<?php echo Helper::getSvg('type')?>"
                                             class="attachment-thumbnail size-thumbnail lozad loaded"
                                             alt=""
                                             loading="lazy"
                                             data-src="https://tiger21-website.test/wp-content/uploads/2023/04/Vector-55.svg"
                                             data-srcset="" srcset="" data-loaded="true"></div>
                                    <p><?php echo __('Number of floors: ', 'tbc'); ?><?php echo $number_of_floors; ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ($type_of_structure): ?>
                                <div class="icons-list__item  col-4">
                                    <div class="image">
                                        <img width="30" height="30"
                                             src="<?php echo Helper::getSvg('target')?>"
                                             class="attachment-thumbnail size-thumbnail lozad loaded"
                                             alt=""
                                             loading="lazy"
                                             data-src="https://tiger21-website.test/wp-content/uploads/2023/04/Vector-55.svg"
                                             data-srcset="" srcset="" data-loaded="true"></div>
                                    <p><?php echo __('Type of structure: ', 'tbc'); ?><?php echo $type_of_structure; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
