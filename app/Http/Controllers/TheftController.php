<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Thefts;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TheftController extends Controller {


  	public function __construct()
  	{
  	    $this->middleware('auth');
  	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    		$thefts = Thefts::orderBy('ended_at', 'asc')->get();
		return view('welcome', ['thefts' => $thefts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('theft.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	  $theft = new Thefts;
          $theft->name = $request->name;

          if ($request->started_at) {
                $theft->started_at = $request->started_at;
          }

          if ($request->ended_at) {
                $theft->ended_at = $request->ended_at; 
          } 
	  $theft->denomination = $request->denomination;
          $theft->type = $request->type;
          $theft->victims = $request->victims;
          $theft->btc_then = $request->btc_then;
          $theft->usd_then = $request->usd_then;
          $theft->transactions = $request->transactions;
          $theft->status = $request->status;
          $theft->description = $request->description;
          $theft->details = $request->details;
          $theft->suspects = $request->suspects;
          $theft->save();
		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$theft = Thefts::findBySlug($id);
		return view('theft.show', compact('theft'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$theft = Thefts::findBySlug($id);
		return view('theft.edit', compact('theft'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
	  $theft = Thefts::findOrFail($id);
	  $theft->name = $request->name;

	  if ($request->started_at) {
	  	$theft->started_at = $request->started_at;
	  } else {
		DB::update('update thefts set started_at = NULL where id = ?', [$id]);
	  }

          if ($request->ended_at) {
                $theft->ended_at = $request->ended_at; 
          } else {
                DB::update('update thefts set ended_at = NULL where id = ?', [$id]);
          }
	  $theft->denomination = $request->denomination;
	  $theft->type = $request->type;
	  $theft->victims = $request->victims;
	  $theft->btc_then = $request->btc_then;
	  $theft->usd_then = $request->usd_then;
	  $theft->transactions = $request->transactions;
	  $theft->status = $request->status;
	  $theft->description = $request->description;
	  $theft->details = $request->details;
	  $theft->suspects = $request->suspects;
	  $theft->save();
	  return redirect('/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$theft = Thefts::findBySlug($id);
		$theft->delete();
		return redirect('/');
	}

}
