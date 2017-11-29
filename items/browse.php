<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<div class="row">
    <a href="https://www.arteveldehogeschool.be/mediatheek/live/ws/">
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
<!--        <h4 class="breadcrumb">--><?php //echo link_to_advanced_search(__('Zoeken')); ?><!--</h4>-->
    </div>
</div>

<?php if ($total_results > 0): ?>
<div class="row">
    <div class="col-2"> Afbeelding</div>
    <div class="col-5"> Titel</div>
    <div class="col-5"> Tags </div>
</div>
<?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
<?php foreach (loop('items') as $item): ?>
        <div class="row">
            <div class="col-2 imagecontainer">
<!--                --><?php //if (metadata($item, 'has thumbnail')): ?>
                <!--                    --><?php //echo link_to_item(item_image('square_thumbnail')); ?>
                <!--                --><?php //endif; ?>
                <?php if ($recordImage = record_image($item, 'square_thumbnail')): ?>
                    <?php

                    if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']))
                    {
                        $taglink = record_url($item, 'show').'?' . $_SERVER['QUERY_STRING'];
                        ?>
                        <a href="<?php echo $taglink; ?>">
                            <?php echo $recordImage?>
                        </a>
                        <?php
                    }
                    else
                    {

                        ?>
                        <a href="<?php echo record_url($item, 'show'); ?>">
                            <?php echo $recordImage?>
                        </a>
                        <?php } ?>
                <?php endif; ?>
            </div>
            <div class="col-5">
<!--                --><?php //echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?>
                    <?php if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']))
                    {
                        $taglink = record_url($item, 'show').'?' . $_SERVER['QUERY_STRING'];
                        ?>
                        <a href="<?php echo $taglink; ?>" ><?php echo metadata($item,array('Dublin Core', 'Title'))?></a>

                        <?php
                    }
                    else
                    {

                        ?>
                        <a href="<?php echo record_url($item, 'show'); ?>"><?php echo metadata($item,array('Dublin Core', 'Title'))?></a>
                        <?php

                    }

                    ?>
            </div>
            <div class="col-5 tags"> <?php echo tag_string($item,'items/browse' , ' '); ?></div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p><?php echo 'Nog geen items toegevoegd.'; ?></p>
<?php endif; ?>
<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
<?php echo foot(); ?>
