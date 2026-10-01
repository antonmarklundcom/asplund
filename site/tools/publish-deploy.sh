#!/usr/bin/env bash
# Publish site/ as the ROOT of the `deploy` branch (what Hostinger Git deploys).
# Run from the repo root after every merge to main:   bash site/tools/publish-deploy.sh
#
# `git subtree split` is deterministic: the same site/ history always yields the
# same commits, so a normal push just appends. Never force-push; if the push is
# rejected, find out why first (someone committed to `deploy` by hand?).
set -euo pipefail

git fetch origin main
git checkout main
git pull --ff-only origin main
git subtree split --prefix site -b deploy-tmp
git push origin deploy-tmp:deploy
git branch -D deploy-tmp
