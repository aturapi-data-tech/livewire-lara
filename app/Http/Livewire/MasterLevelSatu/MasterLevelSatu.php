<?php

namespace App\Http\Livewire\MasterLevelSatu;

use Livewire\Component;
use App\Models\Province;
use Livewire\WithPagination;

class MasterLevelSatu extends Component
{
    use WithPagination;

    public $name, $province_id;

    public $isOpen = 0;
    public $tampilIsOpen = 0;

    public $search;

    // $queryString property di gunakan untuk men update url ketika mencari data dan exept '' digunakan ketika data kosong dan url kembali kosong
    protected $queryString = [
        // 'search' => ['except' => ''],

        'search' => ['except' => '', 'as' => 'cariData'],
        'page' => ['except' => 1, 'as' => 'p']
    ];
    // $queryString property di gunakan untuk men update url ketika mencari data dan exept '' digunakan ketika data kosong dan url kembali kosongI

    public $limitPerPage = 5;

    public function updatedsearch(): void
    {
        $this->resetPage();

    }
    public function render()
    {
        return view(
            'livewire.master-level-satu.master-level-satu',
            [
                'provinces' => Province::where('name', 'like', '%' . $this->search . '%')->paginate($this->limitPerPage),
                'myTitle' => 'Master Provinsi',
                'mySnipt' => 'Tambah Data Master Provinsi',
                'myProgram' => 'Provinsi',
                'myLimitPerPages' => [5, 10, 15, 20, 100]
            ]
        );
    }

    public function changeLimitPerPage($value)
    {

        $this->limitPerPage = $value;

    }


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

    public function openModalTampil()
    {

        $this->tampilIsOpen = true;

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

    public function closeModalTampil()
    {

        $this->tampilIsOpen = false;

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    private function resetInputFields()
    {

        $this->name = '';

        $this->province_id = '';

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function store()
    {

        $this->validate([

            'name' => 'required',

        ]);



        province::updateOrCreate(['id' => $this->province_id], [

            'name' => $this->name,

        ]);



        session()->flash(
            'message',

            $this->province_id ? 'province Updated Successfully.' : 'province Created Successfully.'
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

        $province = province::findOrFail($id);

        $this->province_id = $id;

        $this->name = $province->name;


        $this->openModal();

    }

    public function tampil($id)
    {

        $province = province::findOrFail($id);

        $this->province_id = $id;

        $this->name = $province->name;


        $this->openModalTampil();

    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function delete($id)
    {

        province::find($id)->delete();

        session()->flash('message', 'province Deleted Successfully.');

    }



    // Blm dipake
    public function paginationView()
    {
        return 'vendor.livewire.tailwind';
    }
}