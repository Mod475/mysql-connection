<?php
require_once 'models/User.php';

$user = new User();
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])) {
    $id = $_POST['id'] ?? '';
    
    if (!empty($id)) {
        // البحث عن المستخدم أولاً
        $userData = $user->readOne($id);
        
        if ($userData) {
            if ($user->delete($id)) {
                $message = "✅ تم حذف المستخدم بنجاح!";
            } else {
                $message = "❌ حدث خطأ: " . $user->getError();
            }
        } else {
            $message = "❌ المستخدم غير موجود";
        }
    } else {
        $message = "❌ يرجى إدخال ID المستخدم";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حذف مستخدم</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>حذف مستخدم</h1>
            <a href="index.php" class="back-link">← العودة للرئيسية</a>
        </header>
        
        <div class="form-container">
            <?php if ($message): ?>
                <div class="message <?php echo strpos($message, '✅') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <div class="warning-box">
                <h3>⚠️ تحذير!</h3>
                <p>عملية الحذف نهائية ولا يمكن التراجع عنها. يرجى التأكد من ID المستخدم قبل الحذف.</p>
            </div>
            
            <form method="POST" action="" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟');">
                <div class="form-group">
                    <label for="id">أدخل ID المستخدم للحذف *</label>
                    <input type="number" id="id" name="id" required>
                </div>
                
                <input type="hidden" name="confirm" value="1">
                <button type="submit" class="btn btn-danger">حذف المستخدم</button>
                <a href="read.php" class="btn btn-secondary">عرض المستخدمين أولاً</a>
            </form>
        </div>
    </div>
</body>
</html>