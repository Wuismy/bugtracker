<?php
$club=$_GET['club'];
$preyear=$_GET['pre'];
$username="yourrugb_matt";
$password="DOIT22";
$database="yourrugb_scores";
$region="midwest";
$schedyear=2009;
//table info below in loop for years

//if no club givin in url, redirect to search page
if(empty($club)){echo "<meta http-equiv='refresh' content='0;URL=http://midwest.yourrugby.org/clubs/search.php?club=All&levelall=9&typeall=9&divisionall=9&lau=All'>";}

mysql_connect(localhost,$username,$password);  
@mysql_select_db($database) or die( "Unable to select database"); 

$query="SELECT * FROM clubs WHERE clubcode='".$club."' "; 
$result = mysql_query($query);

while ($row = @mysql_fetch_assoc($result)){
$title=$row['clubfull'];
include ('http://yourrugby.org/includes/blueheader.php');

echo "<div id='main' style='position:absolute; left:259px; top:148px; width:700px; height:525px; z-index:9;'>";
//while ($row = @mysql_fetch_assoc($result)){
//this while is open from above

$division=$row['division'];
$division2=$row['division2'];
if ($division=='S'){$divline='Super League';}else{$divline="Division ".$division;}

if (!empty($row['side2'])){$teams=2;$side2=$row['side2'];}
if (!empty($row['division2'])){$divline = $divline." and ".$row['division2'];}
if ($row['level']=='High School'){$divline='';}

echo "<span class='style10'>".$row['clubfull']."</span><br />";
echo "<table><tr><td colspan='8' height='2' class='divider'><img src='transparent1x1px_spacer.gif' width='640' height='1' alt=''></td></tr></table>";
if (!empty($row['founded'])){echo "<span class='blue18'><i>Est. ".$row['founded']." - ".$row['city'].", ".$row['state']."</i></span><br />";}
else{echo "<span class='blue18'><i>".$row['city'].", ".$row['state']."</i></span><br />";}
$city = $row['city'];
$state = $row['state'];

if ($division == 'A'){echo "<span class='lblue12'>Level: </span><span class='blue15'>".$row['level']." ".$row['type']." Associate Member</span><br />";}
else{echo "<span class='lblue12'>Level: </span><span class='blue15'>".$row['level']." ".$row['type']." ".$divline."</span><br />";}

if (!empty($row['lau'])){echo "<span class='lblue12'>Local Area Union: </span><span class='blue15'>".$row['lau']."</span><br />";}
if (!empty($row['colors'])){echo "<span class='lblue12'>Colors: </span><span class='blue15'>".$row['colors']."</span><br />";}
if (!empty($row['nickname'])){echo "<span class='lblue12'>Nickname: </span><span class='blue15'>".$row['nickname']."</span><br />";}
if (!empty($row['website'])){
$website = $row['website'];
if (strlen($website)>45){$website=substr($website,0,45);$website .= '...';}
echo "<span class='lblue12'>Website: </span><span class='blue15'><a href='".$row['website']."' target='_blank'>".$website."</a></span><br />";}

if ((!empty($row['contact1name'])) || (!empty($row['contact1phone'])) || (!empty($row['contact1email']))){
echo "<span class='lblue12'>Contacts</span>";
echo "<table class='normal'><tr><td>".$row['contact1name']."</td><td>".$row['contact1phone']."</td><td><a href='mailto:".$row['contact1email']."' class='normal'>".$row['contact1email']."</a></td></tr>";}
if ((!empty($row['contact2name'])) || (!empty($row['contact2phone'])) || (!empty($row['contact2email']))){
echo "<tr><td>".$row['contact2name']."</td><td>".$row['contact2phone']."</td><td><a href='mailto:".$row['contact2email']."' class='normal'>".$row['contact2email']."</a></td></tr></table>";}
else{echo "</table>";}

//if we have a crest we can show that in a new div
if (!empty($row['crest'])){echo "<div id='crestimage' style='position:absolute; left:450px; top:46px;'><img src='/crests/".$club.".".$row['crest']."' border='0'/></div>";}

if (!empty($row['ptimes'])){echo "<span class='lblue12'>Practice Times: </span><span class='normal'>".$row['ptimes']."</span><br />";}
if (!empty($row['ploc'])){echo "<span class='lblue12'>Practice Location: </span><span class='normal'>".$row['ploc']."</span><br />";}
if (!empty($row['wptimes'])){echo "<span class='lblue12'>Winter Practice Times: </span><span class='normal'>".$row['wptimes']."</span><br />";}
if (!empty($row['wploc'])){echo "<span class='lblue12'>Winter Practice Location: </span><span class='normal'>".$row['wploc']."</span><br />";}
if (!empty($row['gloc'])){echo "<span class='lblue12'>Game Location: </span><span class='normal'>".$row['gloc']."</span><br />";}
echo "<br />";
} //end of first query while $row =

