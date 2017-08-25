<?php
/*
# mod_jvinsgram - JV INSGRAM
# @version        3.2
# ------------------------------------------------------------------------
# author    Open Source Code Solutions Co
# copyright Copyright (C) 2011 joomlavi.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL or later.
# Websites: http://www.joomlavi.com
# Technical Support:  http://www.joomlavi.com/my-tickets.html
-------------------------------------------------------------------------*/
// no direct access
define( '_JEXEC', 1 );

$filePath = dirname(__FILE__);
$path 	  = dirname(dirname($filePath ));

define('JPATH_BASE', $path );
define( 'DS', DIRECTORY_SEPARATOR );

$filename = pathinfo(__FILE__);
$filename =  $filename['basename'];
$uri = str_replace(DS, '/', str_replace($_SERVER['DOCUMENT_ROOT'], '', JPATH_BASE));

$_SERVER['SCRIPT_FILENAME'] = $uri. '/' . $filename;
$_SERVER['SCRIPT_NAME']= $uri. '/' . $filename;
$_SERVER['REQUEST_URI'] = $uri.'?'. $_SERVER['QUERY_STRING'];
$_SERVER['PHP_SELF']    = $uri. '/' . $filename;

if (!defined('_JDEFINES')) {
    //define('JPATH_BASE', dirname(__FILE__));
    require_once JPATH_BASE.'/includes/defines.php';
}

require_once JPATH_BASE.'/includes/framework.php';

$input = JFactory::getApplication('site')->input;
$url = $input->getString('url');
$imageurl = $input->getString('imageurl', '');
$likesandcomments = $input->get('likesandcomments');

$countImages = $input->getInt('count', '10');


$column=$input->get('column');
$like=$input->get('like');
$comment=$input->get('comment');
$caption=$input->get('caption');
//thumbnail


// Check CURL
if (!function_exists ( 'curl_version' )) {
    exit('Please enable php_curl.dll extension in your host');
}

$ch = curl_init(); // Initialize a CURL session.
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  // Return Page contents.
curl_setopt($ch, CURLOPT_CAINFO, JPATH_SITE."/modules/mod_jvinsgram/libraries/cacert/cacert.pem");
curl_setopt($ch, CURLOPT_URL, $url);  // Pass URL as parameter.
$content = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);  // close curl resource, and free up system resources.

if($content){
    $data = json_decode($content);
    if($data->meta->code != 200){
        exit(json_encode(array('rs'=>false, 'msg'=>$data->meta->error_message)));
    }
    $html = '';
    $nextUrl = '';
    $left = 0;
    if(count($data->data)){
        $instagrams = array_slice($data->data, 0, $countImages);
        ob_start(); ?>
    <div class="row">
        <ul class="jvins-items">
            <?php if($instagrams) foreach($instagrams as $k=>$item){ ?>
                <li class="col-xs-<?php echo $column;?>">
                    <div class="jvins-item">
                        <div class="jvins-item--thumb">
                            <a href="<?php echo $item->link;?>" title="<?php if(isset($item->caption->text)) echo $item->caption->text ?>" target="_blank">
                                <img src="<?php echo $item->images->standard_resolution->url ?>" />
                            </a>
                        </div>
                        <?php if($caption==1){ ?>
                        <div class="jvins-item--description">
                            <?php if(isset($item->caption->text)) echo $item->caption->text; ?>
                        </div>
                        <?php } ?>
                        
                        <ul class="jvins-item--tool">
                            <?php if($like==1){?>
                                <li>
                                    <i class="fa fa-heart"></i> <?php if($item->likes->count) echo ''.$item->likes->count; else echo '0';?></li>
                            <?php }?>
                            <?php if($comment==1){?>
                                <li>
                                    <i class="fa fa-comment"></i> <?php if($item->comments->count) echo ''.$item->comments->count; else  echo '0';?></li>
                            <?php }?>
                        </ul> 
                    </div>        
                </li>
                
            <?php } ?>
        </ul>
    </div>
        <?php
        $html = ob_get_clean();

        $left = $countImages - count($instagrams);
        if($left && isset($data->pagination->next_url)){
            $nextUrl = $data->pagination->next_url;
        }
    }
    exit(json_encode(array('rs'=>true, 'html'=>$html, 'nextUrl'=>$nextUrl, 'limit'=>$left)));
}

exit(json_encode(array('rs'=>false, 'msg'=>$error)));