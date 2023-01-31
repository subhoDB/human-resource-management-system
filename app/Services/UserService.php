<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Models\User;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

/**
 * @todo work in progress
 */
class UserService extends BaseService
{
    const AUTH_ERROR_NOT_VERIFIED = 'Your account is not Verified';
    const AUTH_ERROR_INACTIVE = "Your account is Inactive.";
    const EMAIL_NOT_REGISTERED = 'This email is not registered with us.';
    const USER_NOT_FOUND = 'User not found.';
    const WRONG_PASSWORD = 'Supplied password is wrong.';
    const OTP_EXPIRED = 'Otp expired.';
    const INVALID_OTP = 'Invalid Otp';
    const ALREADY_ACTIVE = "User Already Active.";
    const USER_DELETED = "User Deleted";
    const VERIFIED_USER = "Verified User";
    const USER_NOT_VERIFIED = "User Not Verified";
    const STATUS_CHANGED = "User Status Changed";
    const PASSWORD_RESET_LINK_SENT = "Password Reset Link Send";

    /**
     * Verify Credential.
     *
     * @param  string  $email
     * @param  string  $password
     * @return array first element User or numeric error code, second element token or null
     */
    // public function checkAuth($email, $password)
    // {
    //     $user = User::where(['email' => $email])->first();

    //     if (empty($user)) {
    //         return [UserService::USER_NOT_FOUND, null];
    //     } elseif (!(Hash::check($password, $user->password))) {
    //         return [UserService::WRONG_PASSWORD, null];
    //     } elseif (empty($user->background_verified_at)) {
    //         return [UserService::AUTH_ERROR_NOT_VERIFIED, null];
    //     } elseif (Hash::check($password, $user->password)) {
    //         $token = $user->createToken($user->email);
    //         return [$user, $token];
    //     }
    // }

    // public function storeDeviceToken($user, $device)
    // {
    //     DeviceToken::updateOrCreate(
    //         [
    //             "user_id" => $user->id,
    //             // "token"   => $device["device_token"],
    //             "token"   => Str::random(),
    //         ],
    //         [
    //             "user_id" => $user->id,
    //             // "type"    => $device["type"],
    //             "type"    => "fcm",
    //             "token"   => Str::random()
    //         ]
    //     );
    // }

    /**
     * Reset Password.
     *
     * @param  string  $email
     * @return Response
     */
    public function resetPassword($request)
    {
        try {
            $user = User::where('email', $request->email)->firstOrFail();

            if ($user->status == 0) {
                return static::AUTH_ERROR_INACTIVE;
            }
        } catch (ModelNotFoundException $e) {
            app()->environment('local') ? throw new ModelNotFoundException($e) :
                throw new ModelNotFoundException("User Not Found");
        }

        $status = Password::sendResetLink(
            $request->toArray()
        );

        return $status === Password::RESET_LINK_SENT ?
            static::PASSWORD_RESET_LINK_SENT :
            throw new Exception("Something went wrong, Please Try Again Later.");
    }

    /**
     * Verify Password.
     *
     * @param  string  $email
     * @param  string  $otp
     * @return Response
     */
    // public function matchOtp($email, $otp)
    // {
    //     $user = User::where('email', $email)->first();
    //     if (isset($user->id) > 0) {
    //         $otpdata = Otp::where('user_id', $user->id)->where('otp', $otp)->first();
    //         if ($otpdata != null) {
    //             $current_at = date('Y-m-d H:i:s', strtotime(Carbon::now()));
    //             if (strtotime($otpdata->expiry_date) >= strtotime($current_at)) {
    //                 return $user;
    //             } else {
    //                 return UserService::OTP_EXPIRED;
    //             }
    //         } else {
    //             return UserService::INVALID_OTP;
    //         }
    //     }
    //     throw ValidationException::withMessages([
    //         'user_not_found_for_this_otp' => __('No user found on this Otp.'),
    //     ]);
    //     // return $this->apiResponse('No user found on this Otp',['valid'=>false],401,[],[]);
    // }

    /**
     * Verify Password.
     *
     * @param  int  $user_id
     * @param  string  $password
     * @return Response
     */
    public function updatePassword($user_id, $password)
    {
        $user = User::where('id', $user_id)->first();
        if ($user != null) {
            $user->password = Hash::make($password);
            $user->save();

            return $user;
        } else {
            return UserService::USER_NOT_FOUND;
        }
    }

