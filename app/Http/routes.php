<?php

use App\Post;
use App\Video;
use App\Tag;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create',function(){

	$post = Post::create(['title'=>'First Post']);

	$tag_post = Tag::findOrFail(1);
	$post->tags()->save($tag_post);

	/////////////////////////////////////////

	$video = Video::create(['title'=>'seconed Video']);
	$tag_video = Tag::findOrFail(2);
	$video->tags()->save($video);


});

Route::get('/read/{id}/tag',function($id){

	$post = Post::findOrFail($id);
    
    foreach ($post->tags as $tag) {
    	return $tag->title;
    }


});


Route::get('/update/{id}/tag',function($id){

	$post = Post::findOrFail($id);
    
    foreach ($post->tags as $tag) {
    	return $tag->whereTitle('PHP')->update(['title'=>'Php Course']);
    }
});

Route::get('/update/post/{post}/tag/{tag}',function($post,$tag){

	$post = Post::findOrFail($post);
    
    $tag = Tag::findOrFail($tag);
    $tag->title = " Udemy Course";
    $tag->save();
});

Route::get('video/{id}/tag',function($id){

	$video = Video::findOrFail($id);
	foreach ($video->tags as $tag) {
		return $video->title;
	}
});


Route::get('/update-data',function(){

	$post = Post::findOrFail(1);
	$tag  = Tag::findOrFail(4);
	//$post->tags()->save($tag);
	//$post->tags()->attach($tag);
	$post->tags()->sync([4]);

});



//delete
Route::get('/delete',function(){

	$post = Post::findOrFail(1);
	foreach ($post->tags as $tag) {
		$tag->whereId(2)->delete();
	}
	
});



