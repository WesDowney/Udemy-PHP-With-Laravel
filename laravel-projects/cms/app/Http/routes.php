<?php

use App\Country;
use App\Post;
use App\User;

/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/


Route::get('/insert', function(){
	DB::insert('insert into posts(title, content) values(?,?)', ['PHP with Laravel', 'Laravel is the best thing that has happened to PHP']);
});

/*
Route::get('/read', function() {

	$results = DB::select('select * from posts where id = ?', [1]);

	return var_dump($results);

	//foreach ($results as $post) {
	//	return $post->title;
	//}

});
*/

/*
Route::get('/update', function() {

	$updated = DB::update('update posts set title = "Updated Title" where id = ?', [1]);

	return $updated;

});
*/

/*
Route::get('/delete', function(){

	$deleted = DB::delete('delete from posts where id = ?', [1]);

	return $deleted;

});
*/






/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {

	return view('welcome');

});*/

/*
Route::get('/about', function () {

	return "Hi about page";
	
});

Route::get('/contact', function () {

	return "Hi I'm contact";
	
});

Route::get('/post/{id}/{name}', function($id, $name) {

	return "This is post number " . $id . " " . $name;

});

Route::get('admin/posts/example', array('as'=>'admin.home', function() {

	$url = route('admin.home');

	return "this url is " . $url;

}));
*/

// Route::get('/post/{id}', 'PostsController@index');

// Route::resource('posts', 'PostsController');

// Route::get('/contact', 'PostsController@contact');

// Route::get('/post/{id}/{name}/{password}', 'PostsController@show_post');

Route::group(['middleware' => ['web']], function() {

});


/*
|--------------------------------------------------------------------------
| ELOQUENT 
|--------------------------------------------------------------------------
*/

/*
Route::get('/read', function (){

	$posts = Post::all();

	foreach ($posts as $post) {
		return $post->title;
	}

});*/

/*
Route::get('/find', function (){

	$post = Post::find(2);


	return $post->title;
});
*/

/*
Route::get('/findwhere', function(){

	$posts = Post::where('id', 3)->orderBy('id','desc')->take(1)->get();

	return $posts;

});*/

/*
Route::get('/findmore', function(){

	//$posts = Post::findOrFail(1);

	// return $posts;

	$posts = Post::where('users_count', '<', 50)->firstOrFail();


});*/


Route::get('/basicinsert', function(){

	$post = new Post;

	$post->title = 'new ORM title insert';
	$post->content = 'Wow elequent is really cool, look at this content';
	$post->save();

});

/*
Route::get('/basicinsert2', function(){

	$post = Post::find(2);

	$post->title = 'new ORM title insert 2';
	$post->content = 'Wow elequent is really cool, look at this content 2';
	$post->save();

});*/

/*
Route::get('/create', function(){

	Post::create(['title'=>'the create method 3', 'content'=>'WOW I\'m learning alot with Edwin Diaz 3']);

});*/

/*
Route::get('/update', function(){

	Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'NEW PHP TITLE', 'content'=>'NEW PHP CONTENT']);

});*/


Route::get('/delete', function(){

	$post = Post::find(4);

	$post->delete();

});

/*
Route::get('/delete2', function(){

	Post::destroy([4,5]);

	//Post::where('is_admin', 0)->delete();

});*/


/*Route::get('/softdelete', function(){

	Post::find(2)->delete();

});*/

/*
Route::get('/readsoftdelete', function(){

	//$post = Post::find(1);

	//return $post;

	//$post = Post::withTrashed()->where('is_admin',0)->get();
	//return $post;

	$post = Post::onlyTrashed()->where('is_admin',0)->get();
	return $post;

});*/

/*Route::get('/restore', function(){

	Post::withTrashed()->where('is_admin', 0)->restore();

});*/


Route::get('/forcedelete', function(){

	Post::onlyTrashed()->where('is_admin',0)->forceDelete();

});


/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships
|--------------------------------------------------------------------------
*/

// One to One Relationship
/*
Route::get('/user/{id}/post', function($id){

	return User::find($id)->post->content;

});

Route::get('/post/{id}/user', function($id){

	return Post::find($id)->user->name;

});*/

// One to Many relationship

/*
Route::get('/posts', function(){

	$user = User::find(1);

	foreach($user->posts as $post) {
		echo $post->title . "<br>";
	}

});
*/

// Many to Many relationship

/*
Route::get('/user/{id}/role', function($id){

	// Returns all the data on the Role
	$user = User::find($id)->roles()->orderBy('id','desc')->get();

	return $user;
	
  // Returns just the name of the role
	foreach($user->roles as $role) {
		return $role->name; 
	}
}); */


// Accessing the intermediate table (pivot table)

Route::get('user/pivot', function(){

	$user = User::find(1);

	foreach($user->roles as $role){
		echo $role->pivot;
	}

});

Route::get('user/country', function(){
	$country = Country::find(2);

	foreach($country->posts as $post){
		return $post->title;
	}
});

