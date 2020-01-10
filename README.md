
If your computer has not git , first install git.<br>
You can download git.exe here : https://git-scm.com/downloads<br>
And create mysql database. Database name is blog_db.<br>
Setting up your development environment on your local machine :<br>


git clone https://github.com/ZhuYi0101/laravel-blog-site.git<br>
cd laravel-blog-site<br>
composer install<br>
npm install<br>
copy .env.example .env<br>
php artisan key:generate<br>
<br>
<br>
<span>********************</span>change DB_DATABASE=laravel to DB_DATABASE=blog_db in .env file**<br>
<br>
<br>
php artisan migrate<br>
php artisan db:seed<br>
php artisan serve<br>
<br>
<br>
<br>
Homepage URL::localhost:8000<br>
<br>
<br>
<br>
Admin Account Information : <br>
	                    Admin Name : superadmin<br>
	                    Admin Email : admin@gmail.com<br>
	                    Admin Password : 12345678<br>
