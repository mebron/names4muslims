<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use App\UserList;
use App\Favorite;
use App\UserListNames;
use App\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Alert;

class UserController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		return view('user.index', compact('user'));
	}
	public function profile()
	{ }
	public function update_avatar(Request $request)
	{
		if ($request->hasFile('avatar')) {
			$name = Auth::id() . '_' . $request->avatar->hashName();
			$avatar = $request->avatar;
			$path = storage_path('app/users/avatar/' . $name);
			if (Image::make($avatar->getRealPath())->resize(300, 300, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path)) {
				$user = Auth::user();
				$user->avatar = $name;
				$user->save();
				return back();
			}
		}
	}
	public function lists()
	{
		$lists = UserList::where('active', 1)->get();
		SEOTools::setTitle('User created name lists');
		SEOTools::setDescription("Find some cool names from our user's name lists");
		return view('user.user_lists', compact('lists'));
	}
	public function addList(Request $request)
	{
		$user = $request->user();

		$this->validate($request, [
			'title' => 'required',
			'slug' => 'rquired'
		]);
		$user_list = new UserList;
		$user_list->user_id = $user->id;
		$user_list->title = $request->title;
		$user_list->description = $request->description;
		$user_list->save();
		$list_id = $user_list->id;

		foreach (Favorite::where('user_id', $user->id)->cursor() as $favorite) {
			$list_names = new UserListNames;
			$list_names->name_id = $favorite->name_id;
			$list_names->user_list_id = $list_id;
			$list_names->save();
		}
		Alert::success('Your lists are published successfully', 'Thank you')->persistent("Ok");
		return redirect('/user/lists');
	}
	public function list_view($id)
	{

		$names = UserList::find($id)->lists;
		$lit = UserList::find($id);
		$data['title'] = $lit->title;
		$data['author'] = User::find($lit->user_id)->name;
		SEOTools::setTitle($lit->title);
		SEOTools::setDescription("This Baby name lists are created by our user -" . $data['author']);

		return view('user.user_list_names', compact('names', 'data'));
	}
	public function collection($slug)
	{

		$list = UserList::where('slug', $slug)->firstOrFail();
		$names = $list->lists;
		//$lit = UserList::find($id);
		$data['title'] = $list->title;
		$data['author'] = User::find($list->user_id)->name;
		SEOTools::setTitle($list->title);
		SEOTools::setDescription("This Baby name lists are created by our user - " . $data['author']);
		return view('user.user_list_names', compact('names', 'data'));
	}
}
