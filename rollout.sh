#!/bin/bash
DEPLOY_DIR='../creativelandscapes'
# Build assets
make build


echo "Test run..."
pycount=$(rsync -acvz --dry-run --omit-dir-times --delete-after --links --exclude-from rsync-exclude Makefile build_blog_config.py booth blog $DEPLOY_DIR|egrep py$|wc -l)
rsync -acvz --dry-run --omit-dir-times --delete-after --links --exclude-from rsync-exclude Makefile build_blog_config.py booth blog $DEPLOY_DIR
echo "Everything look good? (yes)"
read q
if [ "$q" != "yes" ]; then
  echo "Aborting and doing nothing."
  exit
fi
echo ""
echo "Syncing"
rsync -acvz --omit-dir-times --delete-after --links --exclude-from rsync-exclude Makefile build_blog_config.py booth blog $DEPLOY_DIR
echo "Done."
if [ $pycount -gt 0 ]; then
    echo "Python files updated; restart needed"
    echo "Restarting uwsgi"
    sudo service uwsgi restart
fi
make -C $DEPLOY_DIR blog
