<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    public function signup(Request $request)
    {
        Log::info('Signup request received', ['request' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Generate token for the user
            $token = $user->createToken('TutorLink')->plainTextToken;

            Log::info('User created successfully', ['user' => $user]);

            return response()->json(['token' => $token], 201);
        } catch (\Exception $e) {
            Log::error('Error creating user', ['exception' => $e->getMessage()]);
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    // User login method
    public function login(Request $request)
    {
        Log::info('Login request received', ['request' => $request->all()]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Generate token for the user
            $token = $user->createToken('TutorLink')->plainTextToken;

            Log::info('User logged in successfully', ['user' => $user]);

            return response()->json(['token' => $token]);
        }

        Log::error('Unauthorized access attempt', ['credentials' => $credentials]);
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // User logout method
    public function logout(Request $request)
    {
        Log::info('Logout request received', ['user' => $request->user()]);

        try {
            $request->user()->tokens()->delete();

            Log::info('User logged out successfully', ['user' => $request->user()]);

            return response()->json(['message' => 'Logged out successfully']);
        } catch (\Exception $e) {
            Log::error('Error logging out user', ['exception' => $e->getMessage()]);
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }
}