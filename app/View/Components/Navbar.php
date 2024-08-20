<?php

namespace App\View\Components;

use App\Models\Penilaian;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
    //     public string $modal
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = Penilaian::where('pengguna_id', auth()->user()->id)->where('status_penilaian_id', 2)->with(['Seminars' => function($query) {
            $query->select(['id','pengguna_id'])->with(['Penggunas' => function($query) {
                $query->select(['id', 'nama']);
            }]);
        }])->get()->toArray();
        return view('components.navbar' , compact('data'));
    }
}
