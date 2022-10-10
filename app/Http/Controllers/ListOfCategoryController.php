<?php

namespace App\Http\Controllers;

use App\Models\ListOfCategory;
use Illuminate\Http\Request;

class ListOfCategoryController extends Controller
{
    /**
     * home page of category
     * 
     * @return void
     */
    public function index()
    {
        $categories = ListOfCategory::all();
        return view('pages.category', compact('categories'));
    }

    /**
     * store category in DB
     */
    // request = recupère les données enregistrer (quand tu appuies sur enregistrer)
    public function store(Request $request) 
    {
        // 1- valide mon formulaire
        // dd($request->all());
        $request->validate([
            'category' => 'required|string|max:20|min:3'
            // required = tu exiges que ce soit un string etc...
        ]);

        // 2- stock les valeurs du form dna sun variable
        // 2- stock form's values in variable
        $data = [
            'category' => $request->category,
            'created_at' => now()
        ];
        
        // 3- J'envoie dans la DB en utilisant le model de la DB avec la methode create
        // 3- Send in DB with model of DB + create() methode
        ListOfCategory::create($data);

        // 4- redirect
        return back()->with('status', 'category added');
    }

    /**
     * delete category
     *
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        $category = ListOfCategory::find($id);
        if(!$category){
            abort(404);
        };
        
        $category->delete();
        return back()->with('status', "la catégorie a bien été supprimé");

    }

    /**
     * Send the view to edit form with the good category
     *
     * @param [int] $id
     * @return void
     */
    public function edit($id)
    {
        $category = ListOfCategory::find($id);
        return view('pages.update-category', compact('category'));
    }

    /**
     * update the current category and store in DB
     *
     * @param Request $request
     * @param [int] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        // On récupère l'id
        $category = ListOfCategory::find($id);
        // 1- valide mon formulaire
        // dd($request->all());
        $request->validate([
            'category' => 'required|string|max:20|min:3'
            // required = tu exiges que ce soit un string etc...
        ]);


    }
}
