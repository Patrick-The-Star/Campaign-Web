<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Campaign;
use App\Task;
use App\Repositories\TaskRepository;
use App\Campaign_content;
use App\Repositories\ContentRepository;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(ContentRepository $contents,TaskRepository $tasks)
    {
        $this->middleware('auth');
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
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser(),
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

        $campaign = new Campaign;
        $campaign->country = $request->country;
        $campaign->starts_at=$request->starts_at;
        $campaign->ends_at=$request->ends_at;
        $campaign->category=$request->category;
        $campaign->name=$request->name;

        $campaign->description = $request->description; 
        $campaign->save();

        return redirect('/campaign_contents');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request,$campaign)
    {

        $tempCampaign = Campaign::find($campaign);
        $tempCampaign->delete();
        $deletedContents = Campaign_content::where('campaign_id', $campaign)->delete();
        
        

        return $tempCampaign;
        
    }

    public function getCampaigns(Request $request){
        $tempCampaign = $this->tasks->forUser();
        return $tempCampaign;
    }
}
