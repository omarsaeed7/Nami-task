<?php

namespace App\Services\Api;

use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService
{
    public function adminLogin($credentials, $request)
    {
        try {
            if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();

                return [
                    'status' => true,
                    'message' => __('admin.successfully_logged_in'),
                ];
            }
            return [
                'status' => false,
                'message' => __('admin.invalid_credentials')
            ];

        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function adminLogout($request)
    {
        try {
            $admin = Auth::guard('admin')->user();

            if ($admin) {

                if ($request->hasSession()) {
                    Auth::guard('admin')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                }

                return [
                    'status' => true,
                    'message' => __('admin.successfully_logout'),
                ];
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function apiLogin($credentials)
    {
        try {

            $admin = Admin::where('email', $credentials['email'])->first();
            if (! $admin || ! Hash::check($credentials['password'], $admin->password)) {
                return response()->json([
                    'message' => __('admin.invalid_credentials'),
                ], 401);
            }
            // If you want only one user to use the system and not used by other u can remove this comment :)
            // $admin->tokens()->delete();

            $token = $admin->createToken($admin->name.'-AuthToken')->plainTextToken;

            return [
                'status' => true,
                'message' => __('admin.successfully_logged_in'),
                'admin' => $admin->only(['id', 'name', 'email']),
                'token' => $token,
            ];
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }
}
