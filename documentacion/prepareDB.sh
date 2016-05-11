#
################################################################################################################
#
#  *****Drop and Create database*******
#
################################################################################################################
#
#!/bin/bash

#Validate C9 ID for TMH DB
if [ $# -eq 0 ]; then
    echo "No arguments provided, please enter your C9 ID"
    return 1
fi

#START dataBase
mysql-ctl start
#Locate Doctrine php
cd
cd workspace/site/core/libs/vendor/bin/
#Drop Schema
php doctrine orm:schema-tool:drop --force
#Create Schema
php doctrine orm:schema-tool:create
#Update Schema
php doctrine orm:schema-tool:update --force
#Generate proxies
php doctrine orm:generate-proxies
#To Workspace
cd
cd workspace
#START dataBase
mysql-ctl start
#EXECUTE sql Script
################ Use your c9 user and the sql script needed
mysql -u $1 tmh < documentacion/db-script/datos_base.sql 
################
echo "TMH DataBase is ready for party"
return
################################################################################################################