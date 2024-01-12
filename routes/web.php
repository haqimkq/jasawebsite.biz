<?php

use App\Http\Controllers\api\WhoisController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\CronjobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\FileTodoController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\LabelDomainController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NameserverController;
use App\Http\Controllers\NotepadController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoTempController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\WhatsappGatewayController;
use App\Http\Controllers\WhatsappRandomController;
use App\Http\Controllers\YoutubeController;
use App\Models\LabelDomain;
use Chatify\Http\Controllers\MessagesController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

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

Route::get('/portofolio', [PortofolioController::class, 'porto'])->name('portofolio');
Route::get('/contact', [SendEmailController::class, 'index'])->name('contact');
Route::post('/contact/send', [SendEmailController::class, 'send'])->name('contact.send');
Route::get('/artikel', [ArticleController::class, 'artikel'])->name('artikel');
Route::get('/random-whatsapp/{nama}', [WhatsappRandomController::class, 'random'])->name('random.whatsapp');
Route::get('/lookup', [WhoisController::class, 'lookup'])->name('lookup');
Route::get('/sites/maintenance', function () {
    return Artisan::call('down');
});
Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);
Route::get('auth/google', [SocialiteController::class, 'redirectToProvider'])->name('auth.google');
Route::get('auth/google/callback', [SocialiteController::class, 'handleProvideCallback']);

// Portofolio
Route::middleware(['auth', 'admin'])->controller(PortofolioController::class)->group(
    function () {
        Route::get('/portofolioDB', 'index')->name('portofolio.index');
        Route::post('portofolio', 'store')->name('portofolio.store');
        Route::get('portofolio/create', 'create')->name('portofolio.create');
        Route::put('portofolio/{image}', 'update')->name('portofolio.update');
        Route::delete('portofolio/{image}', 'destroy')->name('portofolio.destroy');
        Route::get('portofolioDB/{image}/edit', 'edit')->name('portofolio.edit');
    }
);

// Template PDF
Route::get('/pdf', function () {
    return view('pdf');
});

// Domain
Route::middleware(['auth', 'support'])->controller(DomainController::class)->group(function () {
});
Route::middleware(['auth', 'admin'])->controller(DomainController::class)->group(function () {
    Route::get('domain', 'index')->name('domain.index');
    Route::get('domain/create', 'create')->name('domain.create');
    Route::post('domain', 'store')->name('domain.store');
    Route::put('domain/{domain}', 'update')->name('domain.update');
    Route::delete('domain/{domain}', 'destroy')->name('domain.destroy');
    Route::get('domain/{domain}/edit', 'edit')->name('domain.edit');
});


// Pelanggan
Route::middleware(['auth', 'admin'])->controller(PelangganController::class)->group(function () {
    Route::get('pelanggan/create', 'create')->name('pelanggan.create');
    Route::post('pelanggan', 'store')->name('pelanggan.store');
    Route::post('pelangganDomain', 'store2')->name('pelanggan.store2');
    Route::delete('pelanggan/{pelanggan}', 'destroy')->name('pelanggan.destroy');
    Route::get('pelanggan/{pelanggan}/edit', 'edit')->name('pelanggan.edit');
    Route::get('pelanggan', 'index')->name('pelanggan.index');
    Route::get('pelanggan/{pelanggan}', 'show')->name('pelanggan.show');
});
Route::middleware(['auth', 'support'])->controller(PelangganController::class)->group(function () {
});

// Member
Route::middleware('auth')->group(function () {
    Route::get('/', [ImageController::class, 'index'])->name('welcome');
});

// Verified Member
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/domain/{slug}', [DomainController::class, 'show'])->name('domain.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/member', MemberController::class);
    Route::get('/website', [TemplateController::class, 'website'])->name('website');
    Route::get('/layanan/website', [LayananController::class, 'website'])->name('layanan.website');
    Route::get('/layanan/website/order', [LayananController::class, 'orderWebsite'])->name('order.website');
    Route::post('/layanan/website/store', [LayananController::class, 'orderWebsiteStore'])->name('store.website');
    Route::post('editns', [NotificationController::class, 'editns'])->name('editns');
    Route::get('notif', [NotificationController::class, 'index'])->name('notif');
    Route::get('notif/edit', [NotificationController::class, 'notifread'])->name('notifRead');
    Route::get('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/notifications/{id}{domain_id}{pelanggan_id}//mark-as-done', [NotificationController::class, 'markAsDone'])->name('notifications.markAsDone');
    Route::delete('/notif/{notification}', [NotificationController::class, 'destroy'])->name('notif.destroy');
    Route::put('pelanggan/{pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/{order}/{number}', [OrderController::class, 'show'])->name('order.show');
    Route::get('websites/edit/{slug}', [TodoController::class, 'createTodoByUser'])->name('createTodoByUser');
    Route::post('websites/edit/{pelanggan}', [TodoController::class, 'StoreTodoByUser'])->name('storeTodoByUser');
    Route::get('chats/count', [MessagesController::class, 'getUnreadCount']);
});


// Full Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('nameserverDomain', [NameserverController::class, 'store2'])->name('nameserver.store2');
    Route::post('addUser', [UserController::class, 'store2'])->name('user.store2');
    Route::resource('/nameserver', NameserverController::class);
    Route::resource('/user', UserController::class);
    Route::post('/store', [ImageController::class, 'store'])->name('store');
    Route::delete("delete", [ImageController::class, 'delete'])->name('delete');
    Route::get('/searchPelanggan', [DomainController::class, 'searchPelanggan'])->name('domain.searchPelanggan');
    Route::get('/pdf/download', [InvoiceController::class, 'pdf']);
    Route::delete('/invoiceDelete/{inv}', [InvoiceController::class, 'invdelete'])->name('invoiceDelete');
    Route::delete('/invoicePelangganDelete/{inv}', [InvoiceController::class, 'invpelanggandelete'])->name('invoicePelangganDelete');
    Route::delete('/invoiceDomainDelete/{inv}', [InvoiceController::class, 'invdomaindelete'])->name('invoiceDomainDelete');
    Route::resource('todo', TodoController::class);
    Route::get('todos/report', [TodoController::class, 'report'])->name('todo.report');
    Route::put('/activate/domain/{id}', [DomainController::class, 'activateDomain'])->name('activateDomain');
    Route::resource('whatsappGateway', WhatsappGatewayController::class);
    Route::get('/twilio/sendWhatsapp', [WhatsappController::class, 'sendWhatsapp'])->name('whatsapp.send');
    Route::get('/mostPelanggan', [DashboardController::class, 'mostPelanggan']);
    Route::delete('/labelDomain/domainDelete/{domain}/{label}', [LabelDomainController::class, 'domainDelete'])->name('labelDomain.domainDelete');
    Route::post('/inv/pelanggan/store', [InvoiceController::class, 'invoicePelangganStore'])->name('invoicePelangganStore');
    Route::post('/inv/domain/store', [InvoiceController::class, 'invoiceDomainStore'])->name('invoiceDomainStore');
    Route::get('/inv/pelanggan/{pelanggan}', [InvoiceController::class, 'pelangganInvoice'])->name('pelangganInvoice');
    Route::get('/inv/domain/{domain}', [InvoiceController::class, 'domainInvoice'])->name('domainInvoice');
    Route::resource('label', LabelController::class);
    Route::post('/domains/{domain}/storeLabels', [LabelDomainController::class, 'storeLabel'])->name('domains.storeLabel');
    Route::get('/domains/{domain}/edit', [LabelDomainController::class, 'storeEdit'])->name('domains.edit');
    Route::post('/pelanggans/{pelanggan}/storeLabels', [LabelController::class, 'storeLabel'])->name('pelanggans.storeLabel');
    Route::post('/labels/{label}/storeLabels', [LabelController::class, 'labelPelanggan'])->name('labels.labelPelanggan');
    Route::post('/labelsDomain/{label}/storeLabels', [LabelDomainController::class, 'labelDomain'])->name('labels.labelDomain');
    Route::get('/pelanggans/{pelanggan}/edit', [LabelController::class, 'storeEdit'])->name('pelanggans.edit');
    Route::post('/generateArticle/{article}', [ArticleController::class, 'generate'])->name('article.generate');
    Route::get('/show-spintax/{article}', [ArticleController::class, 'generateShow'])->name('article.show');
    Route::get('/edit-spintax/{article}', [ArticleController::class, 'generateEdit'])->name('article.edit');
    Route::put('/update-spintax/{article}', [ArticleController::class, 'generateUpdate'])->name('article.update');
    Route::resource('/articles', ArticleController::class);
    Route::resource('/whatsapp', WhatsappRandomController::class);
    Route::get('/search/domain', [DashboardController::class, 'searchDomain'])->name('searchDomain');
    Route::get('/barchart', [DashboardController::class, 'barChart'])->name('barChart');
    Route::get('/compare/domain/database', [CompareController::class, 'index'])->name('compare.index');
    Route::get('/compare/domain/filter', [CompareController::class, 'filter'])->name('compare.filter');
    Route::post('/compare/upload', [CompareController::class, 'upload'])->name('compare.store');
    Route::post('/filter/post', [CompareController::class, 'filterPost'])->name('compare.filterPost');
    Route::get('/compare/domain/check', [CompareController::class, 'check'])->name('compare.check');
    Route::post('/check/domain/post', [CompareController::class, 'checkPost'])->name('compare.checkPost');
    Route::get('/check/domain/get/{domain}', [CompareController::class, 'checkGet'])->name('compare.checkGet');
    Route::post('/labelDomain/editKeterangan/{domain}/{label}', [LabelDomainController::class, 'editKeterangan'])->name('labelDomain.keterangan');
    Route::get('/vendor/{id}', [VendorController::class, 'show'])->name('vendor.show');
    Route::get('/get/domain/expired', [DomainController::class, 'getExpiredDomain']);
    Route::get('/get/domain/expiredSoon/{range}', [DomainController::class, 'getExpiredSoonDomain']);
    Route::post('/domains/hosting', [DomainController::class, 'filter'])->name('domains.filter');
    Route::post('/pelanggan/hosting', [PelangganController::class, 'filter'])->name('pelanggans.filter');
    Route::post('/pelanggans/domain/{pelanggan}', [PelangganController::class, 'filter'])->name('pelanggan.filter');
    Route::get('/labelDomains/urgent', [LabelDomainController::class, 'urgent'])->name('labelDomain.urgent');
    Route::get('domains/expired', [DomainController::class, 'expired'])->name('domain.expired');
    Route::get('domains/soonExpired', [DomainController::class, 'soonExpired'])->name('domain.soonExpired');
    Route::get('todos/piechart/{user}', [TodoController::class, 'piechart'])->name('todo.piechart');
    Route::get('todos/piechartAll', [TodoController::class, 'getAllPieChart'])->name('todo.allPiechart');
    Route::post('todos/confirm', [TodoController::class, 'todosConfirm'])->name('todos.confirm');
    Route::post('todos/confirm/user/{todotemp}', [TodoController::class, 'todosConfirmUser'])->name('todos.confirmUser');
    Route::get('todos/point', [TodoController::class, 'getPoint'])->name('todos.getPoint');
    Route::get('todos/pointUser/{user}/{start}/{end}', [TodoController::class, 'getPointUser'])->name('todos.getPointUser');
    Route::delete('todos/delete/{todo}', [TodoController::class, 'destroy2']);
    Route::get('todos/calendar', [TodoController::class, 'calendarIndex'])->name('todos.calendar');
    Route::get('todos/get/calendar/{user}', [TodoController::class, 'calendarGet']);
    Route::resource('/notepad', NotepadController::class);
    Route::resource('/cronjob', CronjobController::class);
    Route::put('/users/{user}', [UserController::class, 'updatePassword'])->name('users.passwordUpdate');
    Route::resource('/todoTemp', TodoTempController::class);
    Route::put('todos/point/changepoint', [TodoController::class, 'todosChangePoint']);
});

