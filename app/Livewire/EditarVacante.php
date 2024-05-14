<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{

    public $vacante_id;
    public $title;
    public $salario;
    public $category;
    public $empresa;
    public $ultimo_dia;
    public $description;
    public $image;
    public $new_image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salario' => 'required',
        'category' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:1024'
    ];


    public function mount(Vacante $vacante) {
        $this->vacante_id = $vacante->id;
        $this->title = $vacante->title;
        $this->salario = $vacante->salario_id;
        $this->category = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->description = $vacante->description;
        $this->image = $vacante->image;
    }


    public function editarVacante() {
        $datos = $this->validate();

        // Revisar si hay nueva imagen
        if ($this->new_image) {
            $pathImage = $this->new_image->store('public/vacantes');
            $datos['image'] = str_replace('public/vacantes/', '', $pathImage);
        }

        // Encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        // Asignar los valores
        $vacante->title = $datos['title'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['category'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->description = $datos['description'];
        $vacante->image = $datos['image'] ?? $vacante->image;

        // Guardar la vacante
        $vacante->save();

        // Redireccionar
        session()->flash('mensaje', 'La vacante se actualizo correctamente');
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        // consultar db
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
