# LEMP docker environment template

docker environment template containing images of: 
- Nginx
- PHP
- MySQL
- PhpMyAdmin
- NodeJs
- Npm

Xdebug has been added to the template to help you debug your code once linked to your favorite code editor.

## Installation

To install the environment:
- simply drag the files from this ripo into your project folder.
- open the .env 
- change the contents of APP_NAME to the name of your project 
- change the name of the database of your project
- change the version of Nginx if needed
- change the version of MySQL if needed
- change the version of PhpMyAdmin if needed
- a laravel-mix compiler for SASS and typescript

When you have finished the configuration of the environment:
- on Windows 
    * open the console of a linux instance
    * go to the folder containing the environment 
    * type the command docker compose up

- on mac and linux 
    * open your terinale
    * go to the folder containing the environment 
    * type the command docker compose up

when the command is entered the first time it will download the different components and install them, this may take more or less time depending on the internet connection. 

### Compiler configuration

once the server is launched correctly you can launch the compiler:
- open the file named webpack_mix.js 
- for the typescripts files modify and copy the line starting with .ts and change the paths so that they lead to your files.
- for SASS files modify and copy the line starting with .sass and change the path so that it leads to your files.
- open a new terminal (ubuntu is not required)
- go to the app folder
- type the command 
    * npm run watch     
    * npx mix watch 

a loading bar will appear, once this one is complete the compiler will have finished its work and it will pause until the next backup of your files. 

You can copy one of the links from the console and paste it into your browser. 

If you work on several browsers with one of these links then an action performed on one of these browsers will be reflected on the others 

## folder hierarchy

the app folder must contains 
- app
    - dist
    - src
        * fonts
        * img
        * js
        * php
        * sass
        * ts
    - index.php
    - package-lock.json
    - package.json
    - tsconfig.json
    - webpack.mix.js

Once these steps are done you will just have to go to the app folder and start your project (the app folder is counted as the root folder of your project)