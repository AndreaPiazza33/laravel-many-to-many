<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class PageController extends Controller
{
  public function index()
  {
    $title = "Featured Projects";
    $projects = Project::orderByDesc('created_at')->limit(12)->get();
    return view('guest.home', compact('title','projects'));
  }
  public function all_projects(){
    $title = "All Projects";
    $projects = Project::orderByDesc('created_at')->paginate(10);
    return view('guest.all-projects', compact('title','projects'));
  }

  public function detail_project(int $id)
  {
    $project = Project::findOrFail($id);
    return view('guest.detail-project', compact('project'));
  }
}