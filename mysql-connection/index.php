<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة المستخدمين - اتصال MySQLi</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .nav-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            background: #45a049;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: #2196F3;
        }
        
        .btn-secondary:hover {
            background: #0b7dda;
        }
        
        .btn-danger {
            background: #f44336;
        }
        
        .btn-danger:hover {
            background: #d32f2f;
        }
        
        .info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 2rem;
        }
        
        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .card h3 {
            color: #667eea;
            margin-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 0.5rem;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 1rem;
        }
        
        .feature {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            border-right: 4px solid #667eea;
        }
        
        footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1rem;
            color: #666;
            border-top: 1px solid #ddd;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .nav-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>نظام إدارة المستخدمين</h1>
            <p class="subtitle">اتصال MySQLi - د. إبراهيم الشامي</p>
            <p>مشروع عملي لاختياري 1 (Back End)</p>
        </header>
        
        <div class="nav-buttons">
            <a href="create.php" class="btn">➕ إضافة مستخدم جديد</a>
            <a href="read.php" class="btn btn-secondary">👁️ عرض جميع المستخدمين</a>
            <a href="update.php" class="btn">✏️ تحديث بيانات مستخدم</a>
            <a href="delete.php" class="btn btn-danger">🗑️ حذف مستخدم</a>
        </div>
        
        <div class="info-cards">
            <div class="card">
                <h3>معلومات المشروع</h3>
                <p>هذا المشروع يوضح كيفية الاتصال بقاعدة البيانات باستخدام MySQLi في PHP مع تطبيق عملي لنظام CRUD (إنشاء، قراءة، تحديث، حذف).</p>
            </div>
            
            <div class="card">
                <h3>المميزات التقنية</h3>
                <div class="features">
                    <div class="feature">✅ اتصال آمن بـ MySQLi</div>
                    <div class="feature">✅ حماية من هجمات SQL Injection</div>
                    <div class="feature">✅ دعم اللغة العربية</div>
                    <div class="feature">✅ تصميم متجاوب</div>
                    <div class="feature">✅ فصل الملفات (MVC)</div>
                    <div class="feature">✅ معالجة الأخطاء</div>
                </div>
            </div>
            
            <div class="card">
                <h3>إرشادات الاستخدام</h3>
                <p>1. قم بتعديل إعدادات قاعدة البيانات في ملف config/database.php</p>
                <p>2. استخدم أزرار التنقل للوصول إلى الوظائف المختلفة</p>
                <p>3. تأكد من تشغيل خادم MySQL على جهازك</p>
            </div>
        </div>
        
        <footer>
            <p>© 2024 مشروع اتصال MySQLi - د. إبراهيم الشامي</p>
            <p>التكليف الاختياري 1 - Back End عملي</p>
        </footer>
    </div>
</body>
</html>