<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;
    public $sort='id';
    public $direction='asc';

    public function updatingSearch(){//Se activa cuando el valor de seach cambia
        //Tenemos que resetear la paginación
        $this->resetPage();
    }

    public function render()
    {
        //$posts=Post::where('user_id',auth()->user()->id)->latest('id')->paginate(5);
        $posts=Post::where('name','like','%'.$this->search.'%')
        ->orderBy($this->sort,$this->direction)->latest('id')
        ->paginate(10);
        return view('livewire.admin.posts-index',compact('posts'));
    }

    public function order($sort){
        if ($this->sort==$sort) {
            if ($this->direction=='asc') {
                $this->direction='desc';
            }else{
                $this->direction='asc';
            }
        } else {
            $this->sort=$sort;
            $this->direction="asc";
        }
    }

}
