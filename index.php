<?php echo head(array('bodyid'=>'home')); ?>

<?php echo get_theme_option('Homepage About'); ?>
<div class="row">
    <div class="col-6 breadcrumbs hidden-sm">
        <h4 class="breadcrumb"><?php echo link_to_home_page(__('Home')); ?></h4>
    </div>
    <div id="search-container" class="col-6">
        <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
            <?php echo search_form(array('show_advanced' => true)); ?>
        <?php else: ?>
            <?php echo search_form(); ?>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <p>
            Dit is de homepagina. Hier komt de informatie rond de website.
        </p>
    </div>
    <div class="col-sm-4">
        <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
            <h2><?php echo __('Featured Item'); ?></h2>
            <?php echo random_featured_items(1); ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-4">
        <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
            <h2><?php echo __('Featured Collection'); ?></h2>
            <?php echo random_featured_collection(); ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-4">
        <?php if ((get_theme_option('Display Featured Exhibit') !== '0') && plugin_is_active('ExhibitBuilder') && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
            <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php echo recent_items(3); ?>
        <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>

    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
</div>

<?php echo foot(); ?>
