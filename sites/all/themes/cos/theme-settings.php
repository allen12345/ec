<?php
function cos_form_system_theme_settings_alter(&$form, $form_state) {

  $form['advansed_theme_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Advansed Theme Settings'),
  );

  $form['advansed_theme_settings']['skin'] = array(
    '#type' => 'select',
    '#title' => t('Theme Skin'),
    '#default_value' => theme_get_setting('skin'),
    '#options' => array (
      0 => t('Red'),
	    1 => t('Orange'),
	    2 => t('Blue'),
	    3 => t('Green'),
	    4 => t('Pink'),
    ),
  );

}
