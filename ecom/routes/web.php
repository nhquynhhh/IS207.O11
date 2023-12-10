<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Iluminate\Http\Request;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;
use App\Http\Controllers\User\SubCategoryController as UserSubCategoryController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController as UserOrderController;


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
Route::get('/test',function(){
   orderEmail(1);
});

Route::get('/', function () {
   return view('user.dashboard_user');
});


Route::get('/userprofile', [DashboardController::class, 'Index']);

/////////////////////////
Route::get('/logout', function () {
   Auth::logout();
   return redirect('/');
});

Route::controller(UserSubCategoryController::class)->group(function () {
   Route::get('/product-list/{categorySlug}/{subCategorySlug}/{sortBy?}', 'Index')->name('productlist');
   Route::get('/product-list/{categorySlug}/{sortBy?}', 'Index2')->name('product list with category');
});

Route::controller(UserProductController::class)->group(function () {
   Route::get('/product-list/{categorySlug}/{subCategorySlug?}/sanpham/{productSlug}', 'ProductDetail')->name('detail product');
});

Route::controller(CartController::class)->group(function () {
   Route::get('/cart', 'Index')->name('cart');
   Route::post('add-to-cart', 'AddToCart')->name('add to cart');
   Route::get('/cart/delete/{rowID}', 'DeleteCart')->name('delete cart');
   Route::post('/cart/update', 'UpdateCart')->name('update cart');
});

Route::controller(UserOrderController::class)->group(function () {
   Route::get('/payment', 'Index')->name('payment');
   Route::post('store-order', 'StoreOrder')->name('store.order');
   Route::get('/order-success/{orderID}', 'OrderSuccess')->name('order.success');
});

Route::get('/user-profile', [DashboardController::class, 'Index']);
Route::get('/product-detail', [ProductController::class, 'Index'])->name('productdetail');

Route::middleware(['auth', 'role:user'])->group(function () {
   Route::controller(\App\Http\Controllers\User\DashboardController::class)->group(function () {
      Route::get('/user/dashboard', 'Index')->name('userdashboard');
   });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
   Route::controller(DashboardController::class)->group(function () {
      Route::get('/admin/dashboard', 'DashboardAdmin')->name('admindashboard');
      Route::get('/admin/shop-dashboard', 'ShopDashboard')->name('adminshopdashboard');
   });

   Route::controller(CategoryController::class)->group(function () {
      Route::get('/admin/all-category', 'Index')->name('allcategory');
      Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
      Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
      Route::get('/admin/edit-category/{categoryID}', 'EditCategory')->name('editcategory');
      Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
      Route::get('/admin/delete-category/{categoryID}', 'DeleteCategory')->name('deletecategory');
      Route::get('/admin/search-category',  'SearchCategory')->name('searchcategory');
   });


   Route::controller(SubCategoryController::class)->group(function () {
      Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
      Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
      Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
      Route::get('/admin/edit-subcategory/{subCategoryID}', 'EditSubCategory')->name('editsubcategory');
      Route::post('/admin/update-subcategory', 'UpdateSubCategory')->name('updatesubcategory');
      Route::get('/admin/delete-subcategory/{subcategoryID}', 'DeleteSubCategory')->name('deletesubcategory');
      Route::get('/admin/search-subcategory',  'SearchSubCategory')->name('searchsubcategory');
   });

   Route::controller(ProductController::class)->group(function () {
      Route::get('/admin/all-product', 'Index')->name('allproduct');
      Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
      Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
      Route::get('/admin/edit-product/{productID}', 'EditProduct')->name('editproduct');
      Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
      Route::get('/admin/delete-product/{productID}', 'DeleteCategory')->name('deleteproduct');
      Route::get('/admin/search-product',  'SearchCategory')->name('searchproduct');

      Route::post('/admin/update-product-img', 'UpdateProductImg')->name('updateproductimg');
      Route::get('/admin/edit-product-img/{productID}', 'EditProductImg')->name('editproductimg');
   });

   Route::controller(DiscountController::class)->group(function () {
      Route::get('/admin/all-discount', 'Index')->name('alldiscount');
      Route::get('/admin/add-discount', 'AddDiscount')->name('adddiscount');
      Route::post('/admin/store-discount', 'StoreDiscount')->name('storediscount');
      Route::get('/admin/edit-discount/{discountID}', 'EditDiscount')->name('editdiscount');
      Route::get('/admin/delete-discount/{discountID}', 'DeleteDiscount')->name('deletediscount');
      Route::get('/admin/search-discount',  'SearchDiscount')->name('searchdiscount');
      Route::post('/admin/update-discount', 'UpdateDiscount')->name('updatediscount');
   });

   Route::controller(ShippingController::class)->group(function () {
      Route::get('/admin/all-shipping', 'Index')->name('allshipping');
      Route::get('/admin/add-shipping', 'AddShipping')->name('addshipping');
      Route::post('/admin/store-shipping', 'StoreShipping')->name('storeshipping');
      Route::get('/admin/edit-shipping/{shippingID}', 'EditShipping')->name('editshipping');
      Route::get('/admin/delete-shipping/{shippingID}', 'DeleteShipping')->name('deleteshipping');
      Route::get('/admin/search-shipping',  'SearchShipping')->name('searchshipping');
      Route::post('/admin/update-shipping', 'UpdateShipping')->name('updateshipping');
   });

   Route::controller(OrderController::class)->group(function () {
      Route::get('/admin/all-order', 'Index')->name('allorder');
      Route::get('/admin/detail-order/{orderID}', 'DetailOrder')->name('detailorder');
      Route::post('/admin/update-order-status', 'UpdateOrderStatus')->name('updateorderstatus');
   });
});


Route::middleware('auth')->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
