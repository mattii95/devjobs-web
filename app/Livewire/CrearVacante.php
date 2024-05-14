<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $title;
    public $salario;
    public $category;
    public $empresa;
    public $ultimo_dia;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salario' => 'required',
        'category' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024',
    ];

    public function crearVacante() {
        $datos = $this->validate();

        // almacenar la imagen
        $pathImage = $this->image->store('public/vacantes');
        $datos['image'] = str_replace('public/vacantes/', '', $pathImage);

        // crear la vacante
        Vacante::create([
            'title' => $datos['title'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['category'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'description' => $datos['description'],
            'image' => $datos['image'],
            'user_id' => auth()->user()->id,
        ]);


        // crear un mensaje
        session()->flash('mensaje', 'La vacante se publico correctamente');


        // redireccionar al usuario
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        // consultar db
        $salarios = Salario::all();
        $categorias = Categoria::all();


        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
