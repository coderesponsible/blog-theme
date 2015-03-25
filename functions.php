<?php

//remove wp info
remove_action('wp_head', 'wp_generator');

//add rss feeds
automatic_feed_links();

function remove_menus () {
global $menu;
	$restricted = array(__('Links'),  __('Tools'), __('Users'), __('Comments'), __('Settings'), __('Appearance'), __('Plugins'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}

// remove visual editor
add_filter('user_can_richedit' , create_function('' , 'return false;') , 50);

//get first image thumbnail from post
function first_thumnail() {
$title_alt = get_the_title(get_the_ID());
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment&post_mime_type=image');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', false);
	$alt_text = get_post_meta($num , '_wp_attachment_image_alt', true);
	if($alt_text == ""){
		$alt_text = "$title_alt";
	}
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $thumb=wp_get_attachment_thumb_url($num);
	if($num != "" || $num != null){
		print "<img src='$thumb' alt='$alt_text'>";
	}else{
		print "<span class='no-image'></span>";
	}
	
  endif;
}

//word count excerpt
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

//change content image link to link to post
add_filter( 'the_content', 'attachment_image_link_remove_filter' );
function attachment_image_link_remove_filter( $content ) {
 $content =
 preg_replace(
 array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
 '{ wp-image-[0-9]*" /></a>}'),
 array('<img','" />'),
 $content
 );
 return $content;
 }

//paging
function get_pagination($range = 4){
  // $paged - number of the current page
  global $paged, $wp_query;
  // How much pages do we have?
  if ( !$max_page ) {
    $max_page = $wp_query->max_num_pages;
  }
  // We need the pagination only if there are more than 1 page
  if($max_page > 1){
    if(!$paged){
      $paged = 1;
    }
    // On the first page, don't put the First page link
    if($paged != 1){
      echo "<li><a href=" . get_pagenum_link(1) . "> First </a></li>";
	 // echo "<a href=\"" . get_pagenum_link(1) . "\" style=\"border:none;\"> First </a>";
    }
    // To the previous page
    //previous_posts_link('&#171;');
    // We need the sliding effect only if there are more pages than is the sliding range
    if($max_page > $range){
      // When closer to the beginning
      if($paged < $range){
        for($i = 1; $i <= ($range + 1); $i++){
	//if($i==$paged) echo "class='current'";
          	echo "<li ";
			//if($i==$paged) echo "class='current'";
	        echo "><a href='" . get_pagenum_link($i) ."'";
	        echo ">$i</a></li>";
        }
      }
      // When closer to the end
      elseif($paged >= ($max_page - ceil(($range/2)))){
        for($i = $max_page - $range; $i <= $max_page; $i++){
	//if($i==$paged) echo "class='current'";
          	echo "<li ";
			//if($i==$paged) echo "class='current'";
	        echo "><a href='" . get_pagenum_link($i) ."'";
	        echo ">$i</a></li>";
        }
      }
      // Somewhere in the middle
      elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
        for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
          	echo "<li ";
			//if($i==$paged) echo "class='current'";
	        echo "><a href='" . get_pagenum_link($i) ."'";
	        echo ">$i</a></li>";
        }
      }
    }
    // Less pages than the range, no sliding effect needed
    else{
      for($i = 1; $i <= $max_page; $i++){
		echo "<li ";
		//if($i==$paged) echo "class='current'";
        echo "><a href='" . get_pagenum_link($i) ."'";
        echo ">$i</a></li>";
      }
    }
    // Next page
	//next_posts_link('&#187;');
    //next_posts_link('<li>&#187;</li>');
    // On the last page, don't put the Last page link
    /*if($paged != $max_page){
      echo "<li><a href=" . get_pagenum_link($max_page) . "> Last </a></li>";
    }*/
  }
}

?>