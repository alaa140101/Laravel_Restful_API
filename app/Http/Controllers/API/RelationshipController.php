<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Response;


class RelationshipController extends Controller
{
   public function userLessons($id){
      $user = User::findOrFail($id)->lessons;

      return Response::json([
         'data' => $user->toArray()
      ], 200);
   }
   public function lessonTags($id){
    $lesson = Lesson::findOrFail($id)->tags;

     return Response::json([
         'data' => $lesson->toArray()
      ], 200);
   }
   public function tagLessons($id){
    $tag = Tag::findOrFail($id)->lessons;

    return Response::json([
      'data' => $tag->toArray()
   ], 200);
   }
}
