<?php
	drupal_add_js(drupal_get_path('theme', 'cos') . '/js/tabs.js');
	drupal_add_js(drupal_get_path('theme', 'cos') . '/js/toggler.js');
    if (isset($node->field_image) and is_array($node->field_image) and count($node->field_image)) {
    $ar1 = each ($node->field_image);
  }
  if ($ar1['key']) {
    $language = $ar1['key'];
  } else {
    $language = $node->language;
  }
?>

<?php if (!$page) { ?>
          <div class="asinItem">
                <div class="prodImage"><a href="<?php print url('node/'.$nid) ?>"><?php print theme('image_style', array('style_name' => 'product_thumb', 'path' => $node->field_image[$language][0]['uri'], 'alt' => $node->field_image[$language][0]['alt'], 'title' => $node->field_image[$language][0]['title'], 'attributes' => array(),'getsize' => false)); ?></a></div>
                <h3><a href="<?php print url('node/'.$nid) ?>"><?php print $node->title ?> <strong>(<?php print render($content['product:commerce_price']) ?>)</strong></a><strong></strong></h3>
                <div class="srating"><?php print render($content['rate_customer_rating']) ?></div>
               <?php print render($content['field_productref']) ?>
          </div>
<?php } else { ?>
      <div class="product_image">
        <div id="big_image_container"><?php print theme('image_style', array('style_name' => 'product_big', 'path' => $node->field_image[$language][0]['uri'], 'alt' => $node->field_image[$language][0]['alt'], 'title' => $node->field_image[$language][0]['title'], 'attributes' => array(),'getsize' => false)); ?></div>
        <div class="image_options"> <a href="javascript:;" id="toggler" class="silver_btn"><span>Product Gallery</span></a> <a href="javascript:;" id="next_button" class="silver_btn"><span>Next</span></a><a href="javascript:;" id="prev_button" class="silver_btn"><span>Prev</span></a>
          <div id="thumbs_container">
         <div class="thumbs_background clearfix">
         <h2 class="page_subtitle"><a href="javascript:;" class="close">Close</a>Product Gallery</h2>
            <ul class="image_gallery">
			<?php if (is_array($node->field_image[$language]) and count($node->field_image[$language])) foreach ($node->field_image[$language] as $i => $data) if ($data['uri']) { ?>
              <li<?php if ($i == 3) print ' class="last"'; ?>><a rel="<?php print image_style_url('product_big', $data['uri']) ?>"><?php print theme('image_style', array('style_name' => 'product_thumb', 'path' => $data['uri'], 'alt' => $data['alt'], 'title' => $data['title'], 'attributes' => array('class' => 'thumb'),'getsize' => false));?></a></li>
			<?php } ?>
            </ul></div>
          </div>
        </div>
      </div>
      <div class="product_information">
        <?php 
        if (isset($node->field_statusdetail[$language][0]['value'])) {
          $field_statusdetail = $node->field_statusdetail[$language][0]['value'];
        } else {
          $field_statusdetail = '';
        }
        ?>
        <div class="product_status<?php if ($field_statusdetail == 'In Stock') { ?> in_stock<?php } ?><?php if ($field_statusdetail == 'Not Available') { ?> not_available<?php } ?>"><span><?php print $field_statusdetail ?></span></div>
        <div class="row end">&nbsp;</div>
        <div class="description"><?php print render($content['body']) ?></div>
        <div class="product_options"><?php print render($content['field_productref']) ?>
          <h2 class="price"><?php print t('Price') ?>: <strong><?php print render($content['product:commerce_price']) ?></strong></h2>
          <div class="rating_holder"><span><?php print t('Customer Rating') ?>:</span>
            <div class="rating"><?php print render($content['rate_customer_rating']) ?></div>
          </div>
          <p class="rate_banner">&nbsp;</p>
        </div>
        <?php 
        $field_guideline = render($content['field_guideline']); 
        $field_technical = render($content['field_technical']); 
        $field_share = render($content['field_share']); 
        ?>
        <ul class="ttabs">
          <?php if ($field_guideline) { ?><li><a href="#tab1"><?php print t('Product Guideline') ?></a></li><?php } ?>
          <?php if ($field_technical) { ?><li><a href="#tab2"><?php print t('Technical Information') ?></a></li><?php } ?>
          <?php /*if ($field_share) {*/ ?><li><a href="#tab3"><?php print t('Share') ?></a></li><?php //} ?>
        </ul>
        <div class="tab_container">
			<?php if ($field_guideline) { ?>
				<div id="tab1" class="tab_content help_icon"><?php print $field_guideline ?></div>
			<?php } ?>
			<?php if ($field_technical) { ?>
				<div id="tab2" class="tab_content"><?php print $field_technical ?></div>
			<?php } ?>
			<?php /*if ($field_share) {*/ ?>
				<div id="tab3" class="tab_content">
<?php $li = 'http://'.$_SERVER['SERVER_NAME'].url('node/'.$nid); ?>
		<div id="share">
			<span style="float: left; position: relative;"><img src="<?php print base_path().drupal_get_path('theme', 'cos'); ?>/share/share-twitter.gif" align="left" style="margin: 0px; margin-right: 5px;"><a href="http://twitter.com/home/?status=<?php print $node->title.' '.$_SERVER['SERVER_NAME'].url('node/'.$nid); ?>" rel="nofollow" target="blank">Tweet This</a></span>
			<span style="float: left; position: relative;"><img src="<?php print base_path().drupal_get_path('theme', 'cos'); ?>/share/share-digg.gif" align="left"><a href="http://digg.com/submit?url=<?php print $li; ?>" rel="nofollow" target="blank">Digg This</a></span>
			<span style="float: left; position: relative;"><img src="<?php print base_path().drupal_get_path('theme', 'cos'); ?>/share/share-delicious.gif" align="left"><a href="http://del.icio.us/post?url=<?php print $li; ?>&title=<?php print $node->title; ?>" rel="nofollow" target="blank">Delicious</a></span>
			<span style="float: left; position: relative;"><img src="<?php print base_path().drupal_get_path('theme', 'cos'); ?>/share/share-stumble.gif" align="left"><a href="http://www.stumbleupon.com/submit?url=<?php print $li; ?>&title=<?php print $node->title; ?>" rel="nofollow" target="blank">Stumble it</a></span>
        </div>				
				</div>
			<?php //} ?>
        </div>
      </div>
	<div class="row end">&nbsp;</div>
	<h2 class="page_subtitle"><a href="<?php print url('comment/reply/'.$node->nid) ?>#comment-form" class="silver_btn"><?php print t('Write a Comment') ?></a><?php if ($node->comment_count > 0) { ?><?php print t('Latest Customer Comments') ?><?php } ?></h2>
  <?php print render($content['comments']) ?>
<?php } ?>
<?php //print '<pre>'. check_plain(print_r($content, 1)) .'</pre>'; ?>
<?php print t('') ?>