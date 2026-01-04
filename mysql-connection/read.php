<?php
require_once 'models/User.php';

$user = new User();
$users = $user->readAll();
$total = $user->count();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المستخدمين</title>
    <style>
        .users-table {
            width: 100%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background-color: #667eea;
            color: white;
            padding: 1rem;
            text-align: right;
        }
        
        td {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #666;
        }
        
        .stats {
            background: white;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>قائمة المستخدمين</h1>
            <a href="index.php" class="back-link">← العودة للرئيسية</a>
        </header>
        
        <div class="stats">
            <p>إجمالي المستخدمين: <strong><?php echo $total; ?></strong></p>
        </div>
        
        <div class="users-table">
            <?php if (count($users) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ التسجيل</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo htmlspecialchars($user['name']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['phone']); ?></td>
                                <td><?php echo $user['created_at']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="empty-state">
                    <p>لا يوجد مستخدمين مسجلين بعد.</p>
                    <a href="create.php" class="btn">➕ إضافة مستخدم جديد</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>