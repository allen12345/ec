<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if IE 6]><link rel="stylesheet" href="<?php print base_path().path_to_theme();?>/css/ie6.css" type="text/css" ><![endif]-->
  <!--[if IE 7]><link rel="stylesheet" href="<?php print base_path().path_to_theme();?>/css/ie7.css" type="text/css" ><![endif]-->
  <script type="text/javascript">
  (function ($) { $(document).ready(function(){
	  $("#myController").jFlow({
		  slides: "#slides",
		  controller: ".jFlowControl", // must be class, use . sign
		  slideWrapper : "#jFlowSlide", // must be id, use # sign
		  selectedWrapper: "jFlowSelected",  // just pure text, no sign
		  auto: true,		//auto change slide, default true
		  width: "554px",
		  height: "228px",
		  duration: 600,
		  prev: ".jFlowPrev", // must be class, use . sign
		  next: ".jFlowNext" // must be class, use . sign
	  });
  }); })(jQuery);
  </script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
