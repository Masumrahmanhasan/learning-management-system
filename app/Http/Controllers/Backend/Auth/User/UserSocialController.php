<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManageUserRequest;
use App\Models\SocialAccount;
use App\Models\User;
use App\Repositories\Backend\Access\User\SocialRepository;
use Illuminate\Http\Request;

class UserSocialController extends Controller
{
    public function unlink(ManageUserRequest $request, SocialRepository $socialRepository, User $user, SocialAccount $social)
    {
        $socialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.social_deleted'));
    }
}
