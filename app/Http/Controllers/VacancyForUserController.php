<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacancyForUserController extends Controller
{
    const ITEMS_PER_PAGE = 6;

    public function index()
    {
        $vacancies = DB::table('vacancies')->latest('updated_at')->paginate(self::ITEMS_PER_PAGE);

        return view('vacancies.index_for_user', compact('vacancies'));
    }

    public function show_vacancy($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->views += 1;
        $vacancy->save();
        return view('vacancies.show_for_user', compact('vacancy'));
    }
}
