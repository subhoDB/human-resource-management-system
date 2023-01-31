<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SkillsMaster;
use DataTables;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // select('*')->
            $data = SkillsMaster::get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="#edit-employee" class="item padding-left-custom" title="Edit Skills">
                        <i class="fas fa-user-edit" style="padding: 0 4px;"></i>
                    </a>
                    <a href="#delete-employee" class="item padding-left-custom delete-student" title="Delete Skills" onclick="return confirm(\'Are you sure to remove this employee ?\')">
                        <i class="fas fa-trash-alt" style="color: red;"></i>
                    </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.skills.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skills.add');
        // dd('Upcomming...');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:skills_masters,skill_name',
            // 'employee_id' => 'required|unique:employee_masters,employee_id',
        ]);
        
        dd($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
