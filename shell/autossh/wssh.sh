#! /bin/bash

dirPath=`dirname $0`
cd $dirPath

. conf.sh

name=$1
find=0
for str in ${hostconf[*]}
do
    OLD_IFS="$IFS"
    IFS="/"
    sshParams=($str)
    IFS="$OLD_IFS"
    if [ ${sshParams[0]} == $name ]
    then
        find=1
        break
    fi
done

if [ $find == 1 ]
then
    ./core.sh ${sshParams[1]} ${sshParams[2]} "${sshParams[3]}"
else
    echo "输入错误"
fi

exit