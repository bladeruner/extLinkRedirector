<?php
if (isset($_GET['url'])) {
    $url = $modx->stripTags($_GET['url']);
    $modx->sendRedirect($url,array('responseCode' => 'HTTP/1.1 302 Found'));
}
return;