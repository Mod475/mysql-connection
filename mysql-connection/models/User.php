<?php
/**
 * نموذج لإدارة المستخدمين
 */

require_once 'config/database.php';

class User {
    private $db;
    private $table = "users";
    
    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }
    
    // إنشاء جدول المستخدمين
    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS {$this->table} (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            phone VARCHAR(20),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        
        return $this->db->query($sql);
    }
    
    // إضافة مستخدم جديد
    public function create($name, $email, $phone) {
        $name = $this->db->sanitize($name);
        $email = $this->db->sanitize($email);
        $phone = $this->db->sanitize($phone);
        
        $sql = "INSERT INTO {$this->table} (name, email, phone) 
                VALUES ('$name', '$email', '$phone')";
        
        return $this->db->query($sql);
    }
    
    // قراءة جميع المستخدمين
    public function readAll() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $result = $this->db->query($sql);
        
        $users = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    
    // قراءة مستخدم واحد
    public function readOne($id) {
        $id = $this->db->sanitize($id);
        $sql = "SELECT * FROM {$this->table} WHERE id = '$id'";
        $result = $this->db->query($sql);
        
        return $result->fetch_assoc();
    }
    
    // تحديث بيانات مستخدم
    public function update($id, $name, $email, $phone) {
        $id = $this->db->sanitize($id);
        $name = $this->db->sanitize($name);
        $email = $this->db->sanitize($email);
        $phone = $this->db->sanitize($phone);
        
        $sql = "UPDATE {$this->table} 
                SET name = '$name', email = '$email', phone = '$phone'
                WHERE id = '$id'";
        
        return $this->db->query($sql);
    }
    
    // حذف مستخدم
    public function delete($id) {
        $id = $this->db->sanitize($id);
        $sql = "DELETE FROM {$this->table} WHERE id = '$id'";
        
        return $this->db->query($sql);
    }
    
    // الحصول على عدد المستخدمين
    public function count() {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        
        return $row['total'];
    }
}
?>