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
defined( '_JEXEC' ) or die( 'Restricted access' );

class modJVInsgram
{
    public function getUrl($params){

        $accesstoken = $params->get('accesstoken');
        $imagetype = $params->get('imagetype','mostpopular');
        $userid = $params->get('userid');
        $tagname = $params->get('tagname');
        $numofimage = $params->get('numofimage','10');

       
        //
        switch ($imagetype){
            case 'recentuser':
                return 'https://api.instagram.com/v1/users/'.$userid.'/media/recent?access_token='.$accesstoken.'&count='.$numofimage;
            case 'recenttag':
                return 'https://api.instagram.com/v1/tags/'.$tagname.'/media/recent?access_token='.$accesstoken.'&count='.$numofimage;
            case 'userfeed':
                return 'https://api.instagram.com/v1/users/self/feed?access_token='.$accesstoken.'&count='.$numofimage;
            case 'userlikes':
                return 'https://api.instagram.com/v1/users/self/media/liked?access_token='.$accesstoken.'&count='.$numofimage;
            default://mostpopular
                return 'https://api.instagram.com/v1/media/popular?access_token='.$accesstoken.'&count='.$numofimage;
        }
    }

    public function getScript(&$params){
        $numofimage = intval($params->get('numofimage','10'));
        $column= $params->get('itemscolumn','4');

        //item
        $imageurl = $params->get('imageurl','image');
        $like= $params->get('itemlike');
        $comment= $params->get('itemcomment');
        $caption= $params->get('itemcaption');
        

        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JURI::base(true).'/modules/mod_jvinsgram/assets/css/style.css');

        if(version_compare(JVERSION,'3.0')<0  && $loadjquery){
            $doc->addScript(JURI::base(true).'/modules/mod_jvinsgram/assets/js/jquery.min.js');
        }else{
            JHtml::_('Jquery.framework');
        }
        $doc->addScript(JURI::base(true).'/modules/mod_jvinsgram/assets/js/jquery.noconflict.js');
        ob_start();?>
			<script type="text/javascript">
                (function($){
                    function loadInstagramImages(url, limit){
                        $('#jvinsgram_loading').show();
                        $.ajax({
                            url: '<?php echo JUri::base(true).'/modules/mod_jvinsgram/loadInstagram.php';?>',
                            async: true,
                            data: {
                                'count': limit,
                                'column': '<?php echo $column;?>',
                                'url': url,
                                'imageurl': '<?php echo $imageurl;?>',
                                'like': '<?php echo $like;?>',
                                'comment': '<?php echo $comment;?>',
                                'caption': '<?php echo $caption;?>'
                            },
                            type: 'post',
                            dataType: 'json',
                            success: function(data){
                                $('#jvinsgram_loading').hide();
                                if(data.rs){
                                    $( document ).trigger( 'instagram-fecthed', [ $( '#jvinsgram_list_items' ).append(data.html) ] );
                                    if(data.nextUrl){
                                        loadInstagramImages(data.nextUrl, data.limit);
                                    }
                                }else{
                                    $('#jvinsgram_error').hide(data.msg);
                                }
                            }
                        });
                    }

                    $(document).ready(function(){
                        loadInstagramImages('<?php echo $this->getUrl($params);?>', '<?php echo $numofimage;?>');
                    });
                })($JVIG)
			</script>

		<?php
		return ob_get_clean();
	}

}