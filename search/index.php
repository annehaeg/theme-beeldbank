<?php
    $pageTitle = __('Resultaten ') . __('(%s)', $total_results);
    echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
    $searchRecordTypes = get_search_record_types();
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
            <h4 class="breadcrumb"><?php echo search_filters()?></h4>
            <h4 class="breadcrumb"><?php echo $pageTitle?></h4>
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
        <div class="col-3 collection-item">

            <?php if ($recordImage = record_image($recordType, 'square_thumbnail')): ?>
                        <?php

                if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']))
                {
                    $searchlink = record_url($record, 'show').'?' . $_SERVER['QUERY_STRING'];
                    ?>
                    <a href="<?php echo $searchlink; ?>">
                        <?php echo $recordImage?>
                    </a>
                    <p class="collection-item-title"><a class="white" href="<?php echo $searchlink; ?>" ><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></p>

                    <?php
                }
                else
                {

                    ?>
                    <a href="<?php echo record_url($record, 'show'); ?>">
                        <?php echo $recordImage?>
                    </a>
                    <p class="collection-item-title"><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></p>
                    <?php

                }

                ?>

                    <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
        <?php echo pagination_links(); ?>
    <?php else: ?>
        <div class="row"><div class="col-12"><p><?php echo __('Er zijn geen overeenkomstige resultaten gevonden.');?></p></div></div>
    <?php endif; ?>
<?php echo foot(); ?>