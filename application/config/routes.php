<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//san pham
$route['sanpham'] = 'product';
$route['san-pham/(:any)'] = 'product/catalog/$1';
$route['(:any)-(:num).html'] = 'product/view/$1_id$2';
$route['san-pham/(:any)/page/(:num)'] = 'product/catalog/$1/page/$2';
$route['san-pham/(:any)/page'] = 'product/catalog/$1';

//tin tuc
$route['tin-tuc/(:any)'] = 'news/catalog/$1';
$route['tintuc/(:any)-(:num).html'] = 'news/view/$1_id$2';
$route['tin-tuc/(:any)/page/(:num)'] = 'news/catalog/$1/page/$2';
$route['tin-tuc/(:any)/page'] = 'news/catalog/$1';

//cam nhan
$route['cam-nhan/(:any)'] = 'comments/catalog/$1';
$route['camnhan/(:any)-(:num).html'] = 'comments/view/$1_id$2';
$route['cam-nhan/(:any)/page/(:num)'] = 'comments/catalog/$1/page/$2';
$route['cam-nhan/(:any)/page'] = 'comments/catalog/$1';

//gioi thieu
$route['gioi-thieu'] = 'about';
$route['gioithieu/(:any)-(:num).html'] = 'about/view/$1_id$2';
$route['gioi-thieu/page/(:num)'] = 'about/index/page/$1';
$route['gioi-thieu/page'] = 'about/index/$1';

//mua si
$route['mua-si'] = 'wholesale';
$route['muasi/(:any)-(:num).html'] = 'wholesale/view/$1_id$2';
$route['mua-si/page/(:num)'] = 'wholesale/index/page/$1';
$route['mua-si/page'] = 'wholesale/index/$1';

//lien he
$route['lien-he'] = 'contact';