<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RackController;
use App\Models\RacksStructure;
use App\Models\Location;
use App\Models\Box;
use App\Models\Racks;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PacketsController;
use App\Http\Controllers\PackageDetails;
use App\Models\Package;
use App\Models\Packet;
use App\Http\Controllers\BranchController;
use App\Models\BranchLocation;
use App\Http\Controllers\ShipToJobsController;
use App\Http\Controllers\RelocateToWMSController;
use App\Http\Controllers\PartialRemoveController;
use App\Http\Controllers\Packet\ShippingToJobController;
use App\Http\Controllers\Packet\StagingAreaController;
use App\Http\Controllers\Packet\PartialRemoveMenuController;
use App\Http\Controllers\Packet\RelocateToWMS;
use App\Http\Controllers\ReportsConreoller;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;





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

Auth::routes();


// This route hit when user login.
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// This route hit when user click add new form.
Route::get('/addracks', [RackController::class, 'index'])->name('newRack')->middleware('check.designation');


// This route hit when user submit form information.
Route::post('/addracks', [RackController::class, 'store'])->name('addracks');


// This route hit when user click on any location it can show all racks
Route::get('/viewAllRacks/{locID}', [RackController::class, 'viewAll'])->name('viewAllRacks');


// This route hit when user click on any rack
Route::get('/racks/{id}', [RackController::class, 'view'])->name('viewRacks');
Route::post('/racks/{id}', [RackController::class, 'view'])->name('viewRacks');



Route::get('/save-data', [BoxController::class, 'saveData'])->name('save.data');


// This route hit when user submit popop on any rack page and its redirected to route('viewRacks')
Route::post('/save-data', [BoxController::class, 'saveData'])->name('save.data');



// Route::get('/view/{rackId}', [BoxController::class, 'view'])->name('viewbox');


// This route hit when user click on add new location button and its open form
Route::get('/location', [LocationController::class, "index"])->name('add-location')->middleware('check.designation');


// This route hit when user submit location form and its redirect to route('addracks')
Route::post('/location', [LocationController::class, "addLocation"])->name('location');


// This route hit when user click location button
Route::get('/locations/{branchID}', [LocationController::class, "view"])->name('viewLocation');


// This route hit when user add package in innerBox after name assign
Route::get('/add-Package', [PackageController::class, 'index']);
Route::post('/add-Package', [PackageController::class, 'store'])->name('add-package');

Route::get('/add-Packets', [PacketsController::class, 'index']);
Route::post('/add-Packets', [PacketsController::class, 'store'])->name('add-packet');

Route::get('/redirect-to-racks', [PacketsController::class, 'redirectToRacks'])->name('redirectToRacks');


Route::get('/add-branch', [BranchController::class, 'index'])->name('add');


Route::post('/add-branch', [BranchController::class, 'store'])->name('add-branch');


Route::get('/view-branch', [BranchController::class, 'view'])->name('viewAllBranch');




Route::get('/edit-packets/{packetID}', [PacketsController::class, 'edit'])->name('edit-packet');

Route::get('/fetch-updated-packet', [PacketsController::class, 'fetchUpdatedPacket'])->name('fetch-updated-packet');


Route::get('/delete-packets/{packetID}', [PacketsController::class, 'delete'])->name('delete-packet');



Route::get('/get-packet-details/{packetID}', [PacketsController::class, 'getPacketDetails']);


Route::post('/update-packet', [PacketsController::class, 'updatePacket'])->name('update-packet');



Route::get('/delete-packet/{pkgId}', [PackageController::class, 'deletePackage'])->name('delete-package');


Route::get('/package-details/{boxID}', [PackageDetails::class, 'packageDetails'])->name('package-details');


// Route::get('/trash-package-details/{boxID}', [PackageDetails::class, 'trashPackageDetails'])->name('trash-package-details');


Route::get('/details/{pkgId}', [PackageDetails::class, 'packetDetails'])->name('packets-details');


// Route::get('/trash-details/{pkgId}', [PackageDetails::class, 'trashPacketDetails'])->name('trash-packets-details');


Route::get('/partial-remove/{packetID}', [PartialRemoveController::class, 'index'])->name('partial-Remove');

Route::post('/partial-remove/{packetID}', [PartialRemoveController::class, 'removeBundle'])->name('partialRemove');


Route::get('/shipping-to-job', [ShipToJobsController::class, 'store'])->name('shipToJob');
Route::post('/shipping-to-job', [ShipToJobsController::class, 'store'])->name('shipToJob');


Route::get('/relocate-to-wms', [RelocateToWMSController::class, 'store'])->name('Package-relocateToWMS');
Route::post('/relocate-to-wms', [RelocateToWMSController::class, 'store'])->name('Package-relocateToWMS');



Route::get('/partialRemoveMenu', [PartialRemoveMenuController::class, 'index']);
Route::post('/packet/shipping-to-job', [ShippingToJobController::class, 'shippingToJob'])->name('packet-shipToJob');


// Route::post('/packet/staging-area', [StagingAreaController::class, 'stagingArea'])->name('packet-stagingArea');


// Route::get('/getJobNumbersForStaging', [StagingAreaController::class, 'getJobNumberForStaging'])->name('getJobNumbersForStaging');


Route::post('/packet-relocate', [RelocateToWMS::class, 'relocateToWMS'])->name('relocateToWMS');


Route::get('/reports', [ReportsConreoller::class, 'index'])->name('reports');

// For Search data in reports page
Route::get('/reports-data', [ReportsConreoller::class, 'searchData'])->name('searchData');

Route::get('/notShipped-data', [ReportsConreoller::class, 'NotShipped'])->name('notShippedData');

Route::get('/shipped-data', [ReportsConreoller::class, 'Shipped'])->name('shippedData');
// For Search data in reports page


// For export excel file
Route::post('/export-excel/searchData',[ReportsConreoller::class, 'generateRecordForSearchDataTab'])->name('searchDataTab');
Route::post('/export-excel/notShippedData',[ReportsConreoller::class, 'generateRecordForNotShippedTab'])->name('notShippedTabData');
Route::post('/export-excel/ShippedData',[ReportsConreoller::class, 'generateRecordForShippedTab'])->name('shippedTabData');
// For export excel file



// Only Admin can access this route
Route::get('/register-user', [UserController::class, 'index'])->name('registerUser')->middleware('check.designation');
// Only Admin can access this route

Route::post('/create-user', [UserController::class, 'createUser'])->name('createUser')->middleware('auth');

Route::post('/login-user', [UserController::class, 'login'])->name('loginRegister');


Route::get('/packages/less-than-5-days', [PackageController::class, 'getLessThanFiveDaysRecords'])->name('lessThanFiveDaysRecords');
Route::get('/packages/expired-packages', [PackageController::class, 'expiredPackages'])->name('expiredPackages');


// new routes
Route::get('/user/list', [UserController::class, 'list'])->name('usersList')->middleware('check.designation');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit')->middleware('check.designation');
Route::post('/user/edit/{id}', [UserController::class, 'update'])->name('userUpdate')->middleware('check.designation');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('userDelete')->middleware('check.designation');






