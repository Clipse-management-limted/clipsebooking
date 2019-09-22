<?php

namespace App\Http\Controllers;
use App\Http\Resources\TicketsResource;
use App\Models\Tickets;
use App\Models\User_tickets;
use Illuminate\Http\Request;
use App\Models\foods_lists;
use App\Traits\UploadTrait;


class HomeController extends Controller
{
  use UploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      return view('home')->with([
        'comments' =>  User_tickets::with((['author']))->paginate()
      ]);
    }

    public function showFood()
    {
      $food=foods_lists::all();
          return view('pages.foods.foods')->with('foods',$food);
    }


    public function createFood(Request $request)
       {
           // Form validation
           $request->validate([
             'Name' => ['required', 'string'],
             'price' => ['required','numeric'],
             'attachment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           ]);


               // Get image file
               $image = $request->file('attachment');
               // Make a image name based on user name and current timestamp
               $name = str_slug($request->input('Name')).'_'.time();
               // Define folder path
               $folder = '/uploads/images/';
               // Make a file path where image will be stored [ folder path + file name + file extension]
               $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
dd($filePath);
              // Upload image
               $this->uploadOne($image, $folder, 'public', $name);
               // Set user profile image path in database to filePath
               $user->profile_image = $filePath;

                 $items = foods_lists::create([
                 'food_name' => $request['Name'],
                 'price' => $request['price'],

                 ]);


           // // Get current user
           // $user = User::findOrFail(auth()->user()->id);
           // // Set user name
           // $user->name = $request->input('name');
           //
           // // Check if a profile image has been uploaded
           // if ($request->has('profile_image')) {
           //     // Get image file
           //     $image = $request->file('profile_image');
           //     // Make a image name based on user name and current timestamp
           //     $name = str_slug($request->input('name')).'_'.time();
           //     // Define folder path
           //     $folder = '/uploads/images/';
           //     // Make a file path where image will be stored [ folder path + file name + file extension]
           //     $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
           //     // Upload image
           //     $this->uploadOne($image, $folder, 'public', $name);
           //     // Set user profile image path in database to filePath
           //     $user->profile_image = $filePath;
           // }
           // Persist user record to database
           $user->save();

           // Return user back and show a flash message
           return redirect()->back()->with(['status' => 'Profile updated successfully.']);
       }



    public function createFood225(Request $request){


 $this->validate($request, [

    'Name' => ['required', 'string'],
    'price' => ['required','numeric'],
    'file.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

]);

//save the data to the db

  $items = foods_lists::create([
  'food_name' => $request['Name'],
  'price' => $request['price'],

  ]);



      //try to upload item image
      if($request->hasFile('file')){

      foreach($request->file as $file){

      //get the file name

      $fileName =  $this->time.$file->getClientOriginalName();

      //store the file

      $file->storeAs('public/food/img',$fileName);

      //save the image link
      $items->itemsImages()->create(['image'=>$fileName]);
      }

      }
       return redirect()->back()->with('success','Success! New item added');
      }


      public function createFood33(Request $request){
    // $user =new videos;
             $data=$request->all();
              $rules=[
                'Name' => 'required', 'string',
                'price' => 'required','numeric',
                'file'          =>'mimes:image|max:100040|required'];
             $validator = Validator($data,$rules);
//dd($validator);
             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{



            $timestamp        = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
              $file_name        = $timestamp;
               $videoName = $request['name'].'.'.request()->file->getClientOriginalExtension();
                $videoPath = env('APP_URL').'/public/videos/'.$videoName;
                 $destination_path =env('APP_URL').'/public/foods';
                        //$destination_path =env('APP_URL').'/public/videos';


              $thumbnail_path=storage_path().'/app/public/thumbs';
                $file = $request->file('file');
               $thumbvideoPath  = storage_path('/app/public/videos/').$videoName;
                      $video_path       = $destination_path.'/'.$file_name;
                      $thumbnail_image  = $request['file'].".jpg";
                      if(isset($videoName)) {
                 $filename = $videoName;
                    $old_filename= $videoName;
                 //  $filename = $request['username'] . '-' . $user->id . '.jpg';
                  // $old_filename = $old_name . '-' . $user->id . '.jpg';
                   $update = false;
                   if (Storage::disk('public')->has($old_filename)) {
                       $old_file = Storage::disk('public')->get($old_filename);
                       Storage::disk('public')->put($filename, $old_file);
                       $update = true;
                   }
                   if ($file) {
                       Storage::disk('public')->put($filename, File::get($file));
                   }
                   if ($update && $old_filename !== $filename) {
                       Storage::delete($old_filename);
                   }
                   $thumbnail_status = VideoThumbnail::createThumbnail($thumbvideoPath,$thumbnail_path,$thumbnail_image, 10);





                 }

                 $items = foods_lists::create([
                 'food_name' => $request['Name'],
                 'price' => $request['price'],

                 ]);
                           //  $user['thumbnail'] = $thumbnail_image;
                           //  $user['filename']       =$videoName;
                           //  $user['name']       =$request['name'];
                           //  $user['created_at']  =date('Y-m-d h:i:s');
                           //  $user['updated_at']  =date('Y-m-d h:i:s');
                           //  $user['url']  =$videoPath;
                           //  $user['extention']  =request()->video->getClientOriginalExtension();
                           //  $user['user_id']     =auth()->user()->id;
                           // DB::table('videos')->insert($user);

                          $message ='Account has been successfully updated!';
                        return redirect()->back()->with('status', $message);
                    }
}



}
