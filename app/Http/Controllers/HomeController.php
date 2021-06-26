<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Webpage;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MailNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $webpage = DB::table('webpage')->select('id','url','name')->get();
        
        error_reporting(E_ERROR | E_PARSE);

        function get_http_response_code($domain1) {
            $headers = get_headers($domain1);
            return substr($headers[0], 9, 3);
        }

        date_default_timezone_set('America/Sao_Paulo');
        $objects = array();
        $i=0;
        foreach ($webpage as $key => $value){
            $status = get_http_response_code($value->url);
            $moment = date('Y-m-d H:i:s', time());
            $object = (Object)['id'=> $value->id,
                            'url'=> $value->url,
                            'name'=> $value->name,
                            'status'=>$status,
                            'moment'=>$moment
                            ];
            $objects[$i]=$object;
            $i=$i + 1;
        }
        //dd($objects);
        
        $user=Auth::user();
        if($user->email_notifications == 1)
            $user->notify(new MailNotification($objects));

        return view('home')->with('objects',$objects);
    }

    /**
     * Cadastrar um novo site.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cadastro()
    {
        return view('cadastro');
    }

    /**
     * Cadastrar um novo site.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_site(Request $request)
    {
    
        $rules = [
			'url' => 'required|url',
			'name' => 'required|string|min:3|max:255'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('cadastro')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$webpage = new Webpage;
                $webpage->url = $data['url'];
                $webpage->name = $data['name'];
				$webpage->save();
				return redirect('cadastro')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('cadastro')->with('failed',"operation failed");
			}
		}
    }

    public function notificar_usuario(){
        return view('notificacoes');
    }


}