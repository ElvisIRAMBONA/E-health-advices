<?php
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\AppointmentController As AdminAppointmentControllers;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\OrderController as AdminOrdersController;
//use App\Http\Controllers\Admin\OrderController As AdminOrdersController;
use App\Http\Controllers\Admin\CategoryController As AdminCategoryController;
use App\Http\Controllers\Admin\ProductController As AdminProductController;
//use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Models\Product;
use App\Http\Controllers\NewsletterController;
//use App\Http\Controllers\Admin\ProductController As AdminProductController; 
use App\Http\Controllers\AppointmentController;
use App\Models\Category;
//use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
//use App\Http\Controllers\Admin\ProductController;
//use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Middleware\AdminMiddleware;

//use App\Http\Controllers\Admin\ProductController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('profile.about');
});



// Add a route to handle the form submission
Route::post('/contact/submit', function (Illuminate\Http\Request $request) {
    // Here, you can handle the form submission (e.g., send an email or save to the database)
    // For demonstration, we'll just return a success message

    return back()->with('success', 'Your message has been sent successfully!');
})->name('contact.submit');
//route for privacy and terms
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/privacy', [App\Http\Controllers\PrivacyController::class, 'index'])->name('privacy');
Route::get('/terms', [App\Http\Controllers\TermsController::class, 'index'])->name('terms');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
//Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


//Routes pour afficher les category
Route::get('/category/hypertension', [ProductController::class, 'showHypertensionProducts'])->name('hypertension.products');
Route::get('/category/cancer', [ProductController::class, 'showCancerProducts'])->name('cancer.products');
Route::get('/category/diabetes', [ProductController::class, 'showDiabetesProducts'])->name('diabetes.products');
//Route::get('/category/diabetes', [CategoryController::class, 'showDiabetes'])->name('category.diabetes');
// Route for individual product view
Route::get('/products/{id}', [ProductController::class, 'showProduct'])->name('products.show');

Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/update-roles', [RoleController::class, 'updateRoles']);
 // Order Routes
    Route::resource('admin/orders', AdminOrdersController::class);
      // User Routes
    Route::resource('admin/users', UserController::class);
      // Product Routes
    Route::resource('admin/products', ProductController::class);
    //routes for cart
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');



    

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
// routes/web.php
Route::get('/admin', [RoleController::class, 'updateRoles'])
    ->middleware('role:admin'); // Autorise seulement les administrateurs



//admin panel add products
Route::prefix('admin/products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    
        // Routes pour les commandes
   // routes/web.php


// Définir les routes pour la gestion des commandes dans l'administration
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('orders', [AdminOrdersController::class, 'index'])->name('admin.orders.index');
    Route::get('orders/{order}', [AdminOrdersController::class, 'show'])->name('admin.orders.show');
    Route::post('orders/{order}/status', [AdminOrdersController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});


});
//routes for orders by admin
// routes/web.php


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('orders', [AdminOrdersController::class, 'index'])->name('admin.orders.index');
});

Route::middleware('auth:admin')->group(function() {
    // Route to view all orders
    Route::get('/admin/orders', [AdminOrdersController::class, 'index'])->name('admin.orders.index');

    // Route to view a specific order
    Route::get('/admin/orders/{order}', [AdminOrdersController::class, 'show'])->name('admin.orders.show');

    // Route to update order status
    Route::post('/admin/orders/{order}/status', [AdminOrdersController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});


// Routes for the admin ProductController
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.index');
    // other admin routes
});
// Routes for the regular ProductController
Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
// other regular routes
//
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('orders', AdminOrdersController::class);
});

Route::resource('products', ProductController::class);
   // Route::resource('orders', OrderController::class);
//route pour afficher produits
Route::get('products', [ProductController::class, 'index'])->name('products.index');


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Route pour afficher la liste des produits
Route::get('products', [ProductController::class, 'index'])->name('products.index');
});
Route::get('admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
Route::get('admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
Route::get('admin/products/{product}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
Route::get('admin/products/{product}', [AdminProductController::class, 'index'])->name('admin.products.destroy');



Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
// admin panel in use

Route::get('/super_admin/dashboard', function () {
  return view('super_admin.dashboard');
})->middleware(['auth','verified','super_admin'])->name('super_admin.dashboard');
//normal user


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('products', AdminProductController::class);});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('products', AdminProductController::class);
});



Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function (){
Route::get('/', [ DashboardController::class, 'index'])->name('dashboard');
});


//route de creation de categories
Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/index', [ AdminCategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/destroy', [ AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
Route::get('/admin/categories/edit', [ AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
Route::get('/admin/categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.categories.create');
//admin user
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
//route for checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout', [CheckoutController::class, 'showForm'])->name('checkout.form');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');
Route::get('/checkout', [CheckoutController::class, 'showForm'])->name('checkout');


Route::get('/checkout/success', function () {
    return view('checkout.success');  // Vue pour la confirmation de commande réussie
})->name('checkout.success');

// Route pour afficher le formulaire de commande
Route::get('/checkout', [CheckoutController::class, 'showForm'])->name('checkout.form');

// Route pour traiter la commande
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
//routes for admin orders

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/orders', [AdminOrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrdersController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminOrdersController::class, 'updateStatus'])->name('orders.updateStatus');
});

//Route::get('/category/diabetes', [CategoryController::class, 'showDiabetes'])->name('category.diabetes');
//privacy route
Route::get('/privacy', [App\Http\Controllers\PrivacyController::class, 'index'])->name('privacy');
//rootes for newsletter

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
//profile routes


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//route for Modifier
Route::get('/admin/products/{product}/show', [ProductController::class, 'show'])->name('admin.products.show');

Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::get('/admin/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::get('/admin/products/{product}/show', [ProductController::class, 'show'])->name('admin.products.show');




//routes for appointment


Route::middleware(['auth', 'role:2'])->prefix('admin')->name('admin.')->group(function () {
    // Autres routes admin
    Route::resource('appointments', AppointmentController::class);
    
});
//dropdown menu for cart




//routes for schedules
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('schedules', ScheduleController::class)->except(['show']);
});
Route::middleware(['auth', 'role:2'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('schedules', ScheduleController::class)->except(['show']);
});
//routes for doctors

 Route::get('admin/doctors', [DoctorController::class, 'index'])->name('admin.doctors.index');
 Route::post('admin/doctors', [DoctorController::class, 'store'])->name('admin.doctors.store');
 Route::get('admin/doctors/create', [DoctorController::class, 'create'])->name('admin.doctors.create');
  Route::get('admin/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('admin.doctors.edit');

 Route::delete('admin/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('admin.doctors.destroy');



Route::get('doctor',[DoctorController::class,'showall'])->name('display');
//route for approve appointments

Route::get('/my-appointments', [AppointmentController::class, 'myAppointments'])->name('my');

Route::get('/appointments/create/{doctor}/store', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('appointments{doctor}/store',[AppointmentController::class, 'store'])->name('appointments.store');
Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('appointments/edit{appointment}', [AppointmentController::class, 'edit'])->name('appointments.edit');
Route::get('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

//routes pour admin de confirmer le rendez vous
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/admin/appointments', [AppointmentController::class, 'adminIndex'])->name('admin.appointments.index');
    Route::post('/admin/appointments/{appointment}/confirm', [AppointmentController::class, 'confirmAppointment'])->name('admin.appointments.confirm');
});
//routes pour admin d'approuver les rendez vous
Route::middleware(['auth'])->group(function () {
    Route::post('/appointments/{id}/approve', [AppointmentController::class, 'approve'])->name('appointments.approve');
});
Route::get('/admin/all-appointments', [AppointmentController::class, 'getAll'])->name('admin.allApointments');
//social log in
Route::get('login/{provider}', [SocialLoginController::class, 'redirect'])->name('social.login');
Route::get('login/{provider}/callback', [SocialLoginController::class, 'callback']);
// Route pour rediriger vers Google


// Route pour le callback de Google


Route::get('/auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('social.login.google');
Route::get('/auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);




require __DIR__.'/auth.php';