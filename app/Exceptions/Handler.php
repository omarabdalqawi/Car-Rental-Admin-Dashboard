<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\Access\AuthorizationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthorizationException) {

            $routeName = $request->route() ? $request->route()->getName() : 'الصفحة';
            $message = "🚫 ليس لديك صلاحية للوصول إلى " . str_replace('-', ' ', $routeName);

            $notifications = session()->get('notifications', []);

            $notifications[] = [
                'message' => $message,
                'icon' => asset('assets/images/error_403.png'),
                'time' => now()->diffForHumans(),
            ];

            // حفظ المصفوفة في session
            session()->put('notifications', $notifications);

            // إعادة المستخدم للصفحة السابقة
            return redirect()->back();
        }

        return parent::render($request, $exception);
    }
}
