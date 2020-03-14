<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\ValidationException;

use App\nik; //model nik
use DB;

class SearchController extends Controller
{
    public function findNik(Request $request, $kolom, $keyword) {
    	if (!$request->ajax()) {
    		return null;
    	}

    	if ($kolom == 'cari') {
			$user = DB::table('nik_master')
                    ->select('nik', 'no_ktp', 'no_paspor', 'nama_lengkap','jenis_kelamin')
					->where('nik', $keyword)
                    ->first();

	        if ($user !== null) {
	            return response()->json([
	                'nik' => $user->nik,
	                'ktp' => $user->no_ktp,
					'paspor' => $user->no_paspor,
                    'nama' => $user->nama_lengkap,
                    'kelamin' => $user->jenis_kelamin
	            ]);
	        }	
    	} elseif ($kolom == 'cari') {
    		$user = nik::find($keyword);
	        if ($user !== null) {
	            return response()->json([
	                'nik' => $user->nik,
	                'ktp' => $user->no_ktp,
					'paspor' => $user->no_paspor,
                    'nama' => $user->nama_lengkap,
                    'kelamin' => $user->jenis_kelamin
	            ]);
	        }	
    	}

    	return null;
    }
}
