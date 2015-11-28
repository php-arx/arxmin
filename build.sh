#!/bin/sh

# Rebuild public assets from arxmin-ui
rm -R public
git clone git@github.com:cherrylabs/arxmin-ui.git public
rm -rf public/.git