<?php
/**
 * A default list of properties for the extLinkRedirector plugin
 *
 * @package extlinkredirector
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'use_redirect',
        'desc' => 'Process external links via the internal redirect',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
    ),
    array(
        'name' => 'redirect_page_id',
        'desc' => 'Internal redirect page id',
        'type' => 'textfield',
        'options' => '',
        'value' => '1',
    ),
    array(
        'name' => 'use_stop_classes',
        'desc' => 'Toggle class check',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
    ),
    array(
        'name' => 'stop_classnames',
        'desc' => 'A comma-separated list of classnames',
        'type' => 'textfield',
        'options' => '',
        'value' => 'extlink',
    ),
    array(
        'name' => 'add_blank',
        'desc' => 'Add target="_blank" to the processed links',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
    ),
    array(
        'name' => 'add_nofollow',
        'desc' => 'Add rel="nofollow" to the processed links',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
    ),
    array(
        'name' => 'add_noindex',
        'desc' => 'Add <!--noindex--><!--/noindex--> to the processed links',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
    ),
    array(
        'name' => 'use_stop_words',
        'desc' => 'Toggle stop words check',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
    ),
    array(
        'name' => 'stop_words',
        'desc' => 'A comma-separated list of classnames',
        'type' => 'textfield',
        'options' => '',
        'value' => 'google.ru,modx.pro',
    ),
);

return $properties;