<!-- Trong PHP:
    Destructor (__destruct) được gọi tự động khi một object bị hủy.

Object sẽ bị hủy khi:
    Bạn unset($obj) → xóa biến.
    Hoặc khi script kết thúc → PHP tự động dọn dẹp bộ nhớ, giải phóng các biến.

Trong ví dụ của bạn, khi chương trình chạy xong dòng cuối cùng của file, PHP tự hủy $stu2 trước, rồi $stu1. Do đó bạn thấy destructor được gọi lần lượt.
    👉 Thứ tự gọi destructor
    Các object được hủy theo thứ tự ngược lại so với khi tạo.
    Vì $stu2 được tạo sau cùng, nên nó bị hủy trước. -->

<?php
    class student {
        private $name;
        private $age;

        public function __construct($name, $age){
            $this ->name = $name;
            $this ->age = $age;
        }

        public function show_info(){
            echo "Name: " . $this->name . ", Age: " . $this->age . "<br>";
        }

        public function __destruct()
        {
            echo "Destructor called for " . $this->name . "<br>";
        }

    }

    $stu1 = new student("Bao", 21);
    $stu1->show_info();


    $stu2 = new student("Van Anh", 21);
    $stu2->show_info();

?>