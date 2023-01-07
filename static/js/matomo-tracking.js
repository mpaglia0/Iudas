var idSite = x; // Replace 'x' with your Matomo ID site
var matomoTrackingApiUrl = 'Your_domain/matomo/matomo.php'; // Replace 'Your domain' with your Matomo installation path

var _paq = window._paq = window._paq || [];  
_paq.push(['setTrackerUrl', matomoTrackingApiUrl]);
_paq.push(['setSiteId', idSite]);
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);  