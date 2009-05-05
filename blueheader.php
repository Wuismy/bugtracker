<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="http://yourrugby.org/general.css">

<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
-->
</style>
</head>

<body>

<div id="clubs" style="position:absolute; left:134px; top:217px; width:97px; height:18px; z-index:4;">
<a href="/clubs/search.php" onMouseOver="roll_over('yourclubs', '/smallpics/yourClubsalt.jpg')" onMouseOut="roll_over('yourclubs', '/smallpics/yourClubs.jpg')"><img src="/smallpics/yourClubs.jpg" name="yourclubs" width="85" height="17" border="0" /></a></div>

<div id="scores" style="position:absolute; left:123px; top:237px; width:98px; height:21px; z-index:5;">
<a href="/scores/" onMouseOver="roll_over('yourscores', '/smallpics/yourScoresalt.jpg')" onMouseOut="roll_over('yourscores', '/smallpics/yourScores.jpg')"><img src="/smallpics/yourScores.jpg" name="yourscores" width="96" height="17" border="0" /></a></div>

<div id="standings" style="	position:absolute; left:98px; top:257px; width:129px; height:20px; z-index:10;">
<a href="/standings/" onMouseOver="roll_over('yourstandings', '/smallpics/yourStandingsalt.jpg')" onMouseOut="roll_over('yourstandings', '/smallpics/yourStandings.jpg')"><img src="/smallpics/yourStandings.jpg" name="yourstandings" alt="your standings" width="122" height="17" border="0" /></a></div>

<div id="playoffs" style="position:absolute; left:108px; top:277px; width:115px; height:18px; z-index:13;">
<a href="/po" onMouseOver="roll_over('yourplayoffs', '/smallpics/yourPlayoffsalt.jpg')" onMouseOut="roll_over('yourplayoffs', '/smallpics/yourPlayoffs.jpg')"><img src="/smallpics/yourPlayoffs.jpg" name="yourplayoffs" width="112" height="17" border="0" /></a></div>

<div id="events" style="position:absolute; left:124px; top:297px; width:97px; height:18px; z-index:4;">
<a href="/clubs/search.php" onMouseOver="roll_over('yourevents', 'http://yourrugby.org/smallpics/yourEventsalt.jpg')" onMouseOut="roll_over('yourevents', 'http://yourrugby.org/smallpics/yourEvents.jpg')"><img src="http://yourrugby.org/smallpics/yourEvents.jpg" name="yourevents" width="96" height="17" border="0" /></a></div>

<div id="clubmap" style="position:absolute; left:107px; top:317px; width:97px; height:20px; z-index:12;">
<a href="/clubmap.php" onMouseOver="roll_over('yourclubmap', '/smallpics/yourClubMapalt.jpg')" onMouseOut="roll_over('yourclubmap', '/smallpics/yourClubMap.jpg')"><img src="/smallpics/yourClubMap.jpg" name="yourclubmap" width="115" height="17" border="0" /></a></div>

<div id="feedback" style="	position:absolute; left:105px; top:337px; width:118px; height:15px; z-index:7;">
<a href="http://www.yourrugby.org/feedback.html" onMouseOver="roll_over('yourfeedback', '/smallpics/yourFeedbackalt.jpg')" onMouseOut="roll_over('yourfeedback', '/smallpics/yourFeedback.jpg')"><img src="/smallpics/yourFeedback.jpg" name="yourfeedback" width="115" height="17" border="0" align="absbottom" /></a></div>

<div id="search" style="position:absolute; left:85px; top:357px; width:131px; height:72px; z-index:14;">  
  <form name="qform" action="http://midwest.yourrugby.org/clubs/search.php" method="get">	
  <input type="text" class="normal" size="19" name="club"/>	
  <input type="hidden" name="typeall" value="9"/>	
  <input type="hidden" name="levelall" value="9"/>	
  <input type="hidden" name="divisionall" value="9"/>	
  <input type="hidden" name="lau" value="All"/>	
  <a href="javascript:document.qform.submit()" onMouseOver="document.qform.subbut.src='/smallpics/SearchClubsalt.jpg'" onMouseOut="document.qform.subbut.src='/smallpics/SearchClubs.jpg'"><img src="/smallpics/SearchClubs.jpg" style="height: 25px; width: 131px" border="0" name="subbut"/></a></form>
</div>