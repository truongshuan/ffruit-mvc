<?php


namespace App\App\Core;


class Validation
{
    private $data;
    private $errors;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validateRegister()
    {
        $this->validateEmail();
        $this->validateInfor();
        $this->validatePassword(true);
        $this->validatePasswordConfirm();
         $this->validatePhone();

        return $this->errors;
    }
    public function validateLogin()
    {
        $this->validateEmail();
        $this->validatePassword(false);

        return $this->errors;
    }

    public function validateFormAdd()
    {
        $this->validateInput();

        return $this->errors;
    }

    public function validateForgot()
    {
        $this->validateEmail();

        return $this->errors;
    }

    public function validateVeri()
    {
        $this->validateOTP();

        return $this->errors;
    }

    public function validateChange()
    {
        $this->validatePassword(true);
        $this->validatePasswordConfirm();

        return $this->errors;
    }

    public function validateCate()
    {
        $this->validateCategories();


        return $this->errors;
    }
    public  function validateSMS(){
        $this->validatePhone();

        return $this->errors;
    }

    private function validateEmail()
    {
        $email = trim($this->data['email']);
        if (empty($email)) {
            $this->getError('email', 'Vui lòng nhập email');
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->getError('email', 'Email không đúng định dang');
        }
    }
    private function validateInfor()
    {
        $username = trim($this->data['username']);
        $fullname = trim($this->data['fullname']);
        if (empty($username)) {
            $this->getError('username', 'Vui lòng nhập username');
        }
        if (empty($fullname)) {
            $this->getError('fullname', 'Vui lòng nhập họ tên');
        }
    }
    private function validatePassword($temp)
    {
        $password = trim($this->data['password']);
        $regex = "/^(?=.*?[0-9])(?=.*[A-Z]).{6,12}$/";
        if ($temp == true) {
            if (empty($password)) {
                $this->getError('password', 'Vui lòng nhập mật khẩu');
            } else if (!preg_match($regex, $password)) {
                $this->getError('password', 'Mật khẩu chỉ 6-12 kí tự và 1 kí tự hoa');
            }
        } else {
            if (empty($password)) {
                $this->getError('password', 'Vui lòng nhập mật khẩu');
            }
        }
    }
    private function validatePasswordConfirm()
    {
        $confirm = trim($this->data['confirm']);
        $repass = trim($this->data['password']);

        if (empty($confirm)) {
            $this->getError('confirm', 'Xác nhận mật khẩu');
        } else if ($repass !== $confirm) {
            $this->getError('confirm', 'Mật khẩu không trùng khớp');
        }
    }

    private function validatePhone()
    {
        $phone = trim($this->data['phone']);
        if (empty($phone)) {
            $this->getError('phone', 'Nhập số điện thoại');
        } else if (strlen($phone) > 9 || strlen($phone) < 9) {
            $this->getError('phone', 'Số điện thoại chỉ 9 kí tự');
        }
    }
    private function validateOTP()
    {
        $otp = trim($this->data['otp']);
        if (empty($otp)) {
            $this->getError('otp', 'Vui lòng xác nhận mã');
        }
    }
    private function validateCategories()
    {
        $title = trim($this->data['title']);
        $description = trim($this->data['desc']);
        if (empty($title)) {
            $this->getError('title', 'Nhập tiêu đề danh mục sản phẩm');
        }
        if (empty($description)) {
            $this->getError('description', 'Nhập mô tả danh mục sản phẩm');
        }
    }

    private function validateInput()
    {
        $name = trim($this->data['name']);
        $price = trim($this->data['price']);
        $category = trim($this->data['id_category']);
        $file = $_FILES['image']['name'];
        $description = trim($this->data['desc']);
        if (empty($name)) {
            $this->getError('name', 'Nhập tên sản phẩm');
        }
        if (empty($price)) {
            $this->getError('price', 'Nhập giá sản phẩm');
        } else if ($price <= 0) {
            $this->getError('price', 'Giá sản phẩm phải lớn hơn 0');
        }
        if (empty($description)) {
            $this->getError('description', 'Nhập mô tả');
        }
        if (empty($file)) {
            $this->getError('file', 'Tải hình ảnh sản phẩm');
        }
        if (empty($category)) {
            $this->getError('category', 'Chọn loại sản phẩm');
        }
    }
    public function validatePost()
    {
        $title = trim($this->data['title']);
        $thumbnail = $_FILES['thumbnail'];
        $content = trim($this->data['content']);
        $topic_id = trim($this->data['topic_id']);
        if (empty($title)) {
            $this->getError('title', 'Nhập tiêu đề');
        }
        if (empty($thumbnail['name'])) {
            $this->getError('thumbnail', 'Tải hình ảnh');
        }
        if (empty($content)) {
            $this->getError('content', 'Nhập nội dung bài viết');
        }
        if (empty($topic_id)) {
            $this->getError('topic', 'Chọn chủ đề bài viết');
        }

        return $this->errors;
    }

    public function validateTopic()
    {
        $name = trim($this->data['name']);
        $body = trim($this->data['body']);
        if (empty($name)) {
            $this->getError('name', 'Nhập chủ đề');
        }
        if (empty($body)) {
            $this->getError('body', 'Nhập nội dung');
        }

        return $this->errors;
    }

    private function getError($type, $message)
    {
        $this->errors[$type] = $message;
    }
}
