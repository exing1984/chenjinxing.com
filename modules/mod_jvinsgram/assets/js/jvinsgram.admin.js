/**
 # mod_jvinsgram - JV INSGRAM
 # @version       3.2
 # ------------------------------------------------------------------------
 # author    Open Source Code Solutions Co
 # copyright Copyright (C) 2011 joomlavi.com. All Rights Reserved.
 # @license - http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL or later.
 # Websites: http://www.joomlavi.com
 # Technical Support:  http://www.joomlavi.com/my-tickets.html
 -------------------------------------------------------------------------*/
$JVIG(function($){
    $("#connectbutton").click(function(){
        var valid = true;
        var client = $("#jform_params_clientid").val();
        var redirect = $("#jform_params_redirecturi").val();
        if(!client){
            alert("Please enter Client ID");
            valid = false;
        }else if(!redirect){
            alert("Please enter Redirect URI");
            valid = false;
        }
        if(valid){
            wleft = (screen.width - 800) / 2;
            wtop = (screen.height - 600) / 2;
            iwindow = window.open("https://api.instagram.com/oauth/authorize/?client_id="+ client +
                "&redirect_uri="+ redirect + "&response_type=token", "iwindow", "status=1, scrollbars=1,  width=800, height=600");
            iwindow.moveTo(wleft, wtop);
        }
    });

   $('#jform_params_imagetype').change(function(){
       var value = $(this).val();
       if($(this).parent().is('li')){
           if(value=='mostpopular' || value=='userfeed' || value=='userfeed'){
               $('#jform_params_userid, #jform_params_tagname').parent().hide();
           }
           if(value=='recentuser'){
               $('#jform_params_userid').parent().show();
               $('#jform_params_tagname').parent().hide();
           }
           if(value=='recenttag'){
               $('#jform_params_tagname').parent().show();
               $('#jform_params_userid').parent().hide();
           }
       }else{
           if(value=='mostpopular' || value=='userfeed' || value=='userfeed'){
               $('#jform_params_userid, #jform_params_tagname').parent().parent().hide();
           }
           if(value=='recentuser'){
               $('#jform_params_userid').parent().parent().show();
               $('#jform_params_tagname').parent().parent().hide();
           }
           if(value=='recenttag'){
               $('#jform_params_tagname').parent().parent().show();
               $('#jform_params_userid').parent().parent().hide();
           }
       }
   });
    $('#jform_params_imagetype').trigger('change');
});
