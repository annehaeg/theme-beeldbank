<?php
    $pageTitle = __('Collecties');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
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
    <div class="col-6 breadcrumbs hidden-sm">
        <h4 class="breadcrumb"><?php echo link_to_home_page(__('Home')); ?></h4>
        <h4 class="breadcrumb"><?php echo $pageTitle?></h4>
    </div>
</div>

<?php if ($total_results > 0): ?>
    <?php foreach (loop('collections') as $collection): ?>
                    <div class="row collectioncard">
                        <div class="col-3 card_image">
                            <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
                                <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-9 card_text">
                            <h2><?php echo link_to_collection(); ?></h2>
                            <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
                                <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'))); ?>
                            <?php endif; ?>
                        </div>

                        <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
                    </div>
    <?php endforeach; ?>
        <?php else : ?>
    <div class="row">
        <div class="col-12">
            <p><?php echo 'Er zijn nog geen collecties toegevoegd.'; ?></p>
        </div>
    </div>
        <?php endif; ?>



    <?php echo pagination_links(); ?>        

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
