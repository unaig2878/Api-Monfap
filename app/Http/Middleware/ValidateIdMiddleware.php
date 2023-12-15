<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


class ValidateIdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $id = $request->route('id');

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'El ID debe ser un número entero positivo.'], 400);
        }

        return $next($request);
    }
}
