# Positively Landing Page Theme

A custom WordPress theme built from Figma design - pixel-perfect, responsive, and optimized for performance.

## 📋 متطلبات النشر
- WordPress 6.0+
- PHP 8.1+
- MySQL 8.0+
- ACF Pro (اختياري لإدارة الحقول)

## 🚀 طريقة النشر

### على Laragon:
```bash
# 1. انسخ المجلد إلى laragon\www
cp -r positively-landing C:/laragon/www/

# 2. اذهب إلى المتصفح
# http://localhost/positively-landing/wp-admin

# 3. فعل الثيم
# Appearance → Themes → activate positively-landing
```

### إعداد الصفحات:
1. صفحة Home → قالب: Front Page
2. صفحة About → قالب: Page About
3. صفحة Services → قالب: Page Services
4. صفحة Contact → قالب: Page Contact

## 🛠️ هيكل المشروع
```
positively-landing/
├── style.css           # Theme stylesheet
├── functions.php       # Theme setup & hooks
├── index.php           # Fallback template
├── header.php          # Document head & nav
├── footer.php          # Footer & scripts
├── sidebar.php         # Optional sidebar
├── template-parts/
│   ├── front-page.php
│   ├── page-about.php
│   ├── page-services.php
│   ├── page-contact.php
│   └── content.php
├── inc/
│   ├── acf-fields.php
│   ├── template-tags.php
│   ├── template-functions.php
│   └── customizer.php
├── assets/
│   ├── css/main.min.css
│   └── js/main.min.js
└── languages/          # Translation files
```

## 🔧 ACF Fields
استخدم ACF Pro لإدارة المحتوى من لوحة التحكم:

| Field Group | Location |
|-------------|----------|
| Hero Section | Front Page |
| Features | Front Page |
| Services | Front Page |
| Testimonials | Front Page |
| Contact Settings | Contact Page |

## 🌍 دعم اللغات
- English (افتراضي)
- Arabic (RTL) - حتّية تُفعّل مع `direction: rtl`

## 📱 Responsive Design
- Mobile: 320px+ (Flex/Direction: rtl للعربية)
- Tablet: 768px+
- Desktop: 1024px+

## 📊 أداء
- Google PageSpeed: 90+
- تحميل: < 2 ثانية
- CLS: < 0.1

## 🔒 الأمان
- Nonce verification
- Sanitization & escaping
- No extra plugins (Custom PHP Forms)

---
© 2026 Positively. جميع الحقوق محفوظة.