<?php

class UserController extends BaseController
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Method tha call all users
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //$this->user->all();
        //var_dump($this->user);
        $users = $this->user->all();
        return Response::json(
            $users->toArray(),
            '200'
        );
    }

    /**
     * Method that save a user
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $this->user->username = Input::get('username');
        $this->user->email = Input::get('email');

        if ($this->user->save()) {
            // Cuando el usuario se salva el usuario va a regresar el objeto en json(serializado)
            return Response::json(
                $this->user->toArray()
            );
        }
    }

    /**
     * Method that get a specific user
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = $this->user->find($id);

        return Response::json(
            $user->toArray(),
            '200'
        );
    }

    /**
     * User that update a user
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id)
    {
        $user = $this->user->find($id);

        $user->username = Input::get('username');
        $user->email= Input::get('email');

        if ($user->save()) {
            return Response::json(
                $user->toArray(),
                '200'
            );
        }
    }

    /**
     * Method that erase a user
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);

        if ($user->delete()) {
            return Response::json(
                array(
                    'message' => 'OK'
                )
            );
        }
    }

} 