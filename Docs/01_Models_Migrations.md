# Models & Migrations

- php artisan make:model User -m
- php artisan make:model Medicine -m
- php artisan make:model Supplier -m
- php artisan make:model Purchase -m
- php artisan make:model Sale -m
- php artisan make:model Prescription -m
- php artisan make:model Alert -m
-----
- php artisan make:seeder UserSeeder
- php artisan make:seeder MedicineSeeder
- php artisan db:seed
------
php artisan tinker
>>> App\Models\User::create(['name'=>'Test','email'=>'test@pharma.com','password'=>bcrypt('123'),'role'=>'Pharmacist']);

