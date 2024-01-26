<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){
        if($request->query('category')){
            $projects = Project::where('category_id', $request->query('category'))->paginate(2);
        }else{
            $projects = Project::paginate(2);
        } 
        return response()->json(
            [
                'success' => true,
                'projects' => $projects
            ]
        );
    }
    public function show($slug){
        $project = Project::where('slug',$slug)->with(['category','technologies'])->first();
        return response()->json([
            'success'=>true,
            'project' => $project
        ]);
    }
}
