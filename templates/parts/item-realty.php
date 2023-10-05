<div class="archive_insight_cont swiper-slide ">
    <div class="archive_insight_image_cont">
        <a href="<?php echo get_permalink() ?>"></a>
        <?php the_post_thumbnail('medium_large'); ?>
    </div>
    <?php
    $location_coordinates = get_field('location_coordinates', get_the_ID());
    $number_of_floors = get_field('number_of_floors', get_the_ID());
    $type_of_structure = get_field('type_of_structure', get_the_ID());
    ?>
    <div class="desc">
        <?php if ($location_coordinates): ?>
            <p><?php echo __('Location: ', 'tbc'); ?><?php echo $location_coordinates; ?></p>
        <?php endif; ?>
        <?php if ($number_of_floors): ?>
            <p><?php echo __('Number of floors: ', 'tbc'); ?><?php echo $number_of_floors; ?></p>
        <?php endif; ?>
        <?php if ($type_of_structure): ?>
            <p><?php echo __('Type of structure: ', 'tbc'); ?><?php echo $type_of_structure; ?></p>
        <?php endif; ?>
    </div>
    <a href="<?php echo get_permalink() ?>">
        <p class="archive_insight_title"><?php the_title(); ?></p>
    </a>
</div>