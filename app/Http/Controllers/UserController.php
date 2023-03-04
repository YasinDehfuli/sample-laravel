<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function createOrUpdate(User $user, Request $request)
    {
        $user->email = $request->email;
        $user->name = $request->name;
        if ($request->has('password')){
            $user->password = bcrypt($request->password);
        }
        $user->mobile = $request->mobile;

        $user->credit = $request->credit;
        $user->dob = date('Y-m-d',$request->dob);

        if ($request->hasFile('avatar')){
            $user->addMedia($request->file('avatar')->getRealPath())
                ->preservingOriginal()
                ->toMediaCollection();
        }

        $user->save();
        return $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->has('order')){
            switch ($request->order){
                case 'idd':
                    $q = User::orderBy('id','desc');
                    break;
                case 'id':
                    $q = User::orderBy('id');
                    break;
                case 'named':
                    $q = User::orderBy('name','desc');
                    break;
                case 'name':
                    $q = User::orderBy('name');
                    break;
                default:
                    $q = User::orderBy('id','desc');
            }
        }else{
            $q = User::orderBy('id','desc');
        }
        if ($request->has('name') && mb_strlen($request->name ) > 1){
            $q = $q->where('name','LIKE','%'.$request->name.'%');
        }
        if ($request->has('mobile') && mb_strlen($request->mobile ) > 1){
            $q = $q->where('mobile','LIKE','%'.$request->mobile.'%');
        }
        $users = $q->paginate(15);
        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        //
        $user = new User();
        $this->createOrUpdate($user, $request);
        return redirect()->route('user.index')->with(['message' => 'User inredted']);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserSaveRequest $request, User $user)
    {
        //
        $this->createOrUpdate($user, $request);
        return redirect()->route('user.index')->with(['message' => 'User updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $name = $user->name;
        $user->delete();
        return redirect()->route('user.index')->with(['message' => 'User "'.$name.'" deleted']);
    }
}
