<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
                'remember' => 'nullable|boolean',
            ]);

            $field = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $user = User::where($field, $credentials['username'])->first();

            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'username' => 'Kredensial tidak cocok.',
                ]);
            }
            if (!$user->is_active) {
                throw ValidationException::withMessages([
                    'username' => 'Akun Anda belum aktif.',
                ]);
            }

            Auth::login($user, (bool)($credentials['remember'] ?? false));
            $request->session()->regenerate();

            // flash toast for next request (non-AJAX fallback)
            $request->session()->flash('toast', [
                'title' => 'Login berhasil',
                'message' => 'Selamat datang kembali, ' . ($user->full_name ?? $user->username) . '!',
                'type' => 'success',
            ]);

            return response()->json([
                'success' => true,
                'redirect' => route('dashboard'),
                'toast' => [
                    'title' => 'Login berhasil',
                    'message' => 'Selamat datang kembali, ' . ($user->full_name ?? $user->username) . '!',
                    'type' => 'success',
                ],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Login error: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat login. Silakan coba lagi.',
            ], 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $data = $request->validate([
                'username' => 'required|string|min:4|max:30|alpha_num|unique:users,username',
                'full_name' => 'required|string|min:3|max:100',
                'email' => 'required|email|max:150|unique:users,email',
                'phone' => 'required|string|min:8|max:20',
                'password' => 'required|string|min:6|confirmed',
                'referral_code' => 'nullable|string|max:50|exists:users,referral_code',
            ]);

            $user = new User();
            $user->username = $data['username'];
            $user->full_name = $data['full_name'];
            $user->name = $data['full_name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->password = Hash::make($data['password']);
            $user->referred_by = $data['referral_code'] ?? null;
            $user->is_active = true;
            $user->referral_code = $user->generateReferralCode();
            $user->save();

            Auth::login($user);
            $request->session()->regenerate();

            $request->session()->flash('toast', [
                'title' => 'Registrasi berhasil',
                'message' => 'Selamat datang, ' . ($user->full_name ?? $user->username) . '!',
                'type' => 'success',
            ]);

            return response()->json([
                'success' => true,
                'redirect' => route('dashboard'),
                'toast' => [
                    'title' => 'Registrasi berhasil',
                    'message' => 'Selamat datang, ' . ($user->full_name ?? $user->username) . '!',
                    'type' => 'success',
                ],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Registration error: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat registrasi. Silakan coba lagi nanti.',
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}