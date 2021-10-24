<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Tag;
use App\Http\Controllers\API\LessonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function() {

    Route::apiResource('lessons', LessonController::class);

    Route::redirect('lesson', 'lessons');

    Route::get('users', function () {
        return User::all();
    });

    Route::get('users/{id}', function($id) {
    return User::find($id);
    });

    Route::post('users', function(Request $request) {
        return User::create($request->all());
    });

    Route::match(['put', 'patch'], 'users/{id}', function(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    });

    Route::delete('lessons/{id}', function($id) {
        User::find($id)->delete();

        return 204;
    });

    Route::get('tags', function () {
        return Tag::all();
    });

    Route::get('tags/{id}', function($id) {
    return Tag::find($id);
    });

    Route::post('tags', function(Request $request) {
        return Tag::create($request->all());
    });

    Route::match(['put', 'patch'], 'tags/{id}', function(Request $request, $id) {
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());
        return $tag;
    });

    Route::delete('lessons/{id}', function($id) {
        Tag::find($id)->delete();

        return 204;
    });

    Route::get('users/{id}/lessons', function($id) {
        $user = User::find($id)->lessons;

        return $user;
    });

    Route::get('lessons/{id}/tags', function ($id) {
        $lesson = Lesson::find($id)->tags;

        return $lesson;
    });

    Route::get('tags/{id}/lessons', function ($id) {
        $tag = Tag::find($id)->lessons;

        return $tag;
    });

});


