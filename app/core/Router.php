<?php
class Router {
    public function dispatch() {
        // Lấy URL từ query string
        $url = isset($_GET['url']) ? $_GET['url'] : 'user/login';

        // Phân tách URL thành controller và action
        $urlParts = explode('/', trim($url, '/'));
        $controllerName = !empty($urlParts[0]) ? ucfirst($urlParts[0]) . 'Controller' : 'UserController';
        $actionName = !empty($urlParts[1]) ? $urlParts[1] : 'login';

        // Đường dẫn tới controller
        $controllerFile = realpath(__DIR__ . '/../controllers/' . $controllerName . '.php');

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();

            if (method_exists($controller, $actionName)) {
                call_user_func([$controller, $actionName]);
            } else {
                die("Lỗi 404: Không tìm thấy action '$actionName'.");
            }
        } else {
            die("Lỗi 404: Không tìm thấy controller '$controllerName'.");
        }
    }
}
?>
