<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Dialogue;
use App\Http\Requests\CreateDialogueRequest;
use App\Http\Requests\UpdateDialogueRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\DialogueTopic;


class DialogueController extends Controller {

	/**
	 * Display a listing of dialogue
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $dialogue = Dialogue::all();
        $dialoguetopic =DialogueTopic::orderBy('id','desc')->first();
  
		return view('admin.dialogue.index', compact('dialogue','dialoguetopic'));
	}

	/**
	 * Show the form for creating a new dialogue
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    $dialog_topic=DialogueTopic::orderBy('id','desc')->first();
	    return view('admin.dialogue.create',compact('dialog_topic'));
	}

	/**
	 * Store a newly created dialogue in storage.
	 *
     * @param CreateDialogueRequest|Request $request
	 */
	public function store(CreateDialogueRequest $request)
	{
	    $request = $this->saveFiles($request);

		$dialog = Dialogue::orderBy('id','desc')->first();
		
		$input = $request->all();
	    if ($dialog == null && $dialog->alias == null) {
	    	$number = 1;
	    }else{
	    	$alias = explode('-',$dialog->alias);
	    	if(isset($alias[2])){
	    		$number = $alias[2]+1;
	    	}else{
	    		$number =1;
	    	}
	    	
	    }
	    
	    $input['alias'] = 'list-dialog-'.$number;
	    Dialogue::create($input);
		return redirect()->route(config('quickadmin.route').'.dialogue.index');
	}

	/**
	 * Show the form for editing the specified dialogue.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$dialogue = Dialogue::find($id);
	    
	    
		return view('admin.dialogue.edit', compact('dialogue'));
	}

	/**
	 * Update the specified dialogue in storage.
     * @param UpdateDialogueRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateDialogueRequest $request)
	{
		$dialogue = Dialogue::findOrFail($id);

        $request = $this->saveFiles($request);

		$dialogue->update($request->all());

		return redirect()->route(config('quickadmin.route').'.dialogue.index');
	}

	/**
	 * Remove the specified dialogue from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Dialogue::destroy($id);

		return redirect()->route(config('quickadmin.route').'.dialogue.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Dialogue::destroy($toDelete);
        } else {
            Dialogue::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.dialogue.index');
    }

}
