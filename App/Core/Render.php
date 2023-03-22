<?php


namespace App\App\Core;

use Exception;

class Render
{

    function __construct()
    {
    }
    /**
     * render là hàm dùng để gọi các trang trong Views
     *
     * @param  string $file
     * @return mixed
     */
    public function render($file, $data = array())
    {
        require 'App/Views/' . $file . '.php';

        $viewPath = __DIR__ . '/../Views/' .  $file . '.php';
        // kiểm tra file view có tồn tại không
        if (!file_exists($viewPath)) {
            throw new Exception('Không tìm thấy view nha');
        }
        extract($data);
    }
    /**
     * renderModel là hàm dùng để gọi file model trong Models
     *
     * @param  string $file
     * @return string
     */
    public function renderModel($file)
    {
        require 'App/Models/' . $file . '.php';
        return new $file();
    }
}
