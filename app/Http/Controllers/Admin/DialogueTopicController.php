<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\DialogueTopic;
use App\Http\Requests\CreateDialogueTopicRequest;
use App\Http\Requests\UpdateDialogueTopicRequest;
use Illuminate\Http\Request;



class DialogueTopicController extends Controller {

	/**
	 * Display a listing of dialoguetopic
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $dialoguetopic = DialogueTopic::all();

		return view('admin.dialogue.index', compact('dialoguetopic'));
	}

	/**
	 * Show the form for creating a new dialoguetopic
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.dialoguetopic.create');
	}

	/**
	 * Store a newly created dialoguetopic in storage.
	 *
     * @param CreateDialogueTopicRequest|Request $request
	 */
	public function store(CreateDialogueTopicRequest $request)
	{
	    
		DialogueTopic::create($request->all());

		return redirect()->route(config('quickadmin.route').'.dialogue.index');
	}

	/**
	 * Show the form for editing the specified dialoguetopic.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$dialoguetopic = DialogueTopic::find($id);
	    
	    
		return view('admin.dialoguetopic.edit', compact('dialoguetopic'));
	}

	/**
	 * Update the specified dialoguetopic in storage.
     * @param UpdateDialogueTopicRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateDialogueTopicRequest $request)
	{
		$dialoguetopic = DialogueTopic::findOrFail($id);

        

		$dialoguetopic->update($request->all());

		return redirect()->route(config('quickadmin.route').'.dialogue.index');
	}

	/**
	 * Remove the specified dialoguetopic from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		DialogueTopic::destroy($id);

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
            DialogueTopic::destroy($toDelete);
        } else {
            DialogueTopic::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.dialogue.index');
    }

}
