
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/he_IL/sdk.js#xfbml=1&version=v2.5&appId=625427470893191";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script> 
    $(document).ready(function() {
        $('.fb_button').<?php echo $facebook_page_action; ?>(function() {
            $('.facebook_container').toggleClass('facebook_translate');
        });
    });
</script>
<style>
    /* facebook floating page */
.facebook_container {
    background: #3b5998;
    position: fixed;
    top: 20%;
    width: 298px;
    
    right: -300px;
    padding: 3px 0px 5px 5px;
    -webkit-transition: all 500ms ease-in-out;
    -moz-transition: all 500ms ease-in-out;
    -o-transition: all 500ms ease-in-out;
    transition: all 500ms ease-in-out;
        z-index: 999999;
}
.facebook_translate {
    right: 0;   
}
.fb_button {
    background: url('/image/fb.png') no-repeat;
    width: 48px;
    height: 155px;
    position: absolute;
    left: -48px;
    cursor: pointer;
}
/* END facebook floating page */
@media (max-width: 767px) {
    .fb_button {
     display: none;      
    }
</style>
<div class="facebook_container"> 
<div class="fb_button"></div>
<div class="fb-page" data-href="<?php echo $facebook_page_url; ?>" data-tabs="timeline" data-small-header="false" data-width="<?php echo $facebook_page_width; ?>" data-height="<?php echo $facebook_page_height; ?>" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $facebook_page_url; ?>"><a href="<?php echo $facebook_page_url; ?>"></a></blockquote></div></div>
 

</div>