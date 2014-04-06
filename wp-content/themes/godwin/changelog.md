v4.1 "Godwin" changelog
=======================

* Refactored code to remove `ashman_` prefix. Now uses `bb_` where appropriate.
* Refactored all code so version names in URLs aren't hardcoded. 
** PHP to use BB_VERSION constant (in theme's `functions.php`)
** SASS to use `$BB_VERSION` variable (in `stylesheet.scss`)
** JavaScript to use BB_VERSION variable (in `script.js`)
* Added animations to 404 page.
* Added Bristol Bronies Billboards sidebar widget.
* Fixed a bug where billboard excerpts had an extra `<p>` tag.
* Fixed an issue where sidebars were not displaying in their intended locations.
** Additionally fixed a bug where sidebars were appearing on pages that should not have a sidebar. 
* Fixed a bug where meet runner avatars were loading full size, rather than thumbnail sizes. 

CMS changes needed following this update
----------------------------------------

* Change theme to v4.1 "Godwin"
* Re-identify menus.
* Re-identify widgets.
** Add Billboards sidebar widget.
* Change Meet Runner Profile -> Avatar return value from "Image URL" to "Image Object".