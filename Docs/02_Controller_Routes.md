# Controller & Routes

- php artisan make:controller API/UserController --api
- php artisan make:controller API/MedicineController --api
- php artisan make:controller API/SupplierController --api
- php artisan make:controller API/PurchaseController --api
- php artisan make:controller API/SaleController --api
- php artisan make:controller API/PrescriptionController --api
- php artisan make:controller API/AlertController --api

# API Routes Routes
```
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\SupplierController;
use App\Http\Controllers\API\PurchaseController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\PrescriptionController;
use App\Http\Controllers\API\AlertController;

Route::apiResource('users', UserController::class);
Route::apiResource('medicines', MedicineController::class);
Route::apiResource('suppliers', SupplierController::class);
Route::apiResource('purchases', PurchaseController::class);
Route::apiResource('sales', SaleController::class);
Route::apiResource('prescriptions', PrescriptionController::class);
Route::apiResource('alerts', AlertController::class);
```
