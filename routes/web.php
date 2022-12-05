<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AnalyticsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [IndexController::class, 'index'])->name('index.get');
Route::GET('/get_location', [IndexController::class, 'get_location'])->name('get_location.get');
Route::get('/trang-{slug}', [IndexController::class, 'page'])->name('page');
Route::get('/san-pham/{slug}.html', [IndexController::class, 'product'])->name('product');
Route::get('/bai-viet/{slug}.html', [IndexController::class, 'post'])->name('post');
Route::get('/chi-nhanh/{slug}.html', [IndexController::class, 'branch'])->name('branch');
Route::get('/chinh-sach/{slug}.html', [IndexController::class, 'policy'])->name('policy');
Route::get('/gioi-thieu/{slug}.html', [IndexController::class, 'about'])->name('about');
Route::get('/tuyen-dung/{slug}.html', [IndexController::class, 'recruitment'])->name('recruitment');
Route::get('/phan-hoi/{slug}.html', [IndexController::class, 'feedback'])->name('feedback');
Route::post('/contact-add', [IndexController::class, 'store_contact_form'])->name('store.contact');
Route::post('/order-contact-add', [IndexController::class, 'store_order_contact_form'])->name('store.order.contact');
Route::post('/contact', [App\Http\Controllers\HomeController::class, 'ajax_update_info_web'])->name('ajax_update_info_web');
Route::get('change/{locale}',[IndexController::class, 'changelocale'])->name('change.locale');

Auth::routes([
    'register' => true,
    'reset' => false,
    'verify' => false,
  ]);

  Route::get('/complete-registration', [App\Http\Controllers\Auth\RegisterController::class, 'completeRegistration'])->name('complete-registration');

  Route::get('logout', function(){
    \Auth::logout();
    return redirect()->route('login');
});

  Route::get('/sitemap.xml', [App\Http\Controllers\HomeController::class, 'sitemap'])->name('sitemap');

