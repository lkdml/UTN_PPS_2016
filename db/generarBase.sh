#!/bin/bash
cd /home/ubuntu/workspace/site/core/libs/vendor/bin
./doctrine orm:schema-tool:drop --force
./doctrine orm:schema-tool:create
./doctrine orm:schema-tool:update --force
./doctrine orm:generate:proxies
mysql -u root -p tmh < /home/ubuntu/workspace/documentacion/db-script/datos_base.sql