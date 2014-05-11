v4.2 "Gardner" changelog
========================

* Added shortcode that pulls Twitter biographies through the API (use sparingly, if at all).
* Added hastily coded livestreaming interface (see `/stream` subdirectory).
* Added JavaScript powered mobile navigation. Still falls back to footer.
* Added the ability to modify the homepage banner via WordPress theme customizer.
* Modified `/signature` design to more closely match the website.
* Modifed padding on page footer. 
* Refactored control structures to use colon formatting when mixed with markup.
* Refactored functions to use `WP_Query` instead of `query_posts`.
* Fixed a bug where photo metadata was showing incorrect datetimes.  

CMS changes needed following this update
----------------------------------------

* Change theme to v4.2 "Gardner"
* Re-identify menus.
* Re-identify widgets.