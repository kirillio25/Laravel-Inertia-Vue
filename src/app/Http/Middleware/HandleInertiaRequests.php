<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    // Делиться данными через {{ $page.props.auth }}
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
//            'auth' => 'Kirilll' ?? null,

            'auth.user' => fn () => $request->user()
                ? $request->user()->only('id', 'name', 'avatar')
                : null,

            'flash' => [
                'greet' => fn () => $request->session()->get('greet')
            ],
        ];
    }
}
