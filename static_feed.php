<?php
/*
Plugin Name: Make feeds static
Plugin URI: http://github.com/gurdiga/wp-static-feed
Description: Saves the feed to /articles.xml and /comments.xml
Version: 1.0
Author: Vlad GURDIGA
*/


function write_article_feed() {
	query_posts('feed=rss2');

	ob_start();
	require ABSPATH . WPINC . '/feed-rss2.php';
	file_put_contents(ABSPATH . '/articles.xml', ob_get_clean());
}

function write_comment_feed() {
	query_posts('feed=comments-rss2');

	ob_start();
	require ABSPATH . WPINC . '/feed-rss2-comments.php';
	file_put_contents(ABSPATH . '/comments.xml', ob_get_clean());
}


$article_related_events = array(
	'delete_post',
	'edit_post',
	'save_post',
	'publish_post',
	'private_to_publish',
	'publish_page',
	'create_category',
	'edit_category',
	'delete_category',
);

$comment_related_events = array(
	'comment_post',
	'edit_comment',
	'delete_comment'
);


foreach ($article_related_events as $event) {
	add_action($event, 'write_article_feed');
	add_action($event, 'write_comment_feed');
}

foreach ($comment_related_events as $event) {
	add_action($event, 'write_comment_feed');
}


function rewrite_feed_url($initial_url) {
	if (preg_match('|/comments/feed/$|', $initial_url))
		return home_url('/comments.xml');
	
	if (preg_match('|/feed/$|', $initial_url))
		return home_url('/articles.xml');

	return $initial_url;
}

add_filter('feed_link', 'rewrite_feed_url');

?>
