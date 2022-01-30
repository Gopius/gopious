<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function classes(Request $request)
    {
        $data['view'] = 'classes';
        $data['header'] = 'class';
        $data['class'] = 'active';
        return view('organization.dashboard',  $data);
    }
    function showClass($class)
    {
        $category = Category::where("cat_id", $class)->first();
        return view('organization.content.showClass', compact('category'));
    }
    function deleteClass($class)
    {
        Category::where("cat_id", $class)->delete();
        return redirect()->route('organization_classes');
    }

    function allClass(Request $request)
    {
        $classes  = Category::where("org_no", Auth::guard('organization')->user()->org_id)
            ->with('instructors')->get()->sortByDesc('cat_id');
        foreach ($classes as $key => $class) {
            $class['update_route'] = route('organization_class_update', [$class->cat_id]);
        }

        return new JsonResponse($classes->values());
    }

    function newClass(Request $request)
    {
        $data['view'] = 'add_class';
        $data['header'] = 'class';
        $data['new_class'] = 'active';
        // $data['categories']  = Category::cursor();
        return view('organization.dashboard',  $data);
    }

    function processNewClass(Request $request)
    {

        $validated = $request->validate([

            'cat_title' => 'required',
            'cat_desc' => 'required',
            'cat_status' => 'required',
            'cat_max_student' => 'required',
            // 'cover_image' => 'required|max:2048',
        ]);
        if ($request->file('cover_image')) {
            $cover_image = $request->file('cover_image');
        }
        do {
            $validated['cat_code'] = strtoupper(substr(explode(' ', $validated['cat_title'])[0] ?? '', 0, 1)) . strtoupper(substr(explode(' ', $validated['cat_title'])[1] ?? '', 0, 1));
            $validated['cat_code'] .= '-' . Str::random(7 - strlen($validated['cat_code']));
            $cat_code_m = Category::where('cat_code', $validated['cat_code'])->first();
        } while ($cat_code_m != null);
        if ($request->file('cover_image')) {
            $validated['cat_cover_image'] = $cover_image->store('class_cover_images', 'public');
        }
        $validated['org_no'] = Auth::guard('organization')->user()->org_id;
        // dd($validated);die();
        $course = Category::create($validated);


        return redirect()->route('organization_classes')->with('message', 'Class Created Successfully');
    }

    function updateClass(Request $request, Category $class)
    {
        // dd($class);
        // dd($request->cat_status);
        $validated = $request->validate([

            'cat_title' => '',
            'cat_desc' => '',
            'cat_status' => '',
            // 'cat_code' => 'unique:categories,cat_code',
            'cat_max_student' => '',


        ]);

        $class->update($validated);
        if ($request->cat_status != "none") {
            # code...
            $class->update(['cat_status', $request->cat_status]);
        }
        return redirect()->back()->with('message', 'Updated Successfully');
    }
}
