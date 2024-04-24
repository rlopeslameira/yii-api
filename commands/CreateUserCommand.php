<?php

namespace app\commands;

use app\models\User;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class CreateUserCommand extends Controller
{
    public function actionIndex($username, $password, $name)
    {
        $user = new User();
        $user->username = $username;
        $user->password_hash = $password; // Certifique-se de que a senha é criptografada se necessário
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->name = $name;

        if ($user->save()) {
            echo "User {$username} created successfully.\n";
            return ExitCode::OK;
        } else {            
            echo "Failed to create user {$username}.\n";
            print_r($user->getErrors());
            return ExitCode::UNSPECIFIED_ERROR;
        }
    }    
}
