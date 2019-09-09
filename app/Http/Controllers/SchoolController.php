<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use App\Repositories\School\SchoolRepositoryInterface;

class SchoolController extends Controller
{
    protected $school;

    /**
     * Class constructor.
     */
    public function __construct(SchoolRepositoryInterface $school)
    {
        $this->school = $school;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return $this->school->withTeachers()->get();
        }

        return view('school.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return $this->school->findOneOrFail($school->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }

    public function main(Request $request, School $school)
    {
        $sch = $this->school->findOneWithAll($school->id);
        if ($request->expectsJson()) {
            return $sch;
        }
        return view('school.main', compact('sch'));
    }
}
