<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        protected User $repository,
    ) {

    }

    public function index() {
        $users = $this->repository->paginate(); //all() ou paginate()

        return UserResource::collection($users);
    }

    //The function save user data to database with request verification
    public function store(StoreUpdateUserRequest $request) {
        // Return only valided datas | possible methods: all() or validated()
        $data = $request->validated();
        // Save password in DB using cryptography
        $data['password'] = bcrypt($data['password']);

        $user = $this->repository->create($data);

        return new UserResource($user);
    }

    public function show(string $id) {
        $user = $this->repository->findOrFail($id);

        return new UserResource($user);
    }

    public function update(StoreUpdateUserRequest $request, string $id) {
        $user = $this->repository->findOrFail($id);

        $data = $request->validated();

        if($request->password)
            $data['password'] = bcrypt($data['password']);

        $user->update($data);

        return new UserResource($user);
    }

    public function destroy(string $id) {
        $this->repository->findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
