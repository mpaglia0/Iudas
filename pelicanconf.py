#!/usr/bin/env python
# -*- coding: utf-8 -*- #

from __future__ import unicode_literals
import os
import sys
sys.path.append(os.curdir)

AUTHOR = 'your_name'
SITENAME = 'your_website_name'
SITESUBTITLE = 'fill_me_if_you_like'
# Regarding SITEURL.
# Leave blank (like the example here below) while developing.
# Add SITEURL='https://www.your-site.com' in publishconf.py
SITEURL=''

# Path of source (ReST/Markdown) files
PATH = 'content'

DEFAULT_DATE = 'fs'
DEFAULT_DATE_FORMAT = '%d/%m/%Y'
TIMEZONE = 'UTC'

DEFAULT_LANG = 'it' # Adjust with your own language
LOCALE = 'it_IT.UTF-8' # Adjust with your own language

# Adds some nice effects to text
TYPOGRIFY = True

# Max words to use for summary
SUMMARY_MAX_LENGTH = 50
SUMMARY_END_SUFFIX = ' …'

# Web site statistics
# Matomo > 4.0 needed
# More settings in js/matomo-tracking.js
# Move this feature to your publishconf.py
ACTIVATE_MATOMO = True

# Activate Mosparo SPAM protection
# Needs a working Mosparo installation
# Move this feature to your publishconf.py
ACTIVATE_MOSPARO = True
MOSPARO_HOST = 'mosparo_host_here_without_https://'

# Feed generation is usually not desired when developing so
# set all to 'None'. Duplicate this configuration in publishconf.py
FEED_ALL_ATOM = None
FEED_ALL_RSS = 'feed/all.rss.xml'
CATEGORY_FEED_ATOM = None
CATEGORY_FEED_RSS = 'feed/{slug}.rss.xml'
TRANSLATION_FEED_ATOM = None
AUTHOR_FEED_ATOM = None
AUTHOR_FEED_RSS = None

# Blogroll
LINKS = (('Pelican', 'https://getpelican.com/'),
         ('Python.org', 'https://www.python.org/'),
         ('Jinja2', 'https://palletsprojects.com/p/jinja/'),
         ('You can modify those links in your config file', '#'),)

# Pagination
DEFAULT_ORPHANS = 2
DEFAULT_PAGINATION = 5
PAGINATION_PATTERNS = (
    (1, '{base_name}/', '{base_name}/index.html'),
    (2, '{base_name}/page/{number}/', '{base_name}/page/{number}/index.html'),
)

# Uncomment following line if you want document-relative URLs when developing
RELATIVE_URLS = False

STATIC_PATHS = ['assets', 'blog', 'img', 'news', 'pages']
EXTRA_PATH_METADATA = {
    'assets/robots.txt': {'path': 'robots.txt'},
    'assets/favicon.ico': {'path': 'favicon.ico'},
    'assets/htaccess': {'path': '.htaccess'},
}

DIRECT_TEMPLATES = ['index', 'tags',  'archives', 'search', 'categories']

# Post and Pages path
ARTICLE_URL = '{date:%Y}/{date:%m}/{slug}'
ARTICLE_SAVE_AS = '{date:%Y}/{date:%m}/{slug}.html'

PAGE_URL = '{slug}'
PAGE_SAVE_AS = '{slug}.html'

YEAR_ARCHIVE_SAVE_AS = '{date:%Y}/index.html'
MONTH_ARCHIVE_SAVE_AS = '{date:%Y}/{date:%m}/index.html'

# Tags and Category path
CATEGORY_URL = '{slug}'
CATEGORY_SAVE_AS = '{slug}.html'
CATEGORIES_SAVE_AS = 'category.html'

DRAFT_URL = 'draft/{slug}'
DRAFT_SAVE_AS = 'draft/{slug}.html'

TAG_URL = 'tags/{slug}'
TAG_SAVE_AS = 'tags/{slug}.html'
TAGS_SAVE_AS = 'tags.html'

