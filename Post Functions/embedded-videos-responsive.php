<?php
/**
 * Author: Hammer Garita | @hammergarita
 * Make Video Embeds Automatically Responsive in WordPress
 */
 
/*------------------------------------*\
	Video Embeds Automatically Responsive
\*------------------------------------*/

//Add filter
if(!function_exists('video_content_filter')) {
  function video_content_filter($content) {
     //looks for an iFrame on the page
     $pattern = '/<iframe.*?src=".*?(vimeo|youtu\.?be).*?".*?<\/iframe>/';
     preg_match_all($pattern, $content, $matches);

     foreach ($matches[0] as $match) {
       // iFrame found, now we wrap it in a DIV...
       $wrappedframe = '<div class="flex-video">' . $match . '</div>';

       // Swap out the original with our now-encased video
       $content = str_replace($match, $wrappedframe, $content);
     }
     return $content;
 }
 // Apply it to post or page content areas
 add_filter( 'the_content', 'video_content_filter' );
 // Apply it to your sidebar widgets if you like
 add_filter( 'widget_text', 'video_content_filter' );
}

//Print css styles needed in the header
//You can copy the styles and paste them into your stylesheet css
function video_responsive_css() {
    ?>
        <style>
        div.flex-video {
          position: relative;
          padding-bottom: 56.25%;
          padding-top: 30px;
          height: 0;
          overflow: hidden;
          margin: 50px 0; /* this is optional */
          clear: both;
        }

        div.flex-video iframe {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
        }
        </style>
    <?php
}
add_action('wp_head', 'video_responsive_css');
