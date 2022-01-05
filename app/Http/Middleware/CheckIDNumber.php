<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIDNumber
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
        if($request->has('nik')) {
            $employee = \App\Models\Employee::where('nik', $request->nik);
            if($employee->count() > 0) {
                $request->employee_id = $employee->first()->id;
                return $next($request);
            }
        }
        
        return abort(403);
    }
}
