## Advance Web Application Assignment

To run the application \
1. Fork the git repo
2. Open WAMPServer
3. Create a databse named
```
    task_schduler_db
```
4. Open .env file at the project and change DB_DATABASE to "task_schedule_db"
5. Ensure the port for WAMPServer Database is same as the .env port number
6. navigate to ../TaskScheduler
7. run
   ```
   php artisan migrate:refresh --seed
   php artisan serve
   ```
