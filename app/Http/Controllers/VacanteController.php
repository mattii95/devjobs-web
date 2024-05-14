<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VacanteController extends Controller
{
    public function index() {
        return view('vacantes.index');
    }
    
    public function create() {
        return view('vacantes.create');
    }

    public function edit(Vacante $vacante) {

        Gate::authorize('update', $vacante);

        return view('vacantes.edit', [
            'vacante' => $vacante
        ]);
    }
}
