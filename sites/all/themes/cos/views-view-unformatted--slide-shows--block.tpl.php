<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="jflow-content-slider">
	<div id="slides" class="hidden">
<?php
$p = cos_get_pre();
$n = '';
$s = 1;
foreach ($rows as $id => $row): ?>
  <div><?php print $row; ?></div>
  <?php 
  $n .= '<span class="jFlowControl">'.$s.'</span> ';
  $s++;
  ?>
<?php endforeach;?>
	</div>
	<div id="myController">
		<div class="quick_nav"><span class="jFlowPrev"><img src="<?php print base_path().drupal_get_path('theme', 'cos'); ?>/images/jFlowPrev-arrow<?php print $p; ?>.gif" width="20" height="18" alt="Prev" /></span> <?php print $n; ?><span class="jFlowNext"><img src="<?php print base_path().drupal_get_path('theme', 'cos'); ?>/images/jFlowNext_arrow<?php print $p; ?>.gif" width="20" height="18" alt="Next" /></span></div>
	</div>
	<div class="clear"></div>
</div>


