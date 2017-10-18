<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>
<div class="row">
    <div class="col-6 breadcrumbs hidden-sm">
        <h4 class="breadcrumb"><?php echo link_to_home_page(__('Home')); ?></h4>
        <h4 class="breadcrumb"><?php echo link_to('Collections', '','Collecties')?></h4>
        <h4 class="breadcrumb"><?php echo link_to_collection()?></h4>
    </div>
    <div id="search-container" class="col-6">
        <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
            <?php echo search_form(array('show_advanced' => true)); ?>
        <?php else: ?>
            <?php echo search_form(); ?>
        <?php endif; ?>
    </div>
</div>

<!--    --><?php //echo all_element_texts('collection'); ?>

    <div id="row">
<!--        <h2>--><?php //echo link_to_items_browse(__('Items in %s', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?><!--</h2>-->

        <?php if (metadata('collection', 'total_items') > 0): ?>
            <?php foreach (loop('items') as $item): ?>
            <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
                <div class="col-3 collection-item">
                    <?php if (metadata('item', 'has thumbnail')): ?>
                            <?php echo link_to_item(item_image('square_thumbnail', array('alt' => $itemTitle))); ?>
                    <?php endif; ?>
                </div>
<!--            <div class="item hentry">-->
<!--                <h3>--><?php //echo link_to_item($itemTitle, array('class'=>'permalink')); ?><!--</h3>-->
<!---->
<!--                --><?php //if ($text = metadata('item', array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
<!--                <div class="item-description">-->
<!--                    <p>--><?php //echo $text; ?><!--</p>-->
<!--                </div>-->
<!--                --><?php //elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
<!--                <div class="item-description">-->
<!--                    --><?php //echo $description; ?>
<!--                </div>-->
<!--                --><?php //endif; ?>
<!--            </div>-->
            <?php endforeach; ?>
        <?php else: ?>
            <p><?php echo __("Deze collectie is leeg."); ?></p>
        <?php endif; ?>
    </div><!-- end collection-items -->

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
<?php echo foot(); ?>
