## SIMSekolah

### System Requirements
- PHP >= 8.0
- BCMath PHP Extension
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
### Install
* Clone repository (`$ git clone https://github.com/semet/simsekolah.git`).
* CD into the project Directory (`$ cd simsekolah`)
* Install dependency (`$ composer install`)
* Create `.env` file (`$ cp .env.example .env`).
* Enter database detail in `.env`.
* Run the migration (`$ php artisan migrate:fresh --seed`).
* Start the server (`$ php artisan serve`) and visit http://127.0.0.1:8000.
* Goto to http://127.0.0.1:8000/admin/login to login as admin with Email: `hamdanilombk@gmail.com` and password: `123`
* You can try Login as any user by visiting http://127.0.0.1:8000/[admin|guru|siswa|operator]  and get one credential from table.
* To enable test Mailing, Use [mailtrap](https://mailtrap.io) and set the configuratin in `.env` file
* Last, run `$ php artisan queue:work` to run the queue

### **Don't forget to give Star....**

#### Lets improve this Repository by contributing and send me PR... Thank you in advance..
