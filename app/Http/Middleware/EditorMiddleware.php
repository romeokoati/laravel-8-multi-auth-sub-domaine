<?php

namespace App\Http\Middleware;

use App\Models\Editor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('editor')->check() && (Auth::guard('editor')->user() instanceof Editor)) {
            return $next($request);
        }
        return redirect(route('editor.login'))->with('error','You have not editor access');

    }
}
