# Laravel Multiple Authentication System
Development Stack: Laravel, MySQL, Bootstrap, jQuery.
Users: Admin and User
Guard Login System
## Files for admin email sending:
1. `illuminate\auth\passwords\CanResetPassword.php`
2. `illuminate\auth\notifications\ResetPassword.php`
3. `app\models\Admin.php`


## Admin auth routes:
```bash
Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home');
Route::get('admin', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin', [LoginController::class, 'login']);
Route::get('admin/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('admin.password.confirm');
Route::post('admin/password/confirm', [ConfirmPasswordController::class, 'confirm']);
Route::post('admin/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin/password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
Route::get('admin/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
```
