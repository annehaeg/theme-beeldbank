<?php
queue_css_file('chocolat');
queue_js_file('jquery.chocolat.min', 'javascripts/lib');
queue_js_file('items-show', 'javascripts');
echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
$itemFiles = $item->Files;
$images = array();
$nonImages = array();
foreach ($itemFiles as $itemFile) {
    $mimeType = $itemFile->mime_type;
    if (strpos($mimeType, 'image') !== false) {
        $images[] = $itemFile;
    } else {
        $nonImages[] = $itemFile;
    }
}
$hasImages = (count($images) > 0);
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
        <h4 class="breadcrumb"><?php echo link_to_collection_for_item()?></h4>
        <h4 class="breadcrumb"><?php if(metadata($item, array('Dublin Core', 'AlternativeTitle'))){
                echo metadata($item, array('Dublin Core', 'AlternativeTitle'), array('all' => true, 'delimiter' => ', '));
            }
            else{
                echo metadata($item, array('Dublin Core', 'Title'), array('all' => true, 'delimiter' => ', '));
            }?></h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
<?php if ($hasImages): ?>
    <div id="itemfiles" style="width: 100%; height: 50vh; background: #E0E0E0; margin:auto;"></div>
    <div id="itemfiles-nav">
        <?php foreach ($itemFiles as $itemFile): ?>
            <a href="<?php echo $itemFile->getWebPath('original'); ?>" class="chocolat-image">
                <?php echo file_image('square_thumbnail', array(), $itemFile); ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
        <div id="item-images">
            <?php echo files_for_item(); ?>
        </div>

<?php //echo all_element_texts('item'); ?>
    </div>
</div>
<!---->
<!--    <div class="row">-->
<!--        <div class="col-6">-->
<!--            --><?php //$filesCount = count($item->Files);?>
<!--                --><?php //$images = $item->Files;?>
<!--                    --><?php //foreach ($images as $image): ?>
<!--                        --><?php //if ($filesCount === 0): ?>
<!--                            <div class="no-image">Er zijn geen afbeeldingen om weer te geven.</div>-->
<!--                        --><?php //endif; ?>
<!--                        --><?php //if ($filesCount === 1): ?>
<!--                            <img class='itemimage' src="--><?php //echo url('/'); ?><!--files/original/--><?php //echo $image->filename; ?><!--" />-->
<!--                        --><?php //endif; ?>
<!--                        --><?php //if ($filesCount > 1): ?>
<!--                                <img class='itemimage' src="--><?php //echo url('/'); ?><!--files/original/--><?php //echo $image->filename; ?><!--" />-->
<!--                        --><?php //endif; ?>
<!--                    --><?php //endforeach; ?>
<!--        </div>-->
<div class="row">
    <div class="col-12">
    <table>
        <thead>
        <h2><?php if(metadata($item, array('Dublin Core', 'AlternativeTitle'))){
            echo metadata($item, array('Dublin Core', 'AlternativeTitle'), array('all' => true, 'delimiter' => ', '));
            }
            else{
                echo metadata($item, array('Dublin Core', 'Title'), array('all' => true, 'delimiter' => ', '));
            }?>
        </h2>
        </thead>
        <tbody>
        <?php $metadata = array(    'Titel' =>'Title',
                                    'Onderwerp' =>'Subject',
                                    'Beschrijving' => 'Description',
                                    'Locatie' =>'Coverage-Spatial',
                                    'Uitgever' => 'Publisher',
                                    'Locatie Uitgever' => 'Coverage-Spatial-Publisher',
                                    'Taal' => 'Language',
                                    'Datum' => 'Date') ; ?>

        <?php foreach($metadata as $key => $value):?>
                <?php if(metadata($item, array('Dublin Core', $value))):?>
                <tr>
                    <td><?php echo $key ?> :</td>
                    <td><?php echo metadata($item, array('Dublin Core', $value), array('all' => true, 'delimiter' => ', ')); ?></td>
                </tr>
                <?php endif ?>
        <?php endforeach ?>
        <tr class="tags">
            <td>Tags:</td>
            <td><?php echo tag_string($item,'items/browse' , ' '); ?></td>
        </tr>
        </tbody>
    </table>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

<nav>
    <ul class="pager item-pagination navigation">
        <?php custom_paging() ?>
    </ul>
</nav>
<?php echo foot(); ?>