=== Plugin Name ===
Donate link: https://www.offito.com
Tags: offito
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Redirects Offito specific links to subdomain or different URL. This plugin is useful if your Offito is hosted somewhere else.

== Description ==

Some Offito URLs requires that Offito app is hosted on the same domain as your presentation. If Offito is hosted on subdomain or somewhere else you have to handle these URLs on your presentation.

This plugin exists to solve this issue.

It Redirects to your Offito application URIs which start with:
- /confirm/
- /recovery/
- /s/
- /recoverysubmit
- /reminder/

To handle sharelinks like http://example.com/J4k22 it will redirect all URLs which ends with status 404 to your Offito app

== Installation ==

1. Upload content to the `/wp-content/plugins/offito-redirect` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings -> Offito Redirect
4. Setup where plugin should redirect Offito related links (e.g. http://app.example.com)

== Changelog ==

= 1.0 =
* First Release
