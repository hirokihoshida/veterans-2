<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Client;

class DBController extends Controller
{
    public function getClientList() {
        $clientlist = DB::select('select * from client');
        $columnNames = DB::select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'client';");
        unset($columnNames[0]);
        unset($columnNames[1]);
        unset($columnNames[2]);

        return view('clientlist', ['clientlist' => $clientlist, 'columns' => $columnNames]);
    }

    public function getClientNotifications($sortby = null) {
        $query = "select c.last_name, c.first_name, v.date, v.comments, v.count, v.daysSinceLastVisit from 

client c left join 

(select c.id, v.date, v.comments, count(*) as count, datediff(current_date(), v.date) as daysSinceLastVisit
from client c 
inner join visit v on v.client_id = c.id 
group by c.id) as v

on c.id = v.id
 
order by ";
        if ($sortby == null) {
            $query = $query . "v.date desc";
        } else if ($sortby == 1) {
            $query = $query . "v.date";
        } else if ($sortby == 2) {
            $query = $query . "c.last_name";
        } else if ($sortby == 3) {
            $query = $query . "c.last_name desc";
        } else if ($sortby == 4) {
            $query = $query . "c.first_name";
        } else if ($sortby == 5) {
            $query = $query . "c.first_name desc";
        } else if ($sortby == 6) {
            $query = $query . "v.count desc";
        } else if ($sortby == 7) {
            $query = $query . "v.count";
        } else if ($sortby == 8) {
            $query = $query . "v.daysSinceLastVisit desc";
        } else if ($sortby == 9) {
            $query = $query . "v.daysSinceLastVisit";
        }

        // take most recent visit from each client
        $clientlist = DB::select($query);
        return view('notifications', ['clientlist' => $clientlist, 'sortby' => $sortby]);
    }

    public function addNewClient(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'integer'
        ]);

        $client = new Client;
        $client->last_name = $request->last_name;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->age = $request->age;
        $client->disability_status = $request->disability_status;
        $client->senior_citizenship_status = $request->senior_citizenship_status;
        $client->phone_number = $request->phone_number;
        $client->DD214 = $request->DD214;
        $client->valid_id_status = $request->valid_id_status;
        $client->income_level = $request->income_level;
        $client->benefits = $request->benefits;
        $client->residence = $request->residence;
        $client->drivers_license_status = $request->drivers_license_status;
        $client->employment_status = $request->employment_status;
        $client->background = $request->background;
        $client->comments = $request->comments;

        $client->save();

        return view('addclient', ['added' => True]);
    }
}
