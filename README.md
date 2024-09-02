## GFA_Stadt online tool

This online tool was developed as part of the [GFA_Stadt research project](https://gfa-stadt.de) to support the implementation of health impact assessments in urban planning. It is based on the [Laravel](https://laravel.com) framework.

GFA_Stadt is a co-operation project between 
[HAW Hamburg, Competence Center Gesundheit (CCG)](https://www.haw-hamburg.de/ccg/) and
[ISP – Institute for Urban Research, Planning and Communication at University of Applied Sciences Erfurt](https://isp.fh-erfurt.de).

Note: Although parts of the tool are available in English, it is only fully available in German. In addition, the content and processes are orientated towards the urban planning and health science conditions in Germany.

## Setup

Required: php 8.2 or higher, npm, composer

1. Use CREATE_TABLES.sql script to set up the database.
2. Create .env file from .env.example using URL and db/mail credentials.
3. Run the following commands:
- npm i
- (if necessary:) npm audit fix
- npm run prod
- composer update
- php artisan key:generate
- php artisan storage:link
4. Log in using username admin, password admin.
5. Immediately change password by clicking on the username at the top right, then select “change password”.
6. Create a project and share its registration key (use the registration option on login page).

## Contact

Prof. Dr. Boris Tolg ([boris.tolg@haw-hamburg.de](mailto:boris.tolg@haw-hamburg.de)), HAW
Prof. Dr. Joachim Westenhöfer ([joachim@westenhoefer.de](mailto:joachim@westenhoefer.de)), HAW
Prof. Dr. Heidi Sinning ([sinning@fh-erfurt.de](mailto:sinning@fh-erfurt.de)), ISP
Tammo Adami, HAW
Christian Bojahr, ISP
Arne Sibilis, HAW
Prof. Dr. Johanna Buchcik, HAW

## License

The GFA_Stadt online tool is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
