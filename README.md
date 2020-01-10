
If your computer has not git , first install git.
You can download git.exe here : https://git-scm.com/downloads
And create mysql database. Database name is blog_db.
Setting up your development environment on your local machine :


git clone https://github.com/ZhuYi0101/laravel-blog-site.git
cd laravel-blog-site
composer install
npm install
php artisan db:seed
php artisan migrate
php artisan serve



Homepage URL::localhost:8000



Admin Account Information : 
	Admin Name : superadmin
	Admin Email : admin@gmail.com
	Admin Password : 12345678