Route::prefix('admin')->middleware(['auth','active_account'])->group(function () {

    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

    Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('be.contact.index')->middleware('permission:xem-mail-lien-he');
    Route::get('/edit/{id}', [App\Http\Controllers\ContactController::class, 'edit'])->name('be.contact.edit')->middleware('permission:xem-mail-lien-he');
    Route::put('/update/{id}', [App\Http\Controllers\ContactController::class, 'update'])->name('be.contact.update')->middleware('permission:xem-mail-lien-he');
    Route::delete('/destroy/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('be.contact.destroy')->middleware('permission:xem-mail-lien-he');
    Route::get('/read', [App\Http\Controllers\ContactController::class, 'read'])->name('be.contact.read')->middleware('permission:xem-mail-lien-he');
    Route::get('/number', [App\Http\Controllers\ContactController::class, 'number'])->name('be.contact.number')->middleware('permission:xem-mail-lien-he');

    Route::get('/order', [App\Http\Controllers\ContactOrderController::class, 'index'])->name('be.order.index')->middleware('permission:xem-mail-lien-he');


    Route::get('/tool', [App\Http\Controllers\HomeController::class, 'tool'])->name('tool');
    Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
    Route::get('/update_rank', [App\Http\Controllers\HomeController::class, 'update_rank'])->name('update_rank');
    Route::get('/update-avatar', [App\Http\Controllers\HomeController::class, 'update_avatar'])->name('update_avatar');
    Route::get('/update-point', [App\Http\Controllers\HomeController::class, 'update_point'])->name('update_point');

    Route::post('/2fa', function () {
        return redirect(route('home'));
        })->name('2fa');
    Route::get('/check-die-url', [App\Http\Controllers\HomeController::class, 'check_die_url'])->name('check_die_url');
    Route::post('/check-link', [App\Http\Controllers\HomeController::class, 'check_link'])->name('check_link');
    Route::get('/make-short-link', [App\Http\Controllers\HomeController::class, 'make_short_link'])->name('make_short_link');
    Route::post('/export-db', [App\Http\Controllers\HomeController::class, 'export_db'])->name('export_db');
    Route::post('/import-db', [App\Http\Controllers\HomeController::class, 'import_db'])->name('import_db');
    Route::get('/quan-li-file', [App\Http\Controllers\HomeController::class, 'filemanager'])->name('filemanager');
    Route::post('/down-web', [App\Http\Controllers\HomeController::class, 'down_web'])->name('down_web');
    Route::post('/up-web', [App\Http\Controllers\HomeController::class, 'up_web'])->name('up_web');
    Route::post('/reset-pass-maintain', [App\Http\Controllers\HomeController::class, 'reset_pass_maintain'])->name('reset.pass.maintain');
    Route::get('/caching', [App\Http\Controllers\HomeController::class, 'caching'])->name('caching');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/lich-su-tai-xuong', [App\Http\Controllers\HomeController::class, 'history_download'])->name('history_download');
    Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('setting');
    Route::post('/update-info-web', [App\Http\Controllers\HomeController::class, 'update_info_web'])->name('update_info_web');
    Route::post('/short-day', [App\Http\Controllers\HomeController::class, 'shortday'])->name('backend.shortday.store');
    Route::get('/thong-ke-truy-cap', [App\Http\Controllers\HomeController::class, 'counter'])->name('api.counter');

    Route::prefix('phan-quyen')->group(function () {
        Route::get('/', [App\Http\Controllers\RolePermissionController::class, 'index'])->name('be.role_permission.index');
        Route::get('/add', [App\Http\Controllers\RolePermissionController::class, 'add'])->name('be.role_permission.add');
        Route::post('/store', [App\Http\Controllers\RolePermissionController::class, 'store'])->name('be.role_permission.store');
        Route::get('/edit/{id}', [App\Http\Controllers\RolePermissionController::class, 'edit'])->name('be.role_permission.edit');
        Route::put('/update/{id}', [App\Http\Controllers\RolePermissionController::class, 'update'])->name('be.role_permission.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\RolePermissionController::class, 'destroy'])->name('be.role_permission.destroy');
        Route::get('/hideShow', [App\Http\Controllers\RolePermissionController::class, 'hideshow'])->name('be.role_permission.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\RolePermissionController::class, 'changenumber'])->name('be.role_permission.number');
    });
    Route::prefix('khach-hang')->group(function () {
        Route::get('/', [App\Http\Controllers\CustomerController::class, 'index'])->name('be.customer.index');
        Route::get('/add', [App\Http\Controllers\CustomerController::class, 'add'])->name('be.customer.add');
        Route::post('/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('be.customer.store');
        Route::get('/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('be.customer.edit');
        Route::put('/update/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('be.customer.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('be.customer.destroy');
        Route::get('/status', [App\Http\Controllers\CustomerController::class, 'status'])->name('be.customer.status');
        Route::get('/changeNumber', [App\Http\Controllers\CustomerController::class, 'changenumber'])->name('be.customer.number');
        Route::delete('/deletemultiple', [App\Http\Controllers\CustomerController::class, 'deletemultiple'])->name('be.customer.deletemultiple');
    });
    Route::prefix('nhan-vien')->group(function () {
        Route::get('/', [App\Http\Controllers\StaffController::class, 'index'])->name('be.staff.index');
        Route::get('/add', [App\Http\Controllers\StaffController::class, 'add'])->name('be.staff.add');
        Route::post('/store', [App\Http\Controllers\StaffController::class, 'store'])->name('be.staff.store');
        Route::post('/reset-password', [App\Http\Controllers\StaffController::class, 'reset_password'])->name('be.staff.reset_password');
        Route::get('/edit/{id}', [App\Http\Controllers\StaffController::class, 'edit'])->name('be.staff.edit');
        Route::get('get-ajax-data/{id}',[App\Http\Controllers\StaffController::class, 'paginate_history_login_user'])->name('paginate_history_login_user');
        Route::put('/update/{id}', [App\Http\Controllers\StaffController::class, 'update'])->name('be.staff.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('be.staff.destroy');
        Route::get('/status', [App\Http\Controllers\StaffController::class, 'status'])->name('be.staff.status');
        Route::get('/changeNumber', [App\Http\Controllers\StaffController::class, 'changenumber'])->name('be.staff.number');
    });
    Route::prefix('cap-do')->group(function () {
        Route::get('/', [App\Http\Controllers\LevelController::class, 'index'])->name('be.level.index');
        Route::get('/add', [App\Http\Controllers\LevelController::class, 'add'])->name('be.level.add');
        Route::post('/store', [App\Http\Controllers\LevelController::class, 'store'])->name('be.level.store');
        Route::get('/edit/{id}', [App\Http\Controllers\LevelController::class, 'edit'])->name('be.level.edit');
        Route::put('/update/{id}', [App\Http\Controllers\LevelController::class, 'update'])->name('be.level.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\LevelController::class, 'destroy'])->name('be.level.destroy');
        Route::get('/hideShow', [App\Http\Controllers\LevelController::class, 'hideshow'])->name('be.level.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\LevelController::class, 'changenumber'])->name('be.level.number');
    });
    Route::prefix('noi-dung-tinh')->group(function () {
        Route::get('/', [App\Http\Controllers\StaticContentController::class, 'index'])->name('be.static_content.index');
        Route::get('/add', [App\Http\Controllers\StaticContentController::class, 'add'])->name('be.static_content.add');
        Route::post('/store', [App\Http\Controllers\StaticContentController::class, 'store'])->name('be.static_content.store');
        Route::get('/edit/{id}', [App\Http\Controllers\StaticContentController::class, 'edit'])->name('be.static_content.edit');
        Route::put('/update/{id}', [App\Http\Controllers\StaticContentController::class, 'update'])->name('be.static_content.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\StaticContentController::class, 'destroy'])->name('be.static_content.destroy');
        Route::get('/hideShow', [App\Http\Controllers\StaticContentController::class, 'hideshow'])->name('be.static_content.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\StaticContentController::class, 'changenumber'])->name('be.static_content.number');
    });
    Route::prefix('slide')->group(function () {
        Route::get('/', [App\Http\Controllers\SlideController::class, 'index'])->name('be.slide.index')->middleware('permission:xem-slide');
        Route::get('/add', [App\Http\Controllers\SlideController::class, 'add'])->name('be.slide.add')->middleware('permission:them-slide');
        Route::post('/store', [App\Http\Controllers\SlideController::class, 'store'])->name('be.slide.store')->middleware('permission:xem-slide');
        Route::get('/edit/{id}', [App\Http\Controllers\SlideController::class, 'edit'])->name('be.slide.edit')->middleware('permission:xem-slide');
        Route::put('/update/{id}', [App\Http\Controllers\SlideController::class, 'update'])->name('be.slide.update')->middleware('permission:xem-slide');
        Route::delete('/destroy/{id}', [App\Http\Controllers\SlideController::class, 'destroy'])->name('be.slide.destroy')->middleware('permission:xem-slide');
        Route::get('/hideShow', [App\Http\Controllers\SlideController::class, 'hideshow'])->name('be.slide.hideshow')->middleware('permission:xem-slide');
        Route::get('/changeNumber', [App\Http\Controllers\SlideController::class, 'changenumber'])->name('be.slide.number')->middleware('permission:xem-slide');
    });
    Route::prefix('trang-tinh')->group(function () {
        Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('be.static_page.index');
        Route::get('/add', [App\Http\Controllers\PageController::class, 'add'])->name('be.static_page.add');
        Route::post('/store', [App\Http\Controllers\PageController::class, 'store'])->name('be.static_page.store');
        Route::get('/edit/{id}', [App\Http\Controllers\PageController::class, 'edit'])->name('be.static_page.edit');
        Route::put('/update/{id}', [App\Http\Controllers\PageController::class, 'update'])->name('be.static_page.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\PageController::class, 'destroy'])->name('be.static_page.destroy');
        Route::get('/hideShow', [App\Http\Controllers\PageController::class, 'hideshow'])->name('be.static_page.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\PageController::class, 'changenumber'])->name('be.static_page.number');
    });
    Route::prefix('danh-muc-bai-viet')->group(function () {
        Route::get('/', [App\Http\Controllers\PostTypeController::class, 'index'])->name('be.posttype.index');
        Route::get('/add', [App\Http\Controllers\PostTypeController::class, 'add'])->name('be.posttype.add');
        Route::post('/store', [App\Http\Controllers\PostTypeController::class, 'store'])->name('be.posttype.store');
        Route::get('/edit/{id}', [App\Http\Controllers\PostTypeController::class, 'edit'])->name('be.posttype.edit');
        Route::put('/update/{id}', [App\Http\Controllers\PostTypeController::class, 'update'])->name('be.posttype.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\PostTypeController::class, 'destroy'])->name('be.posttype.destroy');
        Route::get('/featured', [App\Http\Controllers\PostTypeController::class, 'featured'])->name('be.posttype.featured');
        Route::get('/hideShow', [App\Http\Controllers\PostTypeController::class, 'hideshow'])->name('be.posttype.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\PostTypeController::class, 'changenumber'])->name('be.posttype.number');
    });

    Route::prefix('bai-viet')->group(function () {
        Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('be.post.index')->middleware('permission:xem-bai-viet');
        Route::get('/add', [App\Http\Controllers\PostController::class, 'add'])->name('be.post.add')->middleware('permission:them-bai-viet');
        Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('be.post.store');
        Route::get('/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('be.post.edit')->middleware('permission:sua-bai-viet');
        Route::put('/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('be.post.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('be.post.destroy')->middleware('permission:xoa-bai-viet');
        Route::get('/featured', [App\Http\Controllers\PostController::class, 'featured'])->name('be.post.featured')->middleware('permission:sua-bai-viet');
        Route::get('/hideShow', [App\Http\Controllers\PostController::class, 'hideshow'])->name('be.post.hideshow')->middleware('permission:sua-bai-viet');
        Route::get('/changeNumber', [App\Http\Controllers\PostController::class, 'changenumber'])->name('be.post.number')->middleware('permission:sua-bai-viet');
    });
    Route::prefix('tuyen-dung')->group(function () {
        Route::get('/', [App\Http\Controllers\RecruitmentController::class, 'index'])->name('be.recruitment.index')->middleware('permission:xem-bai-viet');
        Route::get('/add', [App\Http\Controllers\RecruitmentController::class, 'add'])->name('be.recruitment.add')->middleware('permission:them-bai-viet');
        Route::post('/store', [App\Http\Controllers\RecruitmentController::class, 'store'])->name('be.recruitment.store');
        Route::get('/edit/{id}', [App\Http\Controllers\RecruitmentController::class, 'edit'])->name('be.recruitment.edit')->middleware('permission:sua-bai-viet');
        Route::put('/update/{id}', [App\Http\Controllers\RecruitmentController::class, 'update'])->name('be.recruitment.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\RecruitmentController::class, 'destroy'])->name('be.recruitment.destroy')->middleware('permission:xoa-bai-viet');
        Route::get('/featured', [App\Http\Controllers\RecruitmentController::class, 'featured'])->name('be.recruitment.featured')->middleware('permission:sua-bai-viet');
        Route::get('/hideShow', [App\Http\Controllers\RecruitmentController::class, 'hideshow'])->name('be.recruitment.hideshow')->middleware('permission:sua-bai-viet');
        Route::get('/changeNumber', [App\Http\Controllers\RecruitmentController::class, 'changenumber'])->name('be.recruitment.number')->middleware('permission:sua-bai-viet');
    });


    Route::prefix('chi-nhanh')->group(function () {
        Route::get('/', [App\Http\Controllers\BranchController::class, 'index'])->name('be.branch.index')->middleware('permission:xem-bai-viet');
        Route::get('/add', [App\Http\Controllers\BranchController::class, 'add'])->name('be.branch.add')->middleware('permission:them-bai-viet');
        Route::post('/store', [App\Http\Controllers\BranchController::class, 'store'])->name('be.branch.store');
        Route::get('/edit/{id}', [App\Http\Controllers\BranchController::class, 'edit'])->name('be.branch.edit')->middleware('permission:sua-bai-viet');
        Route::put('/update/{id}', [App\Http\Controllers\BranchController::class, 'update'])->name('be.branch.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\BranchController::class, 'destroy'])->name('be.branch.destroy')->middleware('permission:xoa-bai-viet');
        Route::get('/featured', [App\Http\Controllers\BranchController::class, 'featured'])->name('be.branch.featured')->middleware('permission:sua-bai-viet');
        Route::get('/hideShow', [App\Http\Controllers\BranchController::class, 'hideshow'])->name('be.branch.hideshow')->middleware('permission:sua-bai-viet');
        Route::get('/changeNumber', [App\Http\Controllers\BranchController::class, 'changenumber'])->name('be.branch.number')->middleware('permission:sua-bai-viet');
    });

    Route::prefix('danh-muc-cap-1')->group(function () {
        Route::get('/', [App\Http\Controllers\ProductCategory1Controller::class, 'index'])->name('be.product_category_1.index');
        Route::get('/add', [App\Http\Controllers\ProductCategory1Controller::class, 'add'])->name('be.product_category_1.add');
        Route::post('/store', [App\Http\Controllers\ProductCategory1Controller::class, 'store'])->name('be.product_category_1.store');
        Route::get('/edit/{id}', [App\Http\Controllers\ProductCategory1Controller::class, 'edit'])->name('be.product_category_1.edit');
        Route::put('/update/{id}', [App\Http\Controllers\ProductCategory1Controller::class, 'update'])->name('be.product_category_1.update');
        Route::post('/clone/{id}', [App\Http\Controllers\ProductCategory1Controller::class, 'clone'])->name('be.product_category_1.clone');
        Route::delete('/destroy/{id}', [App\Http\Controllers\ProductCategory1Controller::class, 'destroy'])->name('be.product_category_1.destroy');
        Route::get('/featured', [App\Http\Controllers\ProductCategory1Controller::class, 'featured'])->name('be.product_category_1.featured');
        Route::get('/hideShow', [App\Http\Controllers\ProductCategory1Controller::class, 'hideshow'])->name('be.product_category_1.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\ProductCategory1Controller::class, 'changenumber'])->name('be.product_category_1.number');
    });
    Route::prefix('danh-muc-cap-2')->group(function () {
        Route::get('/', [App\Http\Controllers\ProductCategory2Controller::class, 'index'])->name('be.product_category_2.index');
        Route::get('/add', [App\Http\Controllers\ProductCategory2Controller::class, 'add'])->name('be.product_category_2.add');
        Route::post('/store', [App\Http\Controllers\ProductCategory2Controller::class, 'store'])->name('be.product_category_2.store');
        Route::get('/edit/{id}', [App\Http\Controllers\ProductCategory2Controller::class, 'edit'])->name('be.product_category_2.edit');
        Route::put('/update/{id}', [App\Http\Controllers\ProductCategory2Controller::class, 'update'])->name('be.product_category_2.update');
        Route::post('/clone/{id}', [App\Http\Controllers\ProductCategory2Controller::class, 'clone'])->name('be.product_category_2.clone');
        Route::delete('/destroy/{id}', [App\Http\Controllers\ProductCategory2Controller::class, 'destroy'])->name('be.product_category_2.destroy');
        Route::get('/featured', [App\Http\Controllers\ProductCategory2Controller::class, 'featured'])->name('be.product_category_2.featured');
        Route::get('/hideShow', [App\Http\Controllers\ProductCategory2Controller::class, 'hideshow'])->name('be.product_category_2.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\ProductCategory2Controller::class, 'changenumber'])->name('be.product_category_2.number');
        Route::get('/update-parent', [App\Http\Controllers\ProductCategory2Controller::class, 'update_parent'])->name('be.product_category_2.update_parent');
    });
    Route::prefix('san-pham')->group(function () {
        Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('be.product.index');
        Route::get('/add', [App\Http\Controllers\ProductController::class, 'add'])->name('be.product.add');
        Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('be.product.store');
        Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('be.product.edit');
        Route::put('/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('be.product.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('be.product.destroy');
        Route::get('/featured', [App\Http\Controllers\ProductController::class, 'featured'])->name('be.product.featured');
        Route::get('/hideShow', [App\Http\Controllers\ProductController::class, 'hideshow'])->name('be.product.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\ProductController::class, 'changenumber'])->name('be.product.number');
        Route::get('/get-flink-parent-child', [App\Http\Controllers\ProductController::class, 'get_parent_child'])->name('be.product.get_parent_child');
        Route::get('/update-parent', [App\Http\Controllers\ProductController::class, 'update_parent'])->name('be.product.update_parent');
        Route::get('/update-parent-child', [App\Http\Controllers\ProductController::class, 'update_parent_child'])->name('be.product.update_parent_child');

        Route::delete('/delete-product-all-image-detail', [App\Http\Controllers\ProductController::class, 'delete_all_image_detail'])->name('be.product.delete_all_image_detail');
        Route::delete('/delete-product-single-image-detail', [App\Http\Controllers\ProductController::class, 'delete_single_image_detail'])->name('be.product.delete_single_image_detail');
        Route::delete('/delete-product-multiple-image-detail', [App\Http\Controllers\ProductController::class, 'delete_multiple_image_detail'])->name('be.product.delete_multiple_image_detail');
        Route::post('/upload-product-image-via-ajax', [App\Http\Controllers\ProductController::class, 'uploadImageViaAjax'])->name('be.product.uploadImageViaAjax');
        Route::post('/upload-branch-image-via-ajax', [App\Http\Controllers\BranchController::class, 'uploadImageViaAjax'])->name('be.branch.uploadImageViaAjax');
        Route::delete('/delete-branch-single-image-detail', [App\Http\Controllers\BranchController::class, 'delete_single_image_detail'])->name('be.branch.delete_single_image_detail');
        Route::delete('/delete-branch-multiple-image-detail', [App\Http\Controllers\BranchController::class, 'delete_multiple_image_detail'])->name('be.branch.delete_multiple_image_detail');
        Route::delete('/delete-branch-all-image-detail', [App\Http\Controllers\BranchController::class, 'delete_all_image_detail'])->name('be.branch.delete_all_image_detail');

        Route::post('/store-image', [App\Http\Controllers\ProductController::class, 'store_image'])->name('be.product.store_image');

        });
    Route::prefix('phan-hoi')->group(function () {
        Route::get('/', [App\Http\Controllers\FeedBackController::class, 'index'])->name('be.feedback.index');
        Route::get('/add', [App\Http\Controllers\FeedBackController::class, 'add'])->name('be.feedback.add');
        Route::post('/store', [App\Http\Controllers\FeedBackController::class, 'store'])->name('be.feedback.store');
        Route::get('/edit/{id}', [App\Http\Controllers\FeedBackController::class, 'edit'])->name('be.feedback.edit');
        Route::put('/update/{id}', [App\Http\Controllers\FeedBackController::class, 'update'])->name('be.feedback.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\FeedBackController::class, 'destroy'])->name('be.feedback.destroy');
        Route::get('/featured', [App\Http\Controllers\FeedBackController::class, 'featured'])->name('be.feedback.featured');
        Route::get('/hideShow', [App\Http\Controllers\FeedBackController::class, 'hideshow'])->name('be.feedback.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\FeedBackController::class, 'changenumber'])->name('be.feedback.number');
    });
    Route::prefix('chinh-sach')->group(function () {
        Route::get('/', [App\Http\Controllers\PolicyController::class, 'index'])->name('be.policy.index');
        Route::get('/add', [App\Http\Controllers\PolicyController::class, 'add'])->name('be.policy.add');
        Route::post('/store', [App\Http\Controllers\PolicyController::class, 'store'])->name('be.policy.store');
        Route::get('/edit/{id}', [App\Http\Controllers\PolicyController::class, 'edit'])->name('be.policy.edit');
        Route::put('/update/{id}', [App\Http\Controllers\PolicyController::class, 'update'])->name('be.policy.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\PolicyController::class, 'destroy'])->name('be.policy.destroy');
        Route::get('/featured', [App\Http\Controllers\PolicyController::class, 'featured'])->name('be.policy.featured');
        Route::get('/hideShow', [App\Http\Controllers\PolicyController::class, 'hideshow'])->name('be.policy.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\PolicyController::class, 'changenumber'])->name('be.policy.number');
    });
    Route::prefix('gioi-thieu')->group(function () {
        Route::get('/', [App\Http\Controllers\AboutController::class, 'index'])->name('be.about.index');
        Route::get('/add', [App\Http\Controllers\AboutController::class, 'add'])->name('be.about.add');
        Route::post('/store', [App\Http\Controllers\AboutController::class, 'store'])->name('be.about.store');
        Route::get('/edit/{id}', [App\Http\Controllers\AboutController::class, 'edit'])->name('be.about.edit');
        Route::put('/update/{id}', [App\Http\Controllers\AboutController::class, 'update'])->name('be.about.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\AboutController::class, 'destroy'])->name('be.about.destroy');
        Route::get('/featured', [App\Http\Controllers\AboutController::class, 'featured'])->name('be.about.featured');
        Route::get('/hideShow', [App\Http\Controllers\AboutController::class, 'hideshow'])->name('be.about.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\AboutController::class, 'changenumber'])->name('be.about.number');
    });
    Route::prefix('chi-nhanh')->group(function () {
        Route::get('/', [App\Http\Controllers\BranchController::class, 'index'])->name('be.branch.index');
        Route::get('/add', [App\Http\Controllers\BranchController::class, 'add'])->name('be.branch.add');
        Route::post('/store', [App\Http\Controllers\BranchController::class, 'store'])->name('be.branch.store');
        Route::get('/edit/{id}', [App\Http\Controllers\BranchController::class, 'edit'])->name('be.branch.edit');
        Route::put('/update/{id}', [App\Http\Controllers\BranchController::class, 'update'])->name('be.branch.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\BranchController::class, 'destroy'])->name('be.branch.destroy');
        Route::get('/featured', [App\Http\Controllers\BranchController::class, 'featured'])->name('be.branch.featured');
        Route::get('/hideShow', [App\Http\Controllers\BranchController::class, 'hideshow'])->name('be.branch.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\BranchController::class, 'changenumber'])->name('be.branch.number');
        Route::get('/get-flink-parent-child', [App\Http\Controllers\BranchController::class, 'get_parent_child'])->name('be.branch.get_parent_child');
        Route::get('/update-parent', [App\Http\Controllers\BranchController::class, 'update_parent'])->name('be.branch.update_parent');
        Route::get('/update-parent-child', [App\Http\Controllers\BranchController::class, 'update_parent_child'])->name('be.branch.update_parent_child');
    });

    Route::prefix('danh-muc-chi-nhanh-cap-1')->group(function () {
        Route::get('/', [App\Http\Controllers\BranchCategory1Controller::class, 'index'])->name('be.branch_category_1.index');
        Route::get('/add', [App\Http\Controllers\BranchCategory1Controller::class, 'add'])->name('be.branch_category_1.add');
        Route::post('/store', [App\Http\Controllers\BranchCategory1Controller::class, 'store'])->name('be.branch_category_1.store');
        Route::get('/edit/{id}', [App\Http\Controllers\BranchCategory1Controller::class, 'edit'])->name('be.branch_category_1.edit');
        Route::put('/update/{id}', [App\Http\Controllers\BranchCategory1Controller::class, 'update'])->name('be.branch_category_1.update');
        Route::post('/clone/{id}', [App\Http\Controllers\BranchCategory1Controller::class, 'clone'])->name('be.branch_category_1.clone');
        Route::delete('/destroy/{id}', [App\Http\Controllers\BranchCategory1Controller::class, 'destroy'])->name('be.branch_category_1.destroy');
        Route::get('/featured', [App\Http\Controllers\BranchCategory1Controller::class, 'featured'])->name('be.branch_category_1.featured');
        Route::get('/hideShow', [App\Http\Controllers\BranchCategory1Controller::class, 'hideshow'])->name('be.branch_category_1.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\BranchCategory1Controller::class, 'changenumber'])->name('be.branch_category_1.number');
    });
    Route::prefix('danh-muc-chi-nhanh-cap-2')->group(function () {
        Route::get('/', [App\Http\Controllers\BranchCategory2Controller::class, 'index'])->name('be.branch_category_2.index');
        Route::get('/add', [App\Http\Controllers\BranchCategory2Controller::class, 'add'])->name('be.branch_category_2.add');
        Route::post('/store', [App\Http\Controllers\BranchCategory2Controller::class, 'store'])->name('be.branch_category_2.store');
        Route::get('/edit/{id}', [App\Http\Controllers\BranchCategory2Controller::class, 'edit'])->name('be.branch_category_2.edit');
        Route::put('/update/{id}', [App\Http\Controllers\BranchCategory2Controller::class, 'update'])->name('be.branch_category_2.update');
        Route::post('/clone/{id}', [App\Http\Controllers\BranchCategory2Controller::class, 'clone'])->name('be.branch_category_2.clone');
        Route::delete('/destroy/{id}', [App\Http\Controllers\BranchCategory2Controller::class, 'destroy'])->name('be.branch_category_2.destroy');
        Route::get('/featured', [App\Http\Controllers\BranchCategory2Controller::class, 'featured'])->name('be.branch_category_2.featured');
        Route::get('/hideShow', [App\Http\Controllers\BranchCategory2Controller::class, 'hideshow'])->name('be.branch_category_2.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\BranchCategory2Controller::class, 'changenumber'])->name('be.branch_category_2.number');
        Route::get('/update-parent', [App\Http\Controllers\BranchCategory2Controller::class, 'update_parent'])->name('be.branch_category_2.update_parent');
    });
    Route::prefix('danh-muc-thu-vien-anh')->group(function () {
        Route::get('/', [App\Http\Controllers\GalleryTypeController::class, 'index'])->name('be.gallerytype.index');
        Route::get('/add', [App\Http\Controllers\GalleryTypeController::class, 'add'])->name('be.gallerytype.add');
        Route::post('/store', [App\Http\Controllers\GalleryTypeController::class, 'store'])->name('be.gallerytype.store');
        Route::get('/edit/{id}', [App\Http\Controllers\GalleryTypeController::class, 'edit'])->name('be.gallerytype.edit');
        Route::put('/update/{id}', [App\Http\Controllers\GalleryTypeController::class, 'update'])->name('be.gallerytype.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\GalleryTypeController::class, 'destroy'])->name('be.gallerytype.destroy');
        Route::get('/hideShow', [App\Http\Controllers\GalleryTypeController::class, 'hideshow'])->name('be.gallerytype.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\GalleryTypeController::class, 'changenumber'])->name('be.gallerytype.number');
    });
    Route::prefix('thu-vien-anh')->group(function () {
        Route::get('/', [App\Http\Controllers\GalleryController::class, 'index'])->name('be.gallery.index');
        Route::get('/add', [App\Http\Controllers\GalleryController::class, 'add'])->name('be.gallery.add');
        Route::post('/store', [App\Http\Controllers\GalleryController::class, 'store'])->name('be.gallery.store');
        Route::get('/edit/{id}', [App\Http\Controllers\GalleryController::class, 'edit'])->name('be.gallery.edit');
        Route::put('/update/{id}', [App\Http\Controllers\GalleryController::class, 'update'])->name('be.gallery.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('be.gallery.destroy');
        Route::get('/featured', [App\Http\Controllers\GalleryController::class, 'featured'])->name('be.gallery.featured');
        Route::get('/hideShow', [App\Http\Controllers\GalleryController::class, 'hideshow'])->name('be.gallery.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\GalleryController::class, 'changenumber'])->name('be.gallery.number');

        Route::delete('/delete-all-image-detail', [App\Http\Controllers\GalleryController::class, 'delete_all_image_detail'])->name('be.gallery.delete_all_image_detail');

        Route::delete('/delete-single-image-detail', [App\Http\Controllers\GalleryController::class, 'delete_single_image_detail'])->name('be.gallery.delete_single_image_detail');

        Route::delete('/delete-multiple-image-detail', [App\Http\Controllers\GalleryController::class, 'delete_multiple_image_detail'])->name('be.gallery.delete_multiple_image_detail');

        Route::post('/upload-image-via-ajax', [App\Http\Controllers\GalleryController::class, 'uploadImageViaAjax'])->name('be.gallery.uploadImageViaAjax');

        Route::post('/store-image', [App\Http\Controllers\GalleryController::class, 'store_image'])->name('be.gallery.store_image');


    });

    Route::prefix('danh-muc-khoa-hoc')->group(function () {
        Route::get('/', [App\Http\Controllers\CourseTypeController::class, 'index'])->name('be.coursetype.index');
        Route::get('/add', [App\Http\Controllers\CourseTypeController::class, 'add'])->name('be.coursetype.add');
        Route::post('/store', [App\Http\Controllers\CourseTypeController::class, 'store'])->name('be.coursetype.store');
        Route::get('/edit/{id}', [App\Http\Controllers\CourseTypeController::class, 'edit'])->name('be.coursetype.edit');
        Route::put('/update/{id}', [App\Http\Controllers\CourseTypeController::class, 'update'])->name('be.coursetype.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\CourseTypeController::class, 'destroy'])->name('be.coursetype.destroy');
        Route::get('/hideShow', [App\Http\Controllers\CourseTypeController::class, 'hideshow'])->name('be.coursetype.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\CourseTypeController::class, 'changenumber'])->name('be.coursetype.number');
    });
    Route::prefix('danh-muc-dich-vu')->group(function () {
        Route::get('/', [App\Http\Controllers\ServiceTypeController::class, 'index'])->name('be.servicetype.index');
        Route::get('/add', [App\Http\Controllers\ServiceTypeController::class, 'add'])->name('be.servicetype.add');
        Route::post('/store', [App\Http\Controllers\ServiceTypeController::class, 'store'])->name('be.servicetype.store');
        Route::get('/edit/{id}', [App\Http\Controllers\ServiceTypeController::class, 'edit'])->name('be.servicetype.edit');
        Route::put('/update/{id}', [App\Http\Controllers\ServiceTypeController::class, 'update'])->name('be.servicetype.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\ServiceTypeController::class, 'destroy'])->name('be.servicetype.destroy');
        Route::get('/hideShow', [App\Http\Controllers\ServiceTypeController::class, 'hideshow'])->name('be.servicetype.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\ServiceTypeController::class, 'changenumber'])->name('be.servicetype.number');
    });
    Route::prefix('dich-vu')->group(function () {
        Route::get('/', [App\Http\Controllers\ServiceController::class, 'index'])->name('be.service.index');
        Route::get('/add', [App\Http\Controllers\ServiceController::class, 'add'])->name('be.service.add');
        Route::post('/store', [App\Http\Controllers\ServiceController::class, 'store'])->name('be.service.store');
        Route::get('/edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('be.service.edit');
        Route::put('/update/{id}', [App\Http\Controllers\ServiceController::class, 'update'])->name('be.service.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('be.service.destroy');
        Route::get('/hideShow', [App\Http\Controllers\ServiceController::class, 'hideshow'])->name('be.service.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\ServiceController::class, 'changenumber'])->name('be.service.number');
    });
    Route::prefix('log-hoat-dong')->group(function () {
        Route::get('/', [App\Http\Controllers\LogController::class, 'index'])->name('be.log.index');

        Route::delete('/destroy/{id}', [App\Http\Controllers\LogController::class, 'destroy'])->name('be.log.destroy');
        Route::post('/show_log', [App\Http\Controllers\LogController::class, 'show_log'])->name('be.log.show_log');
    });
    Route::prefix('mang-xa-hoi')->group(function () {
        Route::get('/', [App\Http\Controllers\SocialController::class, 'index'])->name('be.social.index');
        Route::get('/add', [App\Http\Controllers\SocialController::class, 'add'])->name('be.social.add');
        Route::post('/store', [App\Http\Controllers\SocialController::class, 'store'])->name('be.social.store');
        Route::get('/edit/{id}', [App\Http\Controllers\SocialController::class, 'edit'])->name('be.social.edit');
        Route::put('/update/{id}', [App\Http\Controllers\SocialController::class, 'update'])->name('be.social.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\SocialController::class, 'destroy'])->name('be.social.destroy');
        Route::get('/hideShow', [App\Http\Controllers\SocialController::class, 'hideshow'])->name('be.social.hideshow');
        Route::get('/changeNumber', [App\Http\Controllers\SocialController::class, 'changenumber'])->name('be.social.number');
    });
    Route::group(['prefix' => 'profile'], function(){
        Route::get('/', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
        Route::put('/update-profile', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('update_profile_user');
        Route::get('/password', [App\Http\Controllers\HomeController::class, 'password'])->name('password');
        Route::put('/update-password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update_password_user');
        Route::get('/2fa', [App\Http\Controllers\HomeController::class, 'show_2fa'])->name('show_2fa');
        Route::put('/enable-2fa', [App\Http\Controllers\HomeController::class, 'enable_2fa'])->name('enable_2fa_user');
        Route::put('/disable-2fa', [App\Http\Controllers\HomeController::class, 'disable_2fa'])->name('disable_2fa_user');
        Route::get('/login-history', [App\Http\Controllers\HomeController::class, 'show_history_login'])->name('show_history_login');
    });
    Route::group(['prefix' => 'analytics'], function(){
        Route::get('/', [App\Http\Controllers\HomeController::class, 'analytics'])->name('analytics');
            Route::prefix('browser')->group(function () {
                Route::get('/', [AnalyticsController::class,'browser'])->name('api.browser');
                Route::get('/yesterday', [AnalyticsController::class,'browser_yesterday'])->name('api.browser.yesterday');
                Route::get('/7-day', [AnalyticsController::class,'browser_7day'])->name('api.browser.7day');
                Route::get('/week', [AnalyticsController::class,'browser_thisweek'])->name('api.browser.thisweek');
                Route::get('/30-day', [AnalyticsController::class,'browser_30day'])->name('api.browser.30day');
                Route::get('/month', [AnalyticsController::class,'browser_thismonth'])->name('api.browser.thismonth');
                Route::get('/year', [AnalyticsController::class,'browser_thisyear'])->name('api.browser.thisyear');
            });
            Route::prefix('access')->group(function () {
                Route::get('/', [AnalyticsController::class,'access'])->name('api.access');
                Route::get('/yesterday', [AnalyticsController::class,'access_yesterday'])->name('api.access.yesterday');
                Route::get('/7-day', [AnalyticsController::class,'access_7day'])->name('api.access.7day');
                Route::get('/week', [AnalyticsController::class,'access_thisweek'])->name('api.accesss.thisweek');
                Route::get('/30-day', [AnalyticsController::class,'access_30day'])->name('api.access.30day');
                Route::get('/month', [AnalyticsController::class,'access_thismonth'])->name('api.access.thismonth');
                Route::get('/year', [AnalyticsController::class,'access_thisyear'])->name('api.access.thisyear');
            });
            Route::prefix('keyword')->group(function () {
                Route::get('/', [AnalyticsController::class,'keyword'])->name('api.keyword');
                Route::get('/yesterday', [AnalyticsController::class,'keyword_yesterday'])->name('api.keyword.yesterday');
                Route::get('/7-day', [AnalyticsController::class,'keyword_7day'])->name('api.keyword.7day');
                Route::get('/week', [AnalyticsController::class,'keyword_thisweek'])->name('api.keywords.thisweek');
                Route::get('/30-day', [AnalyticsController::class,'keyword_30day'])->name('api.keyword.30day');
                Route::get('/month', [AnalyticsController::class,'keyword_thismonth'])->name('api.keyword.thismonth');
                Route::get('/year', [AnalyticsController::class,'keyword_thisyear'])->name('api.keyword.thisyear');
            });
            Route::prefix('country')->group(function () {
                Route::get('/', [AnalyticsController::class,'country'])->name('api.country');
                Route::get('/yesterday', [AnalyticsController::class,'country_yesterday'])->name('api.country.yesterday');
                Route::get('/7-day', [AnalyticsController::class,'country_7day'])->name('api.country.7day');
                Route::get('/week', [AnalyticsController::class,'country_thisweek'])->name('api.country.thisweek');
                Route::get('/30-day', [AnalyticsController::class,'country_30day'])->name('api.country.30day');
                Route::get('/month', [AnalyticsController::class,'country_thismonth'])->name('api.country.thismonth');
                Route::get('/year', [AnalyticsController::class,'country_thisyear'])->name('api.country.thisyear');
            });
            Route::prefix('pageview')->group(function () {
                Route::get('/', [AnalyticsController::class,'pageview'])->name('api.pageview');
                Route::get('/yesterday', [AnalyticsController::class,'pageviewyesterday'])->name('api.pageview.yesterday');
                Route::get('/7-day', [AnalyticsController::class,'pageview7day'])->name('api.pageview.7day');
                Route::get('/week', [AnalyticsController::class,'pageviewweek'])->name('api.pageview.thisweek');
                Route::get('/30-day', [AnalyticsController::class,'pageview30day'])->name('api.pageview.30day');
                Route::get('/month', [AnalyticsController::class,'pageviewthismonth'])->name('api.pageview.thismonth');
                Route::get('/year', [AnalyticsController::class,'pageviewthisyear'])->name('api.pageview.thisyear');
            });
            Route::prefix('device')->group(function () {
                Route::get('/', [AnalyticsController::class,'device'])->name('api.device');
                Route::get('/yesterday', [AnalyticsController::class,'deviceyesterday'])->name('api.device.yesterday');
                Route::get('/7-day', [AnalyticsController::class,'device7day'])->name('api.device.7day');
                Route::get('/week', [AnalyticsController::class,'deviceweek'])->name('api.device.thisweek');
                Route::get('/30-day', [AnalyticsController::class,'device30day'])->name('api.device.30day');
                Route::get('/month', [AnalyticsController::class,'devicethismonth'])->name('api.device.thismonth');
                Route::get('/year', [AnalyticsController::class,'devicethisyear'])->name('api.device.thisyear');
            });
            Route::prefix('referral')->group(function () {
                Route::get('/', [AnalyticsController::class,'referral'])->name('api.referral');
                Route::get('/yesterday', [AnalyticsController::class,'referralyesterday'])->name('api.referral.yesterday');
                Route::get('/7-day', [AnalyticsController::class,'referral7day'])->name('api.referral.7day');
                Route::get('/week', [AnalyticsController::class,'referralweek'])->name('api.referral.thisweek');
                Route::get('/30-day', [AnalyticsController::class,'referral30day'])->name('api.referral.30day');
                Route::get('/month', [AnalyticsController::class,'referralthismonth'])->name('api.referral.thismonth');
                Route::get('/year', [AnalyticsController::class,'referralthisyear'])->name('api.referral.thisyear');
            });
            Route::prefix('dashboard')->group(function () {
                Route::get('/', [AnalyticsController::class,'dashboard'])->name('api.dashboard');
                Route::get('/yesterday', [AnalyticsController::class,'dashboardyesterday'])->name('api.Hôm qua');
                Route::get('/7-day', [AnalyticsController::class,'dashboard7day'])->name('api.dashboard.7day');
                Route::get('/week', [AnalyticsController::class,'dashboardweek'])->name('api.dashboard.thisweek');
                Route::get('/30-day', [AnalyticsController::class,'dashboard30day'])->name('api.dashboard.30day');
                Route::get('/month', [AnalyticsController::class,'dashboardthismonth'])->name('api.dashboard.thismonth');
                Route::get('/year', [AnalyticsController::class,'dashboardthisyear'])->name('api.dashboard.thisyear');
            });
    });

});


