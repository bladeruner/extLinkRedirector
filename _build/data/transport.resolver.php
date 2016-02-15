<?php
/**
 * Resolver to set system settings
 * 
 * @package mdpafterinstall
 * @subpackage build
 */
$success= true;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
		
			$redirector = $object->xpdo->getObject('modResource',array('alias' => 'away'));
			if (!$redirector) {
				$redirector = $object->xpdo->newObject('modResource');
				$redirector->fromArray(array(
					'pagetitle' => 'External Link Redirector',
					'template' => 0,
					'published' => 1,
					'hidemenu' => 1,
					'alias' => 'away' 
					,'content_type' => 1, 
					'richtext' => 0, 
					'menuindex' => 300, 
					'content' =>'[[!extLinkRedirector]]'
				));
				$redirector->save();
			}
			
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            $success= true;
            break;
    }	
	
unset($tmp);	

return $success;