
توی این راهنما به شما نشون می‌دیم که چطور می‌تونید صدور گواهی دیجیتال برای کاربردهای TLS/SSL را با استفاده از ابزارهای Let`s Encrypt فعال کنید. ما فرض کردیم که شما از سرورهای Apache2 برای راه اندازی سایت خودتون روی سیستم عامل لینوکس استفاده کردید.

گواهی‌های دیجیتال SSL  در سایت‌ها برای رمزنگاری آمد رفت داده‌ها بین کاربران و سرور استفاده می‌شود تا بتواند امنیت بیشتری را برای کاربران، داده‌های آنها و دسترسی امن به نرم‌افزارها فراهم کند. این در حالی است که شما باید برای صدور گواهی به مراجع معتبر هزینه سالیانه پرداخت کنید تا بتوانید از یک گواهی معتبر استفاده کنید. اما Let`s Encript یک راه ساده، خودکار و رایگان برای تولید و استفاده از یک گواهی معتبر فراهم کرده است.

در ابتدای این مستند نیز اشاره کردیم که هدف اصلی این آموزش راه اندازی سیستم گواهی دیجیتال با استفاده از سیستم رایگان Let`s Encrypt است.

## پیش نیازها

پیش از اینکه بتونید این آموزش رو دنبال کنید باید یک سری ابزار و پیش نیاز رو داشته باشید. این پیش نیازها عبارتند از:

* سیستم عامل لینوکس که بهتر هست نسخه Ubuntu 16.04 باشه. گرچه تمام مراحلی که توی این مستند آوردیم رو می‌تونید برای سیستم‌های عامل دیگه به کار ببرید اما ممکن هست که توی هر سیستم‌عامل مجبور به استفاده از ابزارهای متفاوتی باشید.
* سرور Apache2 که باید روی لینکس شما نصب شده باشه و به صورت کامل کانفیگ و راه اندازی شده باشه. این سیستم باید به گونه‌ای راه اندازی شده باشه که از Virtual Host حمایت کنه.

در صورتی که این پیش نیازها رو دارید می‌تونید به سرور خودتون لاگین کنید و ادامه آموزش رو گام به گام دنبال کنید.

## گام ۱ - نصب برنامه کاربری و ابزارها

گروه Let`s Encript (از این به بعد از نام مخفف LE استفاده می‌کنید) یک ابزار کاربری ساده برای تولید و گرفتن گواهی جدید ارائه کرده. این برنامه که certbot نام داره به صورت رسمی توسط همین گروه ارائه شده که نسخه‌های جدید اون نیز به صورت مستقیم توسط همین گروه در مخزن‌های نرم افزاری Ubuntu منتشر می‌شه. این نرم افزار به صورت مداوم توسعه پیدا می‌کنه بنابر این نصب دستی این ابزار کار اشتباهی هست. اگه شما از مخزن‌های نرم افزار Ubuntu نصب کرده باشید می‌تونید به سادگی از نسخه‌های به روز این نرم‌افزار استفاده کنید.

اولین کاری که برای نصب این نرم افزار باید انجام بدید اضافه کردن مخزن نرم افزاری است:

	sudo add-apt-repository ppa:certbot/certbot

باید اجرای این دستور رو دنبال کنید. ممکن هست که در ادامه سیستم برای اضافه کردن این مخزن از شما تایید بخواد. تایید کنید و اجازه بدید که این مخزن به فهرست مخزن‌های فعال شما اضافه بشه. بعد از این کار شما باید اطلاعات سیستم در مورد مخزن‌های نرم افزاری رو با دستور زیر به روز کنید:

	sudo apt-get update

با این کار همه چیز دیگه اماده هست و شما می‌تونید به سادگی برنامه کاربری LE رو نصب کنید:

	sudo apt-get install python-certbot-apache

با این کار دیگه برنامه کاربری نصب شده و اماده استفاده است.

## گام ۲ - راه اندازی گواهی دیجیتال

ساخت یک گواهی دیجیتال جدید برای Apache با استفاده از ابزار certbot خیلی ساده و دم دست هست. این نرم افزار یک گواهی جدید ایجاد می‌کنه و اون رو برای دامنه‌ای که با پارامتر تعیین کردید نصب و راه اندازی می‌کند.

برای اینکه بتونید به صورت محاوره‌ای این گواهی رو ایجاد کنید به گونه‌ای که برای یک دامنه تولید و راه اندازی بشه کافی است که دستور زیر رو در خط فرمان اجرا کنید (من فرض کردم که می‌خواهید برای دامنه www.viraweb123.ir این کار را انجام بدید):

	sudo certbot --apache -d viraweb123.ir

If you want to install a single certificate that is valid for multiple domains or subdomains, you can pass them as additional parameters to the command. The first domain name in the list of parameters will be the base domain used by Let’s Encrypt to create the certificate, and for that reason we recommend that you pass the bare top-level domain name as first in the list, followed by any additional subdomains or aliases:

	sudo certbot --apache -d example.com -d www.example.com

For this example, the base domain will be example.com.

If you have multiple virtual hosts, you should run certbot once for each to generate a new certificate for each. You can distribute multiple domains and subdomains across your virtual hosts in any way.

After the dependencies are installed, you will be presented with a step-by-step guide to customize your certificate options. You will be asked to provide an email address for lost key recovery and notices, and you will be able to choose between enabling both http and https access or forcing all requests to redirect to https. It is usually safest to require https, unless you have a specific need for unencrypted http traffic.

When the installation is finished, you should be able to find the generated certificate files at /etc/letsencrypt/live. You can verify the status of your SSL certificate with the following link (don’t forget to replace example.com with your base domain):

	https://www.ssllabs.com/ssltest/analyze.html?d=example.com&latest

You should now be able to access your website using a https prefix.

## Step 3 — Verifying Certbot Auto-Renewal

Let’s Encrypt certificates only last for 90 days. However, the certbot package we installed takes care of this for us by running certbot renew twice a day via a systemd timer. On non-systemd distributions this functionality is provided by a cron script placed in /etc/cron.d. The task runs twice daily and will renew any certificate that's within thirty days of expiration.

To test the renewal process, you can do a dry run with certbot:

	sudo certbot renew --dry-run

If you see no errors, you're all set. When necessary, Certbot will renew your certificates and reload Apache to pick up the changes. If the automated renewal process ever fails, Let’s Encrypt will send a message to the email you specified, warning you when your certificate is about to expire.

## Conclusion

In this guide, we saw how to install a free SSL certificate from Let’s Encrypt in order to secure a website hosted with Apache. We recommend that you check the official Let’s Encrypt blog for important updates from time to time, and read the Certbot documentation for more details about the Certbot client.