Route::middleware(['auth', 'support'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('labelDomain', LabelDomainController::class);
    Route::resource('/inv', InvoiceController::class);
    Route::resource('/daftartemplate', TemplateController::class);
    Route::get('/invoice/create', [InvoiceController::class, 'invoiceCreate'])->name('invoice');
    Route::post('/invoice/store', [InvoiceController::class, 'invoiceStore'])->name('invoiceStore');
    Route::get('/todos', [TodoController::class, 'todos'])->name('todos.index');
    Route::get('/todos/containerTodo', [TodoController::class, 'updateContainerTodo']);
    Route::get('/todos/containerDoing', [TodoController::class, 'updateContainerDoing']);
    Route::get('/todos/containerDone', [TodoController::class, 'updateContainerDone']);
    Route::post('/todos/changeNote', [TodoController::class, 'changeNote'])->name('todos.changeNote');
    Route::post('/todos/changeSubject', [TodoController::class, 'changeSubject'])->name('todos.changeSubject');
    Route::post('/todos/changeStatus', [TodoController::class, 'changeStatus'])->name('todos.changeStatus');
    Route::get('/todos/getDone', [TodoController::class, 'getDone'])->name('todo.getDone');
    Route::post('/todos/postDone', [TodoController::class, 'postDone'])->name('todo.postDone');
    Route::get('/todos/allTodo', [TodoController::class, 'allTodo'])->name('todo.allTodo');
    Route::get('/todos/deletedTodo', [TodoController::class, 'deletedTodo'])->name('todo.deletedTodo');
    Route::get('/dashboard/quotes', [DashboardController::class, 'quotes'])->name('quotes');
    Route::post('todos/store', [TodoController::class, 'todosStore'])->name('todos.store');
    Route::resource('youtube', YoutubeController::class);
    Route::delete('todos/destroy/unConfirm/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
    Route::get('/todos/view/report', [TodoController::class, 'viewReport'])->name('todos.viewReport');
    Route::get('todos/pointUsers/{user}/{start}/{end}', [TodoController::class, 'getPointUsers'])->name('todos.getPointUsers');
    Route::post('todos/attachment/{todo}', [FileTodoController::class, 'store'])->name('fileTodo.store');
    Route::get('todos/file/container/{todo}', [FileTodoController::class, 'index'])->name('todos.fileContainer');
    Route::delete('todos/file/{fileTodo}', [FileTodoController::class, 'destroy'])->name('fileTodo.destroy');
    Route::get('todos/file/download/{fileTodo}', [FileTodoController::class, 'download'])->name('fileTodo.download');
});
Route::get('/generate-sitemap', function () {
    SitemapGenerator::create('https://client.webz.biz')->writeToFile(public_path('sitemap.xml'));

    return 'Sitemap generated successfully!';
});
Route::get('/sitemap.xml', function () {
    $sitemapUrl = 'https://client.webz.biz/sitemap.xml';
    $client = new Client();
    $response = $client->get($sitemapUrl);
    $sitemapContent = $response->getBody()->getContents();
    return Response::make($sitemapContent)->header('Content-Type', 'text/xml');
});

require __DIR__ . '/auth.php';
