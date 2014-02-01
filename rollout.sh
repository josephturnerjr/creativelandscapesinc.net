#!/bin/bash
DEPLOY_DIR='../creativelandscapes'
# Build assets
make build


echo "Test run..."
rsync -acvz --dry-run --omit-dir-times --delete-after --links .site $DEPLOY_DIR
echo "Everything look good? (yes)"
read q
if [ "$q" != "yes" ]; then
  echo "Aborting and doing nothing."
  exit
fi
echo ""
echo "Syncing"
rsync -acvz --omit-dir-times --delete-after --links .site $DEPLOY_DIR
echo "Done."
