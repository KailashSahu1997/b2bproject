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
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['about-us'] = 'Welcome/about_us';
$route['refund-policy'] = 'Welcome/refund_policy';


$route['buyer-terms-conditions'] = 'Welcome/buyer_con';
$route['seller-terms-conditions'] = 'Welcome/seller_con';

$route['term-condition'] = 'Welcome/term_condition';
$route['privacy-policy'] = 'Welcome/privacy_policy';
$route['cancellation-policy'] = 'Welcome/cancellation_policy';
$route['supports'] = 'Welcome/supports';
$route['contact-us'] = 'Welcome/contact_us';
$route['client-testimonials'] = 'Welcome/client_testimonials';
$route['products'] = 'Welcome/products';
$route['expert-comments'] = 'Welcome/expert_comments';
$route['single-expert-comments/(:any)'] = 'Welcome/single_expert_comments/$1';
$route['disclaimer'] = 'Welcome/disclaimer';
$route['product-details/(:num)'] = 'Welcome/product_details/$1';
$route['aluminium-standards'] = 'Welcome/aluminium_standards';
$route['about-buyer'] = 'Welcome/about_buyer';
$route['about-seller'] = 'Welcome/about_seller';


// buyers login

$route['buyer_login'] = 'Welcome/buyer_login';
$route['buyer/dashboard'] = 'BuyerController/index';
$route['buyer/account'] = 'BuyerController/UserAccount';
$route['logout'] = 'Welcome/logout';
$route['update_personal_detail'] = 'BuyerController/update_personal_detail';

$route['buyer/business-details'] = 'BuyerController/update_business_detail';
$route['buyer/bank-details'] = 'BuyerController/update_bank_detail';
$route['buyer/change-password'] = 'BuyerController/change_password';
$route['buyer/requirement'] = 'BuyerController/requirement_list';
$route['buyer/post-requirement'] = 'BuyerController/add_requirement';
$route['buyer/bids'] = 'BuyerController/my_bids';
$route['buyer/bidding_details/(:any)'] = 'BuyerController/bidding_details/$1';
$route['buyer/edit-requirement/(:any)'] = 'BuyerController/edit_requirement/$1';
$route['buyer/service/(:num)/(:num)/(:num)'] = 'BuyerController/serive_charge_list/$1/$2/$3';
$route['buyer/order-history'] = 'BuyerController/order_history';
$route['buyer/order-details/(:num)'] = 'BuyerController/order_details/$1';

$route['buyer/compeleted-order'] = 'BuyerController/compeleted_order';
$route['buyer/compeleted-order-details/(:num)'] = 'BuyerController/compeleted_order_details/$1';
$route['buyer/delete-account'] = 'BuyerController/delete_account';







// seller login
$route['login-seller'] = 'Welcome/seller_login';
$route['seller/dashboard'] = 'SellerController/index';
$route['seller/account'] = 'SellerController/UserAccount';
$route['seller/business-details'] = 'SellerController/update_business_detail';
$route['seller/bank-details'] = 'SellerController/update_bank_detail';
$route['seller/change-password'] = 'SellerController/change_password';
$route['seller/user-membership-package'] = 'SellerController/user_membership_package';
$route['seller/membership-history'] = 'SellerController/membership_history';
$route['seller/requirement-list'] = 'SellerController/requirement_list';
$route['seller/bids'] = 'SellerController/bids';
$route['seller/order-history'] = 'SellerController/order_history';
$route['seller/order-details/(:num)'] = 'SellerController/order_details/$1';
$route['seller/compeleted-order'] = 'SellerController/compeleted_order';
$route['seller/compeleted-order-details/(:num)'] = 'SellerController/compeleted_order_details/$1';



















