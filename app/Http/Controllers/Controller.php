<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * ./sqlmap.py -u http://localhost:8000/sql-injection\?sort\=name --dbms=mysql --current-db --current-user --users
     */
    public function sqlInjection(Request $request)
    {
        $order= $request->input('sort', 'id');
//        $users = User::all();
        $users = DB::select("select * from users order by $order desc");

        return response()->json($users);
    }
}
