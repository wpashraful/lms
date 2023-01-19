<?php

namespace App\Http\Controllers;

use App\Models\Quizz;
use Illuminate\Http\Request;

class QuizzController extends Controller
{

    public function index(){
        return view('quizz.index');
    }

    public function create(){
        return view('quizz.create');
    }

    public function edit(Quizz $quizz){
        return view('quizz.edit', compact('quizz'));
    }

    public function store(Request $request){
        $quizz = Quizz::create([
            'name' => $request->name,
        ]);

        return redirect()->route('quizz.show', $quizz->id);
    }

    public function show(Quizz $quizz){

        return view('quizz.single',[
            'quizz' => $quizz
        ]);
    }

}
