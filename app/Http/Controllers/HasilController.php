<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VGA;

class HasilController extends Controller
{
    public function index()
    {
        return view('hasil/index');
    }

    public function hasil()
    {
        $max = [
            'memori' => VGA::max('memori'),
            'core_clock' => VGA::max('core_clock'),
            'memory_clock' => VGA::max('memory_clock'),
        ];

        $min = [
            'harga' => VGA::min('harga'),
            'daya' => VGA::min('daya')
        ];
        // return [$_POST, $max, $min];
        return view(
            'hasil/perangkingan',
            [
                'bobot' => $_POST,
                'data_vga' => VGA::get(),
                'maks' => $max,
                'min' => $min
            ]
        );
    }
}
