<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\FakeDB;

class BooksController extends Controller
{
    public function getMany()
    {
        $db     = new fakeDB();
        $data   = $db->books();
        $result = [];

        foreach ($data as $key => $value) {
            $model = 'App\Http\Models\Book'.$value['type'];
            $model = new $model;
            
            $model->set($data[$key]);

            array_push($result, $model->output());
        }

        return $result; 
    }

    public function getOne(Request $request, $id)
    {
        $db     = new fakeDB();
        $result = [];

        $data = $db->books();
        $data = $data[array_search($id, array_column($data, 'isbn'))];
        //$model = 'App\Http\Models\Book'.$data['type'];
        //$model = new $model;

        //$model->set($data);

        return $data;
    }

    public function csv()
    {
        $request = new Request;

        $csv = array_map('str_getcsv', file('data.csv'));
    }

    public function create()
    {
        return; // TODO
    }
}
?>