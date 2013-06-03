<?php if (($block->module == 'user' and $block->delta == 1) or ($block->module == 'menu' and $block->delta != 'menu-productcategories')){ ?>
<div class="products_box">
<?php if ($block->subject): ?><h2 class="box_title"><?php print $block->subject ?></h2><?php endif;?>
<div class="products_content clearfix">
<div class="pro_menu"><?php print $content ?></div>
</div></div>
<?php } elseif ($block->module == 'menu' and $block->delta == 'menu-productcategories'){ ?>
	<div class="product_menu">
	<?php if ($block->subject): ?><h2><span><?php print $block->subject ?></span></h2><?php endif;?>
	<?php print cos_tree_left('menu-productcategories') ?>
	</div>
<?php } elseif ($block->region == 'content' or $block->region == 'slide_shows' or $block->region == 'featured_content' or $block->region == 'top_content' or $block->region == 'newest_items'){ ?>
<div class="products_list">
<?php if ($block->subject): ?><h2 class="page_subtitle no_margins"><?php print $block->subject ?></h2><?php endif;?>
<?php print $content ?>
</div>
<?php } elseif ($block->region == 'upper_small_banner'){ ?>
<?php print $content ?>
<?php } elseif ($block->region == 'product_guide'){ ?>
<div class="product_guide">
<?php if ($block->subject): ?><h2 class="box_title"><span><?php print $block->subject ?></span></h2><?php endif;?>
        <?php print $content ?>
</div>
<?php } elseif ($block->region == 'store_locator'){ ?>
<div class="store_locator">
<?php if ($block->subject): ?><h2 class="box_title"><span><?php print $block->subject ?></span></h2><?php endif;?>
<?php print $content ?>
</div>
<?php } elseif ($block->region == 'footer_message'){ ?>
<?php print $content ?>
<?php } elseif ($block->module == 'simplenews'){ ?>
<div class="box newsletter_box">
<?php if ($block->subject): ?><h2><?php print $block->subject ?></h2><?php endif;?>
<?php print $content ?>
<div class="clr"></div>
</div>
<?php } else
	if ($block->module == 'views' and $block->region == 'sidebar_right'){ ?>
<div class="products_box">
<?php if ($block->subject): ?><h2 class="box_title"><?php print $block->subject ?></h2><?php endif;?>
<div class="products_content clearfix">
<?php print $content ?>
<div class="row end">&nbsp;</div>
</div>
</div>
<?php } else { ?>
<div class="products_box">
<?php if ($block->subject): ?><h2 class="box_title"><?php print $block->subject ?></h2><?php endif;?>
<div class="products_content clearfix m1">
<?php print $content ?>
<div class="row end">&nbsp;</div>
</div>
</div>
<?php } ?>
<?php //print serialize($block) ?>