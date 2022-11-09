<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */



$routes->get('/public', 'Home::index');






#----------------------------------GET ROUTES --------------------------------------


#               For Select Controller

$routes->get('/api/warehouse/selectfg', 'SelectController::SelectFg');
$routes->get('/api/warehouse/selectMicros', 'SelectController::selectMicros');
$routes->get('/api/warehouse/selectMacros', 'SelectController::selectMacros');
$routes->get('api/warehouse/getpackaging', 'SelectController::selectPackagings');
$routes->get('api/getConsumed', 'SelectController::selectConsumed');
$routes->get('api/getreleased', 'SelectController::selectReleased');
$routes->get('api/dailyproduction', 'SelectController::selectDailyProd');
$routes->get('api/deliveryreceptions', 'SelectController::selectDelivery');
$routes->get('api/salesdata', 'SelectController::selectSales');
$routes->get('api/suppliernames', 'SelectController::selectSuppliers');
$routes->get('api/customernames', 'SelectController::selectCustomers');

#              For Count Controller

$routes->get('api/countcriticalmacros', 'CountController::countCriticalMacros');
$routes->get('api/countcriticalmicros', 'CountController::countCriticalMicros');
$routes->get('api/countcriticalpackagings', 'CountController::countCriticalPackagings');
$routes->get('api/counttotalproducts', 'CountController::countTotalProducts');
$routes->get('api/counttotalcustomers', 'CountController::countTotalCustomers');
$routes->get('api/counttotalsuppliers', 'CountController::countTotalSuppliers');




#----------------------------------POST ROUTES --------------------------------------

#             For Insert Controller

$routes->post('api/addconsumedUmA9v5qCpwHVMB0BeVa5oVPTrHKgZmRdpco7jS5o5goCoKTqyNS9B', 'InsertController::addConsumed');
$routes->post('api/insertfg', 'InsertController::insertNewFg');
$routes->post('api/insertmacroGemWucT5jtVsPfNqzozHjP0FaCMFSfGBnNwrxFGXlYMF07L2xtpf6', 'InsertController::insertNewMacro');
$routes->post('api/insertnewmicrouIYLT0Hiskg1XtkzxKXSGjkGMrVoQSEv2sMisG8rgvcKDPIvlH', 'InsertController::insertNewMicro');
$routes->post('api/postreleasedV83E79oow9SWNr1z00bLyrJrH4lbqeZfMdYfKfDJGEE7xHc0AXcx', 'InsertController::postReleased');
$routes->post('api/dailyproductionEduIXd3z9WsA95Rki2jRV4ZsjYlnfUgvMKr6XeUNMnpeaUTPS', 'InsertController::postDailyProd');
$routes->post('api/postsalesFW7IvMZbVrvsDsB7g0B2lR31xKQwFfJEOk0A5F4VvBHtUDXcf0EFMqn', 'InsertController::postSales');

#             For Update Controller

$routes->post('api/addpendingmicrofP5uesr2FS7OEATkqbsmajDQjWBewQTrlWcjP4Mi3nqfDyeY3', 'UpdateController::addMicroPending');
$routes->post('api/addpendingmacroaEe3eC2ux71OuUnMNuCxwMExURmAOtWIufmV1r2HI48yRzRJk', 'UpdateController::addMacroPending');
$routes->post('api/updatependingmicronRWSqmERLjHOuFxqoinfr5W51xxu9eWx02nVdXoiYvB9wB', 'UpdateController::updateMicroPending');
$routes->post('api/updaterepro7xKKroOjuSJrQpay8JHEHgEAFGvenEZh5EH6OsksfRVgxVS6BD3Hf', 'UpdateController::subtractRepro');
$routes->post('api/updatependingmacroFe29bmBW6iAxwWCPAMuBNi2mqQ2nmEUIhgyN6aZdWR8iH1', 'UpdateController::updateMacroPending');
$routes->post('api/addpendingreproAhnNrt2ohV1lHyXRahxsQFAzmmz2jGT7tl3nIlSmwgKsaYF1S', 'UpdateController::addReproPending');
$routes->post('api/updatemicro8LxDikqWnk27dI06KR2IKUIuoDIayBGe5jRug3wf8QBuHT9Uegq4b', 'UpdateController::updateMicro');
$routes->post('api/updatemacrowaqQD0JumKPyyyHrJ0HjUWby9LSK82jRM8DM5f7Y6nYrHQ4rWFpVd', 'UpdateController::updateMacro');
$routes->post('api/updatepackagingU17WhExYZEmR8ZitzKD5sdrT6MTZIyMaKmldVs19t0zkBTfb0', 'UpdateController::updatePackaging');
$routes->post('api/addrepropendingh3JuRHomzUrF4MQ1oWUkXBGGxK0JwmC4QZCkBxEq98qGOetiQ', 'UpdateController::updateReproPending');
$routes->post('api/updatefg3GRaAoVsbKpFu7fpUabkS1ygipWThEKsTSoC0VFtc66J333bzf6nb6Rw', 'UpdateController::updateFg');

#             For Delete Controller

$routes->post('api/deletefgEO23wMCs7ZR2MjXFkYZYUnXLLm8bNTXT6LTeAcwunZHG8HYQV1QXpwDr', 'DeleteController::deleteFg');
$routes->post('api/deletemacroSVokyXltTDoR2RO3zOIwC8dLAqLcDhOLWC8CSNyWjRVZNy6rYXPQo', 'DeleteController::deleteMacro');


//Authenticate the users
$routes->post('api/authenticateuser', 'SelectController::authenticateUsers');


#             For Reset Controller

$routes->post('api/resetpendingmacroRelG92zIWNVnyyB6peouqXHBdFCbUswKbWHOlxVYYBkUAat', 'UpdateController::resetMacroPending');
$routes->post('api/resetrepropendingpTjOTj41bIhcDXkAwlifWnfP7W7HlSD6l55Vru4WwfxVLK6', 'UpdateController::resetReproPending');
$routes->post('api/resetpendingmicroAGDhhGmEzxFhSAsgmQw7xlXS3xYAFFPDe9nky7oAr7eq26O', 'UpdateController::resetMicroPending');














/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
