<?php

namespace App\Http\Controllers;

use App\Models\podcast;
use App\Traits\podcastTrait;
use Illuminate\Http\Request;
use App\Http\Requests\PodcastRequest;



class PodcastController extends Controller
{
    use podcastTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcasts = Podcast::select('id', 'title', 'desc', 'photo', 'mp3')->paginate(10);
        return view('podcasts', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addpodcast');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PodcastRequest $request)
    {
        try{
            // save photo in folder

        $file_name = $this->saveFile($request->img, "img/podcasts-img");
        $file_name2 = $this->saveFile($request->mp3, "mp3/podcast-mp3");
        //save in db
        $podcust = podcast::create([
            "title" => $request->title,
            "desc" => $request->desc,
            "photo" => $file_name,
            'mp3' => $file_name2
            
        ]);
        if(!$podcust){
            return redirect('podcasts')->with('Error', 'the podcust not created');

        }
        return redirect('podcasts')->with('Success', 'the podcust crated successfuly');

        }catch(\Exception $ex){
           return redirect('podcasts')->with('Error', 'please try again soon');
            
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\podcast  $podcast
     * @return \Illuminate\Http\Response
     */

    public function show(podcast $podcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit(podcast $podcast , $id)
    {
        //
    }
    public function uppodcast($id){
        try{
            $podcast = Podcast::find($id);
            if(!$podcast){
                return redirect('podcasts')->with('Error', 'the podcust not exists');
            }
            $podcast->select('title', 'desc', 'photo', 'mp3')->get();
            return view('updatepod', compact('podcast'));
        }catch(\Exception $ex){
            return redirect('podcasts')->with('Error', 'please try again');
        }
    }
    public function delete(Request $request, $id){
        try{
            $podcast= podcast::find($id);
            if(!$podcast){
                return redirect('podcasts')->with('Error', 'the podcust doesn\'t exists');
            }
            $podcast->delete();
            return redirect('podcasts')->with('Success', 'podcast deleted successfully');

        }catch(\Exception $ex){
            return redirect('podcasts')->with('Error', 'please try again');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $podcat = Podcast::find($id);
            if(!$podcat){
                return redirect('podcasts')->with('Error', 'the podcust doesn\'t exists');

            }

            /*if ($request->has('photo') ) {
                $filePath = saveFile($request->img, "img/podcasts-img");
                Podcast::where('id', $id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            };
            if ($request->has('mp3') ) {
                $filePath = saveFile($request->mp3, "mp3/podcast-mp3");
                Podcast::where('id', $id)
                    ->update([
                        'mp3' => $filePath,
                    ]);
            };
            */
            /*$data= $request->except("_token", "id", "mp3", "photo");

            Podcast::where('id', $id)->update($data);*/

            //update db

            $podcat->update([
                "title" => $request->title,
                "desc" => $request->desc,

            ]);
            return redirect('podcasts')->with('Success', 'podcast updated successfully');

        }catch(\Exception $ex){

            return redirect('podcasts')->with('Error', 'please try again');

        }


    }
    public function single($id){
        try{
            $podcast = Podcast::find($id);
            if(!$podcast){
                return redirect('podcasts')->with('Error', 'the podcust doesn\'t exists');

            }
            $podcast->select('id', 'title', 'desc', 'photo', 'mp3');
            return view('singlepod', compact('podcast'));
        }catch(\Exception $ex){
            return redirect('podcasts')->with('Error', 'please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {


    }
}
