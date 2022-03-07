<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Admin;
use App\Models\Editor;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (request()->isAdmin()) {
            config(['fortify.domain' => adminUrl()]);
            config(['fortify.guard' => 'admin']);
        }

        if (request()->isEditor()) {
            config(['fortify.domain' => EditorUrl()]);
            config(['fortify.guard' => 'editor']);
        }

        if (request()->isMy()) {
            config(['fortify.domain' => myUrl()]);
            config(['fortify.guard' => 'web']);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);


        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify');
        });



        Fortify::loginView(function () {
            if (request()->isAdmin()) {
                return view('admin.auth.login');
            }

            if (request()->isEditor()) {
                return view('editor.auth.login');
            }

            if (request()->isMy()) {
                return view('user.auth.login');
            }

            return view('user.auth.login');
        });

        Fortify::authenticateUsing(function (Request $request) {
            if (request()->isAdmin()) {
                $user = Admin::query()->where('email', $request->email)->first();
                if ($user && Hash::check($request->password, $user->password)) {
                    return $user;
                }
            }

            if (request()->isEditor()) {
                $user = Editor::query()->where('email', $request->email)->first();

                if ($user && Hash::check($request->password, $user->password)) {
                    return $user;
                }
            }

            if (request()->isMy()) {
                $user = User::query()->where('email', $request->email)->first();
                if ($user && Hash::check($request->password, $user->password)) {
                    return $user;
                }
            }


        });

        Fortify::requestPasswordResetLinkView(function () {
            if (request()->isAdmin()) {
                return view('admin.auth.passwords.email');
            }
            if (request()->isEditor()) {
                return view('editor.auth.passwords.email');
            }
            if (request()->isMy()) {
                return view('user.auth.passwords.email');
            }

        });

        Fortify::resetPasswordView(function ($request) {
            if (request()->isAdmin()) {
                return view('admin.auth.passwords.reset', ['token' => $request->token]);
            }
            if (request()->isEditor()) {
                return view('editor.auth.passwords.reset', ['token' => $request->token]);
            }
            if (request()->isMy()) {
                return view('user.auth.passwords.reset', ['token' => $request->token]);
            }
        });


        RateLimiter::for('login', function (Request $request) {
            $key = 'login.'.$request->ip();
            $max = 5;   // attempts
            $decay = 60;    //seconds
            if (RateLimiter::tooManyAttempts($key, $max)) {
                $seconds = RateLimiter::availableIn($key);
                return redirect()->route('admin.login')
                    ->with('error', __('auth.throttle', ['seconds' => $seconds]));
            } else {
                RateLimiter::hit($key, $decay);
            }
        });

            /*         RateLimiter::for('login', function (Request $request) {
                        $email = (string) $request->email;
                        return Limit::perMinute(5)->by($email.$request->ip());

                    });
                    RateLimiter::for('two-factor', function (Request $request) {
                        return Limit::perMinute(5)->by($request->session()->get('login.id'));
                    }); */
    }
}
