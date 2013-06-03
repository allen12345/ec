<div class="products_box">
<h2 class="box_title"><a href="<?php print url('newestitems'); ?>"><?php print t('See all our Newest Items') ?></a> <?php print t('Newest Items') ?></h2>
<div class="products_content clearfix newit">
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
</div>
</div>