<?php

namespace App\Http\Controllers;

use App\Pets;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; 
use App\Vaccino;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pets::orderBy('created_at', 'desc')->get();
        return view('pets.index', compact('pets')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vaccini = Vaccino::all(); //richiamo il modello con tutte cose 

        return view('pets.create', compact('vaccini'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        // validation
        $request->validate($this->Supervalidation());
        // SLUG
        $data['slug'] = Str::slug($data['nome'], '-');
        //immagine 
        // è presente ?
        if(!empty($data['img'])) {
            $data['img'] = Storage::disk('public')->put('images', $data['img']);
        }

            // salvataggio nel db
            $newpuppy = new Pets();
            $newpuppy->fill($data); //richiede fillable nel model
            //salvataggio
            $saved = $newpuppy->save();

            if($saved) {
                if (!empty($data['vaccini'])) {
                    $newpuppy->vaccinos()->attach($data['vaccini']);
                }
                return redirect(route('pets.index'));
            } else {
                return redirect(route('homepage'));
            }



        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pet = Pets::where('slug', $slug)->first();
        return view('pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pet = Pets::where('slug', $slug)->first();
        return view('pets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get data
        $data = $request->all();
        //validazione
        $request->validate($this->Supervalidation());
        //get post
        $post = Pets::find($id);
        //slug
        $data['slug'] = Str::slug($data['nome'], '-');
        //img if change
        if(!empty($data['img'])) {
            if (!empty($pet->img)) {
                Storage::disk('public')->delete($pet->img);
            }
            $data['img'] = Storage::disk('public')->put('image', $data['img']);
        }
        $updateted = $pet->update($data);
        


        }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function Supervalidation() {

        return [
            'nome' => 'required',
            'razza' => 'required',
            'dettagli' => 'required',
            'img' => 'image'
        ];
      }
}
