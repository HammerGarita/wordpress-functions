<?php
/* Funciona con el Plugin Easy Category Icons */

$categories = get_categories();
foreach($categories as $category) {
	$icon = templ_get_the_icon(array('size'=> 'small'),'category',$category->term_id);
	print_r($icon);
	echo '<p>' . $icon[0]->name . '</p>';
	echo '<p>' . $icon[0]->slug . '</p>';
	echo '<p>' . $icon[0]->taxonomy . '</p>';
	echo '<p>' . $icon[1][0] . '</p>';
	echo '<div class="col-md-4"><img src="'. $icon[1][0] .'"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>		</div>';
}
?>
