[![License](https://img.shields.io/badge/license-GPL--2.0%2B-red.svg?style=flat-square)](http://www.gnu.org/licenses/gpl-2.0.html)

# SEO add-on for Lasso

This add-on will create a tab within Lasso's setting modal where SEO metadata can be easily added.

It is also designed to serve as an example of how to build similar add-ons for editing post meta data in the front-end with Lasso.

## Works With Any SEO Plugin
This plugin is for editting and saving SEO title and descriptions for posts. It intergrates with existing SEO plugins for the output of that data. It works automatically with the following plugins:
* WordPress SEO by Yoast
* All in One SEO
* Genesis SEO

If none of these systems are in place, you must use the provided filters to specifiy which meta fields to save in. These filters are:
* `lasso_seo_title_field`
* `lasso_seo_desc_field`

The following example illustrates how to use the fields "my_seo_title" and "my_seo_desc" to save meta title and meta description fields. Note that when doing so, you will need to handle ouputting these fields properly, on your own:

```
add_filter( 'lasso_seo_title_field', function() { return 'my_seo_title'; };
add_filter( 'lasso_seo_desc_field', function() { return 'my_seo_desc'; };
```
