<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('produk', 'Produk::index');
$routes->get('produk/create', 'Produk::create');
$routes->post('produk/store', 'Produk::store');
$routes->get('produk/edit/(:num)', 'Produk::edit/$1');
$routes->post('produk/update/(:num)', 'Produk::update/$1');
$routes->get('produk/delete/(:num)', 'Produk::delete/$1');
$routes->get('transaksi', 'Transaksi::index');
$routes->post('transaksi/simpan', 'Transaksi::simpan');
$routes->get('riwayat', 'Riwayat::index');
$routes->get('riwayat/detail/(:num)', 'Riwayat::detail/$1');
$routes->get('riwayat/delete/(:num)', 'Riwayat::delete/$1');
$routes->get('riwayat/cetak/(:num)', 'Riwayat::cetak/$1');
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('login/logout', 'Login::logout');






