<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// views
$route['login']['get'] = 'home/main/login_view';


// for comments
$route['comments/movie/(:any)'] = "home/comment/get_comments_for_movie/$1";
$route['comments/user/(:any)'] = "home/comment/get_all_comments/$1";
$route['comments/add']['post'] = "home/comment/add_comment";
$route['comments/remove']['post'] = "home/comment/remove_comment";

// for movies
$route['movies/(:any)'] = "home/movie/get_movie/$1";
$route['movies']['post'] = "home/movie/get_movies";
$route['movies/add']['post'] = "home/movie/add_movie";
$route['movies/remove']['post'] = "home/movie/remove_movie";
$route['movies/cart/add']['post'] = "home/movie/add_to_cart";
$route['movies/update']['post'] = "home/movie/update";

// for reviews
$route['reviews/movie/(:any)'] = "home/review/get_reviews_for_movie/$1";
$route['reviews/user/(:any)'] = "home/review/get_reviews_for_user/$1";
$route['reviews/add']['post'] = "home/review/add_review";
$route['reviews/remove']['post'] = "home/review/remove_review";

// for users
$route['users/user/(:any)'] = "home/user/get_user/$1";
$route['users/(:num)/reviews'] = "home/user/get_reviews/$1";
$route['users/(:num)/followers'] = "home/user/get_followers/$1";
$route['users/(:num)/following'] = "home/user/get_following_pages/$1";
$route['users/(:num)/follow'] = "home/user/follow";

// for accounts
$route['login']['post'] = "home/account/login";
$route['create']['post'] = "home/account/register_user";
$route['delete']['post'] = "home/account/delete_user";
$route['logout']['post'] = "home/account/logout";


// for tags
$route['tags/add']['post'] = "home/tag/add_tag";
$route['tags/movie/(:any)'] = "home/tag/get_tags/$1";

// for categories
$route['categories/add']['post'] = "home/category/add_category";
$route['categories/movie/add']['post'] = "home/category/add_category_to_movie";
$route['categories/movie/get/(:any)'] = "home/category/get_categories/$1";

// for cart
$route['cart/user/(:num)'] = "home/cart/get_items/$1";
$route['cart/user/add']['post'] = "home/cart/insert_item";
$route['cart/user/remove']['post'] = "home/cart/remove_item";
