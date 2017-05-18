<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Campaign_content;
use App\Campaign;
use App\Repositories\ContentRepository;
use App\Repositories\TaskRepository;



   

class ContentController extends Controller
{   

        
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $contents;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(ContentRepository $contents,TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tContents = $contents;
        $this->contents = $contents;
        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('contents.index', [
            'contents' => $this->contents->forContent(),
            
            'tasks'=>$this->tasks->forUser(),
            'tContents'=>$this->contents->getOne(1),
        ]);
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        // ]);

        // $request->user()->tasks()->create([
        //     'name' => $request->name,
        // ]);

        $content = new Campaign_content;
        $content->campaign_id = $request->campaign_id;
        $content->content_type=$request->content_type;
        $content->content=$request->content;
        
        $content->save();
        $array = array("val"=>$content);
        $json_str = json_encode($array);
        
        return $content->toJson();
        // return redirect('/campaign_contents');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }

    public function getContent(Request $request,Campaign $campaign){



        return view('contents.index',[
                'contents' => $this->contents->forContent(),
                'tContents'=>$this->contents->forContentTable($campaign),
                'tasks'=>$this->tasks->forUser(),
            ]);
    }



    public function getContentJson(Request $request, Campaign $campaign){
        $contentJson =$this->contents->forContentTable($campaign);
        return response()->json($contentJson);
    }

    

    public function putContent(Request $request){
        $tempContent = new Campaign_content;
        $tempContent->campaign_id = $request->campaign_id;
        $tempContent->content_type = $request->content_type;
        $tempContent->content = $request->content;
        $tempContent->save();
        // $tempContent->$tempContent->toJson();
        return response()->json($tempContent);
        
        // return redirect('/tasks');
       
    }

    public function postContent(Request $request){
        $tempContent = $this->contents->forContentTable($request->id);
        $tempContent->content_type = $request->content_type;
        $tempContent->content = $request->content;
        $tempContent->save();

        return response()->json($tempContent);
    }

   
}
