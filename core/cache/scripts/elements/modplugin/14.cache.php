<?php  return '$modx->regClientHTMLBlock(\'
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://wsidevelopment.com.mx/playground/stats/" : "http://wsidevelopment.com.mx/playground/stats/");
document.write(unescape("%3Cscript src=\\\'" + pkBaseURL + "piwik.js\\\' type=\\\'text/javascript\\\'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 82);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://wsidevelopment.com.mx/playground/stats/piwik.php?idsite=82" style="border:0" alt="" /></p></noscript>\');
return;
';