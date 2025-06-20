# How to install and run Iudas for the first time

## A step-by-step guide

### Introduction

Installation of a theme in Pelican is a very easy task!

The dedicated Pelican `pelican-themes` command line utility will do all the job. The official guide can be found [HERE](https://docs.getpelican.com/en/latest/pelican-themes.html).

TODO

### How Iudas project is organized

Branches can be created and deleted as per my personal use but you will ever find two of them:

- main

- dev

**dev** is the development branch. **Never** use these files for production websites.

**main** is the stable branch. Files have been tested and proved they work well.

Despite the fact the *main* branch is evolving, I can apply here also small changes, fixes etc. so my suggestion is **do not use main branch files** for your site but use *Releases* packages instead.

![Screenshot](screenshots/releases.jpg)

Releases are published only when new features are available/complete and in the Release page you can see the Changelog.

![Screenshot](screenshots/packages.jpg)

Click on the archive you need, unzip it, and you will have all the necessary files at place.

Moreover the root theme directory will have the complete name (i.e. Iudas-`version`). So - at your choice - you can use the theme as follows:

- Rename Iudas-`version` in *Iudas* and overwrite the old directory. In this way the old theme will be replaced by the new one.

- Keep the directory AS IS so you will have available a 'theme history'. Update the theme name in your `pelicanconf.py` file and rebuild the website in order to have the new version. In this way you could also 'downgrade' a theme if you are not happy with it simply changing the relevant parameter in `pelicanconf.py` and rebuild the website.
