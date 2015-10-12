<?php namespace App\Http\Controllers;

use App\Thefts;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
        public function index()
        {
		$thefts = Thefts::orderBy('ended_at', 'asc')->get();
		//($thefts);
                return view('welcome', ['thefts' => $thefts]);
        }

	public function show($id)
	{
		$theft = Thefts::findBySlug($id);
		return view('details', ['theft' => $theft]);
	}

  public function contact()
  {
        return view('contact');
  }

  public function contactSend(Request $request)
  {
        $data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('user_message')
        ];

        Mail::send('contactemail', $data, function($message) {
                $message->from(env('MAIL_FROM'));
                $message->to(env('MAIL_TO'));
                $message->subject('LaravelDirectory Message');
        });

        return view('contact')->withFlashSuccess("Message Sent.");

  }

  public function about()
  {
        return view('about');
  }

}
