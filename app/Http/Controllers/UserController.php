<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use DB;

class UserController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return a list of users.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return $this->validResponse($users);
    }

    /**
     * Create a new book.
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ];

        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);

        $user = User::create($fields);

        return $this->validResponse("User " . $user->name . " created with id: " . $user->id, Response::HTTP_CREATED);
    }

    /**
     * Display details about one book.
     *
     * @return illuminate\Http\Response
     */
    public function show($userId)
    {
        $user = User::findOrFail($userId);
        return $this->validResponse($user);
    }

    /**
     * Update details about one book.
     *
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $rules = [
            'name' => 'max:255',
            'email' => 'email|unique:users,email,' . $userId,
            'password' => 'min:8|confirmed'
        ];

        $this->validate($request, $rules);
        $user = User::findOrFail($userId);

        $user->fill($request->all());

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($user->isClean()) {
            DB::rollback();
            return $this->errorResponse("At least on value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();
        return $this->validResponse($user, Response::HTTP_OK);
    }

    /**
     * Delete one book.
     *
     * @return illuminate\Http\Response
     */
    public function destroy($userId)
    {

        $user = User::findOrFail($userId);

        $user->delete();

        return $this->validResponse($user->name . " with id " . $user->id . " has ben deleted.", Response::HTTP_OK);
    }


    /**
     * Get authenticated user.
     *
     * @return illuminate\Http\Response
     */
    public function me(Request $request)
    {
        return $this->validResponse($request->user());
    }
}
