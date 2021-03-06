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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// views
$route['login']['get'] = 'main/login_view';
$route['home']['get'] = 'main/index';
$route['movies/(:any)']['get'] = "main/review_view/$1"; // $1: movie id.
$route['profile/(:any)']['get'] = "main/profile_view/$1"; // $1: username // public profile
$route['myprofile']['get'] = "main/profile_view_self";
$route['comments/(:num)/(:num)'] = "main/comments_view/$1/$2"; //$1: movie id, $2: user_id

// for comments
$route['comments/movie/(:num)/(:num)/(:num)']['post'] = "comment/get_comments_for_review/$1/$2/$3"; //$1: movie_id, $2: user_id, $3: page
$route['comments/user/(:any)'] = "comment/get_all_comments/$1";
$route['comments/add']['post'] = "comment/add_comment";
$route['comments/remove']['post'] = "comment/remove_comment";

// for movies
$route['movies/(:num)']['post'] = "movie/get_movies/$1"; // $1: page number
$route['movies/add']['post'] = "movie/add_movie";
$route['movies/remove']['post'] = "movie/remove_movie";
$route['movies/cart/add']['post'] = "movie/add_to_cart";
$route['movies/update']['post'] = "movie/update";

// for reviews
$route['reviews/movie/(:num)/(:num)']['post'] = "review/get_reviews_for_movie/$1/$2"; // $1 movie id. $2 page number
$route['reviews/user/(:num)/(:num)']['post'] = "review/get_reviews_for_user/$1/$2"; // $1 user id, $2 page id
$route['reviews/add']['post'] = "review/add_review";
$route['reviews/remove']['post'] = "review/remove_review";

// for users
$route['users/user/(:num)'] = "user/get_user/$1"; //$1 user id.
$route['users/(:num)/reviews'] = "user/get_reviews/$1";
$route['users/(:num)/followers'] = "user/get_followers/$1";
$route['users/(:num)/following'] = "user/get_following_pages/$1";
$route['users/(:num)/follow'] = "user/follow";

// for accounts
$route['signin']['post'] = "account/login";
$route['create']['post'] = "account/register_user";
$route['delete']['post'] = "account/delete_user";
$route['logout']['post'] = "account/logout";
$route['update']['post'] = "user/update_user";


// for tags
$route['tags/add']['post'] = "tag/add_tag";
$route['tags/movie/(:any)'] = "tag/get_tags/$1";

// for categories
$route['categories/add']['post'] = "category/add_category";
$route['categories/movie/add']['post'] = "category/add_category_to_movie";
$route['categories/movie/get/(:any)'] = "category/get_categories/$1";

// for cart
$route['cart/user/(:num)'] = "cart/get_items/$1";
$route['cart/user/add']['post'] = "cart/insert_item";
$route['cart/user/remove']['post'] = "cart/remove_item";
