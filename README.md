# phone-book
Sample PHP phonebook web app to perform simple CRUD and Search operation

## setup instructions

### prerequisites
The application runs on a wamp/lamp stack, one click windows installer can be downloaded from <a href="https://wampserver-64bit.en.softonic.com/"> https://wampserver-64bit.en.softonic.com </a>

### clone the repo
```bash
  git clone https://github.com/maxwelkoros/phone-book.git
```

### restore backup sql
Start by creating the phonebook database on mysql 
```sql
  CREATE DATABASE phonebook;
```
use either phpmyadmin tool to restore the backup sql data under the sql_backups folder, or execute the following command on the terminal
```sql
mysql -uroot --database phonebook < sql_backups/contacts.sql
```
