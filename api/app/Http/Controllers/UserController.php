<?php

namespace App\Http\Controllers;

use App\Interface\Service\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->findUsers();
    }

    public function show(int $id)
    {
        return $this->userService->findUserById($id);
    }

    public function store(Request $request)
    {
        return $this->userService->createUser($request);
    }

    public function update(Request $request, int $id)
    {
        return $this->userService->updateUser($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->userService->deleteUser($id);
    }
}
