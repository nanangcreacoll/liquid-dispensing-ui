#!/bin/sh

# start mysql service
sudo systemctl start mysql &

# start emqx service
sudo systemctl start emqx