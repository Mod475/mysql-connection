<?php
/**
 * ملف إعدادات الاتصال بقاعدة البيانات
 * د. إبراهيم الشامي
 */

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "school_db";
    private $connection;
    
    // إنشاء الاتصال
    public function connect() {
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );
        
        // التحقق من وجود أخطاء في الاتصال
        if ($this->connection->connect_error) {
            die("فشل الاتصال بقاعدة البيانات: " . $this->connection->connect_error);
        }
        
        // تعيين الترميز إلى UTF-8 للدعم العربي
        $this->connection->set_charset("utf8");
        
        return $this->connection;
    }
    
    // إغلاق الاتصال
    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
    
    // تنفيذ استعلام
    public function query($sql) {
        return $this->connection->query($sql);
    }
    
    // الحصول على آخر خطأ
    public function getError() {
        return $this->connection->error;
    }
    
    // تنظيف البيانات المدخلة
    public function sanitize($data) {
        return $this->connection->real_escape_string($data);
    }
}

// إنشاء كائن قاعدة البيانات
$db = new Database();
?>