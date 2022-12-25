<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    public function index(Request $request)
    {

        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required|max:120',
            ]
        );

        $has_discount        = isset($request->has_discount) ? 'on' : 'off';
        $is_free        = isset($request->is_free) ? 'on' : 'off';
        $is_preview        = isset($request->is_preview) ? 'on' : null;
        $course = new Course();
        $course->title = $request->title;
        $course->course_requirements = $request->course_requirements;
        $course->course_description     = $request->course_description;
        $course->level = $request->level;
        $course->lang = $request->lang;
        $course->duration = $request->duration;
        $course->category = $request->category;
        $course->sub_category = $request->subcategory;
        /* if ($request->type == 'Course') {
                $validator = \Validator::make($request->all(), [
                    'subcategory' => 'required',
                ]);
            }
    
            if ($request->type == 'Quiz') {
                if (!empty($request->quiz)) {
                    $course['quiz'] = implode(',', $request->quiz);
                } else {
                    $course['quiz'] = $request->quiz;
                }
            } */

        if ($is_free == 'off') {
            $validator = \Validator::make($request->all(), ['price' => 'required',]);
            $course->is_free = 'off';
            $course->price = $request->price;

            if ($has_discount == 'on') {
                $validator = \Validator::make($request->all(), ['discount' => 'required',]);
                $course->has_discount = 'on';
                $course->discount = $request->discount;
            } else {
                $course->has_discount = 'off';
                $course->discount = null;
            }
        } else {
            $course->is_free = 'on';
            $course->price = null;
            $course->discount = null;
            $course->has_discount = 'off';
        }

        if ($is_preview == 'on') {
            $course->is_preview = $request->is_preview;
            $course->preview_type = $request->preview_type;
            if (!empty($request->preview_image)) {
                $filenameWithExt  = $request->File('preview_image')->getClientOriginalName();
                $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension        = $request->file('preview_image')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/preview/');
                $image_path      = $dir . $course->preview_content;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $course->preview_content = $fileNameToStores;
                $path = $request->file('preview_image')->storeAs('uploads/preview/', $fileNameToStores);
            }
            if (!empty($request->preview_video)) {
                $filenameWithExt  = $request->File('preview_video')->getClientOriginalName();
                $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension        = $request->file('preview_video')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/preview/');
                $image_path      = $dir . $course->preview_content;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $course->preview_content = $fileNameToStores;
                $path = $request->file('preview_video')->storeAs('uploads/preview/', $fileNameToStores);
            }
        } else {
            $course->is_preview = 'off';
        }

        if (!empty($request->thumbnail)) {
            $filenameWithExt  = $request->File('thumbnail')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('thumbnail')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/thumbnail/');
            $image_path      = $dir . $course->thumbnail;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $course->thumbnail = $fileNameToStores;
            $path = $request->file('thumbnail')->storeAs('uploads/thumbnail/', $fileNameToStores);
        }
        $course->featured_course = $request->featured_course;
        $course->status = 'Active';
        $course->meta_keywords = $request->meta_keywords;
        $course->meta_description = $request->meta_description;
        $course->store_id   =  1;
        $course->created_by = 1;

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages);
        }

        $course->save();
        // $course_id = Crypt::encrypt($course->id);



        return redirect()->back()->with('success', __('Course created successfully!'));
    }
}
