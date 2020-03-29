<?php


namespace App\Repositories;


use App\User;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;

class UserRepository
{
    /**
     * The attributes that are mass assignable.
     *
     * @param $user UserOAuth
     * @param $socName string
     * @return User
     */
    public function getUserBySocId( $user, string $socName)
    {
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();
        if (empty($userInSystem)) {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName()) ? $user->getName() : '',
                'email' => ($socName == 'facebook') ? $user->getEmail() : $user->accessTokenResponseBody['email'],
                'password' => '',
                'id_in_soc' => !empty($user->getId()) ? $user->getId() : '',
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar()) ? $user->getAvatar() : ''
            ]);
            $userInSystem->save();
        }
        return $userInSystem;
    }
}
