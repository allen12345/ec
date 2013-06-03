<?php
$quantitytitle = $totaltitle = '';
if ($order = commerce_cart_order_load($user->uid)) {
  $orderwrapper = entity_metadata_wrapper('commerce_order', $order);
  $quantity = commerce_line_items_quantity($orderwrapper->commerce_line_items, commerce_product_line_item_types());
  $total = commerce_line_items_total($orderwrapper->commerce_line_items, commerce_product_line_item_types());
  //$currency = commerce_currency_load($total['currency_code']);
  $totaltitle = commerce_currency_format($total['amount'], $total['currency_code']);
  if ($quantity > 0) {
    $quantitytitle = format_plural($quantity, 'Item: <strong>1</strong>', 'Items: <strong>@count</strong>');
  }
}
$col = 'three_columns';
if (isset($page['content']['system_main']['nodes'][arg(1)]['#node']->type) and $page['content']['system_main']['nodes'][arg(1)]['#node']->type == 'product' or empty($page['sidebar_right']) or (arg(0) == 'node' and arg(1) == 'add') or (arg(0) == 'admin' and arg(2) != 'block')) {
$col = 'two_columns';	
} 
?>
<div class="wrap" id="<?php print $col ?>">
  <div id="head">
    <div class="logo"><a href="<?php print check_url($front_page); ?>"><span><?php print $site_name; ?></span></a></div>
    <div class="basket"><a href="<?php print url('cart'); ?>"><span><?php print t('Shopping Basket'); ?></span></a>
      <p><span class="uc-price"><?php print $totaltitle; ?></span> <?php print $quantitytitle; ?></p>
    </div>
    <div class="top_banner"><?php print render($page['upper_small_banner']); ?></div>
    <div id="search">
      <form name="searchform" action="<?php print url("search/node") ?>" id="SearchForm" method="post">
        <input name="keys" type="text" tabindex="1" onblur="if (this.value==''){this.value='enter a keyword or an item #'};" onfocus="if(this.value=='enter a keyword or an item #'){this.value=''};" value="enter a keyword or an item #" id="SearchInput" />
        <input name="op" type="submit" id="SearchSubmit" value="" class="button" />
		    <input type="hidden" name="form_token" id="edit-search-block-form-form-token" value="<?php print drupal_get_token("search_form") ?>"  />
			  <input type="hidden" name="form_id" id="edit-search-block-form" value="search_form"  />
      </form>
    </div>
  </div>
  <div id="main_nav">
    <?php print cos_user_links() ?>
	<?php print cos_tree_top('main-menu') ?>
  </div>
  <div class="content clearfix">    
	<?php if (isset($page['sidebar_left'])): ?><div class="left_column"><?php print render($page['sidebar_left']); ?></div><?php endif;?>
    <div class="main_content">
	<?php if ($is_front) { ?>
	  <?php if (isset($messages)): print $messages; endif; ?>
		<?php print render($page['slide_shows']); ?>
		<?php print render($page['featured_content']); ?>
		<?php print render($page['newest_items']); ?>
	<?php } else { ?>
      <div class="bredcrum"><?php print $breadcrumb; ?></div>
      <?php if ($title): ?><h1 class="page_title"><?php echo $title ?></h1><?php endif;?>
	  <?php if (isset($messages)): print $messages; endif; ?>
	  <?php if (isset($tabs)): print '<div class="dtab">'. render($tabs) .'</div>'; endif; ?>
	  <?php if (!empty($help)): print $help; endif; ?>
	  <?php if (isset($page['top_content'])): ?><div class="top_content"><?php print render($page['top_content']); ?></div><?php endif;?>
	  <div class="co"><?php print render($page['content']); ?></div>
	<?php } ?>
    </div>
	<?php if ($col == 'three_columns'): ?><div class="right_column"><?php print render($page['product_guide']); ?><?php print render($page['store_locator']); ?><?php print render($page['sidebar_right']); ?></div><?php endif;?>
  </div>
  <div class="footer">
	<?php print cos_tree_bottom('menu-footer'); ?>
	<div><?php print render($page['footer_message']); ?></div>
  </div>
</div>
<?php //print '<pre>'. check_plain(print_r($currency, 1)) .'</pre>'; ?>