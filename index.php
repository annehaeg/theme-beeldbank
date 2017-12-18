<?php echo head(array('bodyid'=>'home')); ?>

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
    <div class="col-8">
        <div class="blokje carousel">
    <?php echo $this->shortcodes('[carousel autoscroll=true sort=random num=7]'); ?>
        </div>
        <div class="about blokje oranjerand">
            <p>
                <?php echo get_theme_option('Homepage About'); ?>
            </p>
        </div>
    </div>
    <div class="col-4 featured">
        <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
        <div class="oranje blokje">
                <h2><?php echo __('Aanbevolen item'); ?></h2>
                <?php echo random_featured_items(1); ?>
            <p><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('Bekijk al onze items >>'); ?></a></p>
        </div>
        <?php endif; ?>
        <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
        <div class="blauw blokje">
            <h2><?php echo __('Aanbevolen collectie'); ?></h2>
            <?php echo random_featured_collection(); ?>
            <p><a href="<?php echo html_escape(url('collections')); ?>"><?php echo __('Bekijk al onze collecties >>'); ?></a></p>
        </div>
        <?php endif;
        $recentItems = get_theme_option('Homepage Recent Items');
        if ($recentItems === null || $recentItems === ''):
            $recentItems = 3;
        else:
            $recentItems = (int) $recentItems;
        endif;
        if ($recentItems):?>
        <div class="groen blokje">
            <h2><?php echo __('Recente items'); ?></h2>
            <?php echo recent_items($recentItems); ?>
        </div>
        <? endif ?>
        <?php if ((get_theme_option('Display Featured Exhibit') !== '0') && plugin_is_active('ExhibitBuilder') && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
        <div class="magenta blokje">
                <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>




    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
