<?php

namespace App\Http\Controllers;

use App\Models\Portofilo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class PortofiloController extends Controller
{
    public function single(Portofilo $portofilo, Request $r)
    {
        if (RateLimiter::remaining($r->ip(), $perMinute = 1)) {
            RateLimiter::hit($r->ip());
            // dd($r->ip());
            $portofilo->update(['views' => $portofilo->views + 1]);
        }
        return view('portofilo.single', compact('portofilo'));
    }
}
