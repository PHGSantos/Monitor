<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Webpage;

class WebpageController extends Controller
{
    public function editar($id){
        $registro = Webpage::find($id);
        return view('edit', compact('registro'));
    }

    public function atualizar(Request $req, $id){
        $dados = $req->all();
        try{
        Webpage::find($id)->update($dados);
        return redirect('edit_site/'.$id)->with('status', "Updated successfully");
        }catch(Exception $e){
            return redirect('edit_site/'.$id)->with('failed',"operation failed");
        }
        //return redirect('cadastro')->with('status',"Insert successfully");
    }

    public function deletar($id){
        Webpage::find($id)->delete();
        return redirect()->route('home');
    }
}