    /**
     * Return datatable.
     *
     * @return Response
     */
    public function userList()
    {
        $user = User::with('roles:id,title')->select('users.*');
        return Datatables()->of($user)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('admin.users.show', $row) . '" class="edit btn btn-secondary btn-sm" >VIEW</a> ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /*
    * User Listing
    */
    // public function index($filter = [], $sort = [], $role = [], $perPage = 0)
    // {
    //     $userQuery = User::with('roles');

    //     if (!empty($filter['name'])) {
    //         $this->filterByName($userQuery, $filter);
    //     }

    //     if (!empty($filter['email'])) {
    //         $userQuery->where('email', 'like', "%{$filter['email']}%");
    //     }

    //     if (!empty($filter['ssn'])) {
    //         $userQuery->where('ssn', 'like', "{$filter['ssn']}%");
    //     }

    //     if (!empty($filter['background_status'])) {
    //         if ($filter['background_status'] == 1) {
    //             $userQuery->whereNotNull('background_verified_at');
    //         } elseif ($filter['background_status'] == 2) {
    //             $userQuery->whereNull('background_verified_at');
    //         }
    //     }

    //     if (!empty($filter['acceptance_status'])) {
    //         if ($filter['acceptance_status'] == 1) {
    //             $userQuery->where('status', $filter['acceptance_status']);
    //         } elseif ($filter['acceptance_status'] == 2) {
    //             $userQuery->where('status', 0);
    //         }
    //     }

    //     if (!empty($filter['docusign_status'])) {
    //         if ($filter['docusign_status'] == 1) {
    //             $userQuery->whereNotNull('aggrement_signed_at');
    //         } elseif ($filter['docusign_status'] == 2) {
    //             $userQuery->whereNull('aggrement_signed_at');
    //         }
    //     }

    //     if (!empty($role)) {
    //         $userQuery->whereRelation('roles', 'name', $role);
    //     }

    //     return $userQuery;
    // }

    /*
     * User Details
    */
    // public function show($userId)
    // {
    //     $userQuery = User::where('id', $userId);
    //     return $userQuery;
    // }

    // public function filterByName($userQuery, $filter)
    // {
    //     return $userQuery->where('first_name', 'like', "{$filter['name']}%")
    //         ->orWhere('middle_name', 'like', "{$filter['name']}%")
    //         ->orWhere('last_name', 'like', "{$filter['name']}%")
    //         ->orWhereRaw('CONCAT_WS(" ", trim(first_name), trim(middle_name), trim(last_name)) like "%' . $filter['name'] . '%"');
    // }


    public function storeUser(array $userData)
    {
        $password                = $this->generateRandomPassword();
        $userData['password']    = Hash::make($password);
        $userData['dominion_id'] = $this->generateDominionId('random', 1); //can be removed if dominion id is nullable

        $user                    = User::create($userData);

        //we will send email using queues later.
        // UserRegistration::dispatch($user, $password);            

        return $user;
    }

    public function delete($id)
    {
        try {
            $user = User::findorFail($id);
            if (!is_null($user->background_verified_at) && $user->status == 1) {
                return static::ALREADY_ACTIVE;
            }
            $user->delete();
            return static::USER_DELETED;
        } catch (ModelNotFoundException $e) {
            return static::USER_NOT_FOUND;
        }
    }

    /**
     * Update user status
     * @param $userData ,$userId
     * @return $user response
     */
    // public function changeStatus(array $userData, $userId)
    // {
    //     try {
    //         $user = User::findOrFail($userId);
    //         if (is_null($user->background_verified_at)) {
    //             return static::USER_NOT_VERIFIED;
    //         } else {
    //             $user['status'] = $userData['status'];
    //             $user->save();

    //             return $user->status;
    //         }
    //     } catch (ModelNotFoundException $e) {
    //         return UserService::USER_NOT_FOUND;
    //     }
    // }

    /**
     * Update user status
     * @param $userData ,$userId
     * @return $user response
     */
    public function changeVerificationStatus($userId)
    {
        try {
            $user = User::findOrFail($userId);
            if (is_null($user->background_verified_at)) {
                $user->background_verified_at = now();
                $user->save();
                return $user;
            } else {
                return static::VERIFIED_USER;
            }
        } catch (ModelNotFoundException $e) {
            return static::USER_NOT_FOUND;
        }
    }

    // public function generateDominionId($prefix, $number)
    // {
    //     return "DP-" . $prefix . "-" . $number;
    // }

    // public function generateRandomPassword()
    // {
    //     return Str::random(8);
    // }

    // public function sendCredentialOnMail($user)
    // {
    //     $password                = $this->generateRandomPassword();
    //     $user->password          = Hash::make($password);
    //     $user->save();
    //     UserRegistration::dispatch($user, $password);
    // }

    // public function destroyAuth(User $user)
    // {
    //     $user->user()->currentAccessToken()->delete();
    // }

    // public function disableUser(User $user)
    // {
    //     $user->status = 0;
    //     $user->save();
    // }

    /**
     * @param string $role
     * @return collection $users
     */
    // public function getUsersOfRole($role)
    // {
    //     $users = User::with('roles')->whereRelation('roles', 'name', $role)->get();
    //     return $users;
    // }
}
