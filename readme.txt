=== Static Feed For GoDaddy ===

Contributors: gurdiga
Tags: godaddy, feeds
Requires at least: 1.2.0
Tested up to: 3.0.3
Stable tag: trunk

For those on GoDaddy Economy Hosting plan.


== Description ==

GoDaddy uses mod_layout to inject ads in pages. The thing is that it
does that even for feeds.

This plugin saves the feeds to /articles.xml and /comments.xml and keeps
them up to date.

To get those two XMLs created you have a change in a post.


== Installation ==

1. Upload `static_feed.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
