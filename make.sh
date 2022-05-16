#!/bin/bash
cd $1
folder=${PWD##*/}
v=`cat mod_km_proguct_groups.xml|grep '<version>'|awk -F '>' '{print $2}'|awk -F '<' '{print $1}'`;
name=`echo ${folder/.v./.v.$v.}.zip`;
rm $name;
# zip -r $name install.xml upload
echo Модуль $name;
git add *
git commit -m "update"
git push