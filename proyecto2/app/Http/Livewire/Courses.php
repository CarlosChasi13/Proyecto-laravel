<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;

class Courses extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.courses.view', [
            'courses' => Course::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->name = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        ]);

        Course::create([ 
			'name' => $this-> name
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Course Successfully created.');
    }

    public function edit($id)
    {
        $record = Course::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Course::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Course Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Course::where('id', $id)->delete();
        }
    }
}