<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function editar($id){
        $registro = User::find($id);
        return view('', compact('registro'));
    }

    public function atualizar(Request $req, $id){
        $dados = $req->all();
        try{
        User::find($id)->update($dados);
        return redirect('edit_site/'.$id)->with('status', "Updated successfully");
        }catch(Exception $e){
            return redirect('edit_site/'.$id)->with('failed',"operation failed");
        }
        //return redirect('cadastro')->with('status',"Insert successfully");
    }

    public function notify_user(Request $req){
        $id = Auth::id();
        $user = Auth::user();
        if($user){
            try{
                $user->email_notifications = $req->notification;
                $user->save();
                return redirect('notificacoes')->with('status',"Configurações de notificão alteradas");
            }
            catch(Exception $e){
                return redirect('notificacoes')->with('failed',"operation failed");
            }
        }
        return redirect('notificaoes')->with('failed',"operation failed");
    }
}
