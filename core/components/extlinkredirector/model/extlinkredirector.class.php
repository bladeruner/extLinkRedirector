<?php
class extLinkRedirector {
	public $modx;	
	
	function __construct(modX &$modx, array $config = array()) {
		$this->modx =& $modx;		

		$this->config = array_merge(array(
			'use_redirect' => 1,
			'redirect_page_id' => 1,
			'use_stop_classes' => 1,
			'stop_classnames' => 'extlink',
			'add_blank' => 1,
			'add_nofollow' => 1,
			'add_noindex' => 0,
			'use_stop_words' => 1,
			'stop_words' => 'google.ru'
			), $config);
		
	}
	
	public function stopClasses($data) {
		if ((boolean)$this->config['use_stop_classes']) {			
			$classes = explode(",",$this->config['stop_classnames']);
			foreach ($classes as $class) if (stripos($data, trim($class)) !== false) return true;						
		}
		return false;
	}
	
	public function stopWords($data) {		
		if ((boolean)$this->config['use_stop_words']) {			
			$words = explode(",",$this->config['stop_words']);
			foreach ($words as $word) if (stripos($data, trim($word)) !== false) return true;
		}	
		return false;
	}
}