<div class="products_box featured">
<div class="row end">&nbsp;</div>
<h2 class="box_title"><a href="<?php print url('featured'); ?>"><span><?php print t('Browse Collections') ?></span></a> <?php print t('Featured Collections') ?></h2>
<div class="products_content"><div class="top_gradient clearfix">
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
<div class="row end">&nbsp;</div>
</div></div>
</div>
