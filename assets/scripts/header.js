//userinfo
$().ready(function()
{
    jQuery('.user-info').click(function(){
        if(!jQuery(this).hasClass('user-active')) {
            var $userInfo = jQuery(this);
            var $userDrop = jQuery('.user-dropbox');

            $userDrop.slideDown('fast');
            $userInfo.addClass('user-active');					//add class to change color and background

        } else {
            console.log('has class');
            jQuery(this).removeClass('user-active');
            jQuery('.user-dropbox').hide();
        }

    });
});



