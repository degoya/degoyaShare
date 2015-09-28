<?php
/**
 * The base degoyaShare snippet.
 *
 * @package degoyashare
 */

$corePath = $modx->getOption('degoyaShare.core_path',$config,$modx->getOption('core_path').'components/degoyaShare/');
$assetsUrl = $modx->getOption('degoyaShare.assets_url',$config,$modx->getOption('assets_url').'components/degoyaShare/');

switch ($modx->event->name) {
  case 'OnDocFormRender':
    $url = $modx->makeUrl($resource->get('id'), '', '', 'full'); 
    $id = $resource->get('id');
    $modx->controller->addLexiconTopic('degoyaShare:default');
    $modx->regClientStartupHTMLBlock('<script type="text/javascript">Ext.onReady(function() {
      degoyaShare.config.id = "' . $id . '";
      degoyaShare.config.url = "' . $url . '"; 

      
    });</script>');

    /* include CSS and JS*/
    $modx->regClientCSS($assetsUrl . 'css/mgr.css'); 
    $modx->regClientStartupScript($assetsUrl . 'js/mgr/degoyashare.js?v=' . $modx->getOption('degoyaShare.version', null, 'v1.0.0'));
   
    break;

}