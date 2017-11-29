<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>
<div class="row">
    <a href="https://www.arteveldehogeschool.be/mediatheek/live/ws/" class="mediatheeklink">
        <div class="col-6" id="mediatheeklogocontainer">
            <h2 id="mediatheeklogo1"> de mediatheek</h2>
            <h2 id="mediatheeklogo2"> wil je nu wat weten?</h2>
        </div>
    </a>
    <div id="search-container" class="col-6">
        <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
            <?php echo search_form(array('show_advanced' => true)); ?>
        <?php else: ?>
            <?php echo search_form(); ?>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-12 breadcrumbs hidden-sm">
        <h4 class="breadcrumb"><?php echo link_to_home_page(__('Home')); ?></h4>
        <h4 class="breadcrumb"><?php echo link_to('Collections', '','Collecties')?></h4>
        <h4 class="breadcrumb"><?php echo link_to_collection()?></h4>
    </div>
</div>

<!--<div class="row">-->
<!--    <div class="col-12 beschrijving">-->
<!--        --><?php //echo metadata("Collection", array('Dublin Core', 'Description')); ?>
<!--    </div>-->
<!--</div>-->


    <div class="row">
        <?php if (metadata('collection', 'total_items') > 0): ?>
            <?php foreach (loop('items') as $item): ?>
            <?php if(metadata('item', array('Dublin Core', 'AlternativeTitle'))){$itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'AlternativeTitle')));} else {$itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title')));} ?>
                <div class="col-3 collection-item">
                    <?php if (metadata('item', 'has files')): ?>
                            <?php echo link_to_item(item_image('square_thumbnail', array('alt' => $itemTitle))); ?>
                        <p class="collection-item-title"><?php echo $itemTitle; ?></p>
                    <?php endif; ?>
                </div>
<!--            <div class="item hentry">-->

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
<div class="row">
    <div class="col-12">

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
<?php echo foot(); ?>