if(empty($preyear)){$preyear=$schedyear;$precheck=1;}
while($preyear<=($schedyear)){
$table=$region.$schedyear;

$side[0]='';
$side[1]='B';
$side[2]='C';

//schedule
for ($i=0;$i<3;$i++){
$sideselect=$side[$i];
$wins=0;
$losses=0;
$ties=0;
$oldlev = '';
$oldtype = '';
$olddiv = '';
$olddate = '';
$oldplayoffs = '';

//show link to show previous results
if ($precheck=='1'){$presults="<span class='lblue12'> - <a href='/clubs/?club=$club&pre=2008'>Show past results</a></span>";}
//else we have a link to hide the previous results
else{$presults="<span class='lblue12'> - <a href='/clubs/?club=$club'>Hide past results</a>";}

//getting games
$query1 = "SELECT * FROM $table WHERE (homecode='$club' AND homeside='$sideselect') OR (awaycode='$club' AND awayside='$sideselect') ORDER BY year, month, date, id";
$result1 = mysql_query($query1);
$numrows=mysql_num_rows($result1);

//if game search is empty we will have header, no known games, and footer
if($numrows==0 && $i==0){
echo "<span class='day'>$schedyear Schedule and Results</span>$presults<br />";
echo "<table width='640'>";
echo "<tr><td width='130' align='left' class='normal'><strong>Date</strong></td>
      <td width='185' align='right' class='normal'><strong>Opponent</strong></a></td>
      <td width='70' align='right' class='normal'><strong>Score</strong></td>
      <td width='130' align='right' class='normal'><strong>Location</strong></td>
      <td width='125' align='right' class='normal'><strong>Referee</strong></td>
      </tr>";
	//spacer
echo "<tr><td colspan='8' height='2' class='divider'><img src='transparent1x1px_spacer.gif' width='640' height='1' alt=''></td></tr>";
echo "<tr><td class='normal'>No known games.</td>";
echo "<tr><td colspan='8' height='2' class='divider'><img src='transparent1x1px_spacer.gif' width='640' height='1' alt=''></td></tr>";
echo "<tr><td>&nbsp;</td><td class='day' align='right'>Season Record:</td><td class='day' align='right'>$wins-$losses-$ties</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "</table></br>";
echo "<br />";}elseif($numrows!=0){//if we have games to sort through...

//right header for division
if ($i==0 && $division2==''){echo "<span class='day'>$schedyear Schedule and Results</span>$presults<br />";}elseif($i==0 && $division2!=''){echo "<span class='day'>$schedyear Division $division Schedule and Results</span>$presults<br />";}elseif($i!=0 && $division2!=''){echo "<span class='day'>$schedyear Division $division2 Schedule and Results</span>$presults<br />";}else{echo "<span class='day'>$schedyear $sideselect-Side Schedule and Results</span>$presults<br />";}

echo "<table width='640'>";
  echo "<tr><td width='130' align='left' class='normal'><strong>Date</strong></td>
      <td width='185' align='right' class='normal'><strong>Opponent</strong></a></td>
      <td width='70' align='right' class='normal'><strong>Score</strong></td>
      <td width='130' align='right' class='normal'><strong>Location</strong></td>
      <td width='125' align='right' class='normal'><strong>Referee</strong></td>
    </tr>";
	//spacer
echo "<tr><td colspan='8' height='2' class='divider'><img src='transparent1x1px_spacer.gif' width='640' height='1' alt=''></td></tr>";

//go through selected games
while ($row = @mysql_fetch_assoc($result1)){
$sidesymb='';
if (!empty($row['playoffs']) && $oldplayoffs != $row['playoffs']){echo "<tr><td colspan='8' class='smallerM'><strong>".$row['playoffs']."</strong></td></tr>";}
  
if ($olddate != $row['date']){echo "<tr><td width='130' class='lblue12'>".$row['day']." ".$row['month']."/".$row['date']."/".$row['year']."</td>";}
else{echo "<tr><td width='130'></td>";}

if ($row['division']=='NL'){$NL='*';}else{$NL='';}

if (($row['homecode']==$club) && (($row['city']!=$city) || ($row['state']!=$state))){$locsymb='vs. ';}else{$locsymb='';}

//figure out if opponent is B side etc.
if ($row['homecode']==$club && $row['awayside']!=''){$sidesymb='-'.$row['awayside'];}elseif($row['awaycode']==$club && $row['homeside']!=''){$sidesymb='-'.$row['homeside'];}

if (($row['homecode']==$club) && (!empty($row['awaycode']))){
  echo "<td width='185' align='right'><a href='/clubs/?club=".$row['awaycode']."' class ='normal'>".$locsymb.$row['awayteam'].$sidesymb.$NL."</a></td>";
  }elseif(empty($row['awaycode'])){echo "<td width='185' class ='normal' align='right'>".$locsymb.$row['awayteam'].$sidesymb.$NL."</td>";}
  elseif(!empty($row['homecode'])){echo "<td width='185' align='right'><a href='/clubs/?club=".$row['homecode']."' class='normal'>@ ".$row['hometeam'].$sidesymb.$NL."</a></td>";}
  else{echo "<td width='185' class ='normal' align='right'>@ ".$row['hometeam'].$sidesymb.$NL."</td>";}
  
  if($row['overtime']=='c'){$nogame='Canceled';}
  elseif($row['overtime']=='pp'){$nogame='Postponed';}
  elseif ($row['homecode']==$club && ($row['homescore'] > $row['awayscore'])){$gameresult = 'W'; $rfont='win';$wins=$wins+1;}
  elseif ($row['homecode']==$club && ($row['homescore'] < $row['awayscore'])){$gameresult = 'L'; $rfont='red14';$losses=$losses+1;}
  elseif ($row['homecode']!=$club && ($row['homescore'] > $row['awayscore'])){$gameresult = 'L'; $rfont='red14';$losses=$losses+1;}
  elseif ($row['homecode']!=$club && ($row['homescore'] < $row['awayscore'])){$gameresult = 'W'; $rfont='win';$wins=$wins+1;}
  else {$gameresult = 'T'; $rfont='tie';$ties=$ties+1;}
  
  if($row['overtime']=='c' || $row['overtime']=='pp'){echo "<td width='70' align='right'><span class='M'>".$nogame."</span></td>";}
  elseif (($row['homecode'] == $club)){echo "<td width='70' align='right'><span class='".$rfont."'>".$gameresult." </span><span class='M'>".$row['homescore']."-".$row['awayscore'].$row['overtime'].$row['forfeit']."</span></td>";}
  else{echo "<td width='70' align='right'><span class='".$rfont."'>".$gameresult." </span><span class='M'>".$row['awayscore']."-".$row['homescore'].$row['overtime'].$row['forfeit']."</span></td>";}
  
  if ($row['map'] == 1){echo "<td align='right' width='130'><span class='lblue12'><a href='/clubmap.php?club=".$row['homecode']."'>".$row['city'].", ".$row['state']."</a></span></td>";}
  elseif(!empty($row['map'])){echo "<td align='right' width='130'><span class='lblue12'><a href='/clubmap.php?club=".$row['map']."'>".$row['city'].", ".$row['state']."</a></span></td>";}
  else{echo "<td width='130' align='right' class='lblue12'>".$row['city'].", ".$row['state']."</td>";}
  echo "<td width='125' align='right' class ='lblue12'>".$row['referee']."</td></tr>";
  $oldlev = $row['level'];
  $oldtype = $row['type'];
  $olddiv = $row['division'];
  $olddate = $row['date'];
  $oldplayoffs = $row['playoffs'];
}//end of while row=result

echo "<tr><td colspan='8' height='2' class='divider'><img src='transparent1x1px_spacer.gif' width='640' height='1' alt=''></td></tr>";
echo "<tr><td>&nbsp;</td><td class='day' align='right'>Season Record:</td><td class='day' align='right'>$wins-$losses-$ties</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "</table></br>";
echo "<br />";
}//end of if numrows !=0
}//end of for $i<3 loop
$schedyear=$schedyear-1;}//end of for years loop

echo "<span class='normal'>* = Non-League Game</span><br />";
echo "<span class='normal'>f = Forfeit</span><br />";
echo "<br />";
echo "<br />";

echo "</div>";
include ('http://yourrugby.org/includes/bluefooter.php');
?>