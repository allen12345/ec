<?php
// $Id$

if (!variable_get('cos_first_start', false)) {
//	variable_set('cos_first_start', 1);
//	cos_taxonomy_menu_insert_link_items(1);
} 

function cos_taxonomy_menu_insert_link_items($vid) {
  _taxonomy_menu_delete_all($vid);
  $terms = taxonomy_get_tree($vid);
  $menu_name = variable_get('taxonomy_menu_vocab_menu_'. $vid, FALSE);  
  foreach ($terms as $data) {
    $args = array(
      'term' => $data,
      'menu_name' => $menu_name,
    );
    $mlid = taxonomy_menu_handler('insert', $args);
  }
}

if (arg(2) != 'block' and arg(0) != 'admin') {
	//drupal_add_js(drupal_get_path('theme', 'cos') . '/js/jquery-1.3.2.min.js');
	drupal_add_js(drupal_get_path('theme', 'cos') . '/js/stuHover.js');
	drupal_add_js(drupal_get_path('theme', 'cos') . '/js/jquery.flow.1.2.auto.js');
}

$style = theme_get_setting('skin');

switch ($style) {
	case 0:
		//drupal_add_css(drupal_get_path('theme', 'cos') . '/css/style_b.css', 'theme');
		break;
	case 1:
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/style_o.css', array('group' => CSS_THEME));
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/nav-menus_o.css', array('group' => CSS_THEME));
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/jqtransform_o.css', array('group' => CSS_THEME));
		break;
	case 2:
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/style_b.css', array('group' => CSS_THEME));
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/nav-menus_b.css', array('group' => CSS_THEME));
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/jqtransform_b.css', array('group' => CSS_THEME));
		break;
	case 3:
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/style_g.css', array('group' => CSS_THEME));
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/nav-menus_g.css', array('group' => CSS_THEME));
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/jqtransform_g.css', array('group' => CSS_THEME));
		break;
	case 4:
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/style_p.css', array('group' => CSS_THEME));
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/nav-menus_p.css', array('group' => CSS_THEME));
		drupal_add_css(drupal_get_path('theme', 'cos') . '/css/jqtransform_p.css', array('group' => CSS_THEME));
		break;
	default:
		//drupal_add_css(drupal_get_path('theme', 'cos') . '/css/style_b.css', 'theme');
}

function cos_get_pre() {
$style = theme_get_setting('skin');
switch ($style) {
	case 0:
		$p = '';
		break;
	case 1:
		$p = '_o';
		break;
	case 2:
		$p = '_b';
		break;
	case 3:
		$p = '_g';
		break;
	case 4:
		$p = '_p';
		break;
	default:
		$p = '';
}
return $p;
}

/* Top Menu */
function cos_tree_top($menu_name = 'navigation') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = cos_tree_output_top($tree);
  }
  return $menu_output[$menu_name];
}


function cos_tree_output_top($tree) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  foreach ($items as $i => $data) {
	$data['link']['title'] = t($data['link']['title']);
    if ($data['below']) {
	  $output .= '<li class="top"><a href="'.url($data['link']['href']).'" class="top_link"><span class="down">'.$data['link']['title'].'</span></a>' . cos_tree_output2_top($data['below']) ."</li>\n";
    }
    else {
	  $output .= '<li class="top"><a href="'.url($data['link']['href']).'" class="top_link"><span>'.$data['link']['title'].'</span></a>'."</li>\n";
    }
  }
  return $output ? '<ul id="nav">'. $output .'</ul>' : '';
}

function cos_tree_output2_top($tree) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }
  $num_items = count($items);
  foreach ($items as $i => $data) {
	$data['link']['title'] = t($data['link']['title']);
    $output .= '<li><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>\n";
  }
  return $output ? '<ul class="sub">'. $output .'</ul>' : '';
}

/* Bottom Menu */
function cos_tree_bottom($menu_name = 'navigation') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = cos_tree_output_bottom($tree);
  }
  return $menu_output[$menu_name];
}


function cos_tree_output_bottom($tree) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  $ss = false;
  foreach ($items as $i => $data) {
	$data['link']['title'] = t($data['link']['title']);
	if ($ss) {
		$output .= '<li>| <a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>\n";
	} else {
		$output .= '<li><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>\n";
		$ss = true;
	}
  }
  return $output ? '<ul class="clearfix">'. $output .'</ul>' : '';
}

/* Left Menu */
function cos_tree_left($menu_name = 'navigation') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = cos_tree_output_left($tree);
  }
  return $menu_output[$menu_name];
}

