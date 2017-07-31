#!/bin/bash

GIT_DIR=$(dirname "$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )" )
SVN_DIR="/tmp/psa"

cd $GIT_DIR

# Make sure we don't have uncommitted changes.
if [[ -n $( git status -s --porcelain ) ]]; then
	echo "Uncommitted changes found."
	echo "Please deal with them and try again clean."
	exit 1
fi

git checkout master

# Prep a home to drop our new files in. Just make it in /tmp so we can start fresh each time.
rm -rf $SVN_DIR

echo "Checking out SVN shallowly to $SVN_DIR"
svn -q checkout https://plugins.svn.wordpress.org/promotore-simple-analytics/ --depth=empty $SVN_DIR
echo "Done!"

cd $SVN_DIR

echo "Checking out SVN trunk to $SVN_DIR/trunk"
svn -q up trunk
echo "Done!"

echo "Deleting everything in trunk except for .svn directories"
for file in $(find $SVN_DIR/trunk/* -not -path "*.svn*"); do
	rm $file 2>/dev/null
done
echo "Done!"

echo "Rsync'ing everything over from Git except for .git stuffs"
rsync -r --exclude='*.git*' $GIT_DIR/* $SVN_DIR/trunk
echo "Done!"

echo "Purging paths included in .svnignore"
# check .svnignore
for file in $( cat "$GIT_DIR/.gitignore" 2>/dev/null ); do
	rm -rf $SVN_DIR/trunk/$file
done
echo "Done!"
