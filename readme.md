# ARCHIVING ON 1 DEC 2023 - SEE BELOW

# yt-2005-watch  
A YouTube frontend written with the Invidious api.  

## Requirements
- Webserver (preferably, Apache)
- PHP ≥ 7.2.5

## Setup  
1. Go to your webserver's documentroot, then do `git clone https://github.com/pixdoet/yt-2005-watch.git` on the directory.  
2. You're done! If you wanna configure stuff, edit `includes/server.php`, where you can change the instance of invidious.  

## Directory structure
- `/includes/`: Contains include files for the PHP code
    - `/includes/html/`: Contains HTML files used for includes (no results, header etc)
- `/yts/`: Contains static files (YouTube Static)

## Fixes:
- Uses Invidious instead of youtubei due to bugs
- Adds missing images and pages

## License  
Apache 2.0

---

### Publicly maintained instances
Stable: http://cleantalk2.great-site.net
