<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Chapter;
use App\Models\Category;

class ChapterController extends Controller
{
    function addChapter($account, Category $class, Course $course, $chapter_name)
    {
        // var_dump($chapter_name);die();
        if (isset($chapter_name)) {
    	$chapter = Chapter::create([
                                'chapter_title'=>$chapter_name,
                                'course_no'=>$course->course_id,
                                ]);
        }
        
        return redirect()->route('instructor_course_build_all_chapters', [$class->cat_id, $course->course_id,]);
    }
    function deleteChapter($account, Category $class, $course_id, Chapter $chapter)
    {
        // $chapter  = Chapter::destroy($chapter_id);
        $chapter->delete();
        
        return redirect()->route('instructor_course_build_all_chapters', [$class->cat_id, $course_id,]);
    }
    function allChapter($account, Category $class, $course_id)
    {
        $chapters  = Chapter::where("course_no", $course_id)->with('quizzes')->get();
        foreach ($chapters as $key => $chapter) {
        	$chapter->blocks;
        }
        $chapters = $chapters->values(); 
       
        
        return response()->json( $chapters->toArray() )->header('Content-Type', 'application/json');
    }
}
