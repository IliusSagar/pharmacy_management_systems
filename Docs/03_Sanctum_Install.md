# Sanctum Install
```
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```
# Configure 

## bootstrap/app.php
```
 api: __DIR__.'/../routes/api.php',
```

## app/Models/User.php
```
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
}
```

## routes/api.php
```
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('medicines', MedicineController::class);
    Route::apiResource('suppliers', SupplierController::class);
    Route::apiResource('purchases', PurchaseController::class);
    Route::apiResource('sales', SaleController::class);
    Route::apiResource('prescriptions', PrescriptionController::class);
    Route::apiResource('alerts', AlertController::class);
});

// Public login route
Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('register', [\App\Http\Controllers\API\AuthController::class, 'register']);
```

## Create AuthController
```
php artisan make:controller API/AuthController
```

## Example code:
```
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6',
            'role'=>'required|in:Admin,Pharmacist'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['user'=>$user, 'token'=>$token], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message'=>'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['user'=>$user, 'token'=>$token]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message'=>'Logged out']);
    }
}
```

