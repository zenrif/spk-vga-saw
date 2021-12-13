<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\VGA;

class PrintController extends Controller
{

    public function index()
    {
        // return $_POST;
        $max = [
            'memori' => VGA::max('memori'),
            'core_clock' => VGA::max('core_clock'),
            'memory_clock' => VGA::max('memory_clock'),
        ];

        $min = [
            'harga' => VGA::min('harga'),
            'daya' => VGA::min('daya')
        ];

        $pdf = PDF::loadview(
            '/hasil/perangkingan',
            [
                'bobot' => $_POST,
                'data_vga' => VGA::get(),
                'maks' => $max,
                'min' => $min
            ]
        )->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
