<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
    	return view('backend.categories.index');
    }

    public function getData(Request $request){
        $has_view = false;
        $has_delete = false;
        $has_edit = false;
        $categories = "";


        if (request('show_deleted') == 1) {
            if (!Gate::allows('category_delete')) {
                return abort(401);
            }
            $categories = Category::onlyTrashed()->orderBy('created_at', 'desc')->get();
        } else {
            $categories = Category::orderBy('created_at', 'desc')->get();
        }

        if (auth()->user()->can('category_view')) {
            $has_view = true;
        }
        if (auth()->user()->can('category_edit')) {
            $has_edit = true;
        }
        if (auth()->user()->can('category_delete')) {
            $has_delete = true;
        }

        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('actions', function ($q) use ($has_view, $has_edit, $has_delete, $request) {
                $view = "";
                $edit = "";
                $delete = "";
                $allow_delete = false;

                if ($request->show_deleted == 1) {
                    return view('backend.datatable.action-trashed')->with(['route_label' => 'admin.categories', 'label' => 'category', 'value' => $q->id]);
                }
//                if ($has_view) {
//                    $view = view('backend.datatable.action-view')
//                        ->with(['route' => route('admin.categories.show', ['category' => $q->id])])->render();
//                }
                if ($has_edit) {
                    $edit = view('backend.datatable.action-edit')
                        ->with(['route' => route('admin.categories.edit', ['category' => $q->id])])
                        ->render();
                    $view .= $edit;
                }

                if ($has_delete) {
                    // // $data = $q->courses->count() + $q->blogs->count();
                    // if($data == 0){
                    //     $allow_delete = true;
                    // }
                    $delete = view('backend.datatable.action-delete')
                        ->with(['route' => route('admin.categories.destroy', ['category' => $q->id])])
                        ->render();
                    $view .= $delete;
                }


                return $view;

            })
            ->editColumn('icon', function ($q) {
                if ($q->icon != "") {
                    return '<i style="font-size:40px;" class="'.$q->icon.'"></i>';
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('status', function ($q) {
                return ($q->status == 1) ? "Enabled" : "Disabled";
            })
            ->rawColumns(['actions', 'icon'])
            ->make();
    }
    public function create()
    {
    	if(!Gate::allows('category_create')){
    		return abort(401);
    	}
    	return view('backend.categories.create');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required|unique:categories'
    	]);

    	if(!Gate::allows('category_create')){
    		return abort(401);
    	}

    	$data['name'] = $request->name;
    	$data['icon'] = $request->icon;
    	
        Category::create($data);

        return redirect()->route('admin.categories.index')->withFlashSuccess(trans('alerts.backend.general.created'));
    }

    public function edit($id)
    {
        if (!Gate::allows('category_edit')) {
            return abort(401);
        }
        // // $courses = \App\Models\Course::ofTeacher()->get();
        // // $courses_ids = $courses->pluck('id');
        // // $courses = $courses->pluck('title', 'id')->prepend('Please select', '');
        // // $lessons = \App\Models\Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');

        $category = Category::findOrFail($id);

        return view('backend.categories.edit', compact('category'));
    }

     public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        if (!Gate::allows('category_edit')) {
            return abort(401);
        }

        $data['name'] = $request->name;
        $data['icon'] = $request->icon;
        
        Category::findOrFail($id)->update($data);
        
        return redirect()->route('admin.categories.index')->withFlashSuccess(trans('alerts.backend.general.updated'));
    }

    public function show($id)
    {
        if (!Gate::allows('category_view')) {
            return abort(401);
        }
        $category = Category::findOrFail($id);

        return view('backend.categories.show', compact('category'));
    }


    /**
     * Remove Category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('category_delete')) {
            return abort(401);
        }
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->withFlashSuccess(trans('alerts.backend.general.deleted'));
    }

    /**
     * Delete all selected Category at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('category_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Category::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('category_delete')) {
            return abort(401);
        }
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('admin.categories.index')->withFlashSuccess(trans('alerts.backend.general.restored'));
    }

    /**
     * Permanently delete Category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('category_delete')) {
            return abort(401);
        }
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        return redirect()->route('admin.categories.index')->withFlashSuccess(trans('alerts.backend.general.deleted'));
    }
}
