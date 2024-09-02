<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DataController extends Controller
{
    public function index()
    {
        if (!Auth::user())
        {
            return back();
        }

        return view('data.index');
    }

    public function exportDb()
    {
        if (!Auth::user())
        {
            return view('login');
        }

        if (!Gate::allows('access-data')) {
            abort(403);
        }

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $database = '#db_name#';
        $user = '#db_user#';
        $pass = '#db_pw#';
        $host = '#db_host#';
        $file_path = '/Exports/db.sql';
        $server_path = dirname(dirname(dirname(__FILE__))) . $file_path;

        exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$server_path} 2>&1", $output);

        header('Content-disposition: attachment; filename=db.sql');
        header('Content-type: application/sql');
        readfile($server_path);
        unlink($server_path);

        return back();
    }
}
