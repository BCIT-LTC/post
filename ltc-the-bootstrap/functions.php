<?php
/*
 *  Customize the length of excerpts by changing the return value
 * add_filter( 'get_the_excerpt', 'the_bootstrap_custom_excerpt_more' );
 *
 * function custom_excerpt_length( $length ) {
 * 	return 25;
 * }
 *
 * add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
*/

// [more] --> Some Longer Text

function shortcode_truncate() {
	return '<xml truncate="here"></xml>';
}
add_shortcode('more', 'shortcode_truncate');

// [tsd_contact] --> TSD contact
function shortcode_tsd() {
	return '<p>If you have any questions or concerns, please leave a comment below or contact the <a href="http://www.bcit.ca/techhelp/">Technology Service Desk</a>:</p><blockquote><strong>email:</strong> <a href="mailto:techhelp@bcit.ca">techhelp@bcit.ca</a><br /><strong>phone:</strong> 604-412-7444<br /><strong>in person:</strong> <a href="http://www.bcit.ca/map/?SE12-205">SE12-205</a> (see <a href="http://www.bcit.ca/techhelp/">hours of operation</a>)</blockquote>';
}
add_shortcode('tsd_contact', 'shortcode_tsd');

function size($atts) {
	extract(shortcode_atts(array(
		"h" => '1'
	), $atts));
	return '<div style="height:'.$h.'px;clear:both;"><img src="/shared/images/pixel.gif" /></div>';
}
add_shortcode("spacer", "size");

function linkUrl($atts, $content = null) {
	extract(shortcode_atts(array(
		"href" => '',
	), $atts));
	return '<table class="sc-table" border="0" cellspacing="0" cellpadding="0"><tr><td style="vertical-align: middle;"><a class="section-link" href="'.$href.'">'.$content.'</a></td><td style="text-align:right;"><a class="section-feed-link" href="'.$href.'feed/"><img src="/shared/images/rss/orange-medium.png" /></a></td></tr></table>';
}
add_shortcode("link", "linkUrl");

function textFeed($atts, $content = null) {
	extract(shortcode_atts(array(
		"rss" => '',
	), $atts));
	return '<li><span class="section-text">'.$content.'</span><a class="section-feed-link" href="'.$rss.'"><img src="/shared/images/rss/orange-small.png" /></a></li>';
}
add_shortcode("text", "textFeed");

// [cancelled] --> Cancelled sign
function shortcode_cancelled($atts, $content = null) {
        extract(shortcode_atts(array(
                "reason" => '',
        ), $atts));
        return '<span style="font-weight: bold;"><font style="color:red;font-weight: bold;">Cancelled</font> due to '.$reason.'</span>';
}
add_shortcode("cancelled", "shortcode_cancelled");

if ( ! function_exists( 'the_bootstrap_credits' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author,
 * comment and edit link
 *
 * @author      Konstantin Obenland
 * @since       1.2.2 - 07.04.2012
 *
 * @return      void
 */
function the_bootstrap_credits() {
        printf(
                '<span class="credits alignleft">' . __( 'The <a href="%2$s">%3$s</a> is a <a href="http://www.bcit.ca">BCIT</a> notification service.', 'the-bootstrap' ) . '</span>',
                date( 'Y' ),
                home_url( '/' ),
                get_bloginfo( 'name' )
        );
}
endif;

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url('/shared/bcit-logo-f.png');
	    background-size: 313px 73px ;
	    width: 320px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


/*find current template page */

add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}


//google fonts//

function load_google_fonts() {
            wp_register_style('googleFontsLato','https://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic');
            wp_enqueue_style( 'googleFontsLato'); 

            wp_register_style('googleFontsMontserrat','https://fonts.googleapis.com/css?family=Montserrat:400,700');
            wp_enqueue_style( 'googleFontsMontserrat');
            
            wp_register_style('googleFontsRaleway','https://fonts.googleapis.com/css?family=Raleway:500,600,400,300');
            wp_enqueue_style( 'googleFontsRaleway');
}
add_action('wp_print_styles', 'load_google_fonts');

?>