#!/bin/sh

# Rebuild script for public assets
rm -R public
git clone git@github.com:cherrylabs/arxmin-ui.git public
rm -rf public/.git