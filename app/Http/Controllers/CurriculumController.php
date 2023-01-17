<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function show($id){

      return view('curricula.single', [
          'curricula_id' => $id
      ]);
    }

    public function edit($id){
        return view('curricula.edit',[
            'curricula_id' => $id
        ]);
    }

    public function destroy($id)
    {

    }
}
