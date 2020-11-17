<?php


namespace Royalcms\Laravel\JsonRpcServer\Http\AuthUser;


class AuthUser
{
    /**
     * @var array
     */
    protected $users;

    /**
     * @var string
     */
    protected $currentUser;

    public function __construct(array $users = [])
    {
        $this->users = $users;
    }

    /**
     * @param $username
     * @param $password
     * @param null $user
     * @return bool
     */
    public function verify($username, $password, $user = null)
    {
        if ($username === null || $password === null) {
            return false;
        }

        $users = $this->getUsers($user);

        foreach ($users as $user => $credentials) {
            if (
                password_verify($username, reset($credentials)) &&
                password_verify($password, end($credentials))
            ) {
                $this->currentUser = $user;

                return true;
            }
        }

        return false;
    }

    /**
     * @param null $user
     * @return array
     */
    protected function getUsers($user = null)
    {
        if ($user !== null) {
            return array_intersect_key($this->users, array_flip((array) $user));
        }

        return $this->users;
    }

    /**
     * @return string
     */
    public function getCurrentUser()
    {
        return $this->currentUser;
    }

}
