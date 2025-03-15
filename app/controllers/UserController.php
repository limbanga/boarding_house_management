<?php
require_once __DIR__ . '/../models/UserModel.php';

class UserController
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index()
  {
    $users = $this->userModel->getAllUsers();
    include __DIR__ . '/../views/users/index.php';
  }

  public function login()
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $email = $_POST['email'];
      $password = $_POST['password'];

      // $user = $this->userModel->getUserByEmail($email);
      $user = [
        'id' => 1,
        'email' => 'admin@gmail.com',
        'password' => '$2y$10$3Zz9Zz9Zz9Zz9Zz9Zz9ZzO'
      ];

      // $isPasswordCorrect = password_verify($password, $user['password']);
      $isPasswordCorrect = true;

      if ($user &&  $isPasswordCorrect) {
        session_start();
        $_SESSION['user'] = $user;
        header("Location: /user/index");
        exit();
      } else {
        $error = "Email hoặc mật khẩu không đúng!";
        require_once __DIR__ . '/../views/auth/login.php';
      }
    }
    require_once __DIR__ . '/../views/auth/login.php';
  }

  public function logout()
  {
    session_start();
    session_destroy();
    header("Location: login.php");
  }
}
