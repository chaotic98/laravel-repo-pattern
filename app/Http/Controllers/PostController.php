<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\Post\PostRepositoryInterface;

class PostController extends Controller
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {}

    public function index()
    {
        return response()->json([
            'data' => $this->postRepository->getAll()
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $this->postRepository->create($data);

        return response()->json([
            'data' =>  $data
        ],
            201
        );
    }

    public function show($id)
    {
        return response()->json([
            'data' => $this->postRepository->findById($id)
        ]);
    }


    public function update(UpdatePostRequest $request,$id)
    {
        $data = $request->validated();
        $this->postRepository->update($id, $data);

        return response()->json([
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);

        return response()->json(null,204);
    }
}
