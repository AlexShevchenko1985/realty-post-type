<?php
use App\Helper\Filter;
?>

<div class="realty-filer-block filter-block">
    <div class="realty-filer-wrap">
        <p class="categories_p"><?php echo __('Filters:', 'tbc'); ?></p>
        <div class="insights_categories_cont">
            <div class="filter-right-position">

                <?php if ($location = Filter::getAllDistinctMetaValueByMetaKey('location_coordinates')): ?>
                <select class="realty-select" id="location-coordinates">
                    <option value=""><?php echo __('Location', 'tbc'); ?></option>
                    <?php foreach ($location as $item): ?>
                        <option value="<?php echo $item->data; ?>"><?php echo $item->data; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php endif; ?>

                <?php if ($num = Filter::getAllDistinctMetaValueByMetaKey('number_of_floors')): ?>
                <select class="realty-select" id="number-of-floors">
                    <option value=""><?php echo __('Floors', 'tbc'); ?></option>
                    <?php foreach ($num as $item): ?>
                        <option value="<?php echo $item->data; ?>"><?php echo $item->data; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php endif; ?>

                <?php if ($type = Filter::getAllDistinctMetaValueByMetaKey('type_of_structure')): ?>
                    <select class="realty-select" id="type-of-structure">
                        <option value=""><?php echo __('Type of structure', 'tbc'); ?></option>
                        <?php foreach ($type as $item): ?>
                            <option value="<?php echo $item->data; ?>"><?php echo $item->data; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>