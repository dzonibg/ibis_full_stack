<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{

    function index()
    {
        return view('dashboard');
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('contracts')
                ->where('contract_id', 'LIKE', "%{$query}%")
                ->get();
            $output = '';
            foreach($data as $row)
            {
                $output .= '<a class="dropdown-item" id="contractl" href="#">'.$row->contract_id.'</a>';
            }
            echo $output;
        }
    }

    public function getmac(Request $request) {
        $contract_id = $request->get('contract_id');
        $data = DB::table('contracts')->where('contract_id', $contract_id)->first();
        echo $data->mac;
    }

    public function fetchContract(Request $request) {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('contracts')
                ->where('mac', 'LIKE', "%{$query}%")
                ->get();
            $output = '';
            foreach($data as $row)
            {
                $output .= '<a class="dropdown-item" id="macl" href="#">'.$row->mac.'</a>';
            }
            echo $output;
        }

    }

    public function getContract(Request $request) {
        $contract_id = $request->get('mac');
        $data = DB::table('contracts')->where('mac', $contract_id)->first();
        echo $data->contract_id;
    }

}
