#!/bin/bash

# start mysql
net start mysql80 &

# start emqx mqtt broker
emqx start
