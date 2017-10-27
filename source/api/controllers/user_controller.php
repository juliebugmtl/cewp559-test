<?php

class UserController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($payload)
    {

        if (!array_key_exists('username', $payload)) {
            throw new Exception('`username` should be provided!');
        } elseif (!array_key_exists('password', $payload)) {
            throw new Exception('`password` should be provided!');
        }

        $payload->password = password_hash($payload->password, PASSWORD_BCRYPT);

        return $this->model->create($payload);
    }

        /**

        User is an object that contains:

        object(UserModel)[7]
          public 'id' => string '1' (length=1)
          public 'username' => string 'testuser' (length=8)
          public 'password' => string '$2y$10$85ydFjDgysh1z9N0g69Cdex.nnQAqrUAmMIF2uGv0h81J9LLBB9/O' (length=60)
          public 'isadmin' => string '0' (length=1)
          protected 'TableName' => string 'users' (length=5)
          protected 'ModelName' => string 'UserModel' (length=9)
          protected 'db_connection' => null
          public 'email' => string 'email@domain.com' (length=16)
          public 'created' => string '2017-10-26 23:45:33' (length=19)
          public 'last login' => null
        **/

    public function login($payload)
    {

        if (!array_key_exists('username', $payload)) {
            throw new Exception('`username` should be provided!');
        } elseif (!array_key_exists('password', $payload)) {
            throw new Exception('`password` should be provided!');
        }

        $user = $this->model->getUserByUsername($payload->username);

        // This method makes it cleaner as it only responds if they don't match.

        if (!password_verify($payload->password, $user->password)) {

            throw new Exception("Invalid username or password.", 401);

        }

        $token = bin2hex(random_bytes(64));

        // return $this->model->create($payload);
    }


}
