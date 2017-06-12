#! /usr/bin/expect
set username [lindex $argv 0]
set host [lindex $argv 1]
set password [lindex $argv 2]

set timeout 10
spawn ssh $username@$host
expect {
    "yes/no" {
        send "yes\r"
        exp_continue
    }
    "password" {
        send "${password}\r"
    }
}

interact
