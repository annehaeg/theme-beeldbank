
<?php
    $pageTitle = __('Search Items');
    echo head(array('title' => $pageTitle, 'bodyclass' => 'items advanced-search'));
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
        <h4 class="breadcrumb"><?php echo link_to('Collections', '','Collecties')?></h4>
        <h4 class="breadcrumb"><?php echo link_to_collection()?></h4>
    </div>
</div>
    <h1><?php echo $pageTitle; ?></h1>
    <?php $subnav = public_nav_items(); echo $subnav->setUlClass('nav nav-pills'); ?>
    <hr>

    <?php echo $this->partial('items/search-form.php', array('formAttributes' => array('id'=>'advanced-search-form'))); ?>

<?php echo foot(); ?>
