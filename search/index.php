<?php
    $pageTitle = __('Resultaten ') . __('(%s)', $total_results);
    echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
    $searchRecordTypes = get_search_record_types();
?>
    <div class="row">
        <div class="col-6 breadcrumbs hidden-sm">
            <h4 class="breadcrumb"><?php echo link_to_home_page(__('Home')); ?></h4>
            <h4 class="breadcrumb"><?php echo link_to('Collections', '','Collecties')?></h4>
            <h4 class="breadcrumb"><?php echo $pageTitle?></h4>
        </div>
        <div id="search-container" class="col-6">
            <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true)); ?>
            <?php else: ?>
                <?php echo search_form(); ?>
            <?php endif; ?>
        </div>
    </div>
<!--    <h5>--><?php //echo search_filters(); ?><!--</h5>-->
    <?php if ($total_results): ?>
    <div class="row">
        <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
        <?php foreach (loop('search_texts') as $searchText): ?>
        <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
        <?php $recordType = $searchText['record_type']; ?>
        <?php set_current_record($recordType, $record); ?>
<!--        <tr class="--><?php //echo strtolower($filter->filter($recordType)); ?><!--">-->
        <div class="col-4">
            <table id="search-results">
                    <tr><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?><?php echo '  ( ' . $searchRecordTypes[$recordType] . ' )  '; ?></a><tr>
                    <tr><?php if ($recordImage = record_image($recordType, 'square_thumbnail')): ?>
                        <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>
                    <?php endif; ?></tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
        <?php echo pagination_links(); ?>
    <?php else: ?>
        <p><?php echo __('Er zijn geen overeenkomstige resultaten gevonden.');?></p>
    <?php endif; ?>
<?php echo foot(); ?>