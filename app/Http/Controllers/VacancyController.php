<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacancyController extends Controller
{
    const ITEMS_PER_PAGE = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->addToIndex();
        $vacancies = DB::table('vacancies')->latest()->paginate(self::ITEMS_PER_PAGE);
        return view('vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancies.create');
    }


//    private function addToIndex()
//    {
//        Vacancy::createIndex($shards = null, $replicas = null);
//        Vacancy::putMapping($ignoreConflicts = true);
//        Vacancy::addAllToIndex();
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:100',
            'description'=> 'required'
        ]);
        //Vacancy::create($request->all());
        //$this->addToIndex();
        $vacancy = new Vacancy([
            'title' => $request->get('title'),
            'description'=> $request->get('description')
        ]);
        $vacancy->save();
        $vacancy->addToIndex();
        return redirect('admin/vacancies')->with('success', 'Вакансия добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = Vacancy::find($id);

        return view('vacancies.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = Vacancy::find($id);

        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|max:100',
            'description'=> 'required'
        ]);

        $vacancy = Vacancy::find($id);
        //$vacancy->update($request->all());
//        $this->addToIndex();
        $vacancy->title = $request->get('title');
        $vacancy->description = $request->get('description');
        $vacancy->save();
        $vacancy->addToIndex();
        return redirect('admin/vacancies')->with('success', 'Вакансия обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::find($id);
        $title = $vacancy->title;
        $vacancy->delete();

        return redirect('admin/vacancies')->with('success', "Вакансия {$title} была удалена");
    }
}
