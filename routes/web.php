<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaytmController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/************************** ADMIN SIDE ROUTES *****************************/
Route::get('/excel_import', function () {
    // return view('welcome');
    return view('excel');
});
Route::get('/webshare', function () {
    // return view('welcome');
    return view('webshare');
});
Route::post('/processExcel', [AdminController::class, 'processExcel'])->name('import');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'login'])->name('/');
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/loginSubmit', [AdminController::class, 'loginSubmit'])->name('admin.loginSubmit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');


    Route::group(['middleware' => ['AdminAuth']], function () {

        /************** PAGE ROUTES ******************/
        Route::get('/orders', [AdminController::class, 'index'])->name('admin.orders');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::get('/wallet', [AdminController::class, 'wallet'])->name('admin.wallet');
        Route::get('/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');


        /************** AJAX ROUTES ******************/
        Route::post('/getSettingsPageData', [AdminController::class, 'getSettingsPageData'])->name('admin.getSettingsPageData');
        Route::post('/storeGeneralSettings', [AdminController::class, 'storeGeneralSettings'])->name('admin.storeGeneralSettings');
        Route::post('/storeApiSettings', [AdminController::class, 'storeApiSettings'])->name('admin.storeApiSettings');
        Route::post('/storeNotifSettings', [AdminController::class, 'storeNotifSettings'])->name('admin.storeNotifSettings');
        Route::post('/deleteSpecificNotification', [AdminController::class, 'deleteSpecificNotification'])->name('admin.deleteSpecificNotification');
        Route::post('/editSpecificNotification', [AdminController::class, 'editSpecificNotification'])->name('admin.editSpecificNotification');

        Route::post('/storeTutorialSettings', [AdminController::class, 'storeTutorialSettings'])->name('admin.storeTutorialSettings');
        Route::post('/deleteSpecificTutorial', [AdminController::class, 'deleteSpecificTutorial'])->name('admin.deleteSpecificTutorial');
        Route::post('/editSpecificTutorial', [AdminController::class, 'editSpecificTutorial'])->name('admin.editSpecificTutorial');

        Route::post('/getUsersPageData', [AdminController::class, 'getUsersPageData'])->name('admin.getUsersPageData');
        Route::post('/updateUserBalance', [AdminController::class, 'updateUserBalance'])->name('admin.updateUserBalance');

        Route::post('/registerUser', [AdminController::class, 'registerUser'])->name('admin.registerUser');
        Route::post('/editUser', [AdminController::class, 'editUser'])->name('admin.editUser');
        Route::post('/getUserFilteredData', [AdminController::class, 'getUserFilteredData'])->name('admin.getUserFilteredData');
        Route::post('/blockUser', [AdminController::class, 'blockUser'])->name('admin.blockUser');


        Route::post('/getPucPageData', [AdminController::class, 'getPucPageData'])->name('admin.getPucPageData');
        Route::post('/changePucStatus', [AdminController::class, 'changePucStatus'])->name('admin.changePucStatus');
        Route::post('/getOrderHistoryFilteredData', [AdminController::class, 'getOrderHistoryFilteredData'])->name('admin.getOrderHistoryFilteredData');

        Route::post('/getUserInfoData', [AdminController::class, 'getUserInfoData'])->name('admin.getUserInfoData');
        Route::post('/uploadPucPdfFile', [AdminController::class, 'uploadPucPdfFile'])->name('admin.uploadPucPdfFile');
        Route::post('/uploadExcelBulkForm', [AdminController::class, 'uploadExcelFrom'])->name('admin.uploadExcelBulkForm');

        Route::post('/getAnalyticsPageData', [AdminController::class, 'getAnalyticsPageData'])->name('admin.getAnalyticsPageData');
        Route::post('/updatePucViewFlags', [AdminController::class, 'updatePucViewFlags'])->name('admin.updatePucViewFlags');



        Route::get('getBankList', [AdminController::class, 'getBankList']);
        Route::post('addBank', [AdminController::class, 'addBank']);
        Route::post('deleteBank', [AdminController::class, 'deleteBank']);
        Route::get('pendingTransactionsList', [AdminController::class, 'pendingTransactionsList']);
        Route::post('completeTransaction', [AdminController::class, 'completeTransaction']);
        Route::post('rejectTransaction', [AdminController::class, 'rejectTransaction']);
        Route::get('walletHistory', [AdminController::class, 'walletHistory']);
        Route::post('getWalletHistoryFilteredData', [AdminController::class, 'getWalletHistoryFilteredData']);
    });
});


/************************** USER SIDE ROUTES *****************************/

Route::group(['prefix' => '/'], function () {

    Route::get('/', [FrontEndController::class, 'login'])->name('/');
    Route::get('/login', [FrontEndController::class, 'login'])->name('login');
    Route::post('/loginSubmit', [FrontEndController::class, 'loginSubmit'])->name('loginSubmit');
    Route::get('/logout', [FrontEndController::class, 'logout'])->name('logout');
    Route::get('/forget', [FrontEndController::class, 'forget'])->name('forget');
    // Route::get('/register', [RegistrationController::class, 'register'])->name('register');

    /************** AJAX ROUTES ******************/
    Route::post('/getCitiesLovData', [FrontEndController::class, 'getCitiesLovData'])->name('getCitiesLovData');
    Route::post('/getAreasLovData', [FrontEndController::class, 'getAreasLovData'])->name('getAreasLovData');
    Route::post('/getStateCityWrtCodeData', [FrontEndController::class, 'getStateCityWrtCodeData'])->name('getStateCityWrtCodeData');


    Route::post('/registerUser', [RegistrationController::class, 'registerUser'])->name('registerUser');
    Route::post('/getOtpCodeForget', [RegistrationController::class, 'getOtpCodeForget'])->name('getOtpCodeForget');
    Route::post('/verifyOtpCodeForget', [RegistrationController::class, 'verifyOtpCodeForget'])->name('verifyOtpCodeForget');
    Route::post('/resetForgetPassword', [RegistrationController::class, 'resetForgetPassword'])->name('resetForgetPassword');

    Route::get('/testEmail', [FrontEndController::class, 'testEmail'])->name('testEmail');



    Route::group(['middleware' => ['UserAuth']], function () {

        /************** PAGE ROUTES ******************/
        Route::get('/home', [FrontEndController::class, 'home'])->name('home');
        Route::get('/order', [FrontEndController::class, 'order'])->name('order');
        Route::get('/wallet', [FrontEndController::class, 'wallet'])->name('wallet');
        Route::get('/profile', [FrontEndController::class, 'profile'])->name('profile');


        Route::post('/getUserProfileData', [FrontEndController::class, 'getUserProfileData'])->name('getUserProfileData');
        Route::post('/updateUserProfile', [FrontEndController::class, 'updateUserProfile'])->name('updateUserProfile');
        Route::post('/resetPasswordProfile', [FrontEndController::class, 'resetPasswordProfile'])->name('resetPasswordProfile');
        Route::post('/getPucTypeRate', [FrontEndController::class, 'getPucTypeRate'])->name('getPucTypeRate');
        Route::post('/createPucUser', [FrontEndController::class, 'createPucUser'])->name('createPucUser');

        Route::post('/getPucPageData', [FrontEndController::class, 'getPucPageData'])->name('getPucPageData');
        Route::post('/getPucFilteredData', [FrontEndController::class, 'getPucFilteredData'])->name('getPucFilteredData');
        Route::post('/editSpecificPuc', [FrontEndController::class, 'editSpecificPuc'])->name('editSpecificPuc');
        Route::post('/updatepucdates', [FrontEndController::class, 'updatepucdates'])->name('updatepucdates');

        Route::post('getBankDetails', [FrontEndController::class, 'getBankDetails']);
        Route::post('addTransaction', [FrontEndController::class, 'addTransaction']);
        Route::get('getTransactionHistory', [FrontEndController::class, 'getTransactionHistory']);
    });
});

//----------------------------------------Paytm GP Routes-----------------------------------------------------
Route::get('/initiate', [PaytmController::class, 'initiate'])->name('initiate.payment');
Route::get('/payment', [PaytmController::class, 'pay'])->name('make.payment');
Route::post('/payment/status', [PaytmController::class, 'paymentCallback'])->name('status');
Route::post('/payment/status/addwallet', [PaytmController::class, 'paymentCallbackAddWallet'])->name('status.online.addwallet');
Route::get('/register/doPayment/{id}', [PaytmController::class, 'doPayment'])->name('register.doPayment');
Route::get('/user/addwallet/online/pay/{amount}', [PaytmController::class, 'addWalletOnline'])->name('user.addwallet.online.pay');

Route::get('/payment_success/{id}', [PaytmController::class, 'payment_success'])->name('payment_success');
Route::get('/payment_fail/{id}', [PaytmController::class, 'payment_failed'])->name('payment_fail');

//----------------------------------------Paytm GP Routes ends-----------------------------------------------------
