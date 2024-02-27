<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => [
                'success' => session('success')
            ],
            'role' => [
                'superadministrator' => Auth::check() ? $user->hasRole('superadministrator') : false,
                'user' => Auth::check() ? $user->hasRole('user')  : false,
            ],
            'notification' => [
                'adminNotification' => auth()->user()->unreadNotifications ?? null
            ]
        ];
    }
}
