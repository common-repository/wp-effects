<?php
/*
Plugin Name: WP-Effects
Plugin URI: http://plugins.wp-themes.ws/wp-effects
Description: Allows you to display effects on your website - Such as snow and leaves!
Version: 1.0.8
Author: WP-Themes.ws
Author URI: http://wp-themes.ws
*/

// 28th May

/*  Copyright 2011 WP-Themes.ws - support@wp-themes.ws

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Hook for adding admin menus
register_activation_hook(__FILE__,'effects_acheck');
add_action('admin_menu', 'wp_effects_add_pages');

// action function for above hook
function wp_effects_add_pages() {
    add_options_page('WP-Effects', 'WP-Effects', 'administrator', 'wp_effects', 'wp_effects_options_page');
}

function wp_effects_options_page() {

    // variables for the field and option names
    $opt_name_1 = 'mt_effects_type';	
    $opt_name_2 = 'mt_effects_speed';	
    $opt_name_5 = 'mt_effects_plugin_support';
	$opt_name_6 = 'mt_effects_amount';
    $hidden_field_name = 'mt_effects_submit_hidden';
	$data_field_name_1 = 'mt_effects_type';
	$data_field_name_2 = 'mt_effects_speed';
    $data_field_name_5 = 'mt_effects_plugin_support';
	$data_field_name_6 = 'mt_effects_amount';

    // Read in existing option value from database
	$opt_val_1 = get_option($opt_name_1);
	$opt_val_2 = get_option($opt_name_2);
    $opt_val_5 = get_option($opt_name_5);
	$opt_val_6 = get_option($opt_name_6);

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
		$opt_val_1 = $_POST[$data_field_name_1];
		$opt_val_2 = $_POST[$data_field_name_2];
        $opt_val_5 = $_POST[$data_field_name_5];
		$opt_val_6 = $_POST[$data_field_name_6];
		$opt_val_7 = $_POST["customurl"];
		$opt_val_8 = $_POST["customurl2"];
		$opt_val_9 = $_POST["customurl3"];

        // Save the posted value in the database
		update_option( $opt_name_1, $opt_val_1 );
        update_option( $opt_name_2, $opt_val_2 );
        update_option( $opt_name_5, $opt_val_5 );
		update_option( $opt_name_6, $opt_val_6 );
		update_option( "mt_effects_custom", $opt_val_7 );
		update_option( "mt_effects_custom2", $opt_val_8 );
		update_option( "mt_effects_custom3", $opt_val_9 );

        // Put an options updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Options saved.', 'mt_trans_domain' ); ?></strong></p></div>
<?php

    }

    // Now display the options editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'WP Effects Options', 'mt_trans_domain' ) . "</h2>";

    // options form
    
    $change3 = get_option("mt_effects_plugin_support");
	$change4 = get_option("mt_effects_type");
$change5 = get_option("mt_effects_speed");

if ($change3=="Yes" || $change=="") {
$change3="checked";
$change31="";
} else {
$change3="";
$change31="checked";
}

if ($change5=="9") {
$change51="checked";
} else if ($change5=="5") {
$change53="checked";
} else {
$change52="checked";
}

if ($change4=="None" || $change4=="") {
$change4="checked";
} else if ($change4=="Snow") {
$change41="checked";
} else if ($change4=="Leaves") {
$change42="checked";
} else if ($change4=="Presents") {
$change44="checked";
} else if ($change4=="Eggs") {
$change45="checked";
} else if ($change4=="Hearts") {
$change46="checked";
} else if ($change4=="Flowers") {
$change47="checked";
} else if ($change4=="Pumpkin") {
$change48="checked";
} else if ($change4=="Wordpress") {
$change49="checked";
} else {
$change43="checked";
}

$customvar=get_option("mt_effects_custom");
$customvar2=get_option("mt_effects_custom2");
$customvar3=get_option("mt_effects_custom3");

if ($customvar=="") {
$customvar="Enter URL to .gif image here";
}

if ($customvar2=="") {
$customvar2="Enter URL to .gif image here";
}

if ($customvar3=="") {
$customvar3="Enter URL to .gif image here";
}
    ?>
<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Type of Effect:", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="None" <?php echo $change4; ?>>None
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="Snow" <?php echo $change41; ?>>Snow
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="Leaves" <?php echo $change42; ?>>Leaves
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="Presents" <?php echo $change44; ?>>Presents
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="Eggs" <?php echo $change45; ?>>Eggs
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="Hearts" <?php echo $change46; ?>>Hearts
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="Flowers" <?php echo $change47; ?>>Flowers
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="Pumpkin" <?php echo $change48; ?>>Pumpkin
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="Wordpress" <?php echo $change49; ?>>Wordpress
<input type="radio" name="<?php echo $data_field_name_1; ?>" value="Custom" <?php echo $change43; ?>>Custom Image
</p><hr />

<p><?php _e("If Type is Custom, set these:", 'mt_trans_domain' ); ?> 
<br />Direct URL to Image 1: <input type="text" name="customurl" value="<?php echo $customvar; ?>" /><br />
Image URL 2 (Optional): <input type="text" name="customurl2" value="<?php echo $customvar2; ?>" /><br /> 
Image URL 3 (Optional): <input type="text" name="customurl3" value="<?php echo $customvar3; ?>" /><br /> 
</p><hr />

<p><?php _e("Number of images at any one time (Default: 10):", 'mt_trans_domain' ); ?> 
<input type="text" name="<?php echo $data_field_name_6; ?>" value="<?php echo $opt_val_6; ?>" />
</p><hr />

<p><?php _e("Speed of Fall:", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_2; ?>" value="8" <?php echo $change51; ?>>Slow
<input type="radio" name="<?php echo $data_field_name_2; ?>" value="6" <?php echo $change52; ?>>Average
<input type="radio" name="<?php echo $data_field_name_2; ?>" value="4" <?php echo $change53; ?>>Quick
</p><hr />

<p><?php _e("Support this plugin?", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_5; ?>" value="Yes" <?php echo $change3; ?>>Yes
<input type="radio" name="<?php echo $data_field_name_5; ?>" value="No" <?php echo $change31; ?>>No
</p>

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Update Options', 'mt_trans_domain' ) ?>" />
</p><hr />

</form>
<?php } ?>
<?php

function effects_acheck() {
if (has_action('show_effects')==false) {
} else {

if (get_option('mt_effects_plugin_support')=="") {
update_option('mt_effects_plugin_support', 'Yes');
}

}
}

function show_effects() {
$imagetype=get_option("mt_effects_type");
$customvar=get_option("mt_effects_custom");
$customvar2=get_option("mt_effects_custom2");
$customvar3=get_option("mt_effects_custom3");
$amount=get_option("mt_effects_amount");
$speed=get_option("mt_effects_speed");

if ($speed=="" || $speed<1 || $speed>10) {
$speed=6;
}

if ($amount=="") {
$amount=10;
}

if ($imagetype=="") {
$imageurl="";
} else if ($imagetype=="None") {
$imageurl="";
} else if ($imagetype=="Snow") {
$imageurl=get_bloginfo('siteurl')."/wp-content/plugins/wp-effects/snow.gif";
} else if ($imagetype=="Leaves") {
$imageurl=get_bloginfo('siteurl')."/wp-content/plugins/wp-effects/leaves.gif";
} else if ($imagetype=="Presents") {
$imageurl=get_bloginfo('siteurl')."/wp-content/plugins/wp-effects/presents.gif";
} else if ($imagetype=="Eggs") {
$imageurl=get_bloginfo('siteurl')."/wp-content/plugins/wp-effects/egg.gif";
} else if ($imagetype=="Hearts") {
$imageurl=get_bloginfo('siteurl')."/wp-content/plugins/wp-effects/heart.gif";
} else if ($imagetype=="Flowers") {
$imageurl=get_bloginfo('siteurl')."/wp-content/plugins/wp-effects/flowers.gif";
}  else if ($imagetype=="Pumpkin") {
$imageurl=get_bloginfo('siteurl')."/wp-content/plugins/wp-effects/pumpkin.gif";
} else if ($imagetype=="Wordpress") {
$imageurl=get_bloginfo('siteurl')."/wp-content/plugins/wp-effects/wordpress.gif";
} else if ($imagetype=="Custom") {
$imageurl=$customvar;
$imageurl2=$customvar2;
$imageurl3=$customvar3;
}
?>
<script language="JavaScript1.2">
var image="<?php echo $imageurl; ?>";  //Image path should be given here
var no = <?php echo $amount; ?>; // No of images should fall
var time = 0; // Configure whether image should disappear after x seconds (0=never):
var speed = <?php echo $speed*10; ?> // Fix how fast the image should fall
var i, dwidth = 900, dheight =500; 
var nht = dheight;
var toppos = 0;
var type = "<?php echo $imagetype; ?>";

if(document.all){
	var ie4up = 1;
}else{
	var ie4up = 0;
}

if(document.getElementById && !document.all){
	var ns6up = 1;
}else{
	var ns6up = 0;
}

function getScrollXY() {
  var scrOfX = 10, scrOfY = 10;
  if( typeof( window.pageYOffset ) == 'number' ) {
 
    scrOfY =window.pageYOffset;
    scrOfX = window.pageXOffset;
  } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {

    scrOfY = document.body.scrollTop;
    scrOfX = document.body.scrollLeft;
  } else if( document.documentElement &&
      ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {

   scrOfY = document.documentElement.scrollTop;
   scrOfX = document.documentElement.scrollLeft;
  }
  return [ scrOfX, scrOfY ];
}

var timer;

function ranrot()
{

var a = getScrollXY()
if(timer)
{
	clearTimeout(timer);
}
toppos = a[1];
dheight = nht+a[1];
//alert(dheight);

timer = setTimeout('ranrot()',2000);
}
 	
ranrot();
 	
function iecompattest()
{
	if(document.compatMode && document.compatMode!="BackCompat")
	{
		return document.documentElement;
	}else{
		return document.body;
	}
	
}
if (ns6up) {
	dwidth = window.innerWidth;
	dheight = window.innerHeight;
} 
else if (ie4up) {
	dwidth = iecompattest().clientWidth;
	dheight = iecompattest().clientHeight;
}

nht = dheight;

var cv = new Array();
var px = new Array();     
var py = new Array();    
var am = new Array();    
var sx = new Array();   
var sy = new Array();  

for (i = 0; i < no; ++ i) {  
	cv[i] = 0;
	px[i] = Math.random()*(dwidth-100); 
	py[i] = Math.random()*dheight;   
	am[i] = Math.random()*20; 
	sx[i] = 0.02 + Math.random()/10;
	sy[i] = 0.7 + Math.random();
	
	if (type=="Custom") {
	var randomnumber=Math.floor(Math.random()*11)
	
	if (randomnumber <= 3) {
	imagee=1;
	} else if (randomnumber <= 6 && randomnumber > 3) {
	imagee=2;
	} else if (randomnumber <= 10 && randomnumber > 6) {
	imagee=3;
	}
	
	if (imagee==1) {
	image="<?php echo $imageurl; ?>";
	} else if (imagee==2) {
	image="<?php echo $imageurl2; ?>";
	} else if (imagee==3) {
	image="<?php echo $imageurl3; ?>";
	}
	
    if (imagee=="") {
	image="<?php echo $imageurl; ?>";
	}
	}
	
	if (image=="") {
	} else {
	document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px;LEFT: 15px;\"><img src='"+image+"' border=\"0\"><\/div>");
	}
}

function animation() {
	for (i = 0; i < no; ++ i) {
		py[i] += sy[i];
      		if (py[i] > dheight-50) {
        		px[i] = Math.random()*(dwidth-am[i]-100);
        		py[i] = toppos;
        		sx[i] = 0.02 + Math.random()/10;
        		sy[i] = 0.7 + Math.random();
      		}
      		cv[i] += sx[i];
      		document.getElementById("dot"+i).style.top=py[i]+"px";
      		document.getElementById("dot"+i).style.left=px[i] + am[i]*Math.sin(cv[i])+"px";  
    	}
    	atime=setTimeout("animation()", speed);

}

function hideimage(){
	if (window.atime) clearTimeout(atime)
		for (i=0; i<no; i++) 
			document.getElementById("dot"+i).style.visibility="hidden"
}
if (ie4up||ns6up){
animation();
if (time>0)
	setTimeout("hideimage()", time*1000)
}
animation();
</script>
<?php
}

$supportplugin=get_option("mt_effects_plugin_support");
if ($supportplugin=="" || $supportplugin=="Yes") {
add_action('wp_footer', 'effects_footer_plugin_support');
}

function effects_footer_plugin_support() {
  $pshow = "<p style='font-size:x-small'>Effects Plugin made by <a href='http://www.ares-p2p-download.com'>Ares Download</a></p>";
  echo $pshow;
}

add_action("wp_head", "show_effects");

?>