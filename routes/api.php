<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatigoryController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FacilitieController;
use App\Http\Controllers\FacilitieSportController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ParticipantsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ParticipantsSportController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('addsport',[SportController::class,'addsport']);
Route::post('updatesport/{id}',[SportController::class,'updatesport']);
Route::get('showsport/{id}',[SportController::class,'showsport']);
Route::get('allsports',[SportController::class,'AllSports']);
Route::delete('deletesport/{id}',[SportController::class,'deleltesport']);


Route::post('addroom',[RoomController::class,'addroom']);
Route::post('updateroom/{id}',[RoomController::class,'updateroom']);
Route::get('showroom/{id}',[RoomController::class,'showroom']);
Route::get('allroom',[RoomController::class,'Allrooms']);
Route::delete('deleteroom/{id}',[RoomController::class,'delelteroom']);



Route::post('newday',[DayController::class,'newday']);
Route::post('updateday/{id}',[DayController::class,'updateday']);
Route::get('showday/{id}',[DayController::class,'showday']);
Route::get('allday',[DayController::class,'Allday']);
Route::delete('deleteday/{id}',[DayController::class,'delelteday']);



Route::post('addarticle',[ArticleController::class,'addarticle']);
Route::post('updatearticle/{id}',[ArticleController::class,'updatearticle']);
Route::get('showarticle/{id}',[ArticleController::class,'showarticle']);
Route::get('allarticle',[ArticleController::class,'Allarticle']);
Route::delete('deletearticle/{id}',[ArticleController::class,'deleltearticle']);



Route::post('addcatigory',[CatigoryController::class,'addcatigory']);
Route::post('updatecatigory/{id}',[CatigoryController::class,'updatecatigory']);
Route::get('showcatigory/{id}',[CatigoryController::class,'showcatigory']);
Route::get('Allcatigory',[CatigoryController::class,'Allcatigory']);
Route::delete('deleltecatigory/{id}',[CatigoryController::class,'deleltecatigory']);


Route::post('addimage',[ImageController::class,'addimage']);
Route::post('updateimage/{id}',[ImageController::class,'updateimage']);
Route::get('showimage/{id}',[ImageController::class,'showimage']);
Route::get('Allimage',[ImageController::class,'Allimage']);
Route::get('Allimagefs/{id}',[ImageController::class,'Allimagefs']);
Route::delete('delelteimage/{id}',[ImageController::class,'delelteimage']);


Route::post('addvideo',[VideoController::class,'addvideo']);
Route::post('updatevideo/{id}',[VideoController::class,'updatevideo']);
Route::get('showvideo/{id}',[VideoController::class,'showvideo']);
Route::get('Allvideo',[VideoController::class,'Allvideo']);
Route::get('Allvideofs/{id}',[VideoController::class,'Allvideofs']);
Route::delete('deleltevideo/{id}',[VideoController::class,'deleltevideo']);



Route::post('addfacilitie',[FacilitieController::class,'addfacilities']);
Route::post('updatefacilite/{id}',[FacilitieController::class,'updatefacilitie']);
Route::get('showfacilitie/{id}',[FacilitieController::class,'showfacilitie']);
Route::get('Allfacilitie',[FacilitieController::class,'Allfacilitie']);
Route::delete('deleltefacilitie/{id}',[FacilitieController::class,'deleltefacilitie']);




Route::post('addparticipants',[ParticipantsController::class,'participants']);
Route::post('updateparticipants/{id}',[ParticipantsController::class,'updateparticipants']);
Route::get('showparticipant/{id}',[ParticipantsController::class,'showparticipant']);
Route::get('Allparticipants',[ParticipantsController::class,'Allparticipants']);
Route::delete('delelteparticipant/{id}',[ParticipantsController::class,'delelteparticipant']);


Route::post('register',[ParticipantsSportController::class,'register']);

// use App\Http\Controllers\ParticipantSportController;

Route::get('/participants/{id}/remaining-days', [ParticipantsSportController::class, 'showRemainingDays']);




Route::post('adddiscount',[DiscountController::class,'adddiscount']);
Route::post('updatediscount/{id}',[DiscountController::class,'updatediscount']);
Route::get('showdiscount/{id}',[DiscountController::class,'showdiscount']);
Route::get('Alldiscount',[DiscountController::class,'Alldiscount']);
Route::get('onlyact',[DiscountController::class,'onlyact']);
Route::delete('deleltediscount/{id}',[DiscountController::class,'deleltediscount']);



Route::post('cal',[PaymentController::class,'cal']);




