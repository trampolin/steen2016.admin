#!/bin/bash
# core
if [ ! -f ./core/STEEN_Controller.php ]; then
	cp ./third_party/community_auth/core/STEEN_Controller.php ./core/STEEN_Controller.php
fi

if [ ! -f ./core/STEEN_Input.php ]; then
	cp ./third_party/community_auth/core/STEEN_Input.php ./core/STEEN_Input.php
fi

if [ ! -f ./core/STEEN_Model.php ]; then
	cp ./third_party/community_auth/core/STEEN_Model.php ./core/STEEN_Model.php
fi

# hooks
if [ ! -f ./hooks/auth_constants.php ]; then
	cp ./third_party/community_auth/hooks/auth_constants.php ./hooks/auth_constants.php
fi

if [ ! -f ./hooks/auth_sess_check.php ]; then
	cp ./third_party/community_auth/hooks/auth_sess_check.php ./hooks/auth_sess_check.php
fi

# controllers
if [ ! -f ./controllers/Examples.php ]; then
	cp ./third_party/community_auth/controllers/Examples.php ./controllers/Examples.php 
fi

# public_root
if [ ! -f ./../.htaccess ]; 
then
	cp ./third_party/community_auth/public_root/.htaccess ./../.htaccess
else
	sed -i '1s/^/# MAKE SURE TO LEAVE THE NEXT TWO LINES HERE.\n# BEGIN DENY LIST --\n# END DENY LIST --\n\n/' ./../.htaccess
fi
