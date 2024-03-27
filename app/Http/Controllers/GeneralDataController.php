<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralData;
use App\Helpers\ResponseData;
use Illuminate\Support\Facades\DB;

class GeneralDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "gender" => "required",
            "status" => "required",
            "avg_rating" => "required",
            "attendance" => "required",
        ]);

        GeneralData::create([
            "gender" => $request->gender,
            "status" => $request->status,
            "avg_rating" => $request->avg_rating,
            "attendance" => $request->attendance,
            "survey_id" => $request->survey_id
        ])->save();

        return response("Podaci uneti", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getAllData() {
        $data = DB::table('general_data')
                ->join('surveys', 'survey_id', '=', 'surveys.id')
                ->join('study_programs', 'surveys.study_program_id', '=', 'study_programs.id')
                ->select('general_data.gender as pol', 'general_data.status as status', 'general_data.avg_rating as prosecna_ocena', 'general_data.attendance as prisutnost')
                ->get();

        return response()->json($data);
    }

    public function getReportData(Request $request) {

        $studyProgramId = $request->query('program');
        $studyYear = $request->query('year');


        $data = DB::table('general_data')
        ->join('surveys', 'survey_id', '=', 'surveys.id')
        ->join('study_programs', 'surveys.study_program_id', '=', 'study_programs.id')
        ->select('general_data.gender as pol', 'general_data.status as status', 'general_data.avg_rating as prosecna_ocena', 'general_data.attendance as prisutnost')
        ->where('surveys.study_program_id', '=', $studyProgramId)
        ->where('surveys.year_of_study', '=', $studyYear)
        ->get();

        $responseData = new ResponseData();

        // $responseData->countGenders($data);
        // $responseData->countStudents($data);
        $responseData->countData($data);

        return response()->json($responseData);
    }
}
