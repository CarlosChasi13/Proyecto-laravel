<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sede;

class Sedes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $telefono, $email, $direccion, $ciudad, $id_provincia, $id_pais, $maps_url;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.sedes.view', [
            'sedes' => Sede::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('ciudad', 'LIKE', $keyWord)
						->orWhere('id_provincia', 'LIKE', $keyWord)
						->orWhere('id_pais', 'LIKE', $keyWord)
						->orWhere('maps_url', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->telefono = null;
		$this->email = null;
		$this->direccion = null;
		$this->ciudad = null;
		$this->id_provincia = null;
		$this->id_pais = null;
		$this->maps_url = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'direccion' => 'required',
		'ciudad' => 'required',
		'id_provincia' => 'required',
		'id_pais' => 'required',
		'maps_url' => 'required',
        ]);

        Sede::create([ 
			'nombre' => $this-> nombre,
			'telefono' => $this-> telefono,
			'email' => $this-> email,
			'direccion' => $this-> direccion,
			'ciudad' => $this-> ciudad,
			'id_provincia' => $this-> id_provincia,
			'id_pais' => $this-> id_pais,
			'maps_url' => $this-> maps_url
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Sede Successfully created.');
    }

    public function edit($id)
    {
        $record = Sede::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->telefono = $record-> telefono;
		$this->email = $record-> email;
		$this->direccion = $record-> direccion;
		$this->ciudad = $record-> ciudad;
		$this->id_provincia = $record-> id_provincia;
		$this->id_pais = $record-> id_pais;
		$this->maps_url = $record-> maps_url;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'direccion' => 'required',
		'ciudad' => 'required',
		'id_provincia' => 'required',
		'id_pais' => 'required',
		'maps_url' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Sede::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'telefono' => $this-> telefono,
			'email' => $this-> email,
			'direccion' => $this-> direccion,
			'ciudad' => $this-> ciudad,
			'id_provincia' => $this-> id_provincia,
			'id_pais' => $this-> id_pais,
			'maps_url' => $this-> maps_url
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Sede Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Sede::where('id', $id)->delete();
        }
    }
}