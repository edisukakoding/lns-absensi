<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmptyWorkHour
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
        $workhours = \App\Models\WorkHour::where('status', 'ACTIVE')->count();
        if ($workhours < 1) {
            return \redirect()->back()->with('error', 'Pengaturan Jam Kerja belum dibuat. silahkan hubungi admin');
        }
        return $next($request);
    }
}