# Author
# This is the standard Pelican structure
AUTHOR_URL = ''
AUTHOR_SAVE_AS = ''
AUTHORS_SAVE_AS = ''
# This is a single author page structure
# it works only if above settings are BLANKS ('')
SINGLE_AUTHOR_SAVE_AS = 'path_to_presentation/index.html'

# In thi way all contents are created with status = draft
# unless a status = published is stated on each single content
DEFAULT_METADATA = {
   'status': 'draft',
   'author': 'your_name', # only for single auhor blog!
}

# Do not use Categories and Pages for the menu but...
DISPLAY_CATEGORIES_ON_MENU = False
DISPLAY_PAGES_ON_MENU = False

# ... list menu voices as you want
MENUITEMS = (
        ('News', '/news/'),
        ('Blog', '/blog/'),
        ('Archives', '/archives/'),
    )

###############
###         ###
### Plugins ###
###         ###
###############

PLUGIN_PATHS = [
  'plugins'
]

PLUGINS = [
  'neighbors',
  'webassets',
  'lunr_search',
  'static_comments_plus',
  'sitemap',
  'readtime',
  'pelican.plugins.series'
]

# Config for Sitemap plugin
SITEMAP = {
    'format': 'xml',
    'priorities': {
        'articles': 0.6,
        'indexes': 0.5,
        'pages': 0.4
    },
    'changefreqs': {
        'articles': 'weekly',
        'indexes': 'weekly',
        'pages': 'monthly'
    }
}

# Config for Static Comments Plus plugin
STATIC_COMMENTS_PLUS = True
STATIC_COMMENTS_DIR = 'comments'
STATIC_COMMENTS_SOURCE = 'RST'
SHOW_COMMENTS = True #Set to 'False' if you want to present comment area collapsed by default

# Config for Readtime plugin
READTIME_WPM = {
     'it': {
        'wpm': 190,
        'min_singular': 'minuto',
        'min_plural': 'minuti',
        'sec_singular': 'secondo',
        'sec_plural': 'secondi'
    }
}

THEME = 'themes/Z'

###############################
###                         ###
### Theme specific settings ###
###                         ###
###############################

# Import the date and extract the current year
# if you need a dynamic copyright year
from datetime import date
COPY_DATE = '2018 - '
DCOPY_DATE = date.today().year

# If set to 'True' hide the copyright
# note and shows a CC statement
CC_LICENSE = False

# Set a custom footer
# FOOTER_INCLUDE = 'your_customized_footer.html'
# IGNORE_FILES = [FOOTER_INCLUDE]
# THEME_TEMPLATES_OVERRIDE = [os.path.dirname(__file__)]

# Set a common header for all contents
# If you do not specify a different image or
# color on each page, this one will be used
HEADER_COLOR = '#fafafa' # any CSS color is valid
HEADER_COVER = 'images/standard_image_for_pages.jpg'
# If set to TRUE you can load TWITTER_IMAGE on all pages/articles to be used as twitter:image
# if set to False HEADER_COVER will be used
FORCE_TWITTER_IMAGE = True
TWITTER_IMAGE = 'images/specific_twitter_image.jpg'

# Show social icons in footer
SOCIAL = (('twitter', 'https://twitter.com/your_user'),
          ('github', 'https://github.com/your_user'),
          ('envelope','mailto:you@your-domain.com'))

# Color scheme for code blocks
COLOR_SCHEME_CSS = 'darkly.css'

# Customized CSS
# CSS_OVERRIDE = 'assets/css/custom.css'

# If you desire to use your own JavaScript, turn it to True
ENABLE_CUSTOM_THEME_JAVASCRIPT = False

# Jinja config - Pelican 4
JINJA_ENVIRONMENT = {
  'extensions' :[
    'jinja2.ext.loopcontrols',
    'jinja2.ext.i18n',
    'jinja2.ext.do'
  ]
}

# Call the translated strings.
# Needs a myfunctions.py file in the root
# directory of Pelican
import myfunctions
JINJA_FILTERS = {
     'gettext': myfunctions.gettext,
}
