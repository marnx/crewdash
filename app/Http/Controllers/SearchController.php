<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;

class SearchController extends Controller
{
    public function search()
    {
        $keyword = Input::get('keyword', '');
        $users = new User;

        $queries =[];

        $columns = [
            'employeenumber',
            'firstname',
            'surname',
            'email',
            'vessel'
        ];

        $users =  $users->SearchByKeyword($keyword);
        $queries['keyword'] = request('keyword');
        foreach ($columns as $column) {
            if (request()->has($column)) {
                $users = $users->orderBy($column, request($column));
                $queries[$column] = request($column);
            }
        }


        $users = $users->paginate(25)->appends($queries);

        return view('search', compact('users'));

        /*
        $keyword = Input::get('keyword', '');
        $users = User::SearchByKeyword($keyword)->get();
        return view('search', compact('users'));
        */
    }
}
