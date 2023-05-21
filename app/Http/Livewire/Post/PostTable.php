<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

use App\Models\Post;

use Livewire\WithPagination;

class PostTable extends Component
{

    use WithPagination;

    public $title, $body, $post_id;

    public $isOpen = 0;

    public $search;

    // protected $queryString = ['search'];

    public $limitPerPage = 5;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function render()
    {

        return view('livewire.post.post-table',
    [
    'posts'=> Post::where('title', 'like', '%'.$this->search.'%')->paginate($this->limitPerPage),
    'myTitle'=>'Master Post',
    'mySnipt'=>'Tambah Data Master Post',
    'myProgram'=>'Post',
    'myLimitPerPages'=>[5,10,15,20,100]
    ]);

    }


    public function changeLimitPerPage($Change)
    {

    $this->limitPerPage=$Change;

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function create()
    {

        $this->resetInputFields();

        $this->openModal();

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function openModal()
    {

        $this->isOpen = true;

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function closeModal()
    {

        $this->isOpen = false;

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    private function resetInputFields()
    {

        $this->title = '';

        $this->body = '';

        $this->post_id = '';

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function store()
    {

        $this->validate([

            'title' => 'required',

            'body' => 'required',

        ]);



        Post::updateOrCreate(['id' => $this->post_id], [

            'title' => $this->title,

            'body' => $this->body

        ]);



        session()->flash(
            'message',

            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.'
        );



        $this->closeModal();

        $this->resetInputFields();

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function edit($id)
    {

        $post = Post::findOrFail($id);

        $this->post_id = $id;

        $this->title = $post->title;

        $this->body = $post->body;



        $this->openModal();

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function delete($id)
    {

        Post::find($id)->delete();

        session()->flash('message', 'Post Deleted Successfully.');

    }

}
