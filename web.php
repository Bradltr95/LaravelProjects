<?php

use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Laravel welcome route 
Route::get('/', function() {
    return view('welcome');
});

// route to the index function in PostsController
// when the users is on the /posts page
// Route::get('/posts', 'PostsController@index');

// Naming a route using an array, we can store that into
// a $url variable for use later 
Route::get('/admin/home/page/34', array('as'=>'admin.home' ,function() {
    $url = route('admin.home');

    return "This url is " . $url;
}));

/*-------------------------------------------------------------
| Create a route that will insert data into the database.
|--------------------------------------------------------------*/
Route::get('/insert', function(){
    DB::insert('insert into posts(title, content) values(?, ?)', ['PHP', 'Testing PHP']);
});

/*-------------------------------------------------------------
| Create a route that will read the data from our database.
|--------------------------------------------------------------*/
Route::get('/read', function(){
    // returns STD class object (Generic Empty Class, like dynamic properties).
    $results = DB::select('select * from posts where id = ?', [1]);
    
    /*
    foreach($results as $post) {
        return $post->title;
    }
    */
    
    // we can also use var_dump() for associative array
    return var_dump($results);
});

/*-------------------------------------------------------------
| Create a route that will update data in our database.
|--------------------------------------------------------------*/
Route::get('/update', function(){
    $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);

    if(!$updated) {
        print("No records were updated.");
    }else{
        print("Record Updated!");
    }
});
/*-------------------------------------------------------------
| Create a route that will delete data from our database.
|--------------------------------------------------------------*/
Route::get('/delete', function(){
   $deleted = DB::delete('delete from posts where id = ?', [1]);

   if(!$deleted) {
       print("No records were deleted.");
   }else{
       print("Record Deleted!");
   }
});

//Route::resource('posts', 'PostsController');

//Route::get('/contact', 'PostsController@contact');

//Route::get('post/{id}/{name}', 'PostsController@show_post');

/*-------------------------------------------------------------
| Learning ELOQUENT
|--------------------------------------------------------------
| READING data with ELOQUENT - read
|--------------------------------------------------------------*/
Route::get('/read', function(){
    $posts = App\Post;
    $posts = Post::all();

    foreach($posts as $post) {
        return $post->title;
    }
});

Route::get('/find', function(){
    $post = Post::find(4);

    return $post->title;
});

Route::get('/findwhere', function(){
   $posts = Post::where('id', 5)->orderBy('id', 'desc')->take(1)->get();

   return $posts;
});

Route::get('/findmore', function(){
    //$posts = Post::findOrFail(4);

    //return $posts;
    // ----------
    $posts = Post::where('id', '=', 5)->firstOrFail();

    //print($posts['title']);
    //return $posts;
});

/*-------------------------------------------------------------
| INSERTING data with ELOQUENT - insert
|--------------------------------------------------------------*/
// INSERTING NEW DATA
Route::get('/basicinsert', function(){
    // Crate the Post object
    $post = new Post;

    // Create the data
    $post->title = 'New Eloquent title insert';
    $post->content = 'Wow eloquent is so easy!';

    // Insert a new record to the database.
    $post->save();
});

// UPDATING DATA IN THE
Route::get('/basicinsert2', function(){
    // Find a specific post ID
    $post = Post::find(4);

    // Update the data
    $post->title = 'Making a larger title with Eloquent';
    $post->content = 'Updating the contents of this field to be longer.';

    // Update the record from our database.
    $post->save();
});

/*-------------------------------------------------------------
| CREATING data with ELOQUENT - create
|--------------------------------------------------------------*/
Route::get('/create', function(){
    Post::create(['title'=>'the create method!', 'content'=>'WOW IM LEARNING SO MUCH WITH LARAVEL']);
});

/*-------------------------------------------------------------
| UPDATING data with ELOQUENT - update
|--------------------------------------------------------------*/
Route::get('/update', function() {
   Post::where('id', 5)->where('is_admin', 0)->update(
       ['title'=>'NEW PHP TITLE', 'content'=>'NEW CONTENT FROM ELOQUENT']
   );
});

/*-------------------------------------------------------------
| DELETING data with ELOQUENT - delete
|--------------------------------------------------------------*/
// DELETE SINGLE USING STATIC FIND FUNCTION
Route::get('/delete', function(){
    $post = Post::find(4);

    $post->delete();
});

// DESTROY MULTI OR SPECIFIC
Route::get('/delete2', function(){
    // destroy multi
    Post::destroy[5,6,7];

    // destroy single
    Post::destroy(4);

    //delete data using static ::where() function
    Post::where('is_admin', 0)->delete();
});

/*-------------------------------------------------------------
| SOFT DELETING/TRASHING data with ELOQUENT - soft delete
|--------------------------------------------------------------*/
Route::get('/softdelete', function(){
    Post::find(5)->delete();
});