function cos_tree_output_left($tree) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  foreach ($items as $i => $data) {
	$data['link']['title'] = t($data['link']['title']);
    if ($data['below']) {
	  $output .= '<li class="top"><a href="'.url($data['link']['href']).'" class="top_link"><span class="down">'.$data['link']['title'].'</span></a>' . cos_tree_output2_left($data['below']) ."</li>\n";
    }
    else {
	  $output .= '<li class="top"><a href="'.url($data['link']['href']).'" class="top_link"><span>'.$data['link']['title'].'</span></a>'."</li>\n";
    }
  }
  return $output ? '<ul id="prod_nav" class="clearfix">'. $output .'</ul>' : '';
}

function cos_tree_output2_left($tree) {
  $output = $output1 = $output2 = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }
  $num_items = count($items);
  $col = 0;
  foreach ($items as $i => $data) {
	$data['link']['title'] = t($data['link']['title']);
	if ($col) {
		$output1 .= '<li><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>\n";
		$col = 0;
	} else {
		$output2 .= '<li><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>\n";
		$col = 1;
	}
  }
  return ($output1.$output2 ? '<ul class="sub"><li class="clearfix">'. ($output1 ? '<ul>'. $output1 .'</ul>' : '').($output2 ? '<ul>'. $output2 .'</ul>' : '') .'</li></ul>' : '')   ;
}

/* User Links */
function cos_user_links() {
	global $user;
	if ($user->uid) {
		$output = '<a href="'.url('user/'.$user->uid).'">'.t('My Account').'</a> <a href="'.url('user/logout').'" class="q2">'.t('LogOut').'</a>';
	} else {
		$output = '<a href="'.url('user/register').'" class="q0">'.t('Sign Up').'</a> <a href="'.url('user').'" class="q1">'.t('Login').'</a>';
	}
  return $output ? '<div class="user_nav"><ul>'. $output .'</ul></div>' : '';
}

/* Node */
function cos_get_node($type = 'type') {
	static $node = false;
	if (!$node and arg(0) == 'node' and is_numeric(arg(1))){
		//$node = db_fetch_array(db_query('SELECT * FROM {node} where nid = %d',arg(1)));
	}	
  return $node[$type];
}

function cos_get_fivestar($nid, $type = 'product') {
	if (!module_exists('rate')) { return ''; }
  $widgets = rate_get_active_widgets('node', $type, 'teaser');
  foreach ($widgets as $widget_id => $widget) {
    $widget_name = 'rate_' . $widget->name;
    isset($widget->node_display) or $widget->node_display = RATE_DISPLAY_BELOW_CONTENT;
    return rate_generate_widget($widget_id, 'node', $nid);
  }
}

function cos_get_cart() {
	$context = array(
		'revision' => 'themed-original',
		'type' => 'amount',
	);
	$item_count = 0;
	$total = 0;
	//$product_count = uc_cart_get_contents();
	if ($product_count) {
		foreach ($product_count as $item) {
			$display_item = module_invoke($item->module, 'cart_display', $item);
			$item_count += $item->qty;
			$total += $display_item['#total'];
		}
	}
	//return array('count' => $item_count, 'total' => uc_price($total, $context));
}
/*
function cos_pager($tags = array(), $limit = 10, $element = 0, $parameters = array(), $quantity = 9) {
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', (isset($tags[0]) ? $tags[0] : t('« first')), $limit, $element, $parameters);
  $li_previous = theme('pager_previous', (isset($tags[1]) ? $tags[1] : t('‹ previous')), $limit, $element, 1, $parameters);
  $li_next = theme('pager_next', (isset($tags[3]) ? $tags[3] : t('next ›')), $limit, $element, 1, $parameters);
  $li_last = theme('pager_last', (isset($tags[4]) ? $tags[4] : t('last »')), $limit, $element, $parameters);

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => 'prev',
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => 'prev',
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => 'skip_pages',
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => 'pager-item',
            'data' => theme('pager_previous', $i, $limit, $element, ($pager_current - $i), $parameters),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => 'current_page',
            'data' => '<a href="">'.$i.'</a>',
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => 'pager-item',
            'data' => theme('pager_next', $i, $limit, $element, ($i - $pager_current), $parameters),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => 'skip_pages',
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => 'next',
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => 'next',
        'data' => $li_last,
      );
    }
	foreach ($items as $i => $data) {
		if ($data['class']) $c = ' class="'.$data['class'].'"'; else $c = '';
		$out .= '<li'.$c.'>'.$data['data'].'</li>';
	}
    return '<div class="pagination"><ul class="page_nav">'.$out.'</ul></div>';
  }
}
*/