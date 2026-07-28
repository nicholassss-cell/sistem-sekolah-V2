<?php

namespace App\Http\Controllers\SchoolClass;

use Illuminate\Http\Request;

class IndexController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return "Menampilkan halaman daftar kelas";
    }
}
