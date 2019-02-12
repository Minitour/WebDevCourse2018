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

// for comments
$route['get_comment'] = "home/comment/get_comment";
$route['get_comments'] = "home/comment/get_all_comments";
$route['add_comment'] = "home/comment/add_comment";
$route['remove_comment'] = "home/comment/remove_comment";

// for movies
$route['movie/(:any)'] = "home/movie/get_movie/$1";
$route['get_movies'] = "home/movie/get_movies";
$route['add_movie'] = "home/movie/add_movie";
$route['remove_movie'] = "home/movie/remove_movie";
$route['add_to_cart'] = "home/movie/add_to_cart";

// for reviews
$route['get_review'] = "home/review/get_review";
$route['get_reviews'] = "home/review/get_reviews";
$route['add_review'] = "home/review/add_review";
$route['remove_review'] = "home/review/remove_review";

// for users
$route['get_user'] = "home/user/$1/get_reviews/$2";
$route['get_by_username'] = "home/user/$1/get_followers/$2";
$route['get_by_username_password'] = "home/user/$1/get_following_pages/$2";

// for accounts
$route['login'] = "home/account/login";
$route['create'] = "home/account/register_user";
$route['delete'] = "home/account/delete_user";
$route['logout'] = "home/account/logout";

