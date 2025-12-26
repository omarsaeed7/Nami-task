<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Api\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {}

    /**
     * For Web Requests
     */
    public function showLogin()
    {
        if(Auth::guard('admin')->user()){
            return redirect()->route('reports.index');
        }
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();
            $this->authService->adminLogin($credentials, $request);

            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        try {
            $result = $this->authService->adminLogout($request);

            return response()->json($result, 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => __('admin.logout_failed'),
            ], 500);
        }
    }

    public function profile()
    {
        try {
            $admin = Auth::guard('admin-api')->user();

            return response()->json([
                'status' => true,
                'message' => 'Profile retrieved successfully',
                'admin' => [
                    'id' => $admin->id,
                    'name' => $admin->name,
                    'email' => $admin->email,
                    'phone' => $admin->phone,
                    'image' => $admin->image ? url($admin->image) : null,
                    'created_at' => $admin->created_at,
                    'updated_at' => $admin->updated_at,
                ],
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Server error: '.$e->getMessage(),
            ], 500);
        }
    }

    ############### ############# ##############
    /*
        For Api Requests
    */

    public function apiLogin(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();
            $result = $this->authService->apiLogin($credentials, $request);

            return response()->json([
                'status' => true,
                'message' => __('admin.successfully_logged_in'),
                'admin' => $result['admin'],
                'token' => $result['token'],
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => __('admin.login_failed'),
            ], 500);
        }
    }

    public function apiLogout()
    {
        try {
            Auth::user()->tokens()->delete();

            return response()->json([
                'status' => true,
                'message' => __('admin.successfuly_logout'),
            ]);
        } catch (Exception $e) {

        }
    }

    public function refresh(Request $request)
    {
        try {
            $admin = $request->user('admin-api');

            $request->user('admin-api')->currentAccessToken()->delete();

            $token = $admin->createToken('admin-token', ['admin'])->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Token refreshed successfully',
                'token' => $token,
                'token_type' => 'Bearer',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Server error: '.$e->getMessage(),
            ], 500);
        }
    }

}
