## Installation


* Clone the repository: `git clone https://github.com/RimOuarrak/akaunting.git`
* modify the name of the ".env.example" file to ".env"
* Install dependencies: `docker-compose up --build  `
* Install Akaunting:

```bash
php artisan install --db-host="db" --db-name="akaunting" --db-username="root" --db-password="pass" --admin-email="admin@company.com" --admin-password="123456"
```

now you can log in using the mail and password above
