<?php

namespace App\App\Core;

class Upload
{
    private $file;
    private $target_directory;
    private $target_file;
    private $valid_extensions = ["jpg", "jpeg", "png", "gif"];
    private $max_file_size = 10485760; // 10MB
    private $errors = [];

    private $file_info = [];

    public function __construct($file, $type, $target_directory = '')
    {
        $this->file = $file;
        // var_dump($this->file);
        // die;
        if (empty($target_directory)) {
            if ($type === 'product') {
                $current_month_year     = date('Y_m');
                $this->target_directory = 'public/uploads/products/' . $current_month_year . '/';

                if (!is_dir($this->target_directory)) {
                    mkdir($this->target_directory, 0755, true);
                }
            } else {
                $current_month_year     = date('Y_m');
                $this->target_directory = 'public/uploads/posts/' . $current_month_year . '/';
                if (!is_dir($this->target_directory)) {
                    mkdir($this->target_directory, 0755, true);
                }
            }
        } else {
            $this->target_directory = $target_directory;
        }

        // $this->_file_info [
        //     'name' => $this->file['name'],

        // ];
        // new ModelFileUpload(this->_file_info);
    }

    /**
     * @return bool
     */
    public function uploadFile()
    {
        $file_extension = strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));
        $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
        $new_file_path = $this->target_directory . $new_file_name;

        while (file_exists($new_file_path)) {
            $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $new_file_path = $this->target_directory . $new_file_name;
        }

        if (move_uploaded_file($this->file['tmp_name'], $new_file_path)) {
            $this->target_file = $new_file_path;
            return true;
        } else {
            $this->errors[] = 'Đã xảy ra lỗi khi tải tệp lên máy chủ.';
            return false;
        }
    }


    /**
     * @return mixed
     */
    public function getTargetFile()
    {
        return $this->target_file;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function validateFile()
    {
        if ($this->file["size"] > $this->max_file_size) {
            $this->errors['size'] = "Size file too big - you should" . $this->max_file_size / 1048576 . "MB.";
        }
        $file_type = strtolower(pathinfo($this->file["name"], PATHINFO_EXTENSION));
        if (!in_array($file_type, $this->valid_extensions)) {
            $this->errors['extension'] =
                "File extension invalid - " . implode(
                    ", ",
                    $this->valid_extensions
                ) . ".";
        }
        return $this->errors;
    }


    private function saveInformationFile($object_file)
    {
    }
}
