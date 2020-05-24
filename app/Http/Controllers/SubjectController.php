<?php

namespace App\Http\Controllers;

use App\Level;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        foreach($subjects as $subject){
            $subject->level = $subject->level;
        }
        return $subjects;
    }

    public function store(Request $request)
    {
        // return $request->all();
        $new_record = Subject::create([
            'level_id' => $request->level_id,
            'subject' => $request->subject
        ]);

        $new_record->level = Level::where('id',$new_record->level_id)->first();
        return response()->json([
               'response_status'=>true,
               'message' => 'record has been created',
               'new_record' => $new_record
           ]);

    }

    public function update(Request $request, $id)
    {
        $updated_record = Subject::where('id',$id)
        ->update([
        'level_id' => $request->level_id,
        'subject' => $request->subject
        ]);

        $level = Subject::find($id);
        $level->level = $level->level;

        return response()->json([
        'response_status'=>true,
        'message' => 'record has been updated',
        'updated_record' => $level
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (Subject::find($id)->delete()) 
        ? [ 'response_status' => true,  'message' => 'record has been deleted' ] 
        : [ 'response_status' => false, 'message' => 'record cannot delete' ];
    }
}
