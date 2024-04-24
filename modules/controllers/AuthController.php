<?php

namespace app\modules\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\Response;
use app\models\User; // Supondo que você tenha um modelo User para os usuários

class AuthController extends Controller
{
    public function actionLogin()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;

        $username = $request->post('username');
        $password = $request->post('password');

        // Verifique se o username e a password foram fornecidos
        if (!$username || !$password) {
            $response->statusCode = 400; // Código de erro de requisição inválida
            return ['error' => 'É necessário fornecer o nome de usuário e a senha.'];
        }

        // Verifique se as credenciais são válidas
        $user = User::findByUsername($username);
        if (!$user || !$user->validatePassword($password)) {
            $response->statusCode = 401; // Código de não autorizado
            return ['error' => 'Credenciais inválidas.'];
        }

        // retorna o access_token
        if ($user->save()) {
            return ['access_token' => $user->access_token];
        } else {
            $response->statusCode = 500; // Código de erro interno do servidor
            return ['error' => 'Erro ao salvar o access_token.'];
        }
    }
}
    