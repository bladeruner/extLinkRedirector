<?php
if ($modx->event->name == 'OnWebPagePrerender') {
    
    require_once $modx->getOption('extlinkredirector.core_path',null,$modx->getOption('core_path').'components/extlinkredirector/model/').'extlinkredirector.class.php';
    $extLinkRedirector = new extLinkRedirector($modx,$scriptProperties);
    
    $output = &$modx->resource->_output;
    $site_url = $modx->getOption('site_url');
    preg_match_all('#<a(?:.*?)href(?:\s*)=(?:\s*)[\"\']((https?|ftp):\/\/\S*?)[\"\']([^>]*)>(.*?)<\/a>#im',$output,$res);
    for ($i = 0; $i < count($res[0]); $i++) {
        if(stripos($res[1][$i],$site_url) !== 0) {
            if($extLinkRedirector->stopWords($res[1][$i]) == false && $extLinkRedirector->stopClasses($res[0][$i]) == false){
                if (!stristr($res[0][$i], 'javascript:')) {
                    $link = $res[0][$i];
                    if ((boolean)$scriptProperties['use_redirect']) {
                        $redirectUrl = $modx->makeUrl($extLinkRedirector->config['redirect_page_id'],'','','full');
                        $link = substr_replace($link, $redirectUrl.'?url='.$res[1][$i], strpos($link, $res[1][$i]), strlen($res[1][$i]));
                    }
                    if ((boolean)$extLinkRedirector->config['add_blank']) {
                        $link = preg_replace('/target=["\'][^\'".]+["\']/', '', $link);
                        $link = str_replace('<a','<a target="_blank"',$link);
                    }
                    if ((boolean)$extLinkRedirector->config['add_nofollow']) {
                        $link = preg_replace('/rel=["\'][^\'".]+["\']/', '', $link);
                        $link = str_replace('<a','<a rel="nofollow"',$link);
                    }
                    if ((boolean)$extLinkRedirector->config['add_noindex']) {
                        $link = str_replace('</a>','</a><!--/noindex-->',$link);
                        $link = str_replace('<a','<!--noindex--><a',$link);
                    }
                    $output = str_replace($res[0][$i],$link,$output);
                }
            }
        }
    }
}