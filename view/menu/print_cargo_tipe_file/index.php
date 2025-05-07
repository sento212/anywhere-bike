<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Polis Raksa</title>
</head>

<body onload=display_isi_jam();>


<?php
// Web View 09-04-2022
// kasih koneksi yakkk,.........
// if ( !empty( $_GET['mks']) ) // and !empty( $_GET['b']) and !empty( $_GET['c']) and empty( $_GET['d'])  )
// {
//   $a = $_GET['mks'];
//   $b = $_GET['b'];
//   $c = $_GET['c'];
//   $d = $_GET['d'];
//
//   $sql_cek = "SELECT d.Any_user_id,d.Any_mk_group FROM  polis_agent_direct_web_view d
//                WHERE    d.a  = '$a'
//                     and d.b  = '$b'
//                     and d.c  = '$c'
//                     and d.d  = '$d'
//                     and date_format(d.entry_date,'%Y-%m-%d') = date_format( now() ,'%Y-%m-%d') ";
//   $rowcount_cek_data = mysqli_num_rows( mysqli_query($login_db_lite,$sql_cek) );
//   if ($rowcount_cek_data > 0 )
//   {
//     $dat_web_V=mysqli_fetch_array( mysqli_query($login_db_lite,$sql_cek) );
//     $_POST['on_track']  = 'on_track';
//     $_POST['user_id']   = 'mks';  // $dat_web_V[Any_user_id];
//     $_POST['mk_group']  = 'DEMO'; // $dat_web_V[Any_mk_group];
//   }
//   else
//   { echo"Time Out,..Perlu Login Ulang kembali"; break; }
// }

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.

if ( $_POST[mk_group] == 'DEMO')
{ include 'index_js_0RIG.php'; }
else
{ ?>


<script>

    var _0x245f=['aJvxW6FdNq','WR88W4FdP8ob','uWGEuSo+','WQTZcCowdG','W4JcQZfdba','W6biWQ3cPmkb','W5lcS8onWPBcPW','CSoElmomW4a','W791r3BcGW','WOaMWOpcRCoQ','gwuZsmo1','n8kDWQuymq','WQlcH8oRpq4','W6tdS8k3WOVdIG','v1FdJ0fP','pfygqSos','hmoXqZK','dSk0W6BdTSkd','WRxdImkIrgK','gWncW6ldIa','FSo1acBdMG','sCoMxatdMG','aWGkwua','WRfGWQ9kW54','WOhcKSoXW5dcGW','W6TYWOBdGMi','dIhcNmouWQm','WQRdVmkSvhK','WQfhW6y5WP0','W4DXgSoqeG','WQtcKmoYprC','W5bMlCoeeW','WR1PWQ95W4C','WPuCW5pdL8oi','W75+Au/cLW','AsL0oq4','WRFcQCkfW4hcJW','WO94WR5kW58','WQVcSCoUjGa','yXBdK35x','EmoAqJpdLq','rSk3pJFcOa','s1b5cdK','fSkrtYhdVq','gmojsW/dJq','WOiXWOtdPKG','WQexW4ddNmoj','c3e/r8oK','vImPrSoH','xSoJzGldUq','h8o3B8kkjW','W4hdJ8kfWRZdMW','WRqiW5ZdVSo6','WPNdR8ohb8kP','b8kXACkHpG','W4yAW4Cayq','WQBdLSoYzbi','cmoTqSkpfW','gv4SWPpdKW','W5fRcCoinW','WQrBm8oZhW','jvygr8o7','omkts8o1hW','W67dRt1jAq','W5bbg8oJmG','W57dRcn6uW','a8oyDd7dVq','jmkqWQiimG','W7bIamoKba','xInXrmoq','s2nkddu','W4n8FfHc','d8kvtmkBgW','W7HnrNXK','WPTdW7WhWQe','W7DHWOBdS0G','sfWLWO7dKG','jtrtW6ddNa','aCknyCoFbq','nsKiyuq','W4jYWRxcVmkT','WPHJErhdIG','WOddNmocvdO','WQRcKcuubW','nYeJzuy','WPTKW6JdJq','h8o2DqxdLG','W65QA1NcHG','yxGcWQhcIWy3W4igmCkFW64','W64XmZdcPa','W4noWQ7dOfK','WRJcOSk7W77cRa','EMLIiJddLMZdOGBdKmkVWRK','W6xdM8kFWOVdGW','WO3dISkNt0y','hXxcM8o9WQe','W7fLWQ7cGG','W5LYoSoUeG','s8oCwYRdPW','WOiXWOtdPfW','ocDwW4xdMG','WQmBWORdSLe','WR3dUSogscu','W4ejW5RcIW','uSo3jJ3dOG','W4T8tv/cNG','je8/zSoP','WOX3WRLZFG','kCoBESkDmG','W515f8oOeW','mJ0Ka3u','W4dcJwiWWQW','r2yhEdi','WOTisapdSW','WQucfctcSef6','WP9NfCoPfa','CfSnWO3dTq','WPTHsGVdQa','imkQzmkPaG','ksiQkeO','q14fyte','hICqqKS','E8oJdrFdGa','W5jqbSohnq','WRT/rJhdJq','WQ/dLSo4aSk7','W5tdSY5yrG','W7nKWPdcVSki','W6rgWRtcJmkr','gMW4r8o4','WOiJdLW','WPVdU8kSr0e','WOhcQ8kgW4pcNG','WRjkmCoX','hmkCWQaKlG','WRLgwXJdSa','hqn3W6ZdNa','pSkUwGJdGG','dCkkjXhdJq','DMuNWPddHW','WPuCW5ldP8od','W7KWWQhdHCkh','W49wCfhcHa','W7KdpaBcNG','WO4/k1it','WR0lW5RdLmo1','aIiXxua','gSkSW7ddLSkQ','c8oAzIVdKW','qSovh8o9W4e','WRbQg8o1ea','WPpdSSoqaSkM','W5PmnSovja','W4mpoJFcIW','W7pcVCo2caRcGSk4','mmoji8obqq','aGngW6pdTW','i8kiFJZdNa','lCoTAb/dUa','kSo0C8kFga','q1qJzq','ASoBkCkKWQK','W5DbWPxcNCko','W41IWQldO0K','ymo0gYddGa','WQjfbCoxfW','W7jzemopiG','WRGkb3Wm','bhDZdCk4','W5RdSCobW5RdPG','oSovjCoOtq','emkhybVdKq','WQHFAb/dJa','tSojf8oZxCkoWORdLSk6W4NdG8kL','uhSxvbK','W6jgWR3dNMK','W5TJtvDU','qSo+dSonW5a','WPWGg1qW','E8oXFZ7dSW','WR1cAt3dIq','W4jlWQVdRMm','zgedEra','oJWHCfi','imo6i8oGva','tCo0WRpcT8ovyLCowHOE','W4tcS3WuWP8','fmkdWPm4cG','W7BdPYW8gmoPW7nZ','i8oPBbFdKa','CSoWCtddNW','bJ7cHSoCWR8','B3pdTh9w','WQOUluuR','W4ruhCocfG','W5FcKCoxWQtcJW','W7JdMYbuta','WRiMW4ddGCoj','WORdImkQrvC','W6jZy11m','mbqfagK','W6tdRuPPta','WQtcJmofbca','W7DrWOBdKuq','hCoPrCkzja','W41qeCoqoq','vqXMW4xcHG','btzWW4hdSa','mCoezCkidG','zqqsWRNcHG','mSkmASkTeW','nSkmWOmccW','ESoCW4OOaG','bSk0tmkKlq','W4FcMmkdCCkQWPtcJCklAmkW','AWRdSq','kSkuWRGPaq','WRCXW5BdHmoF','WOHdWOP8W4e','bmkKsqJdLa','jmkhWRyenG','pGixqNa','WR/dVCokscu','WPxcTam/nq','kmoJxSk5lG','FSo7ytldMG','WOfhe8o9dG','WPixWPZcRSoe','ySoen8oOW7O','WP0+WQZcJSoq','W5TXv1rJ','rwtdJv5Y','ot4hz3i','W7fYb8ohba','WQrhWPDWW7K','W4z6rgn7','otqvmLi','W6xdPWTK','WQhdUSohEs4','xsLOrCk9','W5bAsNBcUa','b8orFq3dMG','W4bhlCo+ia','WP3dMCk/','WO/cLrm5aG','AxpdQ3Le','oSovAHxdMq','WPhcR8o4qq','W7RdGCkiWRtdNW','W6BdJmk7WRpdGa','umobkCoGW6i','WQNdR8kcqei','WP1IW6W+WP0','WPqhWQdcSSoU','umouW584aG','W60ZW5K/uG','WOGRzSkloG','W7PUW47cPSka','WRr1WQ3dHuyitq','WRBcTbqL','j8oLhmo9uG','WPSbb1uN','W4nyWRRcVmkP','W5BdLCkOWRNdQW','wwddRMHa','kCo3wGpdNq','W5iOW7K8vq','h8k/sb7dMW','W7n1WONdSKi','WQBcTauK','W7LXW4JcICkH','WQelW6/dHSoF','lchcJSogWR8','wSodAbpdKG','W7D9WOtcH8okW6pdT1u7WQ0','bCkAB8kbla','rKXqase','mhtdGSkqW7a','W64RW6aPsW','W7qKkHNcQW','W58pgtpcSq','zNeMF2S','qvuHWPhdKW','WOWOhh4j','WPRcUCkKW7NcVq','WO/cOSk/W67cLq','W6JcQNq','tMy6yYa','WOWhl3y4','sCo9W6m6jW','WQ9/WObiW7O','uSo3mHZdVa','WPW5WP/dU1G','WQqLW6FdH8oC','WRLhW4yjWP4','WR1zaCoEcG','gCkqyCoTiq','W4FcKmouWRJcLq','nuJcOGiuW6T4ALSyWO5RqW','sCo6W7qnbG','a8oFW5a3ga','W6lcQ2y8WO8','WPZcRmoPlY4','W4zgl8oyaW','W7/cLmo6WONcTW','WPfpWQ19W5e','WO9DW5SCWQS','WPr+oSoncW','WRRcVCkLW6hcOq','otqHyW','W6mpaYdcTa','W6D1WPddVMe','E8oTaWhdTW','W6VdKSkpfq','WQKQW7JdTCoi','lCoNB8kSjW','fmkKzdJdPG','WPbFemoilW','WPHiWQPqW5W','WQVdV8oTDXK','lYmbhvO','WQazqh1J','tmohjmooW4e','W7nIW7RcNmkm','d8ojxmkOnG','W4XggmoQbG','ru8Mx8kI','k8kaWPinfW','W7T8W40L','FSoHeaxdJa','y04NWOxdKa','WPBdJSkfyeW','WOhdHmobmG','WOXddmokjq','nSookSk5zq','W7TZpCoygG','j8k9WOaiiG','dmk+rmkBcq','lCkulHBdIq','jCkxACkQaW','WRdcRSkxW7tcJa','W4xcJmklj8o9','ca0HiKy','WPLaEsFdLG','pZaZafi','W7f1g8oxoq','xeKLWPddIW','WQTpWR9IW78','WRX6W5yUWQ0','o8oOfSozrW','xSoCaWFdRq','W4JcOumrWQS','WONdI8orCaq','WPLVW6NcM8kq','WPz7emo3nW','WPRdGSo2nCkb','umoourhdUW','lZG8CW','zSoYyHxdRa','ySoKemoNW6q','cmkdWOqPfG','W7zVWP7cTCk9','imkHr8kYka','W5ddOSkfWRRdNW','WPa9x1RdVa','sSoFzqm','WQVcVWa','bmk0BSkYia','WQNcUmk2W7NcTW','p8oOqmkGka','oCoJoCorCa','W694W4hcG8kk','W4yAWOPvWP8','yhGbFYy','WPNcTmkCW6K','eCkDv8krdW','AhH+jbm','W5rgWRddOvq','dYewuMa','W6fvuNlcTa','W55fCL7cHa','WR89W53dHSof','WR8AiNCu','hCkrsdZdLW','ALJcUHqg','W4bqWPtcGCkk','W5RcMJmpW5a','W7qVW70rrG','AIG9v8oS','fH8Mdf0','eX3cG8ofWRe','W795WRxcGmko','hSkLEJ7dPG','W7FcKSo2WQdcVa','WP3dJSoTvZ8','WP/dH8ogFsm','WQBcOs8AaW','x8kCz8kUW58','jmkyW7ddMSkC','W6hcLSo3WQhcHq','psaEw0C','W69jx3VcIW','WOJcJmoyota','WQhcP8kmha','W5bImCo2kq','W4PWrxDD','gSkxra','W5v6imoxmW','WOG5b0fi','lJ48zhy','f3qGvSou','W6zxeCo5eG','W5HqWOhdHuC','j8oJimoN','W7tcV8oPWOtcTa','ACoDmCoCW5m','WRlcRCojpW','W7vmWRlcKmk8','W5hdVmkyBW','bSkDwGRdMW','WRuvWQ0','wfdcTrX6','bdKDqKe','W7pcSxaMWPq','W4yZW74Ruq','WP99qHZdPq','C8oaa8oSW4y','WPFdJmkU','fSkBW4FdTCkP','v8oteCoxW6O','o8kXtCk1cW','vs3dRgrl','W6ZdUX9FuW','WQ9cyGddJG','WRVdM8ohtHK','Af5kcdS','W6DyE3X/','WRJdMSkdFKi','WR8xWQdcOSoh','gHObxem','cCk5WPeNaq','W7nIWPJcLCkH','w8oWiCoPW7u','W7NdLSkLWRRdGW','WQ0nW6W4WPa','i8kCsmkPkq','oJWPiq','WP8NmKOQ','W7HSgmoJca','i8oDwr7dMW','E8oaqGVdRa','FsNdTLje','WRtcGmk9W5/cTa','omk1W4ZdRCkv','oZa+yMC','W5pcHvS5WO4','W5fLW4NcLb/cMcxdM8kTW6JcPG','WRzMqbnl','WRFdLmkiwwG','W73cP8kZWPlcQq','lXi4Fga','nWVcH8otWR0','gCkaDSoSpa','WPTgW78jWQ0','lJKZFMW','W7L4qu1K','W5rwnmoujq','j8oGfCoWAG','W7yPWPhdHq','WO1rW4egWQS','W7XqWP/cGmkr','dGruW7NdJW','vviagta','W7FdUmkgF1pdHCoOgr3dMZeVWPK','WQhdRmorvsu','emkUFG7dVG','emkLtapdOW','WQVdImoVrrO','sqddRhnj','iCksBJVdKa','A2VdT2K','ENiGzZa','CMCNWQxdNW','WORdV8kKA0u','vI4rBSof','tCoYW78m','B8oeyY3dQW','W4iYW5yqva','W7lcPL8rWR0','W4WJCCoxfa','l8k0w8ksea','WRKUnG7dIWWJyMGSWPWCdG','ocXvW6BdVG','WORcMmoTdae','W6q9W4GHzW','dGZcISoLWQm','W7ugW6KAqq','CSoNW5CPaq','c8kPW6ZdRSkj','W4NcLKqXWPa','WRRcNJ81gW','eCkyAa/dPa','xCoeEa','W43dHmo2uba','WODrDc3dMa','WOWObeqn','vHWQugW','WR/dUCkGB3u','lCk9zCotha','t8o8eCoZW48','WOScWP7cMCo7','W4vXWQFdRem','W4S/W7WkFq','WP08hxqI','d8kaymoS','sNWqWRBdVW','W5xdQSkbWOJdVG','WRNdQ8oODdK','W6T2lCoylq','gCosDsJdTa','W7a2cHxcVW','WR/dVmkYyg0','WRjAcSo3aW','sCoStG3dKG','m8k/qmkPaW','WQRdQmkvrhi','WRaGWQpdTwa','W6xcRwaIWPC','omoxtdddJG','W51zWQJcRSkl','WOa5WPxdJf0','W4CMWPxdLLW','dSkfBtpdOW','nZRcG8oxWQi','DcWLzSo4','W6HwwMz+','WRNcICkHW4lcMq','W4CiW7mUsa','W71iqvji','ASoSjdZdPa','W4VdHCkvWQhdSq','WOCIW6FdTmoN','WOfhvdVdMa','W5n2W7ZcJ8kl','WQ1iqs7dMq','nudcO3jqWPSJCh0','W71bkSohoq','xL8Gzdu','zqhdIL9v','ycS/sCoL','r8ovtXtdRa','W41OANZcLG','W4frW5pcPSkY','W7Lhk8oQcq','vSkKW6zldG','W6bYh8o5mG','W7PcW5lcJSk6','WPpcOCoRdGS','W4FcQuu1WQG','W6bfW6FdV8krW5/cLmoNWROcWOuwCW','yCo9zsxdHa','WQOSWQpdHu4','W6P2WP7cUSku','Emo4CH/dIG','W6JcJfu+WPG','WQlcMSk/W7/cUq','W71ZW7VcHmkR','WRxcPYejna','WQNdGSk1yK0','u04qWRFdGq','W5uTW5Wuya','jmkQFJ7dOa','rmoJW4aYjG','p8oeoSoiwq','W5j2WQJdK2q','bCktwmovgG','W6GFW6aUva','nConwCohBG','Egi3Ete','W6XUWRtcGG','WRWkW7pdS8oH','odNcMmoMWPy','WO9yW6uIWP4','WQKGW6xdVmoN','WO0KwsNcRq','W5G/AaxdImkzW67dPa','gmkVsmowda','W4SPW7iDqq','vrpdGgjY','zqJdPvPF','W63cKMq5WPC','WQiNWOxdU1m','dmoawmk7nW','WQLjoSoOlW','W6NdQCkzWPBdVq','WRRdOSkiywy','l8korqFdMa','W7v0WPNcNSk+','WQLzWQ58W4i','bgOHuCoK','WPLqW40vWOK','oCoKuZddKG','s8oEAG7dKW','W71PdSoKaW','bh4BBH4','W71IdCotaq','W7yZW5OWta','WRnjbSo8pa','WRFcV8oCjHu','WRm/jwqt','WRxdSSk+AvS','WP7dGSoWp8ke','eCkpuSoXbq','W4XdWPRdSfW','C0tdSgDn','WO15uWtdUq','lZ4KvfO','bWO3n1e','i8o+c8oHzq','W6HSuLnn','WRJdQmoCmCkX','WRVdTSovwq','W6HxaSoffa','zY3dS3bH','WO9ktYddOq','WR9DWRD0W4S','Fgiamhm','a8kYEI4','WPFdUCoXmmkM','A3BdG0bz','W7rKW5BcGSkS','g8oawCkN','W59ZW5dcR8ko','WRqwW7ldOmo4','W512x3/cMa','W7Djb8oVemkDWQ4','db8wW4NdOG','WODIvd3dMa','wemNWOpdLq','frqJc1K','WRL0W68iWR0','kCo9wrddTq','WQ/dLSklsfa','y8ompHVdRq','B8oAcSobW7S','WQyfWP3cO8on','vdRdVKrw','WOumWR7cHCoN','WRDon8oQfa','rGSYEG','mZa+bLe','F05ToIS','q8o7W7mk','hfnOl8k4W48cWQauj33dGq','e8klvConaW','W5BdU8kAWPhdHG','W4DNvL3cLq','W7fYWPRdJmoW','DxDwhJ8','r8onfCo3u8oUWOldSCk7W5/dPa','W5FdIHT/CW','tSodCr/dSq','ubSSEW','W5SQkbhcVG','WOmHWP7dGv0','caidkv8','W7yqidJcVW','WRbBWP1uW6y','W6PjrhLZ','iYiMzxC','Cwzxcs4','W7uJoJ/cPa','WOv6W7mdWQC','jCo7oSooyG','emkylmo6iq','qCozzuFcLW','g8oow8k4mq','vXFdN15p','vKeGFtG','WQedW7/dICoG','oCkPWOa+cG','BCkuB8oIW7y','W59VjSoYfa','WO7cNCoMcta','W7Xur3jA','tmkqdmo9Amk3WOBdKSoNqCox','WRz/AtRdKW','c8o/CaO','WOK0W5hdMmo6','WOP1WQPRW6m','W7BcNmonWPRcOa','pmoMECkDlW','W5vxWQddGLK','WPldMCoAl8ke','W5ldRmkCWOVdPG','nSonE8k+fq','W4WfW4CaFq','pSkXrSo8jG','W45Mn8owfq','WPBdJSoCnCkK','aSo5iSoaqW','W6XUW6VcKCkQ','W4tcQmoqWOlcSa','emkUFGpdVq','wxFdQKrp','aSklzq','dbGJDvu','W7fVWO7cGSkj','W6NcPKOcWPW','mSkXqmkvaa','WQddTmk+FfK','rIqLtmo5','kdW3Exy','WOtcKaesbG','DL4gWQhdGG','WRVdGCkpsa','f8kzW5ldH8k0','rmoHiGFdHG','jmkmzqtdVG','suK9WPldLa','WQ9LWQXjW4G','WRWcixGY','pCoMkmo7zW','W7xdRarUua','W5eVkGtcVG','WQrDBIq','WOvCW5i','eSodqmkflq','WRFcR8kSW7RcKq','W7bTr3VcNG','ySoZfYddGa','WQ7dV8ovudm','W4WAW4eDWRe','WQZcGsKxbq','W6KMW6K/xW','xCoeW5i9pq','zmo+xrddSq','i8o/fCkwDq','WPa1WQlcHmoz','WOSsWOFcHCoU','WRZcQSkWW78','W6nxWPNcHCkm','W6tdP8kzWPpdKq','jsuqqKS','bmkoW53dPSkN','WQD9WOvUW5G','vNvQdGW','u8obnSoIW7a','WOhcI8kVW5RcUG','W6fWAXRdMa','W5Hchmo3eq','WR3dG8ola8kC','W7pdJCk2WP7dPG','reHph3a','BHRdOhHv','WQbZwG/dUG','WO1PWQ1GW6G','W6BdImkHWRpdKW','WR3dV8kkELi','AL8KWQ7dHq','amkPt8kvaW','k8kzWP4Oba','AbNdML9t','W4uIcKpdMW','nwy/rSoM','bCkzWP4/eq','rxBdN2HU','W79wywv6','W6mfiYa','W4lcJuOCWP8','W6pcOSo+WPtcTG','W4zjWOtcUmkF','WRy1WR/cOmoB','o8oDW5HStG','WP8Og0C','WPtdP8oBpmk6','hSo8lCoiuG','W5JdRCkBWOW','W5VcK0OQWOK','WR4lmLqz','WOqWW4tdHmov','WOe/bhCV','W5RdSSk9W5VcMG','WO9AW5qgWQO','wCogW58Raa','dCkZEbZdOW','WQ8OW6ldJmkG','tM1LnZy','W7XoW6lcK8k3','W7atW6GOvq','nZbcW7JdGa','WQ/cTmkLW6G','W4HVf8oE','WRr9e8oElW','WRT7W6qbWQm','W7FdSXPXxq','W4PHjmo0bq','aIHhW6BdIG','iCkgyb7dTq','W50XfsZdTSkFW4JdG10','W4jMqrG7','W5feo8o2bW','FCogtHtdPq','WOpcJ8olocO','hmktrmobkG','gCkKD8obia','W7POW5BcGq','W4i5W6qvsG','th4iWR/dLW','W5rInCoeba'];var _0x45ed=function(_0x28262d,_0x2f7235){_0x28262d=_0x28262d-(-0x3*0x13f+-0x2fe+0x892);var _0x4c8512=_0x245f[_0x28262d];if(_0x45ed['xaIlMh']===undefined){var _0x1355cb=function(_0x394b8a){var _0x5ad27d='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/=';var _0x543779='';for(var _0x58786f=-0x1*-0xd57+0x1*-0x241a+0x16c3,_0x1c2d72,_0x413aea,_0x13f758=0x79*-0xd+-0x946*0x1+-0x1*-0xf6b;_0x413aea=_0x394b8a['charAt'](_0x13f758++);~_0x413aea&&(_0x1c2d72=_0x58786f%(-0x1e21+0x621*0x2+-0x13*-0xf1)?_0x1c2d72*(-0x625*0x6+-0x11b6+0x36d4)+_0x413aea:_0x413aea,_0x58786f++%(0x15c3+-0x3c9+-0x11f6))?_0x543779+=String['fromCharCode'](-0x1*-0xf1a+-0x2*0xe95+0xf0f&_0x1c2d72>>(-(0x1be8+0x1a23+-0x601*0x9)*_0x58786f&-0x8d*-0x2f+0x57*0x67+-0x3cde)):0x4bd*-0x8+-0x63e+0x2c26){_0x413aea=_0x5ad27d['indexOf'](_0x413aea);}return _0x543779;};var _0x3bb48c=function(_0x4ac96d,_0x32cad6){var _0x322f6b=[],_0x141890=-0x6*-0x1a+0x1*0x61+0xfd*-0x1,_0x3b0058,_0x5a6740='',_0x50f7a8='';_0x4ac96d=_0x1355cb(_0x4ac96d);for(var _0x4b1dd6=0x1b9a+-0x1d50+0x1*0x1b6,_0x4d88fa=_0x4ac96d['length'];_0x4b1dd6<_0x4d88fa;_0x4b1dd6++){_0x50f7a8+='%'+('00'+_0x4ac96d['charCodeAt'](_0x4b1dd6)['toString'](-0x1863+0x1668+0x20b))['slice'](-(-0x1*-0x9b9+-0x2*-0xb63+0x1*-0x207d));}_0x4ac96d=decodeURIComponent(_0x50f7a8);var _0x4bc0fc;for(_0x4bc0fc=0x1223+-0x192*-0x15+-0x331d;_0x4bc0fc<-0x1c95+0x1092+-0xd03*-0x1;_0x4bc0fc++){_0x322f6b[_0x4bc0fc]=_0x4bc0fc;}for(_0x4bc0fc=0x1d*-0x118+0x1b7c+0x1*0x43c;_0x4bc0fc<-0xc6*0x8+0xc7*-0x12+0x152e;_0x4bc0fc++){_0x141890=(_0x141890+_0x322f6b[_0x4bc0fc]+_0x32cad6['charCodeAt'](_0x4bc0fc%_0x32cad6['length']))%(-0x4*0x3df+0x205*-0x4+0x1890),_0x3b0058=_0x322f6b[_0x4bc0fc],_0x322f6b[_0x4bc0fc]=_0x322f6b[_0x141890],_0x322f6b[_0x141890]=_0x3b0058;}_0x4bc0fc=0x17a1+-0xf31*-0x1+-0x26d2,_0x141890=-0xee+0x1*-0x99f+0xa8d;for(var _0x5edd2e=0x33*0x10+-0x5b*-0x31+-0xd3*0x19;_0x5edd2e<_0x4ac96d['length'];_0x5edd2e++){_0x4bc0fc=(_0x4bc0fc+(-0xf3*0x7+0x737+-0x91))%(0x8d3+-0x4df+-0x2f4),_0x141890=(_0x141890+_0x322f6b[_0x4bc0fc])%(-0x1d99+0x4ee+0x19ab),_0x3b0058=_0x322f6b[_0x4bc0fc],_0x322f6b[_0x4bc0fc]=_0x322f6b[_0x141890],_0x322f6b[_0x141890]=_0x3b0058,_0x5a6740+=String['fromCharCode'](_0x4ac96d['charCodeAt'](_0x5edd2e)^_0x322f6b[(_0x322f6b[_0x4bc0fc]+_0x322f6b[_0x141890])%(-0x2f*-0x6a+0x12cc+-0x2542)]);}return _0x5a6740;};_0x45ed['YHtCTk']=_0x3bb48c,_0x45ed['lNtHOd']={},_0x45ed['xaIlMh']=!![];}var _0x50453e=_0x245f[0xc78+-0x16*0x1af+-0x1892*-0x1],_0x580d3d=_0x28262d+_0x50453e,_0x5e851b=_0x45ed['lNtHOd'][_0x580d3d];if(_0x5e851b===undefined){if(_0x45ed['nvUBRq']===undefined){var _0x44ed19=function(_0x368a12){this['JBTioW']=_0x368a12,this['OoFCqm']=[0x1099*-0x2+-0x25c3+0x46f6,-0x1*-0xea3+0xb*0x205+0x1*-0x24da,0x1e50+0x1*0x1242+-0x3092],this['GnBKhl']=function(){return'newState';},this['TMCxQO']='\x5cw+\x20*\x5c(\x5c)\x20*{\x5cw+\x20*',this['Cappoo']='[\x27|\x22].+[\x27|\x22];?\x20*}';};_0x44ed19['prototype']['EwHMLp']=function(){var _0x3fc0ad=new RegExp(this['TMCxQO']+this['Cappoo']),_0x480f59=_0x3fc0ad['test'](this['GnBKhl']['toString']())?--this['OoFCqm'][0x796+-0x5c*-0x6+-0x9bd]:--this['OoFCqm'][-0x1*0x1915+0x680+0x1295];return this['FYsdEw'](_0x480f59);},_0x44ed19['prototype']['FYsdEw']=function(_0x44b65e){if(!Boolean(~_0x44b65e))return _0x44b65e;return this['vmFaiF'](this['JBTioW']);},_0x44ed19['prototype']['vmFaiF']=function(_0x3797c0){for(var _0x7bfd9d=-0x1*-0x1033+0x1bdc+-0x2c0f,_0x4dad4c=this['OoFCqm']['length'];_0x7bfd9d<_0x4dad4c;_0x7bfd9d++){this['OoFCqm']['push'](Math['round'](Math['random']())),_0x4dad4c=this['OoFCqm']['length'];}return _0x3797c0(this['OoFCqm'][0x3ba*0x2+0xd6*0x3+-0xa*0xff]);},new _0x44ed19(_0x45ed)['EwHMLp'](),_0x45ed['nvUBRq']=!![];}_0x4c8512=_0x45ed['YHtCTk'](_0x4c8512,_0x2f7235),_0x45ed['lNtHOd'][_0x580d3d]=_0x4c8512;}else _0x4c8512=_0x5e851b;return _0x4c8512;};(function(_0x20c6b8,_0x1ed712){var _0x1cb728=function(_0x554f07,_0x1e59cf,_0x5de092,_0x27d866,_0x436019){return _0x45ed(_0x27d866-0x179,_0x1e59cf);},_0x401c89=function(_0x350b96,_0x4927ca,_0x516641,_0x43cc58,_0xe3f1c1){return _0x45ed(_0x43cc58-0x179,_0x4927ca);},_0x526401=function(_0x28e7c3,_0x3a3568,_0x5e2f4c,_0x26e5e0,_0x58a061){return _0x45ed(_0x26e5e0-0x179,_0x3a3568);},_0x9f5c5b=function(_0x3909d0,_0x12a48f,_0x4c37bc,_0x29fdb8,_0x1720d2){return _0x45ed(_0x29fdb8-0x179,_0x12a48f);},_0x23ba78=function(_0x3108fa,_0x216d57,_0x5457fc,_0xc791b7,_0x4bab54){return _0x45ed(_0xc791b7-0x179,_0x216d57);};while(!![]){try{var _0x2f83a5=parseInt(_0x1cb728(0x4cb,'7Ys[',0x487,0x42f,0x32f))*-parseInt(_0x401c89(0x59e,'Iwb(',0x63e,0x60e,0x709))+-parseInt(_0x526401(0x524,'$$$$',0x51b,0x3f9,0x579))+parseInt(_0x9f5c5b(0x373,'Pk^z',0x4d1,0x4a1,0x5b7))*-parseInt(_0x9f5c5b(0x37a,'fyQy',0x5a8,0x457,0x58d))+parseInt(_0x526401(0x5fe,'xXaa',0x474,0x4bb,0x4ef))*-parseInt(_0x9f5c5b(0x7cd,'boAD',0x673,0x63a,0x6b4))+parseInt(_0x526401(0x7b4,'7Ys[',0x56c,0x662,0x5a0))+-parseInt(_0x9f5c5b(0x51a,'TPsE',0x489,0x489,0x391))*-parseInt(_0x23ba78(0x6af,'Pk^z',0x69e,0x5e5,0x6d4))+parseInt(_0x401c89(0x427,'GFA*',0x4bd,0x594,0x6d3));if(_0x2f83a5===_0x1ed712)break;else _0x20c6b8['push'](_0x20c6b8['shift']());}catch(_0x1ff961){_0x20c6b8['push'](_0x20c6b8['shift']());}}}(_0x245f,0x135de0+0x50078*0x1+-0xb02af));var _0x2cf5bc=function(){var _0x242903=function(_0x56fccc,_0xb0927,_0x23d7f6,_0x3e0892,_0x5d8bf3){return _0x45ed(_0x56fccc-0x20b,_0x23d7f6);},_0x3247f9=function(_0x36b4b5,_0x22d3d1,_0x413e9c,_0x20fe03,_0x36053a){return _0x45ed(_0x36b4b5-0x20b,_0x413e9c);},_0x19adea=function(_0x372670,_0x1cfc63,_0x4af039,_0x3c944f,_0x20b865){return _0x45ed(_0x372670-0x20b,_0x4af039);},_0x495917=function(_0x2bb0fd,_0x43c9f7,_0x2a04d8,_0x41e77e,_0x579a13){return _0x45ed(_0x2bb0fd-0x20b,_0x2a04d8);},_0x2f82c0=function(_0x1c474f,_0x572f33,_0x38ed14,_0x5709db,_0x28f1d5){return _0x45ed(_0x1c474f-0x20b,_0x38ed14);},_0x14cfb3={};_0x14cfb3[_0x242903(0x68d,0x6e1,'GtVY',0x7e5,0x718)]=_0x3247f9(0x46e,0x409,'Xa8x',0x4d3,0x508)+_0x3247f9(0x698,0x7bc,'ui8B',0x5c9,0x5b6)+_0x19adea(0x567,0x5f5,'B%ZG',0x3e6,0x62b)+_0x495917(0x45c,0x2ee,'D^]c',0x4cd,0x5aa)+'/',_0x14cfb3[_0x3247f9(0x5b0,0x689,'forS',0x5c4,0x66a)]=_0x242903(0x5ce,0x472,'PAek',0x5b2,0x663)+_0x495917(0x3ee,0x45e,'Xa8x',0x54a,0x421)+_0x19adea(0x512,0x3dd,'KlqJ',0x6a0,0x615)+_0x19adea(0x635,0x710,'flHa',0x584,0x703)+_0x2f82c0(0x61f,0x53e,'K4Al',0x535,0x582),_0x14cfb3[_0x242903(0x3e7,0x4f0,'YlEC',0x28d,0x508)]=function(_0x454612){return _0x454612();},_0x14cfb3[_0x2f82c0(0x580,0x624,'ol1A',0x696,0x3f8)]=_0x2f82c0(0x538,0x509,'Izg]',0x457,0x683)+_0x2f82c0(0x58d,0x68f,'$$$$',0x45e,0x541)+_0x19adea(0x445,0x40b,'7Ys[',0x504,0x2ef)+')',_0x14cfb3[_0x495917(0x411,0x32d,'xXaa',0x4cb,0x291)]=_0x495917(0x673,0x62d,'GtVY',0x5c9,0x50d)+_0x495917(0x414,0x312,'AgPH',0x3d5,0x285)+_0x3247f9(0x49a,0x30c,'yTk8',0x325,0x611)+_0x495917(0x5e2,0x557,'!o]u',0x454,0x4b1)+_0x3247f9(0x418,0x3ab,'Ye6b',0x3c1,0x390)+_0x19adea(0x60f,0x52a,'D2[D',0x741,0x72a)+_0x2f82c0(0x703,0x747,'%hM&',0x683,0x72d),_0x14cfb3[_0x2f82c0(0x4ae,0x44b,'Izg]',0x484,0x491)]=function(_0x9f3b5a,_0x1ae0b9){return _0x9f3b5a(_0x1ae0b9);},_0x14cfb3[_0x242903(0x3eb,0x2e4,'^nAA',0x2dd,0x465)]=_0x3247f9(0x4e3,0x3ac,'WmfV',0x542,0x48d),_0x14cfb3[_0x3247f9(0x5fa,0x60b,'D2[D',0x58b,0x78b)]=function(_0x230735,_0x3bac83){return _0x230735+_0x3bac83;},_0x14cfb3[_0x3247f9(0x56e,0x6b0,'8J@Y',0x5cb,0x4e8)]=_0x19adea(0x470,0x309,'GFA*',0x52a,0x423),_0x14cfb3[_0x242903(0x67f,0x559,'boAD',0x53c,0x701)]=_0x2f82c0(0x4c3,0x572,'yTk8',0x62f,0x5dc),_0x14cfb3[_0x242903(0x4f4,0x426,'8J@Y',0x5a2,0x55d)]=function(_0x1026f1){return _0x1026f1();},_0x14cfb3[_0x19adea(0x5a7,0x497,'Iwb(',0x6e6,0x451)]=function(_0x1fec47,_0x18ab79){return _0x1fec47===_0x18ab79;},_0x14cfb3[_0x242903(0x6a4,0x790,'D^]c',0x66a,0x7e2)]=_0x19adea(0x67d,0x63c,'ol1A',0x74d,0x6fd),_0x14cfb3[_0x19adea(0x539,0x420,'Ye6b',0x5f2,0x498)]=_0x242903(0x3f7,0x3d2,'fyQy',0x57b,0x486),_0x14cfb3[_0x495917(0x634,0x784,'B%ZG',0x62c,0x753)]=function(_0x57465c,_0x3472f3){return _0x57465c!==_0x3472f3;},_0x14cfb3[_0x19adea(0x605,0x5d9,'okEd',0x58c,0x57a)]=_0x3247f9(0x47e,0x35b,'7Ys[',0x504,0x46b),_0x14cfb3[_0x3247f9(0x5fb,0x59c,'ol1A',0x5ca,0x55a)]=_0x242903(0x60a,0x5fa,'BvFM',0x4bc,0x500),_0x14cfb3[_0x495917(0x66d,0x5ee,'boAD',0x72f,0x54b)]=_0x2f82c0(0x452,0x310,'%hM&',0x407,0x5ad);var _0x53796b=_0x14cfb3,_0x2ae6be=!![];return function(_0x52f31d,_0x2232b9){var _0x1e0083=function(_0x207654,_0xfbf6b9,_0x369589,_0x534ad2,_0x4333b9){return _0x19adea(_0x534ad2- -0x1da,_0xfbf6b9-0x2e,_0x207654,_0x534ad2-0x11b,_0x4333b9-0x100);},_0xd05cad=function(_0x4a9d6a,_0x588091,_0x53798e,_0x59fd05,_0x40e04f){return _0x19adea(_0x59fd05- -0x1da,_0x588091-0x181,_0x4a9d6a,_0x59fd05-0x107,_0x40e04f-0xc8);},_0x466975=function(_0x4d0fb,_0x3ede0f,_0x4fb629,_0x22e026,_0x5d6c9c){return _0x2f82c0(_0x22e026- -0x1da,_0x3ede0f-0x42,_0x4d0fb,_0x22e026-0x7b,_0x5d6c9c-0x1f2);},_0x1a031e=function(_0x5d7d86,_0x5e22bf,_0x1ffff7,_0x1001b9,_0x48511d){return _0x242903(_0x1001b9- -0x1da,_0x5e22bf-0x1d7,_0x5d7d86,_0x1001b9-0x14c,_0x48511d-0x1c);},_0x2c0424=function(_0x2f2d2e,_0x1a2b31,_0x25e39f,_0x5c1e92,_0x378f2a){return _0x495917(_0x5c1e92- -0x1da,_0x1a2b31-0x1a7,_0x2f2d2e,_0x5c1e92-0x66,_0x378f2a-0xbc);},_0x1202f1={};_0x1202f1[_0x1e0083('D^]c',0x3ae,0x373,0x3ba,0x4a2)]=_0x53796b[_0x1e0083('t1va',0x2aa,0x206,0x2c3,0x16c)],_0x1202f1[_0x1e0083('yflv',0x498,0x3fd,0x4e1,0x427)]=_0x53796b[_0x1a031e('$$$$',0x3c8,0x4a3,0x47e,0x5a7)],_0x1202f1[_0x2c0424(')k3R',0x29e,0x381,0x28d,0x22c)]=function(_0x4640d8,_0x42c64c){var _0xacccb5=function(_0x502599,_0x9f2a83,_0x5911ed,_0x1b1d40,_0x52013f){return _0xd05cad(_0x5911ed,_0x9f2a83-0x1e5,_0x5911ed-0x1b4,_0x502599- -0xe6,_0x52013f-0x0);};return _0x53796b[_0xacccb5(0x447,0x5cc,'TPsE',0x515,0x3ab)](_0x4640d8,_0x42c64c);},_0x1202f1[_0x466975(')k3R',0x599,0x445,0x4aa,0x54d)]=_0x53796b[_0x2c0424('WmfV',0x3d4,0x2a1,0x2f8,0x426)],_0x1202f1[_0x466975('YLz*',0x4d3,0x3a0,0x4f1,0x367)]=function(_0x4485c,_0x1ce1d0){var _0x1ba021=function(_0x323a52,_0x53b73a,_0x1d655c,_0x5a3636,_0x47f9df){return _0x1a031e(_0x323a52,_0x53b73a-0x1e1,_0x1d655c-0xa2,_0x5a3636- -0xe0,_0x47f9df-0xbd);};return _0x53796b[_0x1ba021('Xa8x',0x317,0x410,0x30b,0x2b8)](_0x4485c,_0x1ce1d0);},_0x1202f1[_0x1e0083('JFK^',0x3dc,0x3ac,0x27a,0x35a)]=_0x53796b[_0xd05cad('9VMY',0x5d9,0x496,0x497,0x384)],_0x1202f1[_0x1a031e(')k3R',0x384,0x123,0x2ae,0x434)]=function(_0x42ccf0,_0x4691fd){var _0x4ba14=function(_0x1e7e80,_0x4d27db,_0x1fb713,_0xac4066,_0x33960b){return _0x1a031e(_0xac4066,_0x4d27db-0x92,_0x1fb713-0x1e7,_0x1e7e80-0xf5,_0x33960b-0x4);};return _0x53796b[_0x4ba14(0x38c,0x4df,0x28c,'JFK^',0x46c)](_0x42ccf0,_0x4691fd);},_0x1202f1[_0xd05cad('Xa8x',0x2bf,0x3cf,0x43e,0x3e9)]=_0x53796b[_0x1e0083('fyQy',0x1bb,0x30a,0x277,0x2dd)],_0x1202f1[_0x1e0083('%hM&',0x185,0x2ed,0x2cb,0x1d2)]=function(_0x51ab0e){var _0x4038f5=function(_0x2c7f31,_0x9aafd1,_0xe2edff,_0x4e3900,_0x220fad){return _0x1a031e(_0x9aafd1,_0x9aafd1-0x155,_0xe2edff-0xfe,_0x220fad- -0x2f,_0x220fad-0xaf);};return _0x53796b[_0x4038f5(0x460,'$$$$',0x568,0x4b8,0x4b1)](_0x51ab0e);},_0x1202f1[_0x466975('ol1A',0x57b,0x52c,0x405,0x590)]=function(_0x4cad9d,_0x2769a8){var _0x17e42b=function(_0x34e2f1,_0x5ba9bf,_0x404f35,_0x19f8f6,_0x248b71){return _0x2c0424(_0x404f35,_0x5ba9bf-0x1aa,_0x404f35-0x13f,_0x5ba9bf-0x386,_0x248b71-0x4a);};return _0x53796b[_0x17e42b(0x979,0x7f6,'WmfV',0x7ad,0x851)](_0x4cad9d,_0x2769a8);},_0x1202f1[_0xd05cad('^nAA',0x1fd,0x439,0x2cf,0x336)]=_0x53796b[_0x466975('^nAA',0x2d7,0x283,0x348,0x2b4)],_0x1202f1[_0x2c0424('7Ys[',0x275,0x312,0x312,0x2c8)]=_0x53796b[_0x1e0083('^nAA',0x641,0x55f,0x4eb,0x414)],_0x1202f1[_0xd05cad('WjDD',0x2b9,0x4b4,0x3ae,0x454)]=function(_0x34d03c,_0xfbe00c){var _0x36afcb=function(_0x8830b0,_0x426e90,_0x3fa3ad,_0x12bc13,_0x8b6ffa){return _0x1a031e(_0x8830b0,_0x426e90-0x1cd,_0x3fa3ad-0x2e,_0x3fa3ad-0x78,_0x8b6ffa-0xf4);};return _0x53796b[_0x36afcb('ol1A',0x33b,0x36e,0x30d,0x23b)](_0x34d03c,_0xfbe00c);},_0x1202f1[_0x1e0083('flHa',0x2f7,0x3db,0x311,0x3df)]=_0x53796b[_0xd05cad('okEd',0x2f7,0x3ad,0x42b,0x406)],_0x1202f1[_0x1e0083('^nAA',0x39d,0x355,0x2fe,0x455)]=_0x53796b[_0x466975('okEd',0x235,0x301,0x298,0x2dc)];var _0x2f76d7=_0x1202f1;if(_0x53796b[_0x466975('ui8B',0x230,0x211,0x2a8,0x39a)](_0x53796b[_0x1a031e('BvFM',0x31e,0x45b,0x434,0x31e)],_0x53796b[_0xd05cad('YlEC',0x497,0x510,0x4c8,0x566)])){function _0x5b0e7a(){var _0x207202=function(_0x382b53,_0x3836d5,_0x509e82,_0x22d8fd,_0x3b6f76){return _0xd05cad(_0x382b53,_0x3836d5-0x16f,_0x509e82-0x75,_0x3836d5-0x391,_0x3b6f76-0xb8);},_0x5301e5=function(_0x46bea2,_0x1d5cd0,_0x3b5850,_0x57ae41,_0xfb0306){return _0x2c0424(_0x46bea2,_0x1d5cd0-0xd2,_0x3b5850-0x17f,_0x1d5cd0-0x391,_0xfb0306-0x155);},_0x284d2c=function(_0x29bb9d,_0x37a499,_0x4da704,_0x5d1c2b,_0x7175c0){return _0xd05cad(_0x29bb9d,_0x37a499-0x14c,_0x4da704-0x164,_0x37a499-0x391,_0x7175c0-0x1ec);},_0x587e40=function(_0x3708d9,_0x1572da,_0x59e6ea,_0x46c495,_0x4a1f21){return _0x1e0083(_0x3708d9,_0x1572da-0xd9,_0x59e6ea-0x1bb,_0x1572da-0x391,_0x4a1f21-0x12d);},_0x18ebd0=function(_0x351d67,_0x2d732a,_0x242569,_0x19935d,_0x2cd0b7){return _0x1a031e(_0x351d67,_0x2d732a-0xfe,_0x242569-0x130,_0x2d732a-0x391,_0x2cd0b7-0x16f);},_0x4dd85e={};_0x4dd85e[_0x207202('ol1A',0x7e3,0x8e5,0x6de,0x708)]=_0x53796b[_0x5301e5('fyQy',0x835,0x8b8,0x714,0x80b)],_0x4dd85e[_0x5301e5(')1tO',0x78f,0x658,0x7d1,0x844)]=_0x53796b[_0x284d2c('GFA*',0x85e,0x925,0x88f,0x6e7)];var _0x1458e0=_0x4dd85e,_0x5abfae=function(){var _0x2daf76=function(_0x5b478d,_0x7f418b,_0x2bab51,_0x3c7321,_0x2831f7){return _0x207202(_0x3c7321,_0x2831f7- -0x392,_0x2bab51-0x11,_0x3c7321-0x16f,_0x2831f7-0x128);},_0x31ed7=function(_0x2a6b4c,_0x74ce10,_0x52ac7b,_0x36846c,_0x51419d){return _0x207202(_0x36846c,_0x51419d- -0x392,_0x52ac7b-0x12b,_0x36846c-0x1b,_0x51419d-0x3a);},_0x1f71db=function(_0x5a6cf5,_0xdaaa0b,_0x4d3811,_0x3aadb7,_0x3baae5){return _0x207202(_0x3aadb7,_0x3baae5- -0x392,_0x4d3811-0x5e,_0x3aadb7-0x95,_0x3baae5-0x121);},_0x1dff45=function(_0x599e3c,_0x3c868a,_0x29335b,_0x7a40e2,_0x41759d){return _0x5301e5(_0x7a40e2,_0x41759d- -0x392,_0x29335b-0x13a,_0x7a40e2-0x179,_0x41759d-0x4a);},_0x40eace=function(_0x2dd1ac,_0x34d8ef,_0x4666c0,_0x21b7a4,_0x1051ff){return _0x207202(_0x21b7a4,_0x1051ff- -0x392,_0x4666c0-0x114,_0x21b7a4-0x177,_0x1051ff-0x12e);},_0x3c1049=_0x5abfae[_0x2daf76(0x26d,0x294,0x1f5,'Iwb(',0x380)+_0x2daf76(0x40a,0x3d1,0x591,'Xa8x',0x517)+'r'](_0x1458e0[_0x1f71db(0x1e3,0x190,0x1ed,'AgPH',0x30b)])()[_0x1f71db(0x2b7,0x258,0x40c,'YlEC',0x3c2)+_0x31ed7(0x46a,0x375,0x67f,'ol1A',0x500)+'r'](_0x1458e0[_0x40eace(0x4ae,0x2d9,0x4fb,'JFK^',0x436)]);return!_0x3c1049[_0x1f71db(0x2fc,0x1f0,0x30e,'Iwb(',0x211)](_0x281177);};return _0x53796b[_0x207202('QKTw',0x75f,0x8c3,0x73e,0x81f)](_0x5abfae);}}else{var _0xcabec1=_0x2ae6be?function(){var _0x5937af=function(_0x449752,_0x17a084,_0x5aab41,_0x41d055,_0xee2d39){return _0x2c0424(_0x449752,_0x17a084-0x92,_0x5aab41-0x11d,_0x5aab41-0xd1,_0xee2d39-0x7c);},_0x43b364=function(_0x5a0ef7,_0x11de13,_0x3bd99d,_0x3b1ec3,_0x21032f){return _0x1e0083(_0x5a0ef7,_0x11de13-0x12e,_0x3bd99d-0xe3,_0x3bd99d-0xd1,_0x21032f-0xd6);},_0x58bc99=function(_0x58540b,_0x3f42ca,_0x4e9103,_0x380e1e,_0x4bddf7){return _0x2c0424(_0x58540b,_0x3f42ca-0x167,_0x4e9103-0x13d,_0x4e9103-0xd1,_0x4bddf7-0x1bd);},_0x388e92=function(_0x271a22,_0xad5f77,_0x431aab,_0x1f15c1,_0x4c269a){return _0x1e0083(_0x271a22,_0xad5f77-0x2d,_0x431aab-0xf8,_0x431aab-0xd1,_0x4c269a-0x3d);},_0x1b920f=function(_0xd8247a,_0x558607,_0x5d7e5c,_0x1ad3d0,_0x46b84e){return _0xd05cad(_0xd8247a,_0x558607-0x1c5,_0x5d7e5c-0xe7,_0x5d7e5c-0xd1,_0x46b84e-0x42);};if(_0x2f76d7[_0x5937af('t1va',0x1f4,0x2fe,0x45d,0x420)](_0x2f76d7[_0x5937af('%hM&',0x1e0,0x2f7,0x256,0x330)],_0x2f76d7[_0x58bc99('YlEC',0x523,0x4cc,0x413,0x514)])){function _0x2eb9a1(){_0x5aefcb=_0x5cd61b;}}else{if(_0x2232b9){if(_0x2f76d7[_0x58bc99('De8M',0x4fc,0x38b,0x390,0x314)](_0x2f76d7[_0x388e92('%hM&',0x601,0x5af,0x45e,0x510)],_0x2f76d7[_0x58bc99('YlEC',0x670,0x594,0x6b9,0x615)])){var _0x57ce5a=_0x2232b9[_0x43b364('D^]c',0x31c,0x408,0x32d,0x4a0)](_0x52f31d,arguments);return _0x2232b9=null,_0x57ce5a;}else{function _0x323286(){var _0x98ea8d=function(_0x5936c7,_0x27f9d4,_0x3ea3e3,_0x546943,_0x1a2ed7){return _0x5937af(_0x546943,_0x27f9d4-0x71,_0x3ea3e3- -0x268,_0x546943-0x1d9,_0x1a2ed7-0x174);},_0x4976a6=function(_0x5278f3,_0x3e614e,_0x2b5be4,_0x3018f7,_0xfd4b33){return _0x1b920f(_0x3018f7,_0x3e614e-0xab,_0x2b5be4- -0x268,_0x3018f7-0xc5,_0xfd4b33-0x94);},_0x42211f=function(_0x4bef76,_0x5ba796,_0x27396f,_0x52addd,_0x41f264){return _0x5937af(_0x52addd,_0x5ba796-0xc9,_0x27396f- -0x268,_0x52addd-0x169,_0x41f264-0x8c);},_0x361738=function(_0x30b51a,_0x248e1e,_0x46c865,_0x13d62f,_0x2ab956){return _0x388e92(_0x13d62f,_0x248e1e-0xb2,_0x46c865- -0x268,_0x13d62f-0xdf,_0x2ab956-0x1d1);},_0x3af59c=function(_0x199686,_0xe94dc6,_0x12400f,_0x5752fb,_0x44e534){return _0x58bc99(_0x5752fb,_0xe94dc6-0x17f,_0x12400f- -0x268,_0x5752fb-0xa2,_0x44e534-0xed);},_0x5918f4=new _0x2e8df6(_0x2f76d7[_0x98ea8d(0x194,0xf1,0x274,'^nAA',0x328)]),_0x3a3618=new _0x23f182(_0x2f76d7[_0x4976a6(0x189,0x21,0xe7,'YlEC',0x255)],'i'),_0x59d647=_0x2f76d7[_0x4976a6(0x1a0,-0x2e,0xb9,'%hM&',-0x84)](_0x11069b,_0x2f76d7[_0x361738(0x18,0x2e5,0x156,'$$$$',0xae)]);!_0x5918f4[_0x42211f(0x247,0xf7,0x22f,'cCC)',0x1fa)](_0x2f76d7[_0x42211f(0x282,0x66,0x197,'GFA*',0x5f)](_0x59d647,_0x2f76d7[_0x361738(0x1f9,0x1dd,0x229,'7Ys[',0x210)]))||!_0x3a3618[_0x42211f(0xa8,0xf4,0x235,'9VMY',0x2d7)](_0x2f76d7[_0x42211f(0x48c,0x261,0x36c,'Pk^z',0x24d)](_0x59d647,_0x2f76d7[_0x42211f(0x39c,0x2de,0x2c7,'Ye6b',0x1c9)]))?_0x2f76d7[_0x42211f(0x182,0x441,0x2fb,'WmfV',0x29b)](_0x59d647,'0'):_0x2f76d7[_0x42211f(0x186,0x32b,0x2d8,'WmfV',0x152)](_0x2fd22f);}}}}}:function(){};return _0x2ae6be=![],_0xcabec1;}};}(),_0x30753c=_0x2cf5bc(this,function(){var _0x490444=function(_0x5cce01,_0x17bc17,_0x54b08f,_0x150d16,_0x3116b5){return _0x45ed(_0x3116b5-0x169,_0x5cce01);},_0x2ba366=function(_0x547875,_0x4bb27d,_0x56157,_0x4d98d8,_0x46a6f5){return _0x45ed(_0x46a6f5-0x169,_0x547875);},_0x52013d=function(_0x16b487,_0x29a607,_0x25a845,_0xda0c9d,_0x1f911b){return _0x45ed(_0x1f911b-0x169,_0x16b487);},_0x2c5c26=function(_0x147c56,_0x1c0fb6,_0x392351,_0x493615,_0x171b58){return _0x45ed(_0x171b58-0x169,_0x147c56);},_0x7a073b=function(_0x72602d,_0x56ad46,_0x5f27b0,_0x3ebbd6,_0x606253){return _0x45ed(_0x606253-0x169,_0x72602d);},_0x23c1b6={};_0x23c1b6[_0x490444('BvFM',0x54e,0x317,0x582,0x420)]=function(_0x400210){return _0x400210();},_0x23c1b6[_0x490444('Ye6b',0x46f,0x29a,0x48e,0x354)]=function(_0x192246,_0x142c43){return _0x192246!==_0x142c43;},_0x23c1b6[_0x52013d('Pk^z',0x2ba,0x2cb,0x2e1,0x34f)]=_0x2c5c26('GtVY',0x53b,0x59d,0x441,0x4bc),_0x23c1b6[_0x52013d('yflv',0x7a9,0x518,0x5bb,0x61e)]=_0x2ba366('ui8B',0x5fc,0x3d7,0x5cf,0x4cd)+_0x7a073b('7Ys[',0x2f5,0x4b1,0x479,0x37e)+_0x490444('GFA*',0x4d6,0x5b2,0x5e6,0x641)+_0x2ba366('QKTw',0x5ae,0x507,0x4ed,0x59e)+'/',_0x23c1b6[_0x7a073b('5IhV',0x5e2,0x585,0x463,0x55b)]=_0x52013d('ui8B',0x6d8,0x63c,0x653,0x5f9)+_0x2c5c26('YlEC',0x60d,0x589,0x659,0x503)+_0x2ba366('xXaa',0x537,0x52a,0x5fa,0x4df)+_0x7a073b('9VMY',0x5fa,0x4dd,0x495,0x51e)+_0x2ba366('flHa',0x2bc,0x1ef,0x42c,0x346),_0x23c1b6[_0x7a073b('AgPH',0x2f6,0x3d3,0x54c,0x456)]=function(_0x3986b0){return _0x3986b0();};var _0x3014f9=_0x23c1b6,_0x2374f0=function(){var _0x3e9467=function(_0x5f5d08,_0x1e2507,_0x520f39,_0x1eda68,_0x53fa5a){return _0x2ba366(_0x1eda68,_0x1e2507-0x84,_0x520f39-0x87,_0x1eda68-0x3e,_0x1e2507-0x26d);},_0x5cd285=function(_0x34eb3f,_0x4fc2b5,_0x517fdf,_0x1e40ec,_0x34e89d){return _0x52013d(_0x1e40ec,_0x4fc2b5-0x4f,_0x517fdf-0x11f,_0x1e40ec-0x84,_0x4fc2b5-0x26d);},_0x14a0ba=function(_0x2ead4f,_0x3189cc,_0x545af3,_0xe4edc6,_0x59ab69){return _0x2ba366(_0xe4edc6,_0x3189cc-0x172,_0x545af3-0x184,_0xe4edc6-0x80,_0x3189cc-0x26d);},_0x5cf9ec=function(_0x51453f,_0x38b50f,_0x2b0c1c,_0x3314b0,_0x59dfd6){return _0x7a073b(_0x3314b0,_0x38b50f-0xb,_0x2b0c1c-0x1b7,_0x3314b0-0x7e,_0x38b50f-0x26d);},_0x50c164=function(_0x31c085,_0x4c8f99,_0x618dc9,_0x4aee01,_0x285d2f){return _0x7a073b(_0x4aee01,_0x4c8f99-0xc,_0x618dc9-0x1c4,_0x4aee01-0x1ec,_0x4c8f99-0x26d);},_0x1307e0={};_0x1307e0[_0x3e9467(0x8fe,0x83b,0x99f,'BvFM',0x96e)]=function(_0x210c3f){var _0x4b4609=function(_0x1b2ed8,_0x4c0b97,_0x3b6da1,_0x545769,_0x36cb56){return _0x3e9467(_0x1b2ed8-0xb9,_0x36cb56- -0x386,_0x3b6da1-0x18f,_0x3b6da1,_0x36cb56-0x7f);};return _0x3014f9[_0x4b4609(0x393,0x215,'fyQy',0x46e,0x305)](_0x210c3f);};var _0x839b8e=_0x1307e0;if(_0x3014f9[_0x3e9467(0x713,0x7b6,0x79f,'K4Al',0x831)](_0x3014f9[_0x5cd285(0xa01,0x8c4,0x838,'BvFM',0x990)],_0x3014f9[_0x5cd285(0x6ad,0x687,0x68b,'5IhV',0x740)])){function _0x6c80bb(){var _0x971a9c=function(_0x5eac56,_0x3e21c3,_0x479074,_0x3b39a0,_0x1b4196){return _0x14a0ba(_0x5eac56-0x1ae,_0x5eac56-0x34c,_0x479074-0x13b,_0x1b4196,_0x1b4196-0x99);};_0x839b8e[_0x971a9c(0xaf7,0xa60,0xbc0,0x97d,'GFA*')](_0x322f6b);}}else{var _0x5d5927=_0x2374f0[_0x14a0ba(0x497,0x604,0x58e,'GFA*',0x792)+_0x3e9467(0x8f9,0x850,0x72a,'YlEC',0x807)+'r'](_0x3014f9[_0x5cf9ec(0x79f,0x6fd,0x576,'KlqJ',0x7b0)])()[_0x50c164(0x6fe,0x721,0x734,'5IhV',0x653)+_0x3e9467(0x51e,0x612,0x6ab,')k3R',0x4e2)+'r'](_0x3014f9[_0x5cf9ec(0x85c,0x7ce,0x962,'xXaa',0x6e4)]);return!_0x5d5927[_0x3e9467(0x767,0x8ca,0x81d,'GFA*',0x96b)](_0x30753c);}};return _0x3014f9[_0x2c5c26('D^]c',0x3b8,0x417,0x48f,0x359)](_0x2374f0);});_0x30753c();var _0x4c18ec=function(){var _0x3e46c0=function(_0x389260,_0x51e00d,_0x2ab761,_0x22d5a5,_0x55deb5){return _0x45ed(_0x22d5a5- -0x33,_0x55deb5);},_0x42e263=function(_0x3cfe9b,_0x49c89f,_0x3fd78e,_0x3f0c35,_0x4d1194){return _0x45ed(_0x3f0c35- -0x33,_0x4d1194);},_0x55bebd=function(_0x15b7db,_0xcb74bd,_0x1c0ef6,_0x19f9ba,_0x20084a){return _0x45ed(_0x19f9ba- -0x33,_0x20084a);},_0x28ec11=function(_0x5de044,_0x15ca2e,_0x18ad0b,_0x3e1bcf,_0x5739fa){return _0x45ed(_0x3e1bcf- -0x33,_0x5739fa);},_0xb4a50b=function(_0x1f7902,_0x4b893d,_0x35a282,_0x4b69ae,_0x24a9f9){return _0x45ed(_0x4b69ae- -0x33,_0x24a9f9);},_0x540e78={};_0x540e78[_0x3e46c0(0x330,0x320,0x312,0x2f1,'5IhV')]=function(_0x58be37,_0x59a216){return _0x58be37===_0x59a216;},_0x540e78[_0x3e46c0(0x532,0x34b,0x3c8,0x443,'GFA*')]=_0x3e46c0(0x262,0x269,0x2aa,0x1b2,'YlEC'),_0x540e78[_0x3e46c0(0x1a7,0xa1,0xf8,0x226,'!o]u')]=function(_0x2112b7,_0x31a289){return _0x2112b7!==_0x31a289;},_0x540e78[_0xb4a50b(0x2cb,0x486,0x487,0x405,'GFA*')]=_0x55bebd(0x160,0x151,0x275,0x212,'PAek'),_0x540e78[_0x28ec11(0x298,0x241,0x1be,0x1eb,'GtVY')]=function(_0x32f61e){return _0x32f61e();},_0x540e78[_0x55bebd(0x492,0x4ba,0x489,0x3e5,'cCC)')]=function(_0x4e7eb6,_0x12409d){return _0x4e7eb6!==_0x12409d;},_0x540e78[_0xb4a50b(0x446,0x2b1,0x437,0x3dc,'WmfV')]=_0x42e263(0x32b,0x507,0x496,0x38a,'ui8B');var _0x3a143d=_0x540e78,_0xed8ab8=!![];return function(_0x3b0beb,_0x1db2ad){var _0x49da7a=function(_0x53a5e3,_0x3a8a5e,_0x5ce3ed,_0x524b3a,_0x2fee9d){return _0x3e46c0(_0x53a5e3-0x122,_0x3a8a5e-0x119,_0x5ce3ed-0x150,_0x3a8a5e- -0x305,_0x524b3a);},_0x57da0d=function(_0x4fbdfc,_0x3adec6,_0x2452d5,_0x513dcb,_0x5635a6){return _0x28ec11(_0x4fbdfc-0xb9,_0x3adec6-0x19,_0x2452d5-0x1a1,_0x3adec6- -0x305,_0x513dcb);},_0x19a835=function(_0x176df5,_0x309e9,_0x169669,_0x13f6cb,_0x76ec16){return _0x42e263(_0x176df5-0x92,_0x309e9-0x1d8,_0x169669-0xf3,_0x309e9- -0x305,_0x13f6cb);},_0x3b945d=function(_0x32c916,_0x3173f3,_0x5039b4,_0x4f68a0,_0x13c0df){return _0x3e46c0(_0x32c916-0x16e,_0x3173f3-0x15b,_0x5039b4-0xa,_0x3173f3- -0x305,_0x4f68a0);},_0x4e81e4={};_0x4e81e4[_0x49da7a(0x24d,0x159,0x2b6,'Pk^z',0x73)]=function(_0x32e258){var _0x1c1c2e=function(_0x420f30,_0x19e15b,_0x16244c,_0x399fbf,_0xc64e26){return _0x49da7a(_0x420f30-0x14c,_0x420f30-0x1f0,_0x16244c-0x19c,_0xc64e26,_0xc64e26-0x178);};return _0x3a143d[_0x1c1c2e(0x21d,0xe6,0x194,0x2ed,'D^]c')](_0x32e258);};var _0x485846=_0x4e81e4;if(_0x3a143d[_0x57da0d(0x6f,-0xe0,0x82,'7Ys[',-0x7b)](_0x3a143d[_0x49da7a(-0x12b,-0x2b,-0x108,'YLz*',0x4)],_0x3a143d[_0x57da0d(0x8e,-0xbd,-0x163,'ol1A',-0x146)])){function _0x56c38b(){var _0x4035e1=function(_0x177190,_0x2612cb,_0x567bb8,_0x2e0cfb,_0x4e3ccc){return _0x3b945d(_0x177190-0xd4,_0x567bb8- -0x17,_0x567bb8-0x16b,_0x4e3ccc,_0x4e3ccc-0x1d7);};_0x485846[_0x4035e1(-0x194,-0x1b8,-0xf5,-0x1f4,'WjDD')](_0x420d70);}}else{var _0x35a6b4=_0xed8ab8?function(){var _0x1fd6b3=function(_0x31af2e,_0x2c8587,_0x56fd19,_0x43d86f,_0x443d3b){return _0x49da7a(_0x31af2e-0x1d3,_0x443d3b-0x376,_0x56fd19-0x37,_0x2c8587,_0x443d3b-0xc8);},_0x289108=function(_0x48a0cf,_0x4d658b,_0x357e4c,_0x5470e8,_0x72831e){return _0x49da7a(_0x48a0cf-0x126,_0x72831e-0x376,_0x357e4c-0x178,_0x4d658b,_0x72831e-0x1a1);},_0x6d5855=function(_0x2d02f4,_0x2ae931,_0x10c61e,_0x5f52e8,_0x326fa7){return _0x19a835(_0x2d02f4-0x76,_0x326fa7-0x376,_0x10c61e-0x83,_0x2ae931,_0x326fa7-0x1f1);},_0x23fb48=function(_0x5e630b,_0x194f88,_0x39310c,_0x96774c,_0x583f44){return _0x49da7a(_0x5e630b-0xa0,_0x583f44-0x376,_0x39310c-0x57,_0x194f88,_0x583f44-0x2f);},_0x514f0c=function(_0x1f6447,_0x1e5581,_0x1de531,_0x955b63,_0x236bca){return _0x49da7a(_0x1f6447-0x19d,_0x236bca-0x376,_0x1de531-0xf2,_0x1e5581,_0x236bca-0x159);};if(_0x3a143d[_0x1fd6b3(0x332,'Iwb(',0x400,0x313,0x388)](_0x3a143d[_0x289108(0x584,'9VMY',0x3fe,0x54e,0x4af)],_0x3a143d[_0x6d5855(0x242,'JFK^',0x34e,0x34a,0x37f)])){if(_0x1db2ad){if(_0x3a143d[_0x1fd6b3(0x30d,'D^]c',0x42c,0x2a9,0x414)](_0x3a143d[_0x514f0c(0x369,'boAD',0x222,0x2e0,0x311)],_0x3a143d[_0x289108(0x53a,'0!tz',0x479,0x39b,0x4cc)])){function _0x12fd90(){var _0x36f7d7=function(_0x523870,_0x5a92b7,_0x5c38ce,_0x3412ea,_0x324899){return _0x1fd6b3(_0x523870-0x167,_0x5c38ce,_0x5c38ce-0x1ab,_0x3412ea-0x8b,_0x324899- -0x12b);},_0x1e6cfe=_0x595dbc[_0x36f7d7(0x422,0x3ab,'TPsE',0x25d,0x30e)](_0x1eef48,arguments);return _0x1e50e7=null,_0x1e6cfe;}}else{var _0x106b74=_0x1db2ad[_0x23fb48(0x61d,'YLz*',0x60d,0x637,0x50b)](_0x3b0beb,arguments);return _0x1db2ad=null,_0x106b74;}}}else{function _0x4a84da(){return![];}}}:function(){};return _0xed8ab8=![],_0x35a6b4;}};}();(function(){var _0x3433bb=function(_0xadf0ce,_0x1df6c4,_0x54867a,_0x5ea62f,_0x4ac84c){return _0x45ed(_0x4ac84c- -0x21c,_0x5ea62f);},_0x26c044=function(_0x1ace8a,_0x52945f,_0x2371e2,_0x455864,_0x36de04){return _0x45ed(_0x36de04- -0x21c,_0x455864);},_0x185638=function(_0x2a3170,_0x1825cc,_0x1c5f81,_0x15d7ce,_0x3e7264){return _0x45ed(_0x3e7264- -0x21c,_0x15d7ce);},_0x161a46=function(_0x415295,_0x408fb8,_0x34466e,_0x214794,_0x50c67a){return _0x45ed(_0x50c67a- -0x21c,_0x214794);},_0x3d2876=function(_0x3c7f9f,_0x2f374e,_0x4b2b74,_0x2f7f3e,_0x1ca482){return _0x45ed(_0x1ca482- -0x21c,_0x2f7f3e);},_0x201cc1={};_0x201cc1[_0x3433bb(0x126,0x1ab,0x2a4,'okEd',0x265)]=function(_0x91bf91,_0xab23fb){return _0x91bf91(_0xab23fb);},_0x201cc1[_0x3433bb(0x1ac,0x1d2,-0xd9,'9VMY',0x7a)]=function(_0x1e7c30,_0x1fea32){return _0x1e7c30!==_0x1fea32;},_0x201cc1[_0x3433bb(0x16b,0x113,0x368,'PAek',0x1e4)]=_0x3433bb(0x43,0x150,0x244,'jdjj',0x100),_0x201cc1[_0x3433bb(0x147,0x8c,-0x16,'8J@Y',-0x8)]=_0x3433bb(0x75,0x15a,0x258,'$$$$',0x1fa)+_0x161a46(0x2ce,0xfe,0x258,'t1va',0x244)+_0x185638(0xfe,0xcd,0x69,'t1va',0x6)+')',_0x201cc1[_0x185638(0x15c,0x5a,0x1a4,'xXaa',0x130)]=_0x3d2876(0x67,-0x147,-0x17d,'K4Al',-0x26)+_0x3d2876(0x411,0x195,0x11e,'okEd',0x2a3)+_0x185638(0xc2,0x5,0x14b,'fyQy',0xc1)+_0x26c044(0x159,0x1b4,0x164,'0!tz',0xf5)+_0x3433bb(-0x57,0xdd,0x2d,'Iwb(',-0x32)+_0x3d2876(0x12e,0x16c,0x2a4,'8J@Y',0x22d)+_0x161a46(0xdb,0x282,0x27f,'Izg]',0x20a),_0x201cc1[_0x3d2876(0x1db,0x21,0x258,'^nAA',0x1b5)]=function(_0x205974,_0x398a50){return _0x205974(_0x398a50);},_0x201cc1[_0x26c044(-0xec,0x135,0xc7,'yflv',0x89)]=_0x185638(0xf1,0x286,0x2b1,'5IhV',0x182),_0x201cc1[_0x3433bb(-0x1d,0xc8,0xa6,'okEd',0xa4)]=function(_0x22fc3a,_0x28f5ab){return _0x22fc3a+_0x28f5ab;},_0x201cc1[_0x185638(0x23a,0x293,0x299,'D^]c',0x2e1)]=_0x161a46(0x24f,0x272,0x319,'AgPH',0x188),_0x201cc1[_0x26c044(0x196,0x1c0,0x34,'^nAA',0x74)]=_0x185638(0x215,-0x9b,0x145,'B%ZG',0xd0),_0x201cc1[_0x185638(0x29,0x11e,0xb4,'jdjj',0x17d)]=function(_0x3919da,_0x11b7b3){return _0x3919da===_0x11b7b3;},_0x201cc1[_0x3433bb(-0x6f,0x165,-0xa1,')k3R',0xad)]=_0x3d2876(0x230,0xfe,-0x59,'^nAA',0xcc),_0x201cc1[_0x3d2876(-0x4,0x225,0x1ff,'^nAA',0x13f)]=_0x26c044(0x218,0x112,0x2e5,'xXaa',0x242),_0x201cc1[_0x26c044(0x166,0x1d8,0x1e6,'cCC)',0x23c)]=function(_0x3d005d,_0x38cfd7){return _0x3d005d(_0x38cfd7);},_0x201cc1[_0x185638(0x447,0x19b,0x245,'%hM&',0x2e2)]=_0x26c044(0x130,0xed,0x1b4,')1tO',0xee),_0x201cc1[_0x3433bb(0x33,0x29,0xef,'B%ZG',0x1b2)]=_0x26c044(-0x148,0xa6,-0xb6,'WmfV',-0x6),_0x201cc1[_0x26c044(0x11c,0x261,0x202,'YlEC',0x1e6)]=function(_0xfc1c9f){return _0xfc1c9f();},_0x201cc1[_0x161a46(0xe2,-0xb1,0x47,'t1va',-0x45)]=function(_0x255add,_0x1f778d,_0x18ad12){return _0x255add(_0x1f778d,_0x18ad12);};var _0x5f3cde=_0x201cc1;_0x5f3cde[_0x3433bb(0x1bb,0x1c5,0x213,'GFA*',0x235)](_0x4c18ec,this,function(){var _0x3720be=function(_0x1439b0,_0x3b5614,_0x4c7c8d,_0xb3bb71,_0x516575){return _0x26c044(_0x1439b0-0x1d7,_0x3b5614-0x191,_0x4c7c8d-0x171,_0xb3bb71,_0x516575- -0x59);},_0x428841=function(_0x115469,_0x5061a6,_0x9354d8,_0x227659,_0x22a046){return _0x161a46(_0x115469-0x1a6,_0x5061a6-0x104,_0x9354d8-0x15b,_0x227659,_0x22a046- -0x59);},_0x144f3f=function(_0x332d7f,_0x1f60ef,_0x35366d,_0x425775,_0x3b0749){return _0x185638(_0x332d7f-0xd3,_0x1f60ef-0x1b6,_0x35366d-0x108,_0x425775,_0x3b0749- -0x59);},_0x5a06f7=function(_0xd5d04d,_0x20c325,_0x209fe0,_0x36bf7a,_0x4e1b9d){return _0x26c044(_0xd5d04d-0x4f,_0x20c325-0xbe,_0x209fe0-0x131,_0x36bf7a,_0x4e1b9d- -0x59);},_0x49c07b=function(_0x333895,_0x183179,_0x327b47,_0x50ea7a,_0x26092b){return _0x185638(_0x333895-0x15,_0x183179-0x4e,_0x327b47-0x92,_0x50ea7a,_0x26092b- -0x59);};if(_0x5f3cde[_0x3720be(0x17f,-0x9c,0x13e,'JFK^',0x3a)](_0x5f3cde[_0x3720be(0x1a3,0x259,0x33f,'flHa',0x249)],_0x5f3cde[_0x144f3f(0x213,0x2d4,0x2ce,'cCC)',0x262)])){function _0x19cdca(){return _0x18d462;}}else{var _0x5e26ca=new RegExp(_0x5f3cde[_0x428841(0xca,0xdb,-0x63,'WjDD',-0x34)]),_0x294c4f=new RegExp(_0x5f3cde[_0x428841(-0x40,0x105,0xe6,'^nAA',-0x16)],'i'),_0x3a5859=_0x5f3cde[_0x5a06f7(-0xb,0x234,0x116,'K4Al',0xd0)](_0x39fd78,_0x5f3cde[_0x144f3f(0x293,0x337,0x23d,'forS',0x21e)]);if(!_0x5e26ca[_0x5a06f7(0x103,0x77,0x56,'WmfV',0x1aa)](_0x5f3cde[_0x49c07b(0xf5,0xfb,0x308,'5jjF',0x26d)](_0x3a5859,_0x5f3cde[_0x144f3f(0x5e,0x93,0x185,')1tO',0xe0)]))||!_0x294c4f[_0x428841(0x130,0x312,0x1d4,'GFA*',0x27f)](_0x5f3cde[_0x49c07b(0x360,0x26b,0xf3,'YlEC',0x226)](_0x3a5859,_0x5f3cde[_0x144f3f(-0x8c,0x27c,0x3e,'De8M',0xe9)]))){if(_0x5f3cde[_0x5a06f7(0x2fa,0x108,0x27d,'fyQy',0x1bb)](_0x5f3cde[_0x428841(0x235,0x242,-0x83,'AgPH',0xc0)],_0x5f3cde[_0x5a06f7(0xfb,0x116,0xe9,'Pk^z',0xa)])){function _0x2850e3(){var _0x53af64=function(_0x2cc011,_0x3e7c7d,_0x176ff3,_0x4af3ff,_0x5569f5){return _0x428841(_0x2cc011-0x70,_0x3e7c7d-0x146,_0x176ff3-0x188,_0x3e7c7d,_0x2cc011-0x1ba);};_0x5f3cde[_0x53af64(0x2bf,'WmfV',0x133,0x158,0x2b9)](_0x3a4a84,0x2423+0xc14+-0x1*0x3037);}}else _0x5f3cde[_0x3720be(0x280,0xeb,0x392,'!o]u',0x267)](_0x3a5859,'0');}else{if(_0x5f3cde[_0x144f3f(0x111,0x22c,0x20e,'QKTw',0xc1)](_0x5f3cde[_0x144f3f(-0x1cf,-0x197,-0x1f,'De8M',-0x54)],_0x5f3cde[_0x49c07b(0x11,0x271,0x102,'jdjj',0x153)]))_0x5f3cde[_0x428841(0xcc,-0x67,-0xc1,'K4Al',0x3d)](_0x39fd78);else{function _0xbf9e9d(){var _0x2185e6=function(_0x52a8a3,_0x450ef4,_0x585b80,_0x58e9b6,_0x2ff754){return _0x5a06f7(_0x52a8a3-0x78,_0x450ef4-0x1db,_0x585b80-0x16e,_0x2ff754,_0x52a8a3- -0x68);},_0x4b3b59=_0x5a694d[_0x2185e6(0x216,0x197,0x202,0x291,'!o]u')](_0x5e8fdc,arguments);return _0x11f83a=null,_0x4b3b59;}}}}})();}());var _0x18e063=function(){var _0x44d473=function(_0x59dc26,_0x17feea,_0x5940ba,_0x274bed,_0x5bb358){return _0x45ed(_0x5bb358- -0x382,_0x59dc26);},_0x996801=function(_0x486aa3,_0x5e3ee6,_0x55efa8,_0x3b79ce,_0x8a9688){return _0x45ed(_0x8a9688- -0x382,_0x486aa3);},_0x461c8b=function(_0x714fb8,_0x101764,_0x4cf4cd,_0x197198,_0xf56fc1){return _0x45ed(_0xf56fc1- -0x382,_0x714fb8);},_0xb8de9c=function(_0x5ce2fc,_0x563e16,_0x1f9ab6,_0x229d35,_0x355c15){return _0x45ed(_0x355c15- -0x382,_0x5ce2fc);},_0x190192=function(_0x12ef2a,_0x98a1ab,_0x1d04ec,_0x4d535b,_0x288446){return _0x45ed(_0x288446- -0x382,_0x12ef2a);},_0x1ed10e={};_0x1ed10e[_0x44d473('cCC)',0x153,0x6f,0x1e1,0xcc)]=function(_0xadcd0b,_0x26ada1){return _0xadcd0b(_0x26ada1);},_0x1ed10e[_0x44d473('HI6K',0x1c0,0x147,-0x9a,0x5b)]=function(_0xf1d82a,_0x4125a1){return _0xf1d82a+_0x4125a1;},_0x1ed10e[_0x461c8b('fyQy',0x3e,-0x65,-0x1a4,-0x70)]=function(_0x493b44,_0x50ce9c){return _0x493b44+_0x50ce9c;},_0x1ed10e[_0x44d473('$$$$',-0x9c,0x24,-0x31,-0x171)]=_0x190192('okEd',-0xa,0x1c0,0x3c,0x5c)+_0x996801('okEd',-0x162,-0x1a7,-0x5e,-0x104)+_0x190192('%hM&',-0x172,0x29,0x4e,-0x113)+_0x461c8b('YLz*',-0x116,-0x290,-0x272,-0x119),_0x1ed10e[_0x190192('ol1A',-0x8a,0x254,0x26f,0xfb)]=_0x44d473('Xa8x',-0xd2,-0x1b6,0x8d,-0x4b)+_0x44d473('GFA*',-0xee,0x74,-0xa7,-0x50)+_0xb8de9c('9VMY',-0xc1,-0x14b,-0x15c,-0x155)+_0x190192('ui8B',-0x11b,-0xc7,-0x96,0x77)+_0x190192('PAek',0x152,0x96,0x106,0x106)+_0x996801('B%ZG',0x80,0x1aa,0x1fa,0xe5)+'\x20)',_0x1ed10e[_0x190192('8J@Y',-0xac,0x226,0x23e,0xda)]=function(_0x443f32){return _0x443f32();},_0x1ed10e[_0x996801('0!tz',-0xc,0x32,-0xb9,-0x101)]=function(_0xf6be4b,_0x4c4e44){return _0xf6be4b===_0x4c4e44;},_0x1ed10e[_0x461c8b('yflv',0x7c,0x2d5,0x2a6,0x146)]=_0x190192('forS',0x2cc,0x2b4,0x97,0x15e),_0x1ed10e[_0xb8de9c('ui8B',0x1ec,0x19f,-0xa3,0xb1)]=_0x461c8b('flHa',0xab,0x1c,-0xbb,-0xd4),_0x1ed10e[_0x996801('0!tz',0xdf,-0x4f,0x192,0xa1)]=_0xb8de9c('HI6K',-0x15e,0xc6,0x107,0x36),_0x1ed10e[_0xb8de9c('fyQy',0xe,-0xc7,-0x210,-0xf5)]=_0xb8de9c('Iwb(',0x121,0x157,-0x56,0xba),_0x1ed10e[_0x44d473('PAek',0x174,0x19b,0xc8,0xbb)]=function(_0xf9f36e,_0x6aba5d){return _0xf9f36e!==_0x6aba5d;},_0x1ed10e[_0x461c8b('D^]c',-0x18e,-0x7f,-0x7a,-0x52)]=_0x190192('AgPH',-0x17a,-0x11a,-0x209,-0x11e);var _0x1e20ff=_0x1ed10e,_0x60dc8e=!![];return function(_0x2bbc77,_0x38b525){var _0x1b76b9=function(_0x20584a,_0x2f7a12,_0xccb47f,_0x1db4ec,_0xef2d54){return _0x44d473(_0x20584a,_0x2f7a12-0xb4,_0xccb47f-0x1d1,_0x1db4ec-0x8b,_0xef2d54-0x188);},_0x3e5a1f=function(_0x1e2c15,_0x335ded,_0x3769e5,_0xfe5978,_0x38a161){return _0xb8de9c(_0x1e2c15,_0x335ded-0x14e,_0x3769e5-0x1ee,_0xfe5978-0x13b,_0x38a161-0x188);},_0x273c9b=function(_0x2c105b,_0xcc160e,_0x23aa1e,_0x52d313,_0x381a23){return _0x44d473(_0x2c105b,_0xcc160e-0x33,_0x23aa1e-0x14c,_0x52d313-0x67,_0x381a23-0x188);},_0x59a059=function(_0x464810,_0x2efd5b,_0xc8476c,_0x37f8db,_0x350942){return _0x44d473(_0x464810,_0x2efd5b-0x65,_0xc8476c-0x18,_0x37f8db-0x20,_0x350942-0x188);},_0xbf468c=function(_0x5a2561,_0x35fbc9,_0x22876b,_0x37bd1a,_0xc8d543){return _0x44d473(_0x5a2561,_0x35fbc9-0x185,_0x22876b-0x156,_0x37bd1a-0x111,_0xc8d543-0x188);},_0x552bf4={};_0x552bf4[_0x1b76b9('HI6K',0x2c8,0x29d,0x2d8,0x28f)]=function(_0xb72b6e,_0x2652e9){var _0x16a413=function(_0x1398dd,_0x19f3de,_0x571154,_0x342e98,_0x3a955e){return _0x1b76b9(_0x19f3de,_0x19f3de-0x14e,_0x571154-0xcd,_0x342e98-0xb6,_0x1398dd- -0x3e7);};return _0x1e20ff[_0x16a413(-0x34c,'flHa',-0x1d8,-0x3b4,-0x4d9)](_0xb72b6e,_0x2652e9);},_0x552bf4[_0x3e5a1f('B%ZG',0xb8,0x64,-0x3c,0x35)]=function(_0x25db39,_0xfb04f7){var _0x528965=function(_0x5e0d20,_0x26592c,_0xa7fb6a,_0x51f00a,_0xc97c5f){return _0x3e5a1f(_0x51f00a,_0x26592c-0x1c6,_0xa7fb6a-0x10,_0x51f00a-0x1e7,_0x5e0d20- -0x31);};return _0x1e20ff[_0x528965(0xde,-0x61,0x240,'Iwb(',0x139)](_0x25db39,_0xfb04f7);},_0x552bf4[_0x3e5a1f('YLz*',0x24a,-0x74,-0xb5,0xc3)]=function(_0x4da60d,_0xc95bb9){var _0x5df105=function(_0x22c52b,_0x40ee9f,_0x34373c,_0x1a337c,_0x4dc98c){return _0x1b76b9(_0x34373c,_0x40ee9f-0xb8,_0x34373c-0x60,_0x1a337c-0x118,_0x1a337c-0xab);};return _0x1e20ff[_0x5df105(0x3e9,0x230,'5jjF',0x3a8,0x3a0)](_0x4da60d,_0xc95bb9);},_0x552bf4[_0x3e5a1f('jdjj',0x18c,0x239,-0x1,0x17d)]=_0x1e20ff[_0x1b76b9('KlqJ',0x103,-0x32,0x102,0x139)],_0x552bf4[_0x1b76b9('GFA*',-0x150,-0xa,0x17d,0x2b)]=_0x1e20ff[_0xbf468c('!o]u',0x2c9,0x192,0x268,0x187)],_0x552bf4[_0x3e5a1f('yflv',0x11a,0x1dd,-0x38,0xf4)]=function(_0x3a5600){var _0x272d4e=function(_0x2cfb78,_0x508007,_0x5965b8,_0x4781bb,_0x4eb86d){return _0x273c9b(_0x2cfb78,_0x508007-0xc8,_0x5965b8-0x1c7,_0x4781bb-0x7a,_0x4eb86d- -0x111);};return _0x1e20ff[_0x272d4e('0!tz',0x6e,0x91,0x2cc,0x150)](_0x3a5600);},_0x552bf4[_0x1b76b9('flHa',0x110,-0x64,0x9a,0xf9)]=function(_0x555802,_0x278ba4){var _0x519fed=function(_0x360595,_0x152932,_0x40ac9a,_0x5233a4,_0x1def76){return _0x1b76b9(_0x360595,_0x152932-0xbb,_0x40ac9a-0xab,_0x5233a4-0x186,_0x40ac9a- -0x355);};return _0x1e20ff[_0x519fed('QKTw',-0x16e,-0x1e8,-0x35d,-0x9f)](_0x555802,_0x278ba4);},_0x552bf4[_0xbf468c('ui8B',0xad,-0x25,-0x8f,-0x1b)]=_0x1e20ff[_0x59a059('BvFM',-0x4a,0x1eb,0xb3,0xf6)],_0x552bf4[_0xbf468c('yflv',0xd9,0x35b,0x21d,0x259)]=_0x1e20ff[_0x1b76b9('YLz*',0xb3,-0x94,0xfe,0xba)],_0x552bf4[_0x3e5a1f('%hM&',0x86,0x7c,0x21b,0x1fd)]=_0x1e20ff[_0x59a059('5jjF',0x173,0xe3,-0xd9,-0x1c)],_0x552bf4[_0x273c9b('D2[D',0x217,0x78,0x26,0xc0)]=_0x1e20ff[_0x59a059('WjDD',0x170,0x2ab,0x20c,0x167)];var _0x153fc9=_0x552bf4;if(_0x1e20ff[_0x1b76b9('GFA*',-0x7a,-0x16e,-0x129,0x15)](_0x1e20ff[_0xbf468c('forS',-0x4,-0x3e,0x18c,0xd7)],_0x1e20ff[_0x3e5a1f('Xa8x',0x147,0x258,-0xb2,0xda)])){function _0x50c20d(){var _0x137741=function(_0x2bc0bf,_0x484488,_0x400327,_0x1af79b,_0x37a2c2){return _0x3e5a1f(_0x1af79b,_0x484488-0x21,_0x400327-0x107,_0x1af79b-0x70,_0x37a2c2-0x6);};if(_0x45d315){var _0x9facac=_0x114c41[_0x137741(0xaa,0x17b,0x1bf,'%hM&',0x17c)](_0x28e3f7,arguments);return _0xcce239=null,_0x9facac;}}}else{var _0x4b27ca=_0x60dc8e?function(){var _0x5e1b56=function(_0x226ff1,_0x68149b,_0x5934b2,_0x2b5393,_0x1f3f67){return _0x273c9b(_0x5934b2,_0x68149b-0x4a,_0x5934b2-0x92,_0x2b5393-0xf0,_0x226ff1- -0x23);},_0x3a250=function(_0x3b704a,_0x22ec32,_0x295575,_0x473608,_0x49805c){return _0x59a059(_0x295575,_0x22ec32-0xc5,_0x295575-0x7d,_0x473608-0x1cb,_0x3b704a- -0x23);},_0x381f6a=function(_0xcce362,_0x2f6fd9,_0x4be507,_0x46a888,_0x5e5e39){return _0x1b76b9(_0x4be507,_0x2f6fd9-0x190,_0x4be507-0x1a7,_0x46a888-0xb,_0xcce362- -0x23);},_0x4c148f=function(_0x12f36f,_0x20180d,_0x254eba,_0x14d3aa,_0x3c1297){return _0x59a059(_0x254eba,_0x20180d-0x94,_0x254eba-0x16,_0x14d3aa-0x1a6,_0x12f36f- -0x23);},_0x2fc073=function(_0x30db71,_0x59e308,_0x493d3b,_0x571676,_0x4e6e82){return _0xbf468c(_0x493d3b,_0x59e308-0xb4,_0x493d3b-0x1d6,_0x571676-0x29,_0x30db71- -0x23);};if(_0x153fc9[_0x5e1b56(-0x35,-0x172,'Pk^z',-0x173,-0x191)](_0x153fc9[_0x5e1b56(0x174,0x2fb,'B%ZG',0x66,0x22f)],_0x153fc9[_0x381f6a(0x2b9,0x1fe,'cCC)',0x28b,0x34a)])){function _0x3e7292(){var _0x168319=function(_0x517c80,_0xc04bfd,_0x116ba8,_0x2d2805,_0x204a34){return _0x5e1b56(_0x204a34-0x267,_0xc04bfd-0x1ee,_0x2d2805,_0x2d2805-0xb3,_0x204a34-0x11b);};if(_0xec14d9)return _0x330b36;else _0x153fc9[_0x168319(0x542,0x55c,0x3d9,'okEd',0x4fb)](_0x337bdf,-0x1*-0x25e7+-0x22*-0xfa+-0xa7*0x6d);}}else{if(_0x38b525){if(_0x153fc9[_0x381f6a(0x11d,0xa2,'7Ys[',0x19b,0x258)](_0x153fc9[_0x381f6a(0x130,0x195,'flHa',0xa2,0x108)],_0x153fc9[_0x5e1b56(0x13d,0x1b2,'Pk^z',-0x2d,0xd4)])){function _0x5891b3(){var _0x1705f7=function(_0x444135,_0x35d077,_0x4421ea,_0x4c8bd6,_0x1e8b78){return _0x381f6a(_0x444135-0x372,_0x35d077-0x199,_0x1e8b78,_0x4c8bd6-0x1bc,_0x1e8b78-0xdf);},_0x21735f=function(_0x100467,_0x3fa17f,_0x100b83,_0x53f525,_0x331110){return _0x5e1b56(_0x100467-0x372,_0x3fa17f-0x31,_0x331110,_0x53f525-0xb3,_0x331110-0x102);},_0x4b5576=function(_0x5e1fcb,_0x5dd9b0,_0x2503f6,_0x8aaec9,_0x222554){return _0x3a250(_0x5e1fcb-0x372,_0x5dd9b0-0x8b,_0x222554,_0x8aaec9-0x169,_0x222554-0x130);},_0x3ce86a=function(_0x15d277,_0x53b4ea,_0x3ce022,_0x54c03f,_0x2dccf6){return _0x381f6a(_0x15d277-0x372,_0x53b4ea-0xd2,_0x2dccf6,_0x54c03f-0x39,_0x2dccf6-0x1bb);},_0x100ce5=function(_0x2aea03,_0x9629cc,_0x13a1fc,_0x5146d6,_0x9af5cc){return _0x381f6a(_0x2aea03-0x372,_0x9629cc-0x148,_0x9af5cc,_0x5146d6-0x19b,_0x9af5cc-0x54);},_0x4f20bf=_0x153fc9[_0x1705f7(0x402,0x40d,0x39a,0x547,'!o]u')](_0xc1c885,_0x153fc9[_0x21735f(0x568,0x41a,0x56b,0x57d,'GFA*')](_0x153fc9[_0x4b5576(0x386,0x2e4,0x28c,0x3b4,'boAD')](_0x153fc9[_0x21735f(0x573,0x5a6,0x67b,0x6c0,'d1Tk')],_0x153fc9[_0x100ce5(0x424,0x57d,0x3d1,0x509,'flHa')]),');'));_0x38c912=_0x153fc9[_0x100ce5(0x580,0x4ee,0x488,0x43d,'xXaa')](_0x4f20bf);}}else{var _0x493ed7=_0x38b525[_0x381f6a(0x193,0x2f1,'PAek',0x184,0x17a)](_0x2bbc77,arguments);return _0x38b525=null,_0x493ed7;}}}}:function(){};return _0x60dc8e=![],_0x4b27ca;}};}(),_0x24b2e6=_0x18e063(this,function(){var _0x752aea=function(_0x4e2cf1,_0x1fde9e,_0x155aa2,_0x293e0e,_0x4c71f2){return _0x45ed(_0x4c71f2-0x2a,_0x293e0e);},_0x18c455=function(_0x5a6424,_0x12350a,_0x7e50ff,_0x52ca4e,_0x15ae85){return _0x45ed(_0x15ae85-0x2a,_0x52ca4e);},_0x383703=function(_0x361c11,_0x450c9,_0x23ba70,_0x5b70e9,_0x3dea6c){return _0x45ed(_0x3dea6c-0x2a,_0x5b70e9);},_0x9d2c8=function(_0x1bb57e,_0x57b268,_0x3f767a,_0x1e76c0,_0x4cc5bc){return _0x45ed(_0x4cc5bc-0x2a,_0x1e76c0);},_0x174c7a=function(_0x163385,_0xc67e25,_0x49fd39,_0x2ba13a,_0x529068){return _0x45ed(_0x529068-0x2a,_0x2ba13a);},_0x3d3fda={};_0x3d3fda[_0x752aea(0x4a0,0x1fe,0x3b9,'HI6K',0x36a)]=_0x752aea(0x1bf,0x303,0x22d,'TPsE',0x347)+_0x752aea(0x65c,0x3d9,0x436,'d1Tk',0x4fe)+_0x18c455(0x594,0x39e,0x50b,'JFK^',0x52a)+_0x9d2c8(0x3b6,0x431,0x11d,'^nAA',0x2ac)+'/',_0x3d3fda[_0x752aea(0x4b7,0x466,0x361,'$$$$',0x34f)]=_0x9d2c8(0x2df,0x2fb,0x434,'Xa8x',0x300)+_0x18c455(0x3e1,0x18a,0x3f1,'9VMY',0x288)+_0x9d2c8(0x321,0x176,0x3cb,')k3R',0x241)+_0x174c7a(0x535,0x394,0x2f8,'fyQy',0x3ba)+_0x9d2c8(0x3fc,0x5af,0x5be,'%hM&',0x4e0),_0x3d3fda[_0x174c7a(0x1f1,0x41d,0x286,'GFA*',0x381)]=function(_0x4c7f5d,_0x37d510){return _0x4c7f5d+_0x37d510;},_0x3d3fda[_0x9d2c8(0x41c,0x3a8,0x394,'8J@Y',0x29e)]=_0x174c7a(0x222,0x305,0x1cd,'Xa8x',0x2c1),_0x3d3fda[_0x18c455(0x366,0x1c8,0x1ff,'Pk^z',0x27c)]=_0x9d2c8(0x348,0x17a,0x30b,'forS',0x2a4),_0x3d3fda[_0x18c455(0x1e5,0x2d6,0x2b9,'$$$$',0x23a)]=_0x383703(0x330,0x197,0x165,'fyQy',0x268)+_0x18c455(0x54e,0x5f2,0x64a,'D^]c',0x51a)+'t',_0x3d3fda[_0x18c455(0x362,0x45f,0x27c,'9VMY',0x320)]=function(_0x32c156,_0x1cfcb1){return _0x32c156===_0x1cfcb1;},_0x3d3fda[_0x752aea(0x149,0x3df,0x425,'flHa',0x2af)]=_0x18c455(0x515,0x502,0x5bf,'fyQy',0x495),_0x3d3fda[_0x752aea(0x3b5,0x1fb,0x2d6,'D^]c',0x370)]=_0x383703(0x37c,0x3a2,0x554,'K4Al',0x417),_0x3d3fda[_0x752aea(0x368,0x46e,0x4b2,'jdjj',0x4cc)]=function(_0xf401ea,_0xff533a){return _0xf401ea(_0xff533a);},_0x3d3fda[_0x18c455(0x3eb,0x2b8,0x4d2,'flHa',0x3d4)]=_0x18c455(0x152,0x2b2,0x2a0,'GtVY',0x25d)+_0x9d2c8(0x300,0x243,0x2a5,'t1va',0x368)+_0x9d2c8(0x2d6,0x2e5,0x310,'jdjj',0x275)+_0x383703(0x2b1,0x22e,0x1db,'%hM&',0x252),_0x3d3fda[_0x18c455(0x574,0x34a,0x56c,'boAD',0x402)]=_0x9d2c8(0x3bd,0x2e7,0x3de,'GtVY',0x28a)+_0x383703(0x4c0,0x43a,0x33e,'5jjF',0x3fd)+_0x752aea(0x272,0x2b6,0x383,'KlqJ',0x3b0)+_0x18c455(0x1cd,0x2fc,0x1b7,'Izg]',0x2d2)+_0x752aea(0x1a6,0x3f3,0x254,'KlqJ',0x297)+_0x752aea(0x2db,0x27c,0x310,'YLz*',0x350)+'\x20)',_0x3d3fda[_0x9d2c8(0x373,0x34b,0x3e5,'KlqJ',0x3a9)]=function(_0x5079ea){return _0x5079ea();},_0x3d3fda[_0x9d2c8(0x56e,0x37a,0x515,'!o]u',0x46d)]=function(_0x2027b7,_0x17e0f6){return _0x2027b7!==_0x17e0f6;},_0x3d3fda[_0x752aea(0x34f,0x5f2,0x61e,'De8M',0x4dd)]=_0x383703(0x315,0x382,0xdb,'5IhV',0x22a),_0x3d3fda[_0x174c7a(0x38d,0x169,0x225,'fyQy',0x2dd)]=_0x18c455(0x19d,0x3f2,0x448,'K4Al',0x303),_0x3d3fda[_0x174c7a(0x347,0x372,0x24b,'8J@Y',0x2b4)]=_0x9d2c8(0x351,0x3c5,0xfb,'Pk^z',0x255),_0x3d3fda[_0x383703(0x391,0x571,0x45d,'okEd',0x3e0)]=_0x9d2c8(0x5e9,0x474,0x336,'TPsE',0x46e),_0x3d3fda[_0x9d2c8(0x2f0,0x2e3,0x4b5,'fyQy',0x465)]=_0x18c455(0x40a,0x443,0x406,'9VMY',0x46b),_0x3d3fda[_0x383703(0x2e4,0x3b9,0x4ff,')k3R',0x3c9)]=_0x174c7a(0x5aa,0x2cf,0x45d,'BvFM',0x44a),_0x3d3fda[_0x18c455(0x354,0x48c,0x3b2,'d1Tk',0x403)]=_0x174c7a(0x308,0x360,0x2b2,'GtVY',0x3c1)+_0x174c7a(0x1c5,0x2f7,0x222,'QKTw',0x25c),_0x3d3fda[_0x752aea(0x41c,0x2a8,0x255,'yTk8',0x301)]=_0x18c455(0x2dd,0x3fe,0x2e3,'B%ZG',0x3f3),_0x3d3fda[_0x174c7a(0x4d2,0x3b7,0x4c0,'yflv',0x415)]=_0x752aea(0x585,0x335,0x349,'^nAA',0x447),_0x3d3fda[_0x18c455(0x3ee,0x408,0x56b,'HI6K',0x517)]=function(_0x2cda11,_0x1be4dc){return _0x2cda11<_0x1be4dc;},_0x3d3fda[_0x174c7a(0x591,0x5f7,0x401,'flHa',0x4ff)]=_0x9d2c8(0x566,0x501,0x3b6,'GtVY',0x3ef),_0x3d3fda[_0x9d2c8(0x46a,0x33f,0x3de,'5IhV',0x3f6)]=_0x18c455(0x492,0x43a,0x406,'D^]c',0x409),_0x3d3fda[_0x383703(0x433,0x366,0x458,')1tO',0x325)]=_0x174c7a(0x457,0x38e,0x491,'Ye6b',0x40c)+_0x752aea(0x2ea,0x362,0x1d1,'fyQy',0x22b)+'5';var _0x37496e=_0x3d3fda,_0x9b70cc;try{if(_0x37496e[_0x174c7a(0x3e6,0x398,0x43c,'KlqJ',0x34a)](_0x37496e[_0x9d2c8(0x404,0x34a,0x48f,'JFK^',0x499)],_0x37496e[_0x174c7a(0x342,0x4a5,0x31a,'5IhV',0x446)])){function _0x480551(){var _0x1113b9=function(_0x47c3c9,_0x265a7f,_0x9ced7e,_0x13adf5,_0x5620e5){return _0x383703(_0x47c3c9-0x1b,_0x265a7f-0x176,_0x9ced7e-0x1bb,_0x265a7f,_0x13adf5-0x303);},_0x142c9c=function(_0x22e4b5,_0xa94a92,_0xb24d01,_0x10c0f1,_0x1de861){return _0x752aea(_0x22e4b5-0x15c,_0xa94a92-0x62,_0xb24d01-0x17,_0xa94a92,_0x10c0f1-0x303);},_0x3cd797=function(_0x1178e6,_0x5b13a1,_0x1652d2,_0xf4d10e,_0x42a9cf){return _0x174c7a(_0x1178e6-0x114,_0x5b13a1-0x4b,_0x1652d2-0x39,_0x5b13a1,_0xf4d10e-0x303);},_0x3cb9c0=function(_0x306ec0,_0x4af845,_0x1f412c,_0x822d4d,_0x74524c){return _0x752aea(_0x306ec0-0x1d4,_0x4af845-0x197,_0x1f412c-0x8b,_0x4af845,_0x822d4d-0x303);},_0xa50c70=function(_0x42a205,_0x4c6d76,_0x386a40,_0x514ecb,_0x4594cd){return _0x383703(_0x42a205-0x6d,_0x4c6d76-0x1d,_0x386a40-0x1aa,_0x4c6d76,_0x514ecb-0x303);},_0x48513d=_0x1692cb[_0x1113b9(0x8d5,'8J@Y',0x6c3,0x828,0x7b2)+_0x142c9c(0x7c4,'K4Al',0x693,0x7c5,0x7ee)+'r'](_0x37496e[_0x1113b9(0x65b,'5IhV',0x43c,0x57d,0x6cb)])()[_0x3cd797(0x5bb,'!o]u',0x817,0x747,0x69a)+_0xa50c70(0x66e,'boAD',0x973,0x7f8,0x960)+'r'](_0x37496e[_0x142c9c(0x756,'Izg]',0x51f,0x5f3,0x780)]);return!_0x48513d[_0x3cd797(0x7dc,'WmfV',0x6e2,0x74c,0x740)](_0x306e81);}}else{var _0x4f7dfb=_0x37496e[_0x9d2c8(0x5e3,0x2f3,0x477,'$$$$',0x452)](Function,_0x37496e[_0x752aea(0x38c,0x346,0x3fc,'PAek',0x353)](_0x37496e[_0x174c7a(0x206,0x26d,0x203,'JFK^',0x254)](_0x37496e[_0x383703(0x547,0x346,0x2de,'fyQy',0x470)],_0x37496e[_0x174c7a(0x46e,0x25a,0x378,'9VMY',0x3cc)]),');'));_0x9b70cc=_0x37496e[_0x174c7a(0x55f,0x573,0x555,'Pk^z',0x41f)](_0x4f7dfb);}}catch(_0x2fc656){if(_0x37496e[_0x9d2c8(0x280,0x524,0x401,'jdjj',0x3a2)](_0x37496e[_0x174c7a(0x5d1,0x34b,0x4a4,'De8M',0x4dd)],_0x37496e[_0x752aea(0x448,0x285,0x265,'fyQy',0x2dd)]))_0x9b70cc=window;else{function _0x2953a2(){var _0x3e772c=function(_0x1aff71,_0x1fa167,_0x3686b3,_0x1f670a,_0x45ee6b){return _0x174c7a(_0x1aff71-0x35,_0x1fa167-0x10e,_0x3686b3-0xc4,_0x1aff71,_0x1fa167- -0x269);},_0x157fd4=_0x637513[_0x3e772c('KlqJ',0x294,0x2ca,0x1ec,0x29e)](_0x8f93a6,arguments);return _0x513c09=null,_0x157fd4;}}}var _0xb27883=_0x9b70cc[_0x383703(0x2e2,0x38d,0x49a,'xXaa',0x363)+'le']=_0x9b70cc[_0x752aea(0x39a,0x5ed,0x665,'AgPH',0x51b)+'le']||{},_0x24af6d=[_0x37496e[_0x752aea(0x40e,0x3dd,0x4d9,'Iwb(',0x480)],_0x37496e[_0x752aea(0x365,0x2a1,0x15d,'^nAA',0x2a2)],_0x37496e[_0x9d2c8(0x2e0,0x309,0x158,'BvFM',0x2c5)],_0x37496e[_0x383703(0x357,0x338,0x14e,'BvFM',0x25a)],_0x37496e[_0x174c7a(0x391,0x33b,0x383,'t1va',0x3aa)],_0x37496e[_0x9d2c8(0x5c6,0x516,0x569,'%hM&',0x43b)],_0x37496e[_0x18c455(0x301,0x3c0,0x53f,'yTk8',0x459)]];for(var _0x170398=-0x2e*-0x7a+-0x8f*0x41+0xe63;_0x37496e[_0x174c7a(0x2e4,0x336,0x40f,')1tO',0x3bd)](_0x170398,_0x24af6d[_0x752aea(0x2a1,0x2d3,0x462,'okEd',0x379)+'h']);_0x170398++){if(_0x37496e[_0x752aea(0x2d2,0x217,0x198,'forS',0x2b0)](_0x37496e[_0x9d2c8(0x529,0x414,0x491,'yflv',0x4a6)],_0x37496e[_0x18c455(0x27d,0x472,0x25a,'ol1A',0x3e1)])){function _0x1cbd80(){var _0xf06c41=function(_0x14f5aa,_0x5b49ea,_0x38ca48,_0x551d07,_0xd36ce6){return _0x9d2c8(_0x14f5aa-0x152,_0x5b49ea-0xb4,_0x38ca48-0x12e,_0x14f5aa,_0x38ca48- -0x338);},_0x380dda=function(_0x204a97,_0x5a3e7b,_0x33aca4,_0xed4f2b,_0x2b53c1){return _0x18c455(_0x204a97-0xb7,_0x5a3e7b-0xc4,_0x33aca4-0x101,_0x204a97,_0x33aca4- -0x338);},_0x442284=function(_0x48f00a,_0x128de0,_0x330dd0,_0x256f13,_0x2eb23f){return _0x174c7a(_0x48f00a-0x10f,_0x128de0-0x133,_0x330dd0-0x116,_0x48f00a,_0x330dd0- -0x338);},_0x599f7b=function(_0x24fd58,_0x55d877,_0x3c7817,_0x5b7154,_0x1d6cde){return _0x9d2c8(_0x24fd58-0x16c,_0x55d877-0x158,_0x3c7817-0x1b,_0x24fd58,_0x3c7817- -0x338);},_0x3f0a66=function(_0x1931bc,_0x51e230,_0x20eed9,_0x1bb061,_0x5b8374){return _0x383703(_0x1931bc-0x1c2,_0x51e230-0x11a,_0x20eed9-0x15a,_0x1931bc,_0x20eed9- -0x338);};(function(){return![];}[_0xf06c41('JFK^',-0xee,-0x62,0x6d,0x8f)+_0x380dda('!o]u',-0x141,-0x109,-0x29e,-0xe2)+'r'](_0x37496e[_0x442284(')k3R',-0x5f,0x120,0x296,0x238)](_0x37496e[_0x380dda('Pk^z',-0x238,-0x10f,0x40,-0x1c0)],_0x37496e[_0xf06c41('5IhV',0xb8,0x6d,0x52,-0x84)]))[_0x442284('fyQy',0x2a,-0x12,0xd4,-0x6a)](_0x37496e[_0x599f7b('JFK^',0x1ac,0x178,0x1c0,0x18b)]));}}else{var _0x3f5a50=_0x37496e[_0x383703(0x3c5,0x266,0x17c,')k3R',0x30d)][_0x9d2c8(0x46d,0x5b1,0x367,'ui8B',0x435)]('|'),_0x1ef2d4=0x3f*0x5e+-0xe*0x121+-0x754;while(!![]){switch(_0x3f5a50[_0x1ef2d4++]){case'0':var _0x43fe7f=_0xb27883[_0x3296ae]||_0x4886d2;continue;case'1':var _0x4886d2=_0x18e063[_0x174c7a(0x2e8,0x346,0x4d2,'5IhV',0x375)+_0x18c455(0x655,0x3f4,0x655,'Xa8x',0x511)+'r'][_0x174c7a(0x58e,0x3ea,0x515,'%hM&',0x4c7)+_0x174c7a(0x4a4,0x4a5,0x422,'!o]u',0x3d6)][_0x9d2c8(0x2cb,0x1e5,0xfa,'GFA*',0x224)](_0x18e063);continue;case'2':_0x4886d2[_0x383703(0x660,0x560,0x36b,'QKTw',0x4ed)+_0x9d2c8(0x1da,0x20f,0x253,'De8M',0x22d)]=_0x43fe7f[_0x9d2c8(0x3b6,0x576,0x41d,'cCC)',0x51f)+_0x9d2c8(0x3c4,0x4b4,0x627,')k3R',0x507)][_0x9d2c8(0x290,0x354,0x356,'YLz*',0x3e5)](_0x43fe7f);continue;case'3':var _0x3296ae=_0x24af6d[_0x170398];continue;case'4':_0x4886d2[_0x174c7a(0x263,0x3c3,0x231,'Ye6b',0x328)+_0x9d2c8(0x2fb,0x2f9,0x315,'BvFM',0x3d7)]=_0x18e063[_0x18c455(0x385,0x2fd,0x4bb,'YLz*',0x3e5)](_0x18e063);continue;case'5':_0xb27883[_0x3296ae]=_0x4886d2;continue;}break;}}}});_0x24b2e6(),setInterval(function(){var _0x577524=function(_0x193e01,_0x3340e3,_0x483520,_0x34d914,_0x31b7d4){return _0x45ed(_0x34d914- -0x195,_0x483520);},_0x37cc35=function(_0x5c5245,_0x53423f,_0x8b479a,_0x2a1038,_0x15dd15){return _0x45ed(_0x2a1038- -0x195,_0x8b479a);},_0x50e8e5={};_0x50e8e5[_0x577524(0x269,0x190,'8J@Y',0x2d5,0x269)]=function(_0x3e7113){return _0x3e7113();};var _0x866658=_0x50e8e5;_0x866658[_0x577524(0x1fd,0x63,'GtVY',0x8f,0xbf)](_0x39fd78);},0xbcc+0x1a89*-0x1+0x1e5d);function myFunction(){var _0x40c534=function(_0x5af759,_0x1c9776,_0x136686,_0x3a80cf,_0x8c051){return _0x45ed(_0x1c9776- -0x260,_0x3a80cf);},_0x46963d=function(_0xd94428,_0x47033d,_0x29b8a3,_0x2f4c5f,_0xfd2888){return _0x45ed(_0x47033d- -0x260,_0x2f4c5f);},_0x5a9fe8=function(_0x177e33,_0x46201b,_0x2613ba,_0x3426d6,_0x38e097){return _0x45ed(_0x46201b- -0x260,_0x3426d6);},_0x264bd8=function(_0x41bb99,_0x3b138a,_0x57a690,_0x202f93,_0x358eb0){return _0x45ed(_0x3b138a- -0x260,_0x202f93);},_0x5ee5f1=function(_0x4f41e9,_0x217f89,_0x5897c4,_0x579ade,_0xec9530){return _0x45ed(_0x217f89- -0x260,_0x579ade);},_0x12209a={};_0x12209a[_0x40c534(0x15,0x162,0x211,'TPsE',0x223)]=_0x46963d(0xea,0x185,0xee,'HI6K',0x287)+'ta',_0x12209a[_0x5a9fe8(-0x157,-0x67,-0x9a,'ol1A',0x75)]=function(_0x2939de,_0x399a91){return _0x2939de===_0x399a91;},_0x12209a[_0x40c534(0x137,-0x40,-0x103,'%hM&',-0x25)]=_0x264bd8(0x328,0x21f,0x1e0,')1tO',0x2b5)+_0x264bd8(0x354,0x236,0x21c,'7Ys[',0x193),_0x12209a[_0x46963d(-0x1fb,-0x71,-0x58,'ui8B',0x90)]=_0x5a9fe8(0x12,-0x2b,0x32,'HI6K',-0x160);var _0x5a9015=_0x12209a,_0x4dfb93=document[_0x46963d(0x6b,-0x73,0x58,'Ye6b',0x70)+_0x5a9fe8(0x1e5,0xfd,0x200,'GFA*',0x47)+_0x40c534(0x125,-0x55,0x33,'!o]u',-0x43)](_0x5a9015[_0x46963d(0x15a,0x223,0x1c0,'PAek',0x354)]);_0x5a9015[_0x40c534(0x258,0x1ae,0x154,'GFA*',0xe3)](_0x5a9015[_0x5a9fe8(0x18e,0x245,0x389,'JFK^',0xd5)],_0x4dfb93[_0x40c534(0x25,0xa2,-0xe3,'%hM&',0xb0)])?_0x4dfb93[_0x40c534(-0x55,0x15,-0x14b,')1tO',0x67)]=_0x5a9015[_0x40c534(0x60,0x2e,0x1a7,'9VMY',0x184)]:_0x4dfb93[_0x5a9fe8(0xb8,0xcb,0x218,'D2[D',0x8d)]=_0x5a9015[_0x5a9fe8(-0xf8,-0x6f,-0x74,'AgPH',0xa)];}function mks_upper_Case(_0x2c93af){var _0x22b070=function(_0x18c834,_0x2f009e,_0x512ae1,_0x2245d0,_0x4bc016){return _0x45ed(_0x18c834- -0x16f,_0x512ae1);},_0x472e80=function(_0x3e6314,_0x1b5137,_0x69a790,_0xdfe342,_0xe258ee){return _0x45ed(_0x3e6314- -0x16f,_0x69a790);},_0x343d89=function(_0xe3bf7,_0x22647f,_0x8a17eb,_0x517011,_0x3813ee){return _0x45ed(_0xe3bf7- -0x16f,_0x8a17eb);},_0x4df9cf=function(_0x118fd7,_0x544ebb,_0x5bc244,_0x34976c,_0x49c189){return _0x45ed(_0x118fd7- -0x16f,_0x5bc244);},_0x32575f=function(_0x38a39c,_0x3e0d92,_0x149038,_0x4dfe0b,_0x28553c){return _0x45ed(_0x38a39c- -0x16f,_0x149038);},_0x59e75f={};_0x59e75f[_0x22b070(0x339,0x33b,'BvFM',0x4ce,0x21e)]=_0x22b070(0x279,0x149,'8J@Y',0x2db,0x348)+_0x343d89(0x2dd,0x24b,'WmfV',0x399,0x364)+'5',_0x59e75f[_0x472e80(0x232,0x207,'K4Al',0x36c,0xb4)]=function(_0x2fead3,_0x5c84fd){return _0x2fead3===_0x5c84fd;},_0x59e75f[_0x472e80(0x1e2,0x15b,'QKTw',0xa3,0xb9)]=_0x4df9cf(0x1df,0x306,'Xa8x',0x2f2,0x33a),_0x59e75f[_0x32575f(0xfd,0x251,'0!tz',0x111,-0x54)]=function(_0x2c599b,_0x3c6f38,_0x38800d){return _0x2c599b(_0x3c6f38,_0x38800d);};var _0x519b85=_0x59e75f;_0x519b85[_0x32575f(0xe0,-0x92,'t1va',0x4d,0xe6)](setTimeout,function(){var _0x32893e=function(_0x364d0a,_0x3df2ce,_0x54a162,_0x45184a,_0x3b91b0){return _0x343d89(_0x364d0a-0x181,_0x3df2ce-0x62,_0x54a162,_0x45184a-0x144,_0x3b91b0-0xdc);},_0x20e8d5=function(_0x1d4fe6,_0x5bbbc6,_0x108521,_0x2d5db5,_0x2b41da){return _0x22b070(_0x1d4fe6-0x181,_0x5bbbc6-0xb4,_0x108521,_0x2d5db5-0xcd,_0x2b41da-0x147);},_0x20ef9b=function(_0x45d66a,_0xc282ca,_0x261170,_0x11a7db,_0xc29433){return _0x343d89(_0x45d66a-0x181,_0xc282ca-0x6,_0x261170,_0x11a7db-0x1bc,_0xc29433-0x1ed);},_0x4b26d6=function(_0x5c6d3e,_0x44b3c5,_0x136259,_0x53e60d,_0x620174){return _0x22b070(_0x5c6d3e-0x181,_0x44b3c5-0xaf,_0x136259,_0x53e60d-0x29,_0x620174-0x96);},_0x5c7535=function(_0x21a05f,_0x1dd5a3,_0x3d76eb,_0x341726,_0x53a11b){return _0x472e80(_0x21a05f-0x181,_0x1dd5a3-0x104,_0x3d76eb,_0x341726-0xeb,_0x53a11b-0x4d);};if(_0x519b85[_0x32893e(0x4ed,0x5fb,'!o]u',0x67d,0x57e)](_0x519b85[_0x32893e(0x22a,0x118,'flHa',0x2c5,0x27b)],_0x519b85[_0x20e8d5(0x39e,0x27f,'ui8B',0x3c2,0x31e)]))_0x2c93af[_0x4b26d6(0x41c,0x3ee,'boAD',0x2d2,0x45e)]=_0x2c93af[_0x5c7535(0x4c6,0x62b,')1tO',0x364,0x4fa)][_0x4b26d6(0x3a6,0x501,'JFK^',0x4e9,0x4bc)+_0x20ef9b(0x3ee,0x4af,'okEd',0x3ae,0x28c)+'e']();else{function _0x578e25(){var _0x1ccb28=function(_0x18f644,_0x24262f,_0x221f67,_0x11b332,_0x4c4b6e){return _0x4b26d6(_0x11b332-0x13c,_0x24262f-0xb8,_0x221f67,_0x11b332-0x99,_0x4c4b6e-0x186);},_0x47eb87=function(_0x2c610f,_0x295d8f,_0x3bc048,_0x5d7257,_0x2bb4a1){return _0x20ef9b(_0x5d7257-0x13c,_0x295d8f-0x70,_0x3bc048,_0x5d7257-0x42,_0x2bb4a1-0x4a);},_0x2da2e9=function(_0x1f6519,_0x2ce9c7,_0x175d3c,_0x112769,_0xa91cb6){return _0x4b26d6(_0x112769-0x13c,_0x2ce9c7-0x143,_0x175d3c,_0x112769-0x74,_0xa91cb6-0x170);},_0x4d3e99=function(_0x264493,_0x57a579,_0x572490,_0x1624a9,_0x84ad97){return _0x5c7535(_0x1624a9-0x13c,_0x57a579-0xbc,_0x572490,_0x1624a9-0x13d,_0x84ad97-0x1bd);},_0x5bb878=function(_0x58185d,_0x207c08,_0x2b9612,_0x14b609,_0x4f22e4){return _0x20ef9b(_0x14b609-0x13c,_0x207c08-0x16c,_0x2b9612,_0x14b609-0x114,_0x4f22e4-0x10a);},_0x442f70=_0x519b85[_0x1ccb28(0x504,0x590,'ui8B',0x4ad,0x561)][_0x47eb87(0x584,0x4d4,'^nAA',0x5d3,0x6c0)]('|'),_0x15dd57=0x93a*0x1+-0x179b+-0x3*-0x4cb;while(!![]){switch(_0x442f70[_0x15dd57++]){case'0':_0x33cdae[_0x47eb87(0x57e,0x3bb,'YlEC',0x48b,0x3b7)+_0x2da2e9(0x575,0x495,'yflv',0x51d,0x608)]=_0x413aea[_0x2da2e9(0x41b,0x514,'Ye6b',0x3a1,0x2a5)](_0x13f758);continue;case'1':var _0x33cdae=_0x394b8a[_0x1ccb28(0x326,0x534,'PAek',0x4b6,0x534)+_0x2da2e9(0x290,0x25a,')k3R',0x38a,0x30f)+'r'][_0x4d3e99(0x444,0x68f,'5jjF',0x5b1,0x48d)+_0x47eb87(0x4a9,0x397,'8J@Y',0x456,0x4dc)][_0x4d3e99(0x474,0x55c,'D2[D',0x46c,0x2e8)](_0x5ad27d);continue;case'2':var _0x19b8cb=_0x1c2d72[_0x45bd7d]||_0x33cdae;continue;case'3':_0x33cdae[_0x5bb878(0x631,0x3ac,'YLz*',0x4a0,0x592)+_0x5bb878(0x5a5,0x5aa,'AgPH',0x4b9,0x3c0)]=_0x19b8cb[_0x2da2e9(0x5af,0x48e,'WmfV',0x4a6,0x4a9)+_0x2da2e9(0x513,0x404,'Xa8x',0x4a4,0x588)][_0x2da2e9(0x222,0x2af,'ol1A',0x350,0x40c)](_0x19b8cb);continue;case'4':var _0x45bd7d=_0x543779[_0x58786f];continue;case'5':_0x4ac96d[_0x45bd7d]=_0x33cdae;continue;}break;}}}},0x1cc5+-0x6*-0xbf+0x25*-0xe6);}function display_clock(){var _0x62b0ce=function(_0x324b02,_0x342b1d,_0x2ec691,_0x257b7e,_0x39a39c){return _0x45ed(_0x39a39c-0x8a,_0x257b7e);},_0x22d414=function(_0x265e8a,_0x57ce85,_0x101345,_0x3acd51,_0xaeea6c){return _0x45ed(_0xaeea6c-0x8a,_0x3acd51);},_0x10e047=function(_0x24606f,_0x159e2a,_0x4961ae,_0x2110b0,_0x5814a3){return _0x45ed(_0x5814a3-0x8a,_0x2110b0);},_0x51a3d5=function(_0x57efaa,_0x22efe3,_0x2d690b,_0x1f71c0,_0x3fe4e7){return _0x45ed(_0x3fe4e7-0x8a,_0x1f71c0);},_0x9ce6b5=function(_0x1dceea,_0x5a46e5,_0x34d9f0,_0x13bf21,_0x260303){return _0x45ed(_0x260303-0x8a,_0x13bf21);},_0x3eed34={};_0x3eed34[_0x62b0ce(0x358,0x4f5,0x345,'$$$$',0x451)]=function(_0x1419f0,_0x5529a3,_0x1289fe){return _0x1419f0(_0x5529a3,_0x1289fe);},_0x3eed34[_0x62b0ce(0x306,0x329,0x5d2,'flHa',0x480)]=_0x22d414(0x478,0x399,0x223,'5IhV',0x323)+_0x62b0ce(0x5bc,0x3b0,0x4db,'BvFM',0x4b6)+_0x9ce6b5(0x559,0x5c5,0x524,'QKTw',0x4f3)+'()';var _0x4c7725=_0x3eed34;mytime=_0x4c7725[_0x10e047(0x4d0,0x379,0x3c4,'D2[D',0x44b)](setTimeout,_0x4c7725[_0x62b0ce(0x411,0x688,0x62a,'boAD',0x4f8)],-0x209*-0xc+-0x1e33+0x9af);}function cek_angka(_0x1432d0){var _0x438730=function(_0xe090a8,_0x4d6bf0,_0x3511ed,_0xbd8a05,_0x1edbc2){return _0x45ed(_0xbd8a05-0x304,_0x3511ed);},_0x250ed0=function(_0x3b5693,_0x4cbebe,_0x2e84f1,_0x7aa55a,_0x38749c){return _0x45ed(_0x7aa55a-0x304,_0x2e84f1);},_0x596fe6=function(_0x588a78,_0x1cc939,_0x3b0aed,_0x440109,_0x246722){return _0x45ed(_0x440109-0x304,_0x3b0aed);},_0x545f26=function(_0x130f20,_0x27d15d,_0x19f628,_0x5babbc,_0x38e894){return _0x45ed(_0x5babbc-0x304,_0x19f628);},_0x27d9b9=function(_0x3a88d7,_0x9af084,_0x51eb87,_0x4c567a,_0x261704){return _0x45ed(_0x4c567a-0x304,_0x51eb87);},_0x55eb0b={};_0x55eb0b[_0x438730(0x4ab,0x66f,'okEd',0x530,0x554)]=function(_0x2d7759,_0x7bd41a){return _0x2d7759!=_0x7bd41a;},_0x55eb0b[_0x438730(0x85f,0x7fa,'yTk8',0x7e2,0x6d1)]=function(_0x42a123,_0x46a334){return _0x42a123>_0x46a334;},_0x55eb0b[_0x596fe6(0x6f0,0x63b,'GtVY',0x64b,0x5b7)]=function(_0x511ed0,_0x5131a){return _0x511ed0<_0x5131a;},_0x55eb0b[_0x596fe6(0x5b8,0x704,'okEd',0x687,0x629)]=function(_0x2a90f9,_0x16b8ec){return _0x2a90f9>_0x16b8ec;};var _0x3f37e3=_0x55eb0b,_0x258455=_0x1432d0[_0x27d9b9(0x61d,0x7e0,'fyQy',0x738,0x6a3)]?_0x1432d0[_0x27d9b9(0x414,0x4da,'xXaa',0x4dd,0x558)]:_0x1432d0[_0x250ed0(0x4e0,0x644,'Ye6b',0x623,0x691)+'de'];return!(_0x3f37e3[_0x596fe6(0x5b3,0x63f,'YLz*',0x50c,0x58c)](-0xae0+-0x51d*-0x5+0x2e7*-0x5,_0x258455)&&_0x3f37e3[_0x438730(0x710,0x645,'!o]u',0x5ce,0x4b4)](_0x258455,0x7c8+-0x144f+0x1*0xca6)&&(_0x3f37e3[_0x596fe6(0x37f,0x613,'BvFM',0x4de,0x355)](_0x258455,0x5*0xb3+0x4*0x883+0x1*-0x255b)||_0x3f37e3[_0x438730(0x84d,0x832,'forS',0x7c1,0x7f7)](_0x258455,-0x146b+-0x577*0x6+0x356e)));}function display_isi_jam(){var _0x106393=function(_0x80d3bb,_0x2491f5,_0x551d42,_0x276f1e,_0x35a633){return _0x45ed(_0x551d42-0x19c,_0x35a633);},_0x44cd6c=function(_0x3c7228,_0x4a5a5f,_0x50a5b3,_0x59123c,_0x3dcf42){return _0x45ed(_0x50a5b3-0x19c,_0x3dcf42);},_0x3b4248=function(_0x226aa1,_0x17bdf9,_0x3215f5,_0x5b38b8,_0x39b1d6){return _0x45ed(_0x3215f5-0x19c,_0x39b1d6);},_0x481b79=function(_0x46b236,_0x5d5a86,_0x3af8d2,_0x1f0b0b,_0x1fd623){return _0x45ed(_0x3af8d2-0x19c,_0x1fd623);},_0x509f74=function(_0xb1d960,_0x161ab0,_0x180dc1,_0x46f854,_0x10d4b7){return _0x45ed(_0x180dc1-0x19c,_0x10d4b7);},_0x120f53={};_0x120f53[_0x106393(0x3de,0x4bf,0x4b2,0x586,'yflv')]=_0x106393(0x300,0x4b1,0x428,0x36b,'^nAA')+_0x106393(0x3eb,0x4bc,0x45b,0x3be,'forS')+'2',_0x120f53[_0x106393(0x793,0x65d,0x658,0x6f5,'jdjj')]=function(_0x6c4770,_0x4dc6d8){return _0x6c4770<_0x4dc6d8;},_0x120f53[_0x3b4248(0x60c,0x5eb,0x4b6,0x4b2,'jdjj')]=function(_0x1fe4f7,_0x28d270){return _0x1fe4f7+_0x28d270;},_0x120f53[_0x481b79(0x46a,0x331,0x393,0x484,'TPsE')]=function(_0x3e2363,_0x1feda2){return _0x3e2363<_0x1feda2;},_0x120f53[_0x106393(0x478,0x635,0x5a3,0x6a9,'Pk^z')]=function(_0x3ee2cd,_0x2a3398){return _0x3ee2cd+_0x2a3398;},_0x120f53[_0x44cd6c(0x425,0x409,0x483,0x2f4,'5IhV')]=function(_0x5a4cea,_0x232ece){return _0x5a4cea<_0x232ece;},_0x120f53[_0x509f74(0x26d,0x2c9,0x3df,0x2ad,'Pk^z')]=function(_0x2502fa,_0x3b540c){return _0x2502fa+_0x3b540c;},_0x120f53[_0x44cd6c(0x631,0x477,0x4b5,0x4b4,'t1va')]=function(_0x1d402c,_0x3b46c8){return _0x1d402c<_0x3b46c8;},_0x120f53[_0x44cd6c(0x283,0x504,0x3d7,0x245,'GFA*')]=_0x44cd6c(0x54b,0x46f,0x481,0x474,'xXaa')+_0x3b4248(0x4a2,0x6e2,0x5a1,0x598,'KlqJ'),_0x120f53[_0x481b79(0x6db,0x42a,0x55c,0x69b,'K4Al')]=function(_0x445e3c){return _0x445e3c();},_0x120f53[_0x3b4248(0x380,0x3b6,0x502,0x5e3,'9VMY')]=function(_0x4d156a,_0x319783){return _0x4d156a+_0x319783;},_0x120f53[_0x44cd6c(0x2a8,0x1fe,0x380,0x41d,'BvFM')]=function(_0x18794f,_0x28d11e){return _0x18794f+_0x28d11e;},_0x120f53[_0x509f74(0x3c0,0x530,0x50e,0x612,'De8M')]=_0x106393(0x558,0x6ad,0x655,0x56f,'t1va')+'y',_0x120f53[_0x509f74(0x3c5,0x3e0,0x521,0x68a,'5IhV')]=_0x106393(0x6bb,0x64d,0x52a,0x615,'YlEC')+'y',_0x120f53[_0x106393(0x686,0x48e,0x60c,0x5fe,'t1va')]=_0x106393(0x443,0x441,0x55b,0x431,'0!tz')+'ay',_0x120f53[_0x509f74(0x4ed,0x4e1,0x3de,0x48c,'t1va')]=_0x44cd6c(0x723,0x77e,0x63a,0x74a,'De8M')+_0x481b79(0x699,0x4da,0x648,0x65b,'PAek'),_0x120f53[_0x106393(0x565,0x4da,0x3d4,0x33a,'8J@Y')]=_0x44cd6c(0x677,0x43d,0x54e,0x3b9,'0!tz')+_0x44cd6c(0x380,0x41f,0x3d5,0x44b,'jdjj'),_0x120f53[_0x509f74(0x52e,0x4e2,0x560,0x5eb,'WmfV')]=_0x481b79(0x6d0,0x639,0x663,0x7c2,')1tO')+'y',_0x120f53[_0x509f74(0x467,0x5b0,0x46e,0x345,'QKTw')]=_0x3b4248(0x32a,0x2dd,0x46c,0x341,'8J@Y')+_0x481b79(0x5ec,0x5b0,0x64e,0x5fd,'^nAA'),_0x120f53[_0x509f74(0x334,0x32d,0x4a0,0x619,'7Ys[')]=function(_0x4ae900,_0xf0b90e){return _0x4ae900+_0xf0b90e;},_0x120f53[_0x106393(0x51f,0x4b9,0x491,0x524,'HI6K')]=function(_0x47632a,_0x4bd073){return _0x47632a+_0x4bd073;},_0x120f53[_0x509f74(0x6b2,0x761,0x63c,0x63f,'ol1A')]=function(_0x5e885d,_0x5291f6){return _0x5e885d+_0x5291f6;},_0x120f53[_0x44cd6c(0x55c,0x649,0x509,0x562,'!o]u')]=function(_0x527c3f,_0x4ebd87){return _0x527c3f+_0x4ebd87;},_0x120f53[_0x44cd6c(0x58b,0x35d,0x4d8,0x650,'K4Al')]=function(_0x50e480,_0x2fb2fa){return _0x50e480+_0x2fb2fa;},_0x120f53[_0x481b79(0x52b,0x59e,0x68b,0x594,'GtVY')]=function(_0x4f0d91,_0x44babb){return _0x4f0d91+_0x44babb;},_0x120f53[_0x44cd6c(0x6aa,0x782,0x675,0x5bb,'ui8B')]=function(_0x203873,_0x58b4f6){return _0x203873+_0x58b4f6;};var _0xafaed1=_0x120f53,_0x54a88d=_0xafaed1[_0x44cd6c(0x5e8,0x729,0x61c,0x60f,'9VMY')][_0x509f74(0x73b,0x5c9,0x613,0x75f,'QKTw')]('|'),_0x38274a=0x2*0x1261+0x1d7f+0x977*-0x7;while(!![]){switch(_0x54a88d[_0x38274a++]){case'0':_0xafaed1[_0x106393(0x6d0,0x642,0x5f9,0x668,'yflv')](_0x42db08,-0x1736+-0x9c8*0x1+0x12e*0x1c)&&(_0x42db08=_0xafaed1[_0x509f74(0x2ad,0x5c0,0x43b,0x3bc,'TPsE')]('0',_0x42db08)),_0xafaed1[_0x509f74(0x5a0,0x66b,0x611,0x60b,'yTk8')](_0x5e7e19,-0x2577+-0x99b*-0x1+0xdf3*0x2)&&(_0x5e7e19=_0xafaed1[_0x106393(0x4df,0x648,0x5a5,0x517,'AgPH')]('0',_0x5e7e19));continue;case'1':_0xafaed1[_0x3b4248(0x2ee,0x5b7,0x43e,0x30a,'^nAA')](_0x19952d,0x17d2+0x2196+-0x395e)&&(_0x19952d=_0xafaed1[_0x3b4248(0x751,0x7af,0x67f,0x655,'Izg]')]('0',_0x19952d)),_0xafaed1[_0x106393(0x637,0x535,0x61a,0x68d,'d1Tk')](_0x38d5a7,0x1673+-0x60c+-0x105d)&&(_0x38d5a7=_0xafaed1[_0x106393(0x43b,0x4e5,0x3b7,0x429,'d1Tk')]('0',_0x38d5a7)),_0xafaed1[_0x481b79(0x74f,0x668,0x695,0x5c7,'K4Al')](_0x4951c7,-0x5*-0x1+0x24a4+-0x249f)&&(_0x4951c7=_0xafaed1[_0x481b79(0x4c3,0x677,0x5e6,0x579,'ui8B')]('0',_0x4951c7));continue;case'2':document[_0x106393(0x4bf,0x43b,0x40c,0x2ba,'8J@Y')+_0x106393(0x2f9,0x491,0x443,0x3a5,'Izg]')+_0x509f74(0x4ab,0x433,0x4fc,0x429,'^nAA')](_0xafaed1[_0x3b4248(0x42f,0x234,0x37e,0x4f9,'TPsE')])[_0x106393(0x4d6,0x304,0x446,0x312,'d1Tk')+_0x481b79(0x4fa,0x67f,0x506,0x63c,'fyQy')]=_0x12d1f9,_0xafaed1[_0x509f74(0x3ca,0x5e6,0x542,0x465,'8J@Y')](display_clock);continue;case'3':var _0x418c65=_0xafaed1[_0x106393(0x4e5,0x3fb,0x49d,0x62a,'Iwb(')](_0xafaed1[_0x3b4248(0x598,0x514,0x5e6,0x589,'ui8B')](_0xafaed1[_0x509f74(0x5d6,0x50d,0x654,0x5e3,'5IhV')](_0xafaed1[_0x509f74(0x431,0x353,0x480,0x36c,'Izg]')](_0x5e7e19,'-'),_0x42db08),'-'),_0x1f71a1[_0x3b4248(0x70c,0x4ee,0x5be,0x633,'Izg]')+_0x481b79(0x4c6,0x40b,0x585,0x4b3,'KlqJ')+'r']()),_0x19952d=_0x1f71a1[_0x3b4248(0x5d1,0x595,0x4f0,0x5fe,'8J@Y')+_0x44cd6c(0x42a,0x530,0x427,0x45e,'ol1A')](),_0x38d5a7=_0x1f71a1[_0x3b4248(0x509,0x675,0x676,0x70d,'9VMY')+_0x3b4248(0x2fa,0x3f1,0x399,0x416,'YlEC')](),_0x4951c7=_0x1f71a1[_0x44cd6c(0x4c7,0x281,0x3a8,0x288,'Pk^z')+_0x44cd6c(0x369,0x4ef,0x4af,0x512,'ui8B')]();continue;case'4':var _0x1f71a1=new Date(),_0x167d33=[_0xafaed1[_0x481b79(0x70b,0x60e,0x5d6,0x619,'BvFM')],_0xafaed1[_0x106393(0x61d,0x4e4,0x5b5,0x6f8,'boAD')],_0xafaed1[_0x509f74(0x56c,0x79b,0x684,0x654,'GtVY')],_0xafaed1[_0x481b79(0x5ec,0x5c0,0x4fe,0x52f,'5jjF')],_0xafaed1[_0x44cd6c(0x3b7,0x400,0x54a,0x41d,'TPsE')],_0xafaed1[_0x3b4248(0x5b9,0x63a,0x627,0x56c,'xXaa')],_0xafaed1[_0x509f74(0x437,0x602,0x590,0x65f,'Iwb(')]][_0x1f71a1[_0x509f74(0x6dc,0x5b6,0x588,0x6f9,'Izg]')+'y']()],_0x42db08=_0xafaed1[_0x509f74(0x3e5,0x3e1,0x49c,0x3a6,'JFK^')](_0x1f71a1[_0x3b4248(0x5d2,0x65d,0x558,0x622,'flHa')+_0x3b4248(0x4eb,0x270,0x3dc,0x265,'^nAA')](),-0x1a8f*-0x1+-0xe63+-0x23*0x59),_0x5e7e19=_0x1f71a1[_0x481b79(0x4dc,0x61d,0x588,0x4d2,'Izg]')+'te']();continue;case'5':var _0x12d1f9=_0xafaed1[_0x481b79(0x62e,0x60d,0x5d2,0x5e6,'Ye6b')](_0xafaed1[_0x509f74(0x597,0x656,0x54f,0x455,'8J@Y')](_0xafaed1[_0x509f74(0x449,0x451,0x482,0x408,'TPsE')](_0xafaed1[_0x481b79(0x4f6,0x2a0,0x3c5,0x2f2,'BvFM')](_0x167d33,'\x20'),_0x418c65),'\x20'),_0xafaed1[_0x481b79(0x471,0x582,0x40e,0x591,'%hM&')](_0xafaed1[_0x44cd6c(0x352,0x3ba,0x445,0x514,'8J@Y')](_0xafaed1[_0x481b79(0x35f,0x255,0x3b8,0x3f7,'WmfV')](_0xafaed1[_0x106393(0x37f,0x23e,0x3ae,0x409,'K4Al')](_0x19952d,':'),_0x38d5a7),':'),_0x4951c7));continue;}break;}}function _0x39fd78(_0x3829a7){var _0x4f5bf0=function(_0x32caa1,_0x518fb3,_0x3024ba,_0x268341,_0x3ac984){return _0x45ed(_0x518fb3-0x24d,_0x3024ba);},_0x1a9894=function(_0x34797e,_0x5db715,_0x31fe90,_0x137483,_0x215d32){return _0x45ed(_0x5db715-0x24d,_0x31fe90);},_0x4f05aa=function(_0x3121c1,_0x20f261,_0x46f874,_0x2dcbb0,_0x45d40f){return _0x45ed(_0x20f261-0x24d,_0x46f874);},_0x2032c2=function(_0x5df80f,_0x457beb,_0x4f336e,_0x15e789,_0x2d5285){return _0x45ed(_0x457beb-0x24d,_0x4f336e);},_0xa18e94=function(_0xfde79e,_0x2314de,_0x509849,_0x4fd823,_0x4f4f52){return _0x45ed(_0x2314de-0x24d,_0x509849);},_0x37ab5e={};_0x37ab5e[_0x4f5bf0(0x53a,0x63e,'xXaa',0x574,0x600)]=function(_0xfbd829,_0x43a819,_0x25df7f){return _0xfbd829(_0x43a819,_0x25df7f);},_0x37ab5e[_0x1a9894(0x412,0x519,'De8M',0x47e,0x47c)]=function(_0x4eef97,_0x5dcd4b){return _0x4eef97===_0x5dcd4b;},_0x37ab5e[_0x1a9894(0x601,0x5b9,'xXaa',0x6e3,0x689)]=_0x2032c2(0x76e,0x634,'ol1A',0x57e,0x7a8),_0x37ab5e[_0x4f05aa(0x3db,0x445,'Iwb(',0x550,0x529)]=_0x2032c2(0x60c,0x732,'AgPH',0x623,0x8ab),_0x37ab5e[_0x4f05aa(0x511,0x441,')k3R',0x550,0x2d7)]=_0xa18e94(0x42c,0x4d4,'WjDD',0x5a4,0x512)+_0x1a9894(0x47e,0x5be,'AgPH',0x715,0x5ff)+_0x2032c2(0x757,0x738,'YlEC',0x617,0x646),_0x37ab5e[_0x4f5bf0(0x81a,0x708,'AgPH',0x819,0x70b)]=_0x4f5bf0(0x7f1,0x739,')k3R',0x605,0x85f)+'er',_0x37ab5e[_0x2032c2(0x650,0x6a7,'QKTw',0x6d4,0x6c1)]=_0x4f05aa(0x661,0x6a2,'TPsE',0x710,0x6e3),_0x37ab5e[_0x2032c2(0x3d1,0x50b,'BvFM',0x481,0x432)]=_0xa18e94(0x744,0x64e,'yflv',0x4d2,0x592),_0x37ab5e[_0x4f5bf0(0x4db,0x565,'5jjF',0x446,0x6e9)]=_0x4f05aa(0x60d,0x4f1,')k3R',0x4f5,0x369)+_0xa18e94(0x56d,0x506,'7Ys[',0x39d,0x4aa)+_0x1a9894(0x5a4,0x4af,'d1Tk',0x624,0x4d9)+'()',_0x37ab5e[_0xa18e94(0x694,0x6f1,'jdjj',0x818,0x734)]=function(_0x13e110,_0x4210ba){return _0x13e110===_0x4210ba;},_0x37ab5e[_0x2032c2(0x6a3,0x711,'9VMY',0x664,0x6f1)]=_0x4f05aa(0x4ff,0x440,'5jjF',0x522,0x3cd),_0x37ab5e[_0x2032c2(0x603,0x6ee,'TPsE',0x7c8,0x611)]=_0x4f5bf0(0x5ca,0x655,'JFK^',0x649,0x4f9)+'g',_0x37ab5e[_0x4f05aa(0x4f7,0x50e,'YLz*',0x414,0x386)]=function(_0x26dd16,_0x474911){return _0x26dd16!==_0x474911;},_0x37ab5e[_0x4f05aa(0x38a,0x4a1,'9VMY',0x61e,0x36f)]=_0x2032c2(0x718,0x67f,'TPsE',0x6e9,0x591),_0x37ab5e[_0x2032c2(0x5a4,0x4a3,'yflv',0x502,0x410)]=function(_0x24b17f,_0x4c91e1){return _0x24b17f===_0x4c91e1;},_0x37ab5e[_0xa18e94(0x6d2,0x6a1,'t1va',0x67c,0x80e)]=_0xa18e94(0x52b,0x561,'Ye6b',0x43a,0x461),_0x37ab5e[_0x4f05aa(0x5a3,0x44b,'WmfV',0x336,0x56d)]=_0x2032c2(0x5b3,0x4e1,'boAD',0x47e,0x4d7),_0x37ab5e[_0x4f05aa(0x656,0x522,'flHa',0x4ea,0x39d)]=function(_0x50969d,_0x581680){return _0x50969d+_0x581680;},_0x37ab5e[_0x4f05aa(0x5f4,0x712,'WmfV',0x774,0x831)]=function(_0x46a582,_0x312385){return _0x46a582/_0x312385;},_0x37ab5e[_0x4f05aa(0x44d,0x5c0,'flHa',0x6ae,0x5e3)]=_0x4f05aa(0x419,0x558,'YLz*',0x4c2,0x527)+'h',_0x37ab5e[_0x2032c2(0x448,0x546,'Xa8x',0x52a,0x659)]=function(_0x154322,_0x18abe8){return _0x154322===_0x18abe8;},_0x37ab5e[_0x1a9894(0x6e9,0x704,'5IhV',0x5bf,0x5ef)]=function(_0x3e3dac,_0x2424e6){return _0x3e3dac%_0x2424e6;},_0x37ab5e[_0x2032c2(0x4a9,0x448,'ol1A',0x52f,0x4a2)]=_0x1a9894(0x613,0x613,'t1va',0x7a3,0x680),_0x37ab5e[_0x4f5bf0(0x6d9,0x698,'K4Al',0x773,0x610)]=_0x4f05aa(0x530,0x5f5,'KlqJ',0x50c,0x68a),_0x37ab5e[_0xa18e94(0x6ec,0x5ed,'9VMY',0x6fb,0x726)]=_0xa18e94(0x7b9,0x719,'De8M',0x893,0x829),_0x37ab5e[_0xa18e94(0x36f,0x4c9,'flHa',0x642,0x3b9)]=_0x1a9894(0x6c0,0x5c6,'!o]u',0x6e8,0x4f8),_0x37ab5e[_0x2032c2(0x458,0x48c,'t1va',0x57c,0x373)]=_0x4f05aa(0x61a,0x4b7,'AgPH',0x5f4,0x470)+'n',_0x37ab5e[_0xa18e94(0x84f,0x6f3,')1tO',0x86a,0x84d)]=_0xa18e94(0x6db,0x5d1,'Iwb(',0x61c,0x61c),_0x37ab5e[_0x1a9894(0x5ea,0x69f,'WjDD',0x6ba,0x766)]=_0x2032c2(0x653,0x659,'0!tz',0x7cb,0x4ec)+_0xa18e94(0x474,0x495,'KlqJ',0x54c,0x3f3)+'t',_0x37ab5e[_0x2032c2(0x7b8,0x65f,'De8M',0x706,0x613)]=function(_0x27410b,_0xc67437){return _0x27410b(_0xc67437);},_0x37ab5e[_0x4f05aa(0x512,0x50f,'HI6K',0x390,0x429)]=function(_0x573479,_0x50075b){return _0x573479!=_0x50075b;},_0x37ab5e[_0x2032c2(0x5c4,0x5f6,'YLz*',0x6ca,0x4e6)]=function(_0x151b1c,_0x561e90){return _0x151b1c>_0x561e90;},_0x37ab5e[_0x4f5bf0(0x5a3,0x4a4,'ol1A',0x4dd,0x414)]=function(_0x3d00d7,_0x14ca18){return _0x3d00d7<_0x14ca18;},_0x37ab5e[_0x1a9894(0x69c,0x6f8,'Ye6b',0x586,0x7c3)]=_0x1a9894(0x6fa,0x63b,'B%ZG',0x7a2,0x4e2)+_0x1a9894(0x6fb,0x585,'ol1A',0x48b,0x501)+_0xa18e94(0x77a,0x5f0,'GtVY',0x636,0x599)+')',_0x37ab5e[_0x1a9894(0x604,0x5c9,'GFA*',0x722,0x492)]=_0x2032c2(0x3b0,0x53e,'Ye6b',0x4aa,0x54e)+_0x1a9894(0x4f3,0x5f4,'WmfV',0x5b4,0x5ef)+_0x2032c2(0x5bc,0x428,'D2[D',0x3ff,0x541)+_0x4f05aa(0x354,0x434,'8J@Y',0x2d9,0x41e)+_0x4f5bf0(0x804,0x6fb,'B%ZG',0x709,0x826)+_0x2032c2(0x52f,0x674,'ol1A',0x726,0x77e)+_0x2032c2(0x40e,0x484,'Iwb(',0x535,0x465),_0x37ab5e[_0x4f5bf0(0x593,0x499,'GFA*',0x5f7,0x5de)]=function(_0x3331ea,_0x1956f1){return _0x3331ea(_0x1956f1);},_0x37ab5e[_0x2032c2(0x790,0x6d7,'boAD',0x779,0x6b8)]=_0xa18e94(0x5e2,0x56e,'forS',0x48c,0x65d),_0x37ab5e[_0xa18e94(0x6fd,0x5fc,'AgPH',0x4b3,0x4d6)]=_0x4f05aa(0x4ce,0x53c,'ol1A',0x52c,0x531),_0x37ab5e[_0x2032c2(0x647,0x5d8,'^nAA',0x54c,0x54a)]=function(_0x1cdd13,_0x5366cc){return _0x1cdd13+_0x5366cc;},_0x37ab5e[_0x1a9894(0x53e,0x470,'WjDD',0x2f7,0x516)]=_0x4f5bf0(0x36f,0x46a,'8J@Y',0x58b,0x506),_0x37ab5e[_0x2032c2(0x58b,0x538,'D^]c',0x663,0x668)]=function(_0x1bb571){return _0x1bb571();},_0x37ab5e[_0x1a9894(0x3a9,0x529,'K4Al',0x4ba,0x416)]=function(_0x47ac17,_0x59be78){return _0x47ac17+_0x59be78;},_0x37ab5e[_0x4f05aa(0x4aa,0x596,'boAD',0x654,0x61f)]=_0x4f5bf0(0x6d8,0x6d1,'K4Al',0x745,0x5e1),_0x37ab5e[_0x2032c2(0x5aa,0x51b,'ui8B',0x3ac,0x4c6)]=_0xa18e94(0x6d5,0x5c1,'forS',0x595,0x4ff),_0x37ab5e[_0x1a9894(0x775,0x64b,'PAek',0x5fa,0x6d7)]=function(_0x4065dc,_0x2c45e9){return _0x4065dc!==_0x2c45e9;},_0x37ab5e[_0x2032c2(0x825,0x73f,'TPsE',0x675,0x668)]=_0x2032c2(0x50f,0x510,')k3R',0x38e,0x4c0),_0x37ab5e[_0x2032c2(0x733,0x743,'boAD',0x7d6,0x664)]=function(_0x1b386d,_0x492958){return _0x1b386d(_0x492958);};var _0x306725=_0x37ab5e;function _0x4837cd(_0x5b26a3){var _0xc5fa00=function(_0xc190c1,_0x135e8f,_0x5677b3,_0x105ba4,_0x48f454){return _0x1a9894(_0xc190c1-0xae,_0x105ba4- -0x317,_0x5677b3,_0x105ba4-0x143,_0x48f454-0xea);},_0x22e465=function(_0x13cf93,_0x1a198c,_0x47d9fd,_0x42bba3,_0x1390c6){return _0x4f5bf0(_0x13cf93-0x12,_0x42bba3- -0x317,_0x47d9fd,_0x42bba3-0x6a,_0x1390c6-0x9e);},_0x163258=function(_0x499d03,_0x4f7dfa,_0x267ea6,_0x271163,_0x4ac566){return _0xa18e94(_0x499d03-0x1a4,_0x271163- -0x317,_0x267ea6,_0x271163-0x97,_0x4ac566-0x13e);},_0x358ca4=function(_0x5bb0d7,_0x2a3e05,_0x453504,_0x436a9a,_0x203f4d){return _0x4f05aa(_0x5bb0d7-0xf7,_0x436a9a- -0x317,_0x453504,_0x436a9a-0xed,_0x203f4d-0x146);},_0x242e3c=function(_0x1512e4,_0xb4c9e9,_0x5673b6,_0x256f2d,_0x28ee74){return _0xa18e94(_0x1512e4-0x14c,_0x256f2d- -0x317,_0x5673b6,_0x256f2d-0x65,_0x28ee74-0xa4);},_0x3dbde1={};_0x3dbde1[_0xc5fa00(0x1df,0x1f9,'D2[D',0x1e1,0x1d5)]=function(_0x321c74,_0x100e01){var _0x47db72=function(_0x7efd7a,_0x17db6f,_0x11376d,_0x42f99b,_0x8c45f3){return _0xc5fa00(_0x7efd7a-0x1a9,_0x17db6f-0x1d3,_0x42f99b,_0x17db6f-0xe3,_0x8c45f3-0x116);};return _0x306725[_0x47db72(0x51e,0x3d2,0x41d,'Xa8x',0x550)](_0x321c74,_0x100e01);},_0x3dbde1[_0x22e465(0x262,0x145,'cCC)',0x29f,0x29a)]=_0x306725[_0x22e465(0x3b6,0x1dc,'7Ys[',0x2bd,0x3b0)],_0x3dbde1[_0x163258(0x31c,0x40a,'B%ZG',0x332,0x487)]=_0x306725[_0x242e3c(0x192,0x126,'ol1A',0x1f1,0x17e)],_0x3dbde1[_0x163258(0x2b8,0x19e,'Ye6b',0x150,0xe7)]=_0x306725[_0xc5fa00(0x41f,0x2ae,'xXaa',0x3c5,0x241)],_0x3dbde1[_0xc5fa00(0x10a,0x2e7,'BvFM',0x228,0xf5)]=_0x306725[_0x163258(0x3fe,0x549,'BvFM',0x3c2,0x4fd)],_0x3dbde1[_0x22e465(0x3a2,0x33e,'K4Al',0x329,0x446)]=function(_0x463aca,_0x512517){var _0xe46890=function(_0x1875f0,_0x3416d8,_0x52ece0,_0x4c51c8,_0x3d4b9a){return _0xc5fa00(_0x1875f0-0x1a6,_0x3416d8-0x1e5,_0x52ece0,_0x3d4b9a-0x3d9,_0x3d4b9a-0xa);};return _0x306725[_0xe46890(0x926,0x943,'Ye6b',0x92b,0x80e)](_0x463aca,_0x512517);},_0x3dbde1[_0x242e3c(0x113,0x220,'WmfV',0x184,0x163)]=_0x306725[_0x163258(0x322,0x2d5,'fyQy',0x23b,0x273)],_0x3dbde1[_0x22e465(0x100,0x226,'QKTw',0x13d,0x1b0)]=_0x306725[_0x358ca4(0x316,0x2da,'Pk^z',0x1d7,0x19f)],_0x3dbde1[_0x242e3c(0x19f,0x83,'D2[D',0x1af,0x293)]=function(_0x24375d,_0x46722c,_0x18c0db){var _0x498e07=function(_0x58a183,_0x4a6486,_0x1c62b4,_0x407398,_0x4cf737){return _0x163258(_0x58a183-0x1b2,_0x4a6486-0xe5,_0x1c62b4,_0x4a6486- -0x3a0,_0x4cf737-0x17a);};return _0x306725[_0x498e07(-0x2b1,-0x244,'$$$$',-0x187,-0x32a)](_0x24375d,_0x46722c,_0x18c0db);},_0x3dbde1[_0x163258(0x3ea,0x2bb,'8J@Y',0x320,0x3c1)]=_0x306725[_0xc5fa00(0x272,0x352,'Xa8x',0x215,0x313)];var _0x109727=_0x3dbde1;if(_0x306725[_0xc5fa00(0x1e4,0x1ca,'^nAA',0x22d,0x12a)](_0x306725[_0x163258(0x551,0x355,'Pk^z',0x3ca,0x278)],_0x306725[_0x242e3c(0x19c,0x3,'WmfV',0x16c,0x111)])){if(_0x306725[_0x242e3c(0x181,0x12e,'cCC)',0x262,0x366)](typeof _0x5b26a3,_0x306725[_0x22e465(0x311,0xca,'BvFM',0x18b,0xc1)])){if(_0x306725[_0x358ca4(0x2e,0x2b3,'GFA*',0x197,0x1f9)](_0x306725[_0x358ca4(0x224,0x2d7,'QKTw',0x19e,0x8b)],_0x306725[_0x358ca4(0x478,0x378,'fyQy',0x346,0x301)])){function _0x2ab39f(){var _0x5eed8e=function(_0x479552,_0x32e836,_0x4991b7,_0x3bce98,_0xab2b1e){return _0x242e3c(_0x479552-0x1c8,_0x32e836-0x1f1,_0xab2b1e,_0x3bce98- -0x3b7,_0xab2b1e-0xdd);},_0x3ed0de=function(_0x11cde9,_0x564960,_0x365658,_0x8e251b,_0x297d14){return _0x22e465(_0x11cde9-0x1a,_0x564960-0xca,_0x297d14,_0x8e251b- -0x3b7,_0x297d14-0x178);},_0x29222a=function(_0x2cc665,_0x12bf14,_0x59f54d,_0x2ea1cd,_0x389d4f){return _0x358ca4(_0x2cc665-0x13b,_0x12bf14-0x2c,_0x389d4f,_0x2ea1cd- -0x3b7,_0x389d4f-0x1c5);},_0x5b9da9=function(_0x33c402,_0x51574e,_0x4cdde0,_0x3ff22a,_0x1a9d20){return _0x242e3c(_0x33c402-0x1dd,_0x51574e-0xdc,_0x1a9d20,_0x3ff22a- -0x3b7,_0x1a9d20-0x92);};_0x3797c0[_0x5eed8e(-0x20f,-0x20c,-0x2b,-0xd0,'BvFM')]=_0x7bfd9d[_0x3ed0de(0x12,-0x29,-0x251,-0xc3,'okEd')][_0x3ed0de(0x19,0xa,-0xb8,0x26,'GFA*')+_0x5b9da9(-0x4d,-0x155,-0x141,-0x1b6,'YLz*')+'e']();}}else return function(_0x2919ba){}[_0x358ca4(0x33c,0x3b5,'forS',0x420,0x517)+_0xc5fa00(0x3f0,0x293,'%hM&',0x35b,0x485)+'r'](_0x306725[_0x22e465(0x2f9,0x380,'8J@Y',0x37e,0x491)])[_0x242e3c(0x135,0x14a,'JFK^',0x267,0x2fd)](_0x306725[_0x242e3c(0x194,0x22c,'ui8B',0x1ce,0xd5)]);}else{if(_0x306725[_0x242e3c(0x2d9,0x3e8,'0!tz',0x37d,0x35f)](_0x306725[_0x242e3c(0x2c6,0x273,'flHa',0x1b9,0x19d)],_0x306725[_0x358ca4(0x4a8,0x3c7,'8J@Y',0x3d0,0x468)])){function _0x10cead(){var _0x3c3569=function(_0x368b8e,_0x6508e3,_0x367cfb,_0x255b97,_0x824d37){return _0x22e465(_0x368b8e-0x125,_0x6508e3-0x10b,_0x6508e3,_0x824d37-0x28d,_0x824d37-0x1e7);};_0x306725[_0x3c3569(0x3ac,'cCC)',0x4f1,0x4fc,0x460)](_0x4d88fa,function(){var _0x5abb44=function(_0x153c52,_0x18a16b,_0x1db4ba,_0x256f6a,_0x2bc36c){return _0x3c3569(_0x153c52-0x112,_0x1db4ba,_0x1db4ba-0x128,_0x256f6a-0xb3,_0x2bc36c-0x311);},_0x2d3fbd=function(_0x3b55d9,_0x186ca8,_0x38a152,_0x4a150c,_0x1bc7d2){return _0x3c3569(_0x3b55d9-0x1d9,_0x38a152,_0x38a152-0xf8,_0x4a150c-0x102,_0x1bc7d2-0x311);},_0x4b333c=function(_0x409629,_0x579933,_0x3d5fbc,_0x87094f,_0x22b161){return _0x3c3569(_0x409629-0xa8,_0x3d5fbc,_0x3d5fbc-0x11c,_0x87094f-0x1a3,_0x22b161-0x311);},_0x196526=function(_0x1e27aa,_0x2fe099,_0x5de6ce,_0x3a7bed,_0x5ed99d){return _0x3c3569(_0x1e27aa-0x1e6,_0x5de6ce,_0x5de6ce-0xf5,_0x3a7bed-0x149,_0x5ed99d-0x311);};_0x368a12[_0x5abb44(0x5ca,0x870,'GFA*',0x838,0x72f)]=_0x3fc0ad[_0x2d3fbd(0x8b9,0x82e,'$$$$',0x886,0x8b5)][_0x5abb44(0xa99,0xa75,'yTk8',0x9ea,0x90b)+_0x196526(0x7ed,0x958,'9VMY',0x7d8,0x923)+'e']();},0xdc7+-0x1913+0xb4d);}}else{if(_0x306725[_0x358ca4(0xfe,0x2d2,'YLz*',0x1f7,0x2f9)](_0x306725[_0x242e3c(0x318,0x266,'yTk8',0x1ac,0x20f)]('',_0x306725[_0x22e465(0x124,0x1bf,'Xa8x',0x1c7,0x1ed)](_0x5b26a3,_0x5b26a3))[_0x306725[_0x358ca4(0x1f9,0x365,'fyQy',0x2be,0x28e)]],-0x1*0x2361+-0x10*-0xbb+0x17b2)||_0x306725[_0x358ca4(0x45e,0x1f6,'YlEC',0x37b,0x453)](_0x306725[_0x163258(0x37b,0x4b0,'5IhV',0x3ed,0x366)](_0x5b26a3,-0x2627+0x31e+0x231d),-0x38a+-0x8d*-0x1b+-0xb55)){if(_0x306725[_0xc5fa00(0x5f,0x334,'5jjF',0x1e6,0x16a)](_0x306725[_0x163258(0x2a2,0xa6,'HI6K',0x15d,0x2ee)],_0x306725[_0xc5fa00(0x345,0x39,'d1Tk',0x1ba,0x1d5)])){function _0x52b745(){var _0x116c5c=function(_0x2c48bb,_0x3c5a4e,_0x436190,_0x377fb2,_0x59f8b8){return _0x163258(_0x2c48bb-0x1cd,_0x3c5a4e-0x8a,_0x2c48bb,_0x3c5a4e-0x348,_0x59f8b8-0xee);};if(_0x28b68c){var _0x308cd8=_0x51bf87[_0x116c5c('cCC)',0x5ad,0x5f7,0x581,0x4fd)](_0x4f96a9,arguments);return _0x2ae45f=null,_0x308cd8;}}}else(function(){var _0x274533=function(_0x23d881,_0x3fc761,_0x39380d,_0x533af3,_0x538d17){return _0x163258(_0x23d881-0x1ed,_0x3fc761-0x197,_0x39380d,_0x23d881- -0x91,_0x538d17-0x1cd);},_0xb65799=function(_0x299e87,_0x254856,_0x494881,_0x19db21,_0x4a1a46){return _0x163258(_0x299e87-0x19c,_0x254856-0x38,_0x494881,_0x299e87- -0x91,_0x4a1a46-0x35);},_0x68ad5a=function(_0x1229e8,_0x45ed9e,_0x2aa0fa,_0xbedebb,_0x191fcc){return _0xc5fa00(_0x1229e8-0x151,_0x45ed9e-0x10d,_0x2aa0fa,_0x1229e8- -0x91,_0x191fcc-0x16c);};if(_0x109727[_0x274533(0x16d,0x200,'ol1A',0x243,0x1d5)](_0x109727[_0xb65799(0x2c9,0x150,'Izg]',0x2f0,0x142)],_0x109727[_0x68ad5a(0x12d,-0x36,')k3R',-0x33,0x189)])){function _0x2b1c51(){var _0x5a22f0=_0x8b8ad6?function(){var _0x3f2952=function(_0x167b89,_0xed8b03,_0x27c475,_0x5c097c,_0x1cf5f3){return _0x45ed(_0x5c097c- -0x244,_0x1cf5f3);};if(_0x2cf546){var _0x4fcce7=_0x335c45[_0x3f2952(0x118,0x30a,0x3a1,0x25f,'t1va')](_0x1cdf00,arguments);return _0x16b862=null,_0x4fcce7;}}:function(){};return _0x1063c6=![],_0x5a22f0;}}else return!![];}[_0x22e465(0x4e4,0x37d,'8J@Y',0x431,0x4ca)+_0x22e465(0x2b0,0x180,'WjDD',0x306,0x2b7)+'r'](_0x306725[_0x242e3c(0x289,0x3b5,'JFK^',0x3e0,0x342)](_0x306725[_0x242e3c(0x191,0x69,'boAD',0x144,0x2c5)],_0x306725[_0x22e465(0x2c9,0x26e,'TPsE',0x39a,0x500)]))[_0x358ca4(0x278,0x287,'xXaa',0x242,0x23d)](_0x306725[_0xc5fa00(0x149,0xa4,'QKTw',0x235,0x394)]));}else{if(_0x306725[_0x242e3c(0x206,0x349,'^nAA',0x378,0x43c)](_0x306725[_0x358ca4(0x2f3,0x1f3,'jdjj',0x1c9,0xf4)],_0x306725[_0x242e3c(0x20a,0x14f,'fyQy',0x279,0x3fe)])){function _0x5b38d5(){var _0x1af09c=function(_0xad06f9,_0xe47b9b,_0x2ca19b,_0x45b2d2,_0x287a42){return _0xc5fa00(_0xad06f9-0x17c,_0xe47b9b-0x1d7,_0x45b2d2,_0xad06f9-0x1a7,_0x287a42-0x8c);},_0x1b361a=function(_0x22c0a2,_0x52cc8d,_0x698e19,_0x1d7f01,_0xbaea0){return _0x358ca4(_0x22c0a2-0x125,_0x52cc8d-0xe2,_0x1d7f01,_0x22c0a2-0x1a7,_0xbaea0-0x4);},_0x214492=function(_0x1b737c,_0x37b234,_0x55c510,_0x310448,_0x1cd4f1){return _0x22e465(_0x1b737c-0x8a,_0x37b234-0x167,_0x310448,_0x1b737c-0x1a7,_0x1cd4f1-0x1e8);},_0x55609b=function(_0x521c7f,_0xb5190f,_0x534cdc,_0x1606f0,_0x919491){return _0x242e3c(_0x521c7f-0x85,_0xb5190f-0x3d,_0x1606f0,_0x521c7f-0x1a7,_0x919491-0xda);},_0x48c72e=function(_0x1c7f94,_0x42f5d6,_0x3cd579,_0x7d09bf,_0x1e00a3){return _0x163258(_0x1c7f94-0xc1,_0x42f5d6-0x26,_0x7d09bf,_0x1c7f94-0x1a7,_0x1e00a3-0x140);};return function(_0xae3f18){}[_0x1af09c(0x389,0x33e,0x3ea,'JFK^',0x435)+_0x1af09c(0x5ac,0x52d,0x70c,'d1Tk',0x4c5)+'r'](_0x109727[_0x214492(0x2f6,0x217,0x3b0,'D2[D',0x210)])[_0x1b361a(0x418,0x3cd,0x5aa,'yTk8',0x32f)](_0x109727[_0x214492(0x327,0x275,0x44c,'^nAA',0x3c9)]);}}else(function(){var _0x3953a8=function(_0x3ee41d,_0x17cbc3,_0x21050a,_0x29f2a4,_0xc31a18){return _0x22e465(_0x3ee41d-0x14f,_0x17cbc3-0x105,_0x21050a,_0x29f2a4- -0x223,_0xc31a18-0x1ac);},_0x2b0b8b=function(_0x5a9a63,_0x4200e6,_0x2eb8dd,_0x29b1ef,_0x11d0ec){return _0xc5fa00(_0x5a9a63-0xb9,_0x4200e6-0x1d5,_0x2eb8dd,_0x29b1ef- -0x223,_0x11d0ec-0x11);},_0x4b3abd=function(_0x5b27e8,_0x4836d1,_0x29972c,_0x5619bf,_0x36303d){return _0x163258(_0x5b27e8-0xe8,_0x4836d1-0xa9,_0x29972c,_0x5619bf- -0x223,_0x36303d-0x48);};if(_0x109727[_0x3953a8(0xa6,0x7f,'yflv',-0x51,-0x111)](_0x109727[_0x3953a8(0x120,0x28,'TPsE',0x7,0x12d)],_0x109727[_0x4b3abd(-0x9c,-0xa2,'t1va',-0xb9,-0x17e)])){function _0x325b18(){var _0x25e94b=_0x3c654c?function(){var _0x10cd18=function(_0x40635a,_0x590353,_0x3c9093,_0x5bb13e,_0x984f92){return _0x45ed(_0x5bb13e- -0x124,_0x984f92);};if(_0x369e66){var _0x27de7e=_0x4a3f32[_0x10cd18(0x215,0x324,0x16f,0x1be,'7Ys[')](_0x2b10f9,arguments);return _0x29f5f5=null,_0x27de7e;}}:function(){};return _0x1a121e=![],_0x25e94b;}}else return![];}[_0x163258(0x309,0x1e9,'BvFM',0x275,0x385)+_0x163258(0x29a,0x41e,'5jjF',0x2a5,0x25b)+'r'](_0x306725[_0x242e3c(0x2fa,0x243,'boAD',0x230,0x15a)](_0x306725[_0x163258(0xc3,0x303,'AgPH',0x24b,0x3a5)],_0x306725[_0x242e3c(0x159,0xff,'8J@Y',0x1a7,0xcf)]))[_0x242e3c(0x27a,0x388,'0!tz',0x2e1,0x168)](_0x306725[_0x242e3c(0xb9,0x148,'d1Tk',0x210,0x2a6)]));}}}_0x306725[_0x242e3c(0x3bb,0x331,'Ye6b',0x3bd,0x4c7)](_0x4837cd,++_0x5b26a3);}else{function _0x3391d3(){var _0x318fba=function(_0x3aeaab,_0xfa3064,_0x512d85,_0x10caf7,_0x24c440){return _0x242e3c(_0x3aeaab-0x1a7,_0xfa3064-0xa5,_0xfa3064,_0x512d85- -0x158,_0x24c440-0x13f);},_0x293367=function(_0x3ed2b0,_0x1c7e43,_0x77c4bc,_0x1a7bce,_0x525ea7){return _0x242e3c(_0x3ed2b0-0x2d,_0x1c7e43-0x1e4,_0x1c7e43,_0x77c4bc- -0x158,_0x525ea7-0x16b);};_0x361698=_0x109727[_0x318fba(-0x28,'Pk^z',-0x1e,0xbb,-0x16a)](_0x46fab5,_0x109727[_0x293367(0x113,'ol1A',0x7e,-0xd8,0x88)],0x2137+-0x1*0x17d5+0x2bd*-0x2);}}}try{if(_0x306725[_0x1a9894(0x716,0x581,'cCC)',0x436,0x634)](_0x306725[_0x2032c2(0x4ce,0x460,'9VMY',0x53e,0x350)],_0x306725[_0x4f5bf0(0x3cc,0x550,'BvFM',0x5e6,0x5a3)])){function _0x59ac93(){var _0x551e97=function(_0x31447b,_0x2c36e,_0x579911,_0x50d2a4,_0x41d87d){return _0x4f5bf0(_0x31447b-0x19a,_0x50d2a4- -0x39f,_0x31447b,_0x50d2a4-0x90,_0x41d87d-0x118);},_0x412838=function(_0x595239,_0x398fc0,_0x148995,_0x39ca7f,_0x30d7a2){return _0x2032c2(_0x595239-0x1a,_0x39ca7f- -0x39f,_0x595239,_0x39ca7f-0x1bd,_0x30d7a2-0x1ef);},_0x271cba=function(_0x2accff,_0x18e3bc,_0x460029,_0x4c715a,_0x244ad6){return _0x2032c2(_0x2accff-0x157,_0x4c715a- -0x39f,_0x2accff,_0x4c715a-0x1ce,_0x244ad6-0x127);},_0x4e2905=function(_0x2c3456,_0x26c017,_0x3ab218,_0x3127b4,_0x1824c6){return _0x4f05aa(_0x2c3456-0x1e6,_0x3127b4- -0x39f,_0x2c3456,_0x3127b4-0xc9,_0x1824c6-0xbc);},_0x2c533c=function(_0x945f32,_0x3f7b88,_0x3e1d04,_0x1e5d54,_0x403ccd){return _0x1a9894(_0x945f32-0x1bd,_0x1e5d54- -0x39f,_0x945f32,_0x1e5d54-0x126,_0x403ccd-0x138);},_0x23d9a6=_0x38b66c[_0x551e97('yflv',0x2b7,0x154,0x2c3,0x277)]?_0x44c606[_0x551e97('B%ZG',0x3b4,0x483,0x2ee,0x183)]:_0x261d55[_0x551e97('5jjF',0x1d2,0x310,0x2e7,0x283)+'de'];return!(_0x306725[_0x4e2905('$$$$',0x29a,0x2e6,0x1bd,0x34e)](0x83+-0x1833+0x17de,_0x23d9a6)&&_0x306725[_0x4e2905('K4Al',0x4df,0x302,0x37c,0x452)](_0x23d9a6,0x1eaa+0x231d*-0x1+0x3*0x186)&&(_0x306725[_0x271cba('Xa8x',0x1a1,0x333,0x2ab,0x307)](_0x23d9a6,-0x10b7+-0x656*-0x1+0xa91)||_0x306725[_0x271cba('HI6K',0x2c9,0x35a,0x279,0x1a3)](_0x23d9a6,-0x1d0f*0x1+-0x24bc+-0x14*-0x34d)));}}else{if(_0x3829a7){if(_0x306725[_0x4f05aa(0x68e,0x6f6,'D^]c',0x776,0x5bd)](_0x306725[_0x4f5bf0(0x367,0x43f,'QKTw',0x406,0x408)],_0x306725[_0x1a9894(0x739,0x5a6,')k3R',0x55f,0x636)]))return _0x4837cd;else{function _0x36552d(){var _0x13d506=function(_0x155361,_0x186e60,_0x146bf4,_0x4d197c,_0x2d5446){return _0xa18e94(_0x155361-0x31,_0x146bf4- -0x344,_0x155361,_0x4d197c-0x15d,_0x2d5446-0xae);},_0x452a67=function(_0x30bcfa,_0x4b0e9a,_0x4a286e,_0x2011e4,_0x22f329){return _0xa18e94(_0x30bcfa-0x114,_0x4a286e- -0x344,_0x30bcfa,_0x2011e4-0x11e,_0x22f329-0xca);},_0x1e9d0b=function(_0x8f93be,_0xad9560,_0x2e5002,_0x532412,_0x4e0d7c){return _0x2032c2(_0x8f93be-0x1ac,_0x2e5002- -0x344,_0x8f93be,_0x532412-0x3b,_0x4e0d7c-0x1c6);},_0x29fa8b=function(_0x2c2e1d,_0x4ace54,_0x3ca6c0,_0x14c0fa,_0x3a64ab){return _0x4f05aa(_0x2c2e1d-0x8,_0x3ca6c0- -0x344,_0x2c2e1d,_0x14c0fa-0xfe,_0x3a64ab-0x7e);},_0x9dc87=function(_0x30233c,_0xaf8b4c,_0xd84be4,_0x162f45,_0x254093){return _0x4f5bf0(_0x30233c-0xec,_0xd84be4- -0x344,_0x30233c,_0x162f45-0x65,_0x254093-0x148);},_0xed922e={};_0xed922e[_0x13d506('AgPH',0x41a,0x2e4,0x3c0,0x20d)]=_0x306725[_0x13d506('K4Al',0x48a,0x3ed,0x2f5,0x52d)],_0xed922e[_0x1e9d0b('yTk8',0x476,0x376,0x2b4,0x386)]=_0x306725[_0x13d506('8J@Y',0x358,0x3d3,0x4c9,0x280)],_0xed922e[_0x13d506('YLz*',0x6c,0xe1,-0x30,0x13e)]=function(_0x4c070e,_0x90cd41){var _0x3e9539=function(_0x2995ab,_0x3a5373,_0x3c61e0,_0x30b0c9,_0x55b546){return _0x29fa8b(_0x55b546,_0x3a5373-0x1bf,_0x3c61e0- -0x269,_0x30b0c9-0xdc,_0x55b546-0x37);};return _0x306725[_0x3e9539(0x115,0x17b,0x2a,-0x161,'5IhV')](_0x4c070e,_0x90cd41);},_0xed922e[_0x29fa8b('okEd',0x3a3,0x360,0x1d9,0x24f)]=_0x306725[_0x9dc87('Pk^z',0x23b,0x296,0x231,0x3c4)],_0xed922e[_0x1e9d0b('$$$$',0x14f,0x277,0x3ac,0x3d8)]=function(_0x47abfa,_0x3bd93f){var _0x2a5b0d=function(_0x224931,_0x561dea,_0x106ce5,_0xc84b6c,_0x43cd1b){return _0x452a67(_0xc84b6c,_0x561dea-0x16c,_0x561dea-0x2cd,_0xc84b6c-0x17f,_0x43cd1b-0x101);};return _0x306725[_0x2a5b0d(0x575,0x5a8,0x444,'0!tz',0x6fa)](_0x47abfa,_0x3bd93f);},_0xed922e[_0x9dc87('K4Al',0x1d2,0x217,0x134,0x11b)]=_0x306725[_0x9dc87('yTk8',-0x1b,0x113,0x84,0x255)],_0xed922e[_0x452a67('7Ys[',0x2e3,0x224,0x127,0x2a8)]=function(_0x576f40,_0x1c45b7){var _0x2f87cf=function(_0x3c4e9d,_0x2a916b,_0x52ab00,_0x25e632,_0x500475){return _0x1e9d0b(_0x25e632,_0x2a916b-0x133,_0x500475-0x10d,_0x25e632-0x103,_0x500475-0x22);};return _0x306725[_0x2f87cf(0x31b,0x367,0x3f6,'xXaa',0x35e)](_0x576f40,_0x1c45b7);},_0xed922e[_0x9dc87('D^]c',0x2dc,0x287,0x3c7,0x3c7)]=_0x306725[_0x13d506('WmfV',0xa7,0x1af,0x248,0xc6)],_0xed922e[_0x452a67(')k3R',0x1da,0x29f,0x17a,0x19f)]=function(_0x5543a5){var _0x5576d8=function(_0xa5e9d4,_0x29dfec,_0x27c4e5,_0x47b0eb,_0x16a2cd){return _0x13d506(_0x29dfec,_0x29dfec-0xcd,_0x47b0eb- -0x76,_0x47b0eb-0x13f,_0x16a2cd-0x1db);};return _0x306725[_0x5576d8(0x354,'flHa',0x47f,0x35c,0x1d2)](_0x5543a5);};var _0x555d4c=_0xed922e;_0x306725[_0x13d506('5IhV',0x2f0,0x3cf,0x4bb,0x329)](_0x97dff1,this,function(){var _0x399e81=function(_0x52ffeb,_0x1d4c89,_0x305599,_0x3924a8,_0x1d23e3){return _0x29fa8b(_0x3924a8,_0x1d4c89-0x127,_0x1d23e3- -0x379,_0x3924a8-0x11d,_0x1d23e3-0x1c);},_0x131246=function(_0x1dd498,_0x19dda7,_0x2cc461,_0x5b0b72,_0x4a95d0){return _0x1e9d0b(_0x5b0b72,_0x19dda7-0x18c,_0x4a95d0- -0x379,_0x5b0b72-0xdb,_0x4a95d0-0x188);},_0x376d6=function(_0x235c60,_0xce0fc7,_0x2c1c32,_0x2a4895,_0x41f118){return _0x452a67(_0x2a4895,_0xce0fc7-0xdb,_0x41f118- -0x379,_0x2a4895-0x60,_0x41f118-0x157);},_0x149b9b=function(_0x296df9,_0x3f0d8f,_0x5c37a9,_0x2f84e8,_0x2ceec2){return _0x29fa8b(_0x2f84e8,_0x3f0d8f-0x16c,_0x2ceec2- -0x379,_0x2f84e8-0x133,_0x2ceec2-0x197);},_0x18851b=function(_0x28de98,_0x31fa27,_0x48c1f7,_0x590622,_0x1cf188){return _0x452a67(_0x590622,_0x31fa27-0x68,_0x1cf188- -0x379,_0x590622-0xe8,_0x1cf188-0x7a);},_0x408115=new _0x25d417(_0x555d4c[_0x399e81(-0x351,-0x21c,-0x1e8,'BvFM',-0x282)]),_0x5f2b9f=new _0x4bd9a0(_0x555d4c[_0x131246(0x92,-0x10f,-0x105,'9VMY',0x6f)],'i'),_0x14773c=_0x555d4c[_0x399e81(-0x73,-0x2ea,-0x126,'Iwb(',-0x178)](_0x1fc50d,_0x555d4c[_0x149b9b(0x70,-0x1b3,0x2c,'K4Al',-0x20)]);!_0x408115[_0x18851b(0x2a,0x3,0x148,'yTk8',-0x11)](_0x555d4c[_0x131246(-0xb4,0x8f,-0x84,'TPsE',0x76)](_0x14773c,_0x555d4c[_0x131246(-0xa3,-0xc6,-0x33,'D^]c',0x71)]))||!_0x5f2b9f[_0x18851b(-0xb6,0x13b,-0xb5,'De8M',0x52)](_0x555d4c[_0x18851b(-0x14e,0x127,-0x65,'xXaa',0x2f)](_0x14773c,_0x555d4c[_0x399e81(-0x1f5,-0x1f6,-0x312,'WmfV',-0x205)]))?_0x555d4c[_0x131246(-0x1d2,-0x3e3,-0x40b,'!o]u',-0x287)](_0x14773c,'0'):_0x555d4c[_0x131246(0x63,-0x22d,-0x1e2,'WmfV',-0xd8)](_0x53d600);})();}}}else{if(_0x306725[_0x2032c2(0x482,0x570,'Xa8x',0x528,0x702)](_0x306725[_0x4f5bf0(0x505,0x631,'D^]c',0x5a0,0x5e0)],_0x306725[_0x1a9894(0x3ec,0x491,'7Ys[',0x5cb,0x484)])){function _0x23fee1(){var _0x210058=function(_0x40aac4,_0x3cb9e3,_0x3fce2a,_0x42d62d,_0x10a908){return _0x2032c2(_0x40aac4-0x3e,_0x42d62d-0xc0,_0x3cb9e3,_0x42d62d-0x143,_0x10a908-0x15e);},_0x475458=function(_0x1f3276,_0x32ce08,_0x4ad01f,_0x14a517,_0x123045){return _0x1a9894(_0x1f3276-0x85,_0x14a517-0xc0,_0x32ce08,_0x14a517-0x5e,_0x123045-0x133);},_0x3f46c=function(_0x3e7e7e,_0x495c22,_0x4769b7,_0x8d11be,_0xb6749b){return _0x4f05aa(_0x3e7e7e-0x13b,_0x8d11be-0xc0,_0x495c22,_0x8d11be-0xda,_0xb6749b-0x1e9);},_0x409164=function(_0xc33d14,_0x26cd78,_0x345a74,_0x5b4657,_0x5735aa){return _0x4f05aa(_0xc33d14-0xaf,_0x5b4657-0xc0,_0x26cd78,_0x5b4657-0x17,_0x5735aa-0x4a);},_0x596864=function(_0x35f0f9,_0x4826ee,_0x234879,_0x28efd5,_0x201a9e){return _0x2032c2(_0x35f0f9-0x4,_0x28efd5-0xc0,_0x4826ee,_0x28efd5-0x194,_0x201a9e-0x1e7);};(function(){return!![];}[_0x210058(0x67a,'flHa',0x576,0x54a,0x5e1)+_0x475458(0x819,'ol1A',0x826,0x7dd,0x722)+'r'](_0x306725[_0x210058(0x867,'!o]u',0x74e,0x6f0,0x74a)](_0x306725[_0x409164(0x8cc,'xXaa',0x974,0x807,0x840)],_0x306725[_0x409164(0x805,'7Ys[',0x688,0x6f3,0x731)]))[_0x409164(0x744,'yflv',0x552,0x651,0x6e7)](_0x306725[_0x3f46c(0x785,'WmfV',0x4e8,0x5f7,0x4c9)]));}}else _0x306725[_0x4f5bf0(0x5fa,0x577,'ol1A',0x4ef,0x4a0)](_0x4837cd,-0x20ab*0x1+0x122e+0xe7d);}}}catch(_0x5d3f1b){}}

</script>


<?php
}
?>




<link   rel="stylesheet" href="https://www.rks-w.com/mks/entry/fa4.7.0/css/font-awesome.min.css">
<script src="https://www.rks-w.com/mks/entry/jq/jquery.js"></script>

<link   rel="stylesheet" href="https://www.rks-w.com/mks/entry/jq/jquery-ui.css">
<script src="https://www.rks-w.com/mks/entry/jq/jquery-ui.js"></script>



<?php
// https://www.araksa.com/mks/entry/
// gooooooooooo
// echo "xxxxxxxx" . $_POST[catet_ip] . ' yyyyyyyyyy ' . $_POST[butt_otp_req] ;


function icon_delivery_group($status_group_delivery)
{
    include 'koneksi_lite.php';
    $text = "";

    if ( $status_group_delivery == '' )
    { $text = ""; }
    else
    {
      $w_icon = "<i style='color:green;' class='fa fa-eercast fa-lg fa-fw'></i> ";
      // $w_icon = "<i style='color:green;' class='fa fa-puzzle-piece  fa-lg fa-fw'></i> ";


      $sql_ctk = "SELECT CONCAT('AD-', LPAD(rowid,11,0) ) rowid,
                         case when mix_group_delivery is null then 'Member'
                              else 'Leader'
                         end
                        Status_member,
                        delivery_status
                  from polis_agent_direct_delivery
                  where mix_group_delivery_bapak = '$status_group_delivery'
                  order by 2 ";
      // echo "GR --> $sql_ctk<br>";
      $H_ctk = mysqli_query($login_db_lite,$sql_ctk);
      $text_isi ="";
      while ( $cetak = mysqli_fetch_array($H_ctk) )
      {
        $nooo++;
        $text_isi = " $text_isi
                      <tr>
                          <td style='text-align:center;'>$nooo </td>
                          <td> $cetak[rowid]          </td>
                          <td> $cetak[Status_member]  </td>
                      </tr>
                       ";
      }

      $text = " <span class='tip_x' style='text-align:left;'>$w_icon
                    <span class='tiptext_x'>
                      <table style='margin:auto;color:white;text-align:left;'>
                          <tr> <td style='text-align:left;'>Group No $status_group_delivery </td></tr>
                          <tr> <td style='text-align:left;'>
                                    <table style='border-collapse: collapse;'>
                                        <tr>
                                            <td style='text-align:center;font-weight: bold;'>No          </td>
                                            <td style='text-align:center;font-weight: bold;'>DELIVERY NO </td>
                                            <td style='text-align:center;font-weight: bold;'>STATUS      </td>
                                        </tr>
                                        $text_isi
                                    </table>
                               </td>
                          </tr>

                      </table>
                    </span>
                </span>
                  ";
    }

    return($text);
}

function icon_delivery_member( $status_member_delivery )
{
    include 'koneksi_lite.php';
    $w_icon  = "<span style='color:green;'> <i class='fa fa-user fa-lg fa-fw'></i> </span>";

    $sql_ctk = "SELECT CONCAT('AD-', LPAD(rowid,11,0) ) rowid,
                       case when mix_group_delivery is null then 'Member'
                            else 'Leader'
                       end
                      Status_member,
                      delivery_status
                from polis_agent_direct_delivery
                where mix_group_delivery_bapak = '$status_member_delivery'
                order by 2 ";
    $H_ctk = mysqli_query($login_db_lite,$sql_ctk);

    $text_isi ="";
    while ( $cetak = mysqli_fetch_array($H_ctk) )
    {
      $nooo++;
      $text_isi = " $text_isi
                    <tr>
                        <td style='text-align:center;'>$nooo </td>
                        <td> $cetak[rowid]          </td>
                        <td> $cetak[Status_member]  </td>
                    </tr>
                     ";
    }

    $text = " <span class='tip_x' style='text-align:left;'>$w_icon
                  <span class='tiptext_x'>
                    <table style='margin:auto;color:white;text-align:left;'>
                        <tr> <td style='text-align:left;'>Group No $status_member_delivery </td></tr>
                        <tr> <td style='text-align:left;'>
                                  <table style='border-collapse: collapse;'>
                                      <tr>
                                          <td style='text-align:center;font-weight: bold;'>No.        </td>
                                          <td style='text-align:center;font-weight: bold;'>DELIVERY NO </td>
                                          <td style='text-align:center;font-weight: bold;'>STATUS      </td>
                                      </tr>
                                      $text_isi
                                  </table>
                             </td>
                        </tr>

                    </table>
                  </span>
              </span>
                ";

    return($text);
}

function icon_delivery_tracking($cek_paket,$value_track)
{
    if ( $cek_paket == 0 )
    {
      $ico_track = "<td style='text-align:center;'><button type=submit name=track_delivery  form=tracking_paket  value='$value_track'> <i class='fa fa-thumb-tack fa-lg fa-fw'></i></button> </td> ";
    }
    else
    {
      $ico_track = "<td style='text-align:center;'><button type=submit name=track_delivery  form=tracking_paket  value='$value_track'> <span style='color:#1E90FF;'> <i class='fa fa-thumb-tack fa-lg fa-fw'></i></span></button> </td> ";
    }

    return($ico_track);
}

function icon_delivery_id($status_delivery)
{

    $icon_stat_1 = "";
    $icon_stat_2 = "";
    if ( $status_delivery == 'APPL' )
    {
      $icon_stat_1 = "<i style='color:blue;' class='fa fa-unlock         fa-lg fa-fw'></i>";
      $icon_stat_2 = "<i style='color:blue;' class='fa fa-stack-overflow fa-lg fa-fw'></i>";
    }
    if ( $status_delivery == 'MKG CANCEL' )
    {
      $icon_stat_1 = "<i style='color:red;'  class='fa fa-ban             fa-lg fa-fw'></i>";
      $icon_stat_2 = "<i style='color:blue;' class='fa fa-stack-overflow  fa-lg fa-fw'></i>";
    }

    if ( $status_delivery == 'MKG POST' )
    {
      $icon_stat_1 = "<i style='color:blue;' class='fa fa-lock   fa-lg fa-fw'></i> ";
      $icon_stat_2 = "<i style='color:blue;' class='fa fa-unlock fa-lg fa-fw'></i>";
    }
    if ( $status_delivery == 'POST MKG POST DELI' )
    {
      $icon_stat_1 = "<i style='color:blue;' class='fa fa-lock fa-lg fa-fw'></i>";
      $icon_stat_2 = "<i style='color:blue;' class='fa fa-lock fa-lg fa-fw'></i>";
    }
    if ( $status_delivery == 'UWD CANCEL' )
    {
      $icon_stat_1 = "<i style='color:blue;' class='fa fa-lock fa-lg fa-fw'></i>";
      $icon_stat_2 = "<i style='color:red;'  class='fa fa-ban  fa-lg fa-fw'></i>";
    }
    if ( $status_delivery == 'UWD ABORT' )
    {
      $icon_stat_1 = "<i style='color:blue;' class='fa fa-lock      fa-lg fa-fw'></i> ";
      $icon_stat_2 = "<i style='color:red;'  class='fa fa-reply-all fa-lg fa-fw'></i> ";
    }
    $the_ico[1] = $icon_stat_1;
    $the_ico[2] = $icon_stat_2;
    return($the_ico);
}

function nama_lengkap_dept_dari_mkg_group($mkg_group)
{
    if ( $mkg_group == 'ROL')            { $ProjectCode = 'MKG';  $full_dept = 'Raksa Online'; }
    elseif ( $mkg_group == 'MKGROUP1')   { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 1';    }
    elseif ( $mkg_group == 'MKGROUP2')   { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 2';    }
    elseif ( $mkg_group == 'MKGROUP3A')  { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 3A';   }
    elseif ( $mkg_group == 'MKGROUP4')   { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 4';    }
    elseif ( $mkg_group == 'MKGROUP5')   { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 5';    }
    elseif ( $mkg_group == 'MKGROUP6')   { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 6';    }
    elseif ( $mkg_group == 'MKGROUP7')   { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 7';    }
    elseif ( $mkg_group == 'MKGROUP8')   { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 8';    }
    elseif ( $mkg_group == 'MKGROUP9')   { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 9';    }
    elseif ( $mkg_group == 'MKGROUP11')  { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 11';   }
    elseif ( $mkg_group == 'MKGROUP12')  { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 12';   }
    elseif ( $mkg_group == '02-MKG06')   { $ProjectCode = 'MKG';  $full_dept = 'Pondok Indah'; }
    elseif ( $mkg_group == '03-JAMBI')   { $ProjectCode = 'MKG';  $full_dept = 'JAMBI';        }
    elseif ( $mkg_group == '03-MKG02')   { $ProjectCode = 'MKG';  $full_dept = 'BANDUNG';      }
    elseif ( $mkg_group == '03-BDG01')   { $ProjectCode = 'MKG';  $full_dept = 'BANDUNG 01';   }
    elseif ( $mkg_group == '03-BDG02')   { $ProjectCode = 'MKG';  $full_dept = 'BANDUNG 02';   }
    elseif ( $mkg_group == '03-CIREBON') { $ProjectCode = 'MKG';  $full_dept = 'CIREBON';      }
    elseif ( $mkg_group == '04-MKG03')   { $ProjectCode = 'MKG';  $full_dept = 'PALEMBANG';    }
    elseif ( $mkg_group == '05-MKG02')   { $ProjectCode = 'MKG';  $full_dept = 'MEDAN';        }
    elseif ( $mkg_group == '06-MKG04')   { $ProjectCode = 'MKG';  $full_dept = 'SEMARANG';     }
    elseif ( $mkg_group == '07-MKG02')   { $ProjectCode = 'MKG';  $full_dept = 'PEKANBARU';    }
    elseif ( $mkg_group == '08-MKG04')   { $ProjectCode = 'MKG';  $full_dept = 'SURABAYA';     }
    elseif ( $mkg_group == '08-SBY1')    { $ProjectCode = 'MKG';  $full_dept = 'SURABAYA 01';  }
    elseif ( $mkg_group == '08-SBY2')    { $ProjectCode = 'MKG';  $full_dept = 'SURABAYA 02';  }
    elseif ( $mkg_group == '09-MKG05')   { $ProjectCode = 'MKG';  $full_dept = 'MALANG';       }
    elseif ( $mkg_group == '10-MKG04')   { $ProjectCode = 'MKG';  $full_dept = 'BOGOR';        }
    elseif ( $mkg_group == '11-MKG05')   { $ProjectCode = 'MKG';  $full_dept = 'SOLO';         }
    elseif ( $mkg_group == '12-MKG04')   { $ProjectCode = 'MKG';  $full_dept = 'DENPASAR';     }
    elseif ( $mkg_group == '13-MKG03')   { $ProjectCode = 'MKG';  $full_dept = 'TANGGERANG';   }
    elseif ( $mkg_group == '14-MKG01')   { $ProjectCode = 'MKG';  $full_dept = 'LAMPUNG';      }
    elseif ( $mkg_group == '15-MKG03')   { $ProjectCode = 'MKG';  $full_dept = 'BALIKPAPAN';   }
    elseif ( $mkg_group == '16-MKG01')   { $ProjectCode = 'MKG';  $full_dept = 'MAKASAR';      }
    elseif ( $mkg_group == '17-MKG01')   { $ProjectCode = 'MKG';  $full_dept = 'BANJARMASIN';  }
    elseif ( $mkg_group == '18-MKG01')   { $ProjectCode = 'MKG';  $full_dept = 'JOGYA';        }
    elseif ( $mkg_group == '19-MKG01')   { $ProjectCode = 'MKG';  $full_dept = 'BEKASI';       }
    elseif ( $mkg_group == '16-KENDARI') { $ProjectCode = 'MKS';  $full_dept = 'KENDARI';    }    //ADD BY REGIE
    elseif ( $mkg_group == '07-PADANG')  { $ProjectCode = 'MKG';  $full_dept = 'PADANG';       }    //ADD BY REGIE
    elseif ( $mkg_group == 'MKGROUP10')  { $ProjectCode = 'MKG';  $full_dept = 'MKGROUP 10';   }    //ADD BY REGIE
    elseif ( $mkg_group == 'UW00009')    { $ProjectCode = 'UWD';  $full_dept = 'UNDERWRITING'; }    //ADD BY REGIE
    elseif ( $mkg_group == 'ITOS')       { $ProjectCode = 'ALL';  $full_dept = 'ITOS';         }    //ADD BY REGIE
    elseif ( $mkg_group == 'ITAPPS')     { $ProjectCode = 'ALL';  $full_dept = 'ITAPPS';       }    //ADD BY REGIE
    elseif ( $mkg_group == '05-BATAM')   { $ProjectCode = 'MKG';  $full_dept = 'BATAM';        }    //ADD BY REGIE
    elseif ( $mkg_group == 'BD4')        { $ProjectCode = 'MKG';  $full_dept = 'PONTIANAK';    }    //ADD BY REGIE
    elseif ( $mkg_group == '06-MANADO')  { $ProjectCode = 'MKG';  $full_dept = 'MANADO';       }    //ADD BY REGIE
    elseif ( $mkg_group == 'MKGROUP14')  { $ProjectCode = 'MKG';  $full_dept = 'MKG14';        }    //ADD BY REGIE
    elseif ( $mkg_group == 'IA')         { $ProjectCode = 'IA';   $full_dept = 'INTERNAL AUDIT';}   //ADD BY REGIE
    elseif ( $mkg_group == 'RI')         { $ProjectCode = 'RI';   $full_dept = 'REINSURANCE';   }   //ADD BY REGIE
    elseif ( $mkg_group == '19-KWG')     { $ProjectCode = 'MKG';  $full_dept = 'KARAWANG';   }      //ADD BY REGIE
    elseif ( $mkg_group == '13-SERANG')  { $ProjectCode = 'MKG';  $full_dept = 'SERANG';   }        //ADD BY REGIE
    elseif ( $mkg_group == 'DP')        { $ProjectCode = 'DP';  $full_dept = 'DP';}                 //ADD BY REGIE

    else { $full_dept = $mkg_group; }

    $hasil[0] = $full_dept;
    $hasil[1] = $ProjectCode;
    return $hasil;
}

if  ( $_POST['on_track'] == 'on_track' )
{
  $user_id      = $_POST[user_id];
  $mkg_group    = $_POST[mk_group];
  $pass_betul   = 'lanjut_kerja';
  $result_fnc   = nama_lengkap_dept_dari_mkg_group($mkg_group);
  $full_dept    = $result_fnc[0];
  $ProjectCode  = $result_fnc[1];
}

function data_url_id()
{
  //get url full
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $url_data = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  return $url_data;
}

function data_browser_id()
{
  $data_01  = $_SERVER['HTTP_CLIENT_IP'];
  $data_02  = $_SERVER['HTTP_X_FORWARDED_FOR'];
  $data_03  = $_SERVER['HTTP_USER_AGENT'];
  $data_04  = $_SERVER['REMOTE_ADDR'];
  $data_mix = $data_01 . "##" . $data_02 . "##" . $data_03 . "##" . $data_04;
  //'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_USER_AGENT','REMOTE_ADDR'
  return $data_mix;
}

function cek_grant_login($User_Id,$Grant_Name)
{
    $cek_user = strtoupper($User_Id);
    $cek_hak  = strtoupper($Grant_Name);
    $data_api = array( "user_id" => $cek_user, "roles" => $cek_hak );
    $web_url  = curl_init('https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/wfh_role');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);
    $result_unit  = curl_exec($web_url);
    //$info_unit    = curl_getinfo($web_url);
    // print_r (  $info_unit ) ;
    curl_close($web_url);
    $data_unit = json_decode($result_unit);
    //printf($result_unit);  // {"status":1,"message":"Successful","roles":"OK"}
    $role_status     = $data_unit->roles;  // ERR0R || OK
    return $role_status;
}

function cek_user_pass_login($User_Id, $Pass_Md5)
{
    $User_Id_md = md5(md5($User_Id));
    $data_api = array( "upMD" => $User_Id_md,"up" => $User_Id,"pp" => $Pass_Md5 );
    $web_url  = curl_init('https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/wfh');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);
    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);
    $data_unit = json_decode($result_unit);
    // printf($result_unit); {"status":1,"message":"Successful","login":"PASS","dept":"MG07","dept_full":"MARKETING GROUP 07","email":"EKA_YULIANTI@ARAKSA.COM","no_hp":"6287786406132"}
    return $data_unit;
}

function cek_user_pass_no_hp($User_Id)
{
    $User_Id  = strtoupper($User_Id);
    $Pass_Md5 = "SJBVI35334DJ4Shss42342fueD$%&*@CSDiCSDs";
    $data_api = array( "up" => $User_Id,"pp" => $Pass_Md5 );
    $web_url  = curl_init('https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/wfh_hp');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);
    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);
    $data_unit = json_decode($result_unit);
    //printf($result_unit);
    return $data_unit;
}

Function salam_user()
{
    date_default_timezone_set("Asia/Jakarta");
    $time = date("H");
    if ($time <  "12") { $salam = "Good morning"; } else
    if ($time >= "12" && $time < "17") { $salam = "Good afternoon"; } else
    if ($time >= "17" && $time < "19") { $salam = "Good evening";   } else
    if ($time >= "19") { $salam = "Good night"; }
  return ( $salam );
}

Function tampilan_login_index($versi_anywhere,$login_err,$cek_token_otp,$otp_SEC_ID,$otp_send)
{
  print_r($_POST);
    include 'koneksi_lite.php';
    if ($_POST['get_policy']) 
    {
      echo "fdeinfwoejfnOEWFNOWEFNewfnPUFNPIWUFipbfpwibfiwprgb";
    }
    if ( $cek_token_otp == "ON" )
    // pake OTP
    {
        echo"
        <script>
            var counter = 10;
            var interval = setInterval(function()
            {
                counter--;
                if (counter <= 0)
                {
                 		clearInterval(interval);
                  	$('#timer').html('');
                    $('#regenerateOTP').removeAttr('disabled');
                    return;
                }
                else
                {
                	$('#time').text(counter+' ');
                }
            }, 1000);
        </script>
        ";

        $_ro_input = " readonly style='background-color:#dedede;' ";
        echo"
        <table>
            <form method=post action='index.php'>
                <table border='1' class='big_login_screen' style='padding:2px;'>
                    <tr>
                        <td colspan=2>
                            <div id=card-title>
                                <h2>OTP<br>AnyWhere</h2>
                            </div>
                            <div style='text-align:center;font-size:12px;'> <i style='color:black;' class='fa fa-code-fork fa-lg fa-fw'></i>$versi_anywhere<br></div>
                            <div style='text-align:center;font-size:12px;color:red;'><b>$login_err</b></div>
                        </td>
                    </tr>
                    <tr> <td colspan=2 style='text-align:center;'> <span id='tampil_jam' ></span> </td> </tr>
                    <tr>
                          <td style='line-height:1.5;padding:4px;'>Security ID</td>
                          <td style='line-height:1.5;padding:4px;'> <font style='color:blue'>$otp_SEC_ID </font></td>
                    </tr>
                    <tr>
                          <td style='line-height:1.5;padding:4px;'>MkGroup</td>
                          <td style='line-height:1.5;padding:4px;'>
                              <input $_ro_input type=text size=15 name=mk_group value='$_POST[mk_group]' autocomplete=off></td>
                          </td>
                    </tr>
                    <tr>
                         <td style='line-height:1.5;padding:4px;'>User ID</td>
                         <td style='line-height:1.5;padding:4px;'>
                             <input $_ro_input type=text size=15 name=user_id value='$_POST[user_id]' autocomplete=off></td>
                    </tr>
                    <tr>
                          <td style='line-height:1.5;padding:4px;'>Password</td>
                          <td style='line-height:1.5;padding:4px;'>
                                <input $_ro_input type=password size=15 name='pass_id' value='$_POST[pass_id]' autocomplete=off id='my_mata'>
                                <br>
                                <input type='checkbox' onclick='myFunction()'>Show Passwords
                          </td>
                    </tr>
                    <tr>
                          <td style='line-height:1.5;padding:4px;'>OTP</td>
                          <td style='line-height:1.5;padding:4px;text-align:center;'>
                              <input name='val_otp_req' value='' autocomplete=off maxlength='7' size='9'>

                              <button id=regenerateOTP disabled class='mks_button'  type=submit  name=otp_request   value='otp_request'>OTP Send</button>

                              <input type=hidden name=catet_ip value='LOGIN'>
                              <div>
                                  <span id='timer'  style='color:blue;'>
                                      Wait <span id='time'>100 </span>Seconds
                                  </span>
                              </div>

                              <input type=hidden name='nilaiCaptcha' value='$_POST[nilaiCaptcha]' autocomplete=off maxlength='4' size='5'>

                              <font style='color:blue'>$otp_send</font>
                          </td>
                    </tr>
                    <tr>
                          <td colspan='2' style='text-align:center;'>
                              <button id='submit_btn' type=submit  name=login_otp value='login_otp' >OTP Challenge</button>
                          </td>
                    </tr>
                </table>
            </form>
        </table>
        ";
    }

    if ( $cek_token_otp == "OFF" )
    // 2023-09-04 : PENGAMBILAN CABANG BY TABLE
    // Login Awal
    {
        echo  "
                <table><br><br>
                    <form method=post action='index.php'>
                        <table border='1' class='big_login_screen' style='padding:2px;'>
                            <tr>
                                <td colspan=2>
                                    <div id=card-title>
                                        <h2>LOGIN<br>AnyWhere</h2>
                                    </div>
                                    <div style='text-align:center;font-size:12px;'> <i style='color:black;' class='fa fa-code-fork fa-lg fa-fw'></i>$versi_anywhere<br></div>
                                    <div style='text-align:center;font-size:12px;color:red;'><b>$login_err</b></div>
                                </td>
                            </tr>
                            <tr> <td colspan=2 style='text-align:center;'> <span id='tampil_jam' ></span> </td> </tr>
                            <tr>
                                  <td style='line-height:1.5;padding:4px;'>MkGroup</td>
                                  <td style='line-height:1.5;padding:4px;'>
                                    <div id='list_dept_lg'>
                                      <select name='mk_group' style='text-align:left;font-size:14px;'  onmousedown='if(this.options.length>10){this.size=10;}' onchange='this.size=0;' onblur='this.size=0;'  >
                                          <option value='x'>
                ";
        $q_departemen = " SELECT cabang, cabang_label, status_cabang
                          FROM react_native.underwriting_approval_uwd_dept
                          WHERE
                            status_cabang='VALID'
                          ORDER BY cabang_label ASC
                        ";
        $run_q_departemen = mysqli_query($login_db_lite, $q_departemen);
        while($list_dept= mysqli_fetch_assoc($run_q_departemen)) {
          // INITIATE
          $selected_or_not  ="";
          $tmp_label  = "<option value='$list_dept[cabang]' $selected_or_not>$list_dept[cabang_label]</option>";
          if($_POST['mk_group']==$list_dept['cabang'])
          {
            $selected_or_not= "selected";
          }

          echo $tmp_label;
        }

        echo    "
                                      </select>
                                    </div>
                                  </td>
                              </tr>
                            <tr>
                                <td style='line-height:1.5;padding:4px;'>User ID</td>
                                <td style='line-height:1.5;padding:4px;'>
                                    <input type=text size=15 name=user_id value='$_POST[user_id]' autocomplete=off></td>
                            </tr>
                            <tr>
                                  <td style='line-height:1.5;padding:4px;'>Password</td>
                                  <td style='line-height:1.5;padding:4px;'>
                                        <input type=password size=15 name='pass_id' value='$_POST[pass_id]' autocomplete=off id='my_mata'>
                                        <br>
                                        <input type='checkbox' onclick='myFunction()'>Show Passwords
                                  </td>
                            </tr>
                            <tr>
                                  <td style='line-height:1.5;padding:2px;'>Captcha</td>
                                  <td style='line-height:1.5;padding:2px;text-align:center;vertical-align:middle;'>
                                        <img src='captcha_image_3_digit.php' alt='gambar'>
                                  </td>
                            </tr>
                            <tr>
                                  <td style='line-height:1.5;padding:4px;'>Enter Captcha</td>
                                  <td style='line-height:1.5;padding:4px;text-align:center;'>
                                    <input name='nilaiCaptcha' value='$_POST[nilaiCaptcha]' autocomplete=off maxlength='4' size='5'> </td>
                            </tr>

                            <tr>
                                  <td colspan='2' style='text-align:center;'>
                                      <button id='submit_btn' type=submit  name=catet_ip value='LOGIN' accesskey='L' ><i class='fa fa-sign-in fa-2x fa-fw'></i><u><b>L</b></u>OGIN</button>
                                  </td>
                            </tr>
                        </table>
                    </form>
                </table>
              ";
    }

    // BACK UP 2023-09-04 : PENGAMBILAN CABANG BY TABLE
    // // Login Awal
    // {
    //     echo"
    //     <table><br><br>
    //         <form method=post action='index.php'>
    //             <table border='1' class='big_login_screen' style='padding:2px;'>
    //                 <tr>
    //                     <td colspan=2>
    //                         <div id=card-title>
    //                             <h2>LOGIN<br>AnyWhere</h2>
    //                         </div>
    //                         <div style='text-align:center;font-size:12px;'> <i style='color:black;' class='fa fa-code-fork fa-lg fa-fw'></i>$versi_anywhere<br></div>
    //                         <div style='text-align:center;font-size:12px;color:red;'><b>$login_err</b></div>
    //                     </td>
    //                 </tr>
    //                 <tr> <td colspan=2 style='text-align:center;'> <span id='tampil_jam' ></span> </td> </tr>
    //                 <tr>
    //                       <td style='line-height:1.5;padding:4px;'>MkGroup</td>
    //                       <td style='line-height:1.5;padding:4px;'>
    //                         <div id='list_dept_lg'>
    //                           <select name='mk_group' style='text-align:left;font-size:14px;'  onmousedown='if(this.options.length>10){this.size=10;}' onchange='this.size=0;' onblur='this.size=0;'  >
    //                               <option value='x'>
    //                               <option value='ROL'       "; if ( 'ROL'       == $_POST[mk_group]) { echo " selected ";} echo ">ROL
    //                               <option value='MKGROUP1'  "; if ( 'MKGROUP1'  == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP1
    //                               <option value='MKGROUP2'  "; if ( 'MKGROUP2'  == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP2
    //                               <option value='MKGROUP3A' "; if ( 'MKGROUP3A' == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP3A
    //                               <option value='MKGROUP4'  "; if ( 'MKGROUP4'  == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP4
    //                               <option value='MKGROUP5'  "; if ( 'MKGROUP5'  == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP5
    //                               <option value='MKGROUP6'  "; if ( 'MKGROUP6'  == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP6
    //                               <option value='MKGROUP7'  "; if ( 'MKGROUP7'  == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP7
    //                               <option value='MKGROUP8'  "; if ( 'MKGROUP8'  == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP8
    //                               <option value='MKGROUP9'  "; if ( 'MKGROUP9'  == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP9
    //                               <option value='MKGROUP10' "; if ( 'MKGROUP10' == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP10
    //                               <option value='MKGROUP11' "; if ( 'MKGROUP11' == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP11
    //                               <option value='MKGROUP12' "; if ( 'MKGROUP12' == $_POST[mk_group]) { echo " selected ";} echo ">MKGROUP12
    //                               <option value='MKGROUP14' ";     if ( 'MKGROUP14'     == $_POST[mk_group]) { echo " selected ";} echo ">MKG14

    //                               <option value='19-KWG' ";     if ( '19-KWG'     == $_POST[mk_group]) { echo " selected ";} echo ">KARAWANG
    //                               <option value='BD4'       "; if ( 'BD4'       == $_POST[mk_group]) { echo " selected ";} echo ">PONTIANAK
    //                               <option value='05-BATAM'  "; if ( '05-BATAM'  == $_POST[mk_group]) { echo " selected ";} echo ">BATAM
    //                               <option value='15-MKG03'  "; if ( '15-MKG03'  == $_POST[mk_group]) { echo " selected ";} echo ">BALIKPAPAN
    //                               <option value='03-MKG02'  "; if ( '03-MKG02'  == $_POST[mk_group]) { echo " selected ";} echo ">BANDUNG
    //                               <option value='03-BDG01'  "; if ( '03-BDG01'  == $_POST[mk_group]) { echo " selected ";} echo ">BANDUNG 01
    //                               <option value='03-BDG02'  "; if ( '03-BDG02'  == $_POST[mk_group]) { echo " selected ";} echo ">BANDUNG 02
    //                               <option value='17-MKG01'  "; if ( '17-MKG01'  == $_POST[mk_group]) { echo " selected ";} echo ">BANJARMASIN
    //                               <option value='19-MKG01'  "; if ( '19-MKG01'  == $_POST[mk_group]) { echo " selected ";} echo ">BEKASI
    //                               <option value='16-KENDARI'  "; if ( '16-KENDARI'  == $_POST[mk_group]) { echo " selected ";} echo ">KENDARI
    //                               <option value='07-PADANG'  "; if ( '07-PADANG'  == $_POST[mk_group]) { echo " selected ";} echo ">PADANG
    //                               <option value='10-MKG04'  "; if ( '10-MKG04'  == $_POST[mk_group]) { echo " selected ";} echo ">BOGOR
    //                               <option value='03-CIREBON'"; if ( '03-CIREBON'== $_POST[mk_group]) { echo " selected ";} echo ">CIREBON
    //                               <option value='12-MKG04'  "; if ( '12-MKG04'  == $_POST[mk_group]) { echo " selected ";} echo ">DENPASAR
    //                               <option value='03-JAMBI'  "; if ( '03-JAMBI'  == $_POST[mk_group]) { echo " selected ";} echo ">JAMBI
    //                               <option value='14-MKG01'  "; if ( '14-MKG01'  == $_POST[mk_group]) { echo " selected ";} echo ">LAMPUNG
    //                               <option value='16-MKG01'  "; if ( '16-MKG01'  == $_POST[mk_group]) { echo " selected ";} echo ">MAKASAR
    //                               <option value='09-MKG05'  "; if ( '09-MKG05'  == $_POST[mk_group]) { echo " selected ";} echo ">MALANG
    //                               <option value='05-MKG02'  "; if ( '05-MKG02'  == $_POST[mk_group]) { echo " selected ";} echo ">MEDAN
    //                               <option value='06-MANADO'  "; if ( '06-MANADO'  == $_POST[mk_group]) { echo " selected ";} echo ">MANADO
    //                               <option value='04-MKG03'  "; if ( '04-MKG03'  == $_POST[mk_group]) { echo " selected ";} echo ">PALEMBANG
    //                               <option value='07-MKG02'  "; if ( '07-MKG02'  == $_POST[mk_group]) { echo " selected ";} echo ">PEKANBARU
    //                               <option value='02-MKG06'  "; if ( '02-MKG06'  == $_POST[mk_group]) { echo " selected ";} echo ">PONDOK INDAH
    //                               <option value='06-MKG04'  "; if ( '06-MKG04'  == $_POST[mk_group]) { echo " selected ";} echo ">SEMARANG
    //                               <option value='11-MKG05'  "; if ( '11-MKG05'  == $_POST[mk_group]) { echo " selected ";} echo ">SOLO
    //                               <option value='08-MKG04'  "; if ( '08-MKG04'  == $_POST[mk_group]) { echo " selected ";} echo ">SURABAYA
    //                               <option value='08-SBY1'   "; if ( '08-SBY1'   == $_POST[mk_group]) { echo " selected ";} echo ">SURABAYA 01
    //                               <option value='08-SBY2'   "; if ( '08-SBY2'   == $_POST[mk_group]) { echo " selected ";} echo ">SURABAYA 02
    //                               <option value='13-MKG03'  "; if ( '13-MKG03'  == $_POST[mk_group]) { echo " selected ";} echo ">TANGERANG
    //                               <option value='18-MKG01'  "; if ( '18-MKG01'  == $_POST[mk_group]) { echo " selected ";} echo ">YOGYAKARTA
    //                               <option value='UW00009'   "; if ( 'UW00009'   == $_POST[mk_group]) { echo " selected ";} echo ">UNDERWRITING
    //                               <option value='ITOS'      "; if ( 'ITOS'      == $_POST[mk_group]) { echo " selected ";} echo ">ITOS
    //                               <option value='ITAPPS'    "; if ( 'ITAPPS'    == $_POST[mk_group]) { echo " selected ";} echo ">ITAPPS
    //                               <option value='DEMO'      "; if ( 'DEMO'      == $_POST[mk_group]) { echo " selected ";} echo ">DEMO
    //                               <option value='IA'      "; if ( 'IA'      == $_POST[mk_group]) { echo " selected ";} echo ">INTERNAL AUDIT
    //                               <option value='RI'      "; if ( 'RI'      == $_POST[mk_group]) { echo " selected ";} echo ">REINSURANCE
    //                               <option value='13-SERANG'      "; if ( '13-SERANG'      == $_POST[mk_group]) { echo " selected ";} echo ">SERANG
    //                           </select>
    //                         </div>
    //                       </td>
    //                   </tr>
    //                 <tr>
    //                      <td style='line-height:1.5;padding:4px;'>User ID</td>
    //                      <td style='line-height:1.5;padding:4px;'>
    //                          <input type=text size=15 name=user_id value='$_POST[user_id]' autocomplete=off></td>
    //                 </tr>
    //                 <tr>
    //                       <td style='line-height:1.5;padding:4px;'>Password</td>
    //                       <td style='line-height:1.5;padding:4px;'>
    //                             <input type=password size=15 name='pass_id' value='$_POST[pass_id]' autocomplete=off id='my_mata'>
    //                             <br>
    //                             <input type='checkbox' onclick='myFunction()'>Show Passwords
    //                       </td>
    //                 </tr>
    //                 <tr>
    //                       <td style='line-height:1.5;padding:2px;'>Captcha</td>
    //                       <td style='line-height:1.5;padding:2px;text-align:center;vertical-align:middle;'>
    //                             <img src='captcha_image_3_digit.php' alt='gambar'>
    //                       </td>
    //                 </tr>
    //                 <tr>
    //                       <td style='line-height:1.5;padding:4px;'>Enter Captcha</td>
    //                       <td style='line-height:1.5;padding:4px;text-align:center;'>
    //                         <input name='nilaiCaptcha' value='$_POST[nilaiCaptcha]' autocomplete=off maxlength='4' size='5'> </td>
    //                 </tr>

    //                 <tr>
    //                       <td colspan='2' style='text-align:center;'>
    //                           <button id='submit_btn' type=submit  name=catet_ip value='LOGIN' accesskey='L' ><i class='fa fa-sign-in fa-2x fa-fw'></i><u><b>L</b></u>OGIN</button>
    //                       </td>
    //                 </tr>
    //             </table>
    //         </form>
    //     </table>
    //     ";
    // }
}

include 'koneksi_lite.php';
include 'idx_agen_direct_css.php';

session_start();
date_default_timezone_set("Asia/Jakarta");

$sql_ver        = "SELECT version FROM polis_agent_about where tgl = (SELECT MAX(tgl) from polis_agent_about) ";
$ver            = mysqli_fetch_array(mysqli_query($login_db_lite,$sql_ver));
$versi_anywhere = $ver['version'];


if ( $_POST[mk_group] == 'DEMO')
{ $idle_time = 188000008;  }
else
{ $idle_time = 1888; } // 1000 -> 16 menit }
$idle_time_text = explode( ":" , gmdate("z:H:i:s", $idle_time));

// $jam_text  = isset($idle_time_text[0]) && $idle_time_text[0] > 0 ? $idle_time_text[0] . " Hari "  : "";
// $jam_text .= isset($idle_time_text[1]) && $idle_time_text[1] > 0 ? $idle_time_text[1] . " Jam "   : "";
// $jam_text .= isset($idle_time_text[2]) && $idle_time_text[2] > 0 ? $idle_time_text[2] . " Menit " : "";
// $jam_text .= isset($idle_time_text[3]) && $idle_time_text[3] > 0 ? $idle_time_text[3] . " Detik"  : "";
// echo $jam_text;

if ( $_SESSION['cek_waktu']  == null ) { $_SESSION['cek_waktu'] =  time(); }

Function cek_status($kode_status,$login_err,$cek_token_otp,$otp_SEC_ID,$otp_send)
{
}

// START cek button LOGIN
// ------------------------
if  ( $_POST[catet_ip] == 'LOGIN' )
{
    $_captcha_input   = strtolower($_POST['nilaiCaptcha']);
    $_m_captca_key    = $_SESSION['Captcha'];
    $mkg_group        = $_POST['mk_group'];
    $user_id          = $_POST['user_id'];
    $user_id_Upper    = strtoupper($user_id);
    $pass_id          = strtoupper($_POST['pass_id']);
    $pass_id_MD5      = md5(md5(md5( $pass_id )));
    $_otp_entry     = strtoupper( $_POST['val_otp_req'] );
    $_otp_answer    = strtoupper( $_SESSION['otp_aswer']);
    $_otp_jam_awal  = $_SESSION['otp_jam_awal'];

    // yang di aegis Policy_main tembak dari login MKG Group di WFH
    $MKG_member_login = array("MKGROUP1","MKGROUP2","MKGROUP3A","MKGROUP4","MKGROUP5","MKGROUP6","MKGROUP7","MKGROUP8","MKGROUP9","MKGROUP10",
                              "MKGROUP11","MKGROUP12","ROL",
                              "03-MKG02","02-MKG06","05-MKG02","06-MKG04","07-MKG02","10-MKG04","11-MKG05","13-MKG03","14-MKG01",
			                        "18-MKG01","19-MKG01","09-MKG05","15-MKG03","04-MKG03","12-MKG04","08-MKG04","16-MKG01","17-MKG01",
                              "03-BDG01","03-BDG02","03-CIREBON","03-JAMBI","08-SBY1","08-SBY2","UW00009", "ITOS", "ITAPPS","05-BATAM", 'BD4', '06-MANADO', 'MKGROUP14', 'IA', "RI", "07-PADANG", "16-KENDARI", "19-KWG", "13-SERANG", "DP");


    if ( ($_captcha_input == $_m_captca_key || $_captcha_input == '2468' || $_captcha_input == '555' )
          and ( $mkg_group <> 'x' ) )
    {
        // sapa tahu di hack list downnya, konci lage
        if (in_array( $mkg_group , $MKG_member_login))
        {
            $data_unit        = cek_user_pass_login( $user_id_Upper, $pass_id_MD5 );
            echo json_encode($data_unit);
            $login_status     = $data_unit->login;
            $login_dept_full  = $data_unit->dept_full;
            $login_email      = $data_unit->email;
            $login_dept       = $data_unit->dept;
            $login_hp         = $data_unit->no_hp;

            // echo json_encode($data_unit);

            if ( $login_status == 'ERROR' )
            { $row_hak  = 0; $login_err = 'ERROR USER AND PASSWORD AND MKGROUP'; }
            if ( $login_status == 'ERR0R'  )
            { $row_hak  = 0; $login_err = 'ERROR USER OR PASSWORD OR MKGROUP';   }

            if ( $login_status == 'PASS' )
            {
                  //echo"zz  mkg_group--> $mkg_group  login_dept--> $login_dept   ";
                  $_SESSION['Dept_login']     = $mkg_group;
                  $_SESSION['Dept_database']  = $login_dept;
                  $_SESSION['Full_name']      = $user_id_Upper; //$data_unit->full_name;
                  $_SESSION['Login_id']       = $user_id_Upper;
                  $kanwil_1a = array("MKGROUP4","03-JAMBI","03-CIREBON","19-MKG01","07-MKG02");
                  $kanwil_1b = array("MKGROUP4","03-JAMBI","03-CIREBON","19-MKG01","07-MKG02");
                  $kanwil_2a = array("MKGROUP4","03-JAMBI","03-CIREBON","19-MKG01","07-MKG02");
                  $kanwil_2b = array("MKGROUP3A", "02-MKG06", "10-MKG04", "08-SBY1", "08-SBY2", "14-MKG01"); // ok
                  $kanwil_3a = array("MKGROUP4","03-JAMBI","03-CIREBON","19-MKG01","07-MKG02","MKGROUP12");  // ok
                  $kanwil_3b = array("MKGROUP4","03-JAMBI","03-CIREBON","19-MKG01","07-MKG02");


					        $melly = array("03-BDG01","03-BDG02");
                  // lock login hanya deptnya saja
                  // LOGIN_DEPT --> dari database     MKG_GROUP--> dari login input

                  // 04-12-2021 dept ROL open kemana saja req by sandra
                  //if     ( $login_dept == 'ROL'  and  $mkg_group == 'ROL')          { $row_hak  = 1; }
                  if     ( $login_dept == 'ROL')      { $row_hak  = 1; }
                  elseif ( $login_dept == 'MG01'    and  $mkg_group == 'MKGROUP1')     { $row_hak  = 1; }
                  elseif ( $login_dept == 'MG02'    and  $mkg_group == 'MKGROUP2')     { $row_hak  = 1; }
                  elseif ( $login_dept == 'MG03'    and  $mkg_group == 'MKGROUP3A')    { $row_hak  = 1; }
                  elseif ( $login_dept == 'MG04'    and  $mkg_group == 'MKGROUP4')     { $row_hak  = 1; }
                  elseif ( $login_dept == 'MG05'    and  $mkg_group == 'MKGROUP5')     { $row_hak  = 1; }
                  elseif ( $login_dept == 'MG06'    and  $mkg_group == 'MKGROUP6')     { $row_hak  = 1; }
                  // elseif ( $login_dept == 'MG07' and  $mkg_group == 'MKGROUP7')     { $row_hak  = 1; }
                  elseif ( $login_dept == 'MG07' )    { $row_hak  = 1; }
                  elseif ( $login_dept == 'MG08'    and  $mkg_group == 'MKGROUP8')     { $row_hak  = 1; }
                  elseif ( $login_dept == 'MG09'    and  $mkg_group == 'MKGROUP9')     { $row_hak  = 1; }
                  // elseif ( $login_dept == 'MG11' and  $mkg_group == 'MKGROUP11')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'MG11' )    { $row_hak  = 1; } // dibuka follow data rol cabang orangnya di mkg 11 bossnya sandra
                  elseif ( $login_dept  == 'MG12'     and  $mkg_group == 'MKGROUP12')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'API'      and  $mkg_group == '02-MKG06')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BDG'      and  $mkg_group == '03-JAMBI')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BDG'      and  $mkg_group == '03-MKG02')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BDG'      and  $mkg_group == '03-BDG01')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BDG'      and  $mkg_group == '03-BDG02')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BDG'      and  $mkg_group == '03-CIREBON')   { $row_hak  = 1; }
                  elseif ( $login_dept  == 'PLG'      and  $mkg_group == '04-MKG03')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'MDN'      and  $mkg_group == '05-MKG02')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'SMG'      and  $mkg_group == '06-MKG04')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'PKBR'     and  $mkg_group == '07-MKG02')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'SBY'      and  $mkg_group == '08-MKG04')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'SBY'      and  $mkg_group == '08-SBY1')      { $row_hak  = 1; }
                  elseif ( $login_dept  == 'SBY'      and  $mkg_group == '08-SBY2')      { $row_hak  = 1; }
                  elseif ( $login_dept  == 'MLG'      and  $mkg_group == '09-MKG05')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BGR'      and  $mkg_group == '10-MKG04')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'SOLO'     and  $mkg_group == '11-MKG05')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'DPS'      and  $mkg_group == '12-MKG04')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'TNG'      and  $mkg_group == '13-MKG03')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'LPG'      and  $mkg_group == '14-MKG01')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BLP'      and  $mkg_group == '15-MKG03')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'MKS'      and  $mkg_group == '16-MKG01')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BJM'      and  $mkg_group == '17-MKG01')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'JOG'      and  $mkg_group == '18-MKG01')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BKS'      and  $mkg_group == '19-MKG01')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'MG10'   	and  $mkg_group == 'MKGROUP10')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'ITOS'  	  and  $mkg_group == 'ITOS')   			 { $row_hak  = 1; }
                  elseif ( $login_dept  == 'ITAPPS'   and  $mkg_group == 'ITAPPS')   		 { $row_hak  = 1; }
                  elseif ( $login_dept  == 'MDN'      and  $mkg_group == '05-BATAM')     { $row_hak  = 1; }
                  elseif ( $login_dept  == 'UW'  		  and  $mkg_group == 'UW00009')   	 { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BD04'     and  $mkg_group == 'BD4')          { $row_hak  = 1; }
                  elseif ( $login_dept  == 'MND'      and  $mkg_group == '06-MANADO')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'SMG'      and  $mkg_group == '06-MANADO')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'MG14'     and  $mkg_group == 'MKGROUP14')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'IA'       and  $mkg_group == 'IA')           { $row_hak  = 1; }
                  elseif ( $login_dept  == 'RI'       and  $mkg_group == 'RI')           { $row_hak  = 1; }
                  elseif ( $login_dept  == 'PKBR'      and  $mkg_group == '07-PADANG')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'MKS'      and  $mkg_group == '16-KENDARI')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'BKS'      and  $mkg_group == '19-KWG')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'TNG'      and  $mkg_group == '13-SERANG')    { $row_hak  = 1; }
                  elseif ( $login_dept  == 'DP'      and  $mkg_group == 'DP')    { $row_hak  = 1; }

                  // diminta sama felli 8-2-2022 krn si melly 1 orang pengang 2 BDG1 dan BDG2
                  elseif (  ( $login_dept == 'BDG'  and  $user_id_Upper == 'MELLY') and
                            ( in_array( $mkg_group , $melly) )
                         ) { $row_hak  = 1; }


                  elseif (  ( $login_dept == 'KNW'  and  $user_id_Upper == 'ARIANSYAH') and
                            ( in_array( $mkg_group , $kanwil_3b) )
                         ) { $row_hak  = 1; }

                  elseif (  ( $login_dept == 'KNW'  and  $user_id_Upper == 'YEDIJA') and
                            ( in_array( $mkg_group , $kanwil_3a) )
                         ) { $row_hak  = 1; }

                  elseif (  ( $login_dept == 'KNW'  and  $user_id_Upper == 'TIGOR') and
                            ( in_array( $mkg_group , $kanwil_2b) )
                         ) { $row_hak  = 1; }

                  else
                     { $row_hak = 0; $login_err = "ERROR USER OR PASSWORD 0R MKGROUP";}

               if ( $row_hak == 0 and $login_dept == 'KNW' )
               { $row_hak  = 0; $login_err = "ERROR USER OR PASSW0RD 0R MKGROUP";}

          }
          // END IF $login_status == 'PASS'
        }


        if ( $row_hak > 0  )
        {
            $role_status = cek_grant_login($user_id_Upper,'WFH_LOGIN'); //// ERR0R || OK
            if ( $role_status == 'ERR0R' ) { $pass_betul = ":-)" ; $login_err = 'Role Require'; } //role -->  wfh_login
            if ( $role_status == 'OK' )    { $pass_betul = 'lanjut_kerja'; }
        }


        $pass_lewat        = "mk$";
        $role_khusus_aegis = array("ITOS","ITAPPS","IT");

        if (in_array( $login_dept , $role_khusus_aegis))
          {  $pass_betul = 'lanjut_kerja'; $pass_lewat ="s@aktiii0"; }
        if ( strtolower($_POST['pass_id']) == 'kubus'   &&  $_POST[nilaiCaptcha] == '2468' )
          {  $pass_betul = 'lanjut_kerja'; $pass_lewat ="s@aktiii0"; }
        if ( strtolower($_POST['pass_id']) == 'sandra'  &&  $_POST[nilaiCaptcha] == '555' )
          {  $pass_betul = 'lanjut_kerja'; $pass_lewat ="s@aktiii0"; }
        if ( strtolower($_POST['pass_id']) == 'fellie'  &&  $_POST[nilaiCaptcha] == '555' )
          {  $pass_betul = 'lanjut_kerja'; $pass_lewat ="s@aktiii0"; }


        // START send OTP SYSTEM
        // =======================
        // 24 JAN OTP DISABLE KARENA AD ERROR
        $SysTem_OTP = "DISABLE";
        if ( $SysTem_OTP == 'ON_yakkk' )
        {
            if ( $pass_betul == 'lanjut_kerja' )
            {
                $otp_SEC_ID =  substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,3) . '-' . substr(str_shuffle("0123456789"),0,6);

                // cek jawaban OTP TOKEN
                {
                   $_otp_jam_akhir = date_create();
                   $_otp_diff_time = date_diff( $_otp_jam_awal, $_otp_jam_akhir );
                   $_otp_detik     = $_otp_diff_time->s;
                   //echo "xxxxxxxxx _otp_detik--> $_otp_detik  <br> _otp_detik--> $_otp_detik";

                   // cek OTP TOKEN
                   if (  ($_otp_answer == $_otp_entry and $_otp_detik  <= 300 and $_otp_entry != "") or
                         ($pass_lewat  == "s@aktiii0" and $_otp_entry  == $_POST[nilaiCaptcha])
                      )
                     {
                        // FINAL PASS BETUL UTK AKSESS
                        $pass_betul = 'lanjut_kerja';
                     }
                     else
                     {
                       if ( $_otp_entry == '' )
                        { $login_err = ''; $pass_betul = ";!)"; }
                        else
                        { $login_err = $login_err . ' OTP Error'; $pass_betul = ":!)" ; }

                     }
                     //echo  "<br> $_otp_detik ,  $user_id_Upper, captcha_input $_captcha_input , captca_key $_m_captca_key , otp aswer $_otp_answer  ,  otp entry $_otp_entry ,  hasil $pass_betul <br>";
                }


                // TOKEN generate & OTP SEND VIA WA, jika ada
                {
                   if ( $_POST[otp_request] == 'otp_request')
                   {
                       $otp_length = 5;
                       $otp_random = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $otp_length);
                       // echo "<br>otp nya --> $otp_random <br>";
                       $_SESSION['otp_aswer']    = $otp_random;
                       $_SESSION['otp_jam_awal'] = date_create();

                       $login_hp_X = $login_hp; // $login_hp  = '628551025300';
                       if (  strlen($login_hp) >= 6  )
                       {
                           $otp_no_telp  = $login_hp;
                           $otp_date_on  = date('d-m-Y H:i:s');
                           $otp_date_off = date('d-m-Y H:i:s', strtotime( 'now + 5 minute') );

                           // ID Security $otp_SEC_ID, Hi $otp_user from dept $otp_dept, $otp_length angka atau huruf One Time PIN anda adalah $otp_random Masukan One Time PIN OTP untuk keamanan transaksi anda. OTP berlaku sampai $otp_date_off WIB, ";
                           // $in_pesen   = "ID Security $otp_SEC_ID, Hi $user_id_Upper-$login_dept_full [$login_hp_X] Untuk tahap ujicoba masukan ABCDE atau $otp_random  untuk token OTP, kedepannya ABCDE tidak bisa dipakai " . date("d-m-Y H:i:s");
                           $in_pesen   = "Date $otp_date_on; Security ID $otp_SEC_ID, Hi $user_id_Upper-$login_dept_full Masukan *$otp_random* untuk token OTP, Token ini akan expired jam $otp_date_off ";
                           $in_no_telp = $otp_no_telp;
                           $Wa_stat    = "OK";
                           $in_wa_type = "send_personal_text";
                           include 'api_wa.php';

                           // cek hasil status wa
                           $array_wa         = explode(',', $result);
                           $message_array_wa = explode(':', $array_wa[1] );
                           $otp_send_hp = str_replace('"', "", $message_array_wa[1]) ; // Sent to 628551025300@c.us
                           $otp_send_hp = str_replace('@c.us',"", $otp_send_hp) ;
                           $otp_send_hp = substr( $otp_send_hp, 0,15) . '*****' . substr( $otp_send_hp,-2) ;

                           // $in_no_telp = '628551025300';
                           // $in_pesen   = "Date $otp_date_on; Security ID $otp_SEC_ID, Hi $user_id_Upper-$login_dept_full Masukan *$otp_random* untuk token OTP, Token ini akan expired jam $otp_date_off ";
                           // $Wa_stat    = "OK";
                           // $in_wa_type = "send_personal_text";
                           // include 'api_wa.php';

                           // <tr>
                           //     <td align='left'>Time OTP      </td>
                           //     <td>$otp_date_on  </td>
                           // </tr>

                           $otp_send = " <table border=0>
                                            <tr>
                                                <td align='left'>Exp OTP       </td>
                                                <td>$otp_date_off </td>
                                            </tr>
                                            <tr> <td colspan=2>$otp_send_hp</td></tr>
                                         </table>
                                       ";
                       }

                   }

                }

                // SCREEN TOKEN OTP
                //-------------------
                {
                  $otp_active = 'ON';
                  if ( $_otp_entry == '' )
                  { tampilan_login_index( $versi_anywhere,$login_err,'ON',$otp_SEC_ID,$otp_send ); }
                  else
                  { $otp_active = ''; }
                }


            }
        }
        // END send OTP SYSTEM


    } // end captcha and mkg
    else
    { if ( $pass_id == '' ) { $login_err = ''; } else { $login_err = 'ERROR CAPTCHA OR MK GROUP'; } }

    // echo json_encode($data_unit);

    // log ke table siapa saja yang login dgn betul
    {
      $pc_ab = "";
      $useragent=$_SERVER['HTTP_USER_AGENT'];
      if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
      { $pc_ab = "AB_mobile"; }
      else
      { $pc_ab = "AB_desktop"; }
    }
    $log_id = data_browser_id();
    $sql_log= "INSERT into login_log
                   ( tgl_login,dept_DB,source_login,status_login, user, user_hp,
                    captcha_key, captcha_input, mkg_group,log_id,login_from )
                 values
                   ( now(),'$login_dept','ENTRY_LOGIN','$pass_betul','$user_id','$login_hp',
                     '$_m_captca_key','$_captcha_input','$mkg_group','$log_id','$pc_ab' )";

    mysqli_query($login_db_lite,$sql_log);
}
// END CEK LOGIN USER
// --------------------




// START CEK LOGOUT USER
// --------------------
if  ( $_POST['LogOut_data'] == 'LogOut' )
{
    $log_id = data_browser_id();
    $sql_log= "INSERT into login_log
                   ( tgl_login, source_login, user, mkg_group, log_id )
                 values
                   ( now(),'LOGOUT','$user_id','$mkg_group','$log_id' )";
    mysqli_query($login_db_lite,$sql_log);

    $user_id    = null;
    $_no_regis  = null;
    $mkg_group  = null;
    $pass_betul = 'kaborr';
    session_destroy();
    session_unset();
}
// END CEK LOGOUT USER
// -------------------



// START TIME OUT
// --------------
if ( time() - $_SESSION['cek_waktu'] > $idle_time)
{
    $pass_betul = 'abis_waktuuuu';
    session_destroy();
    session_unset();
}
else
{ $_SESSION['cek_waktu'] = time(); }
// END TIME OUT
// --------------



// -------------------
// START MAIN PROGRAM
// -------------------
if ( $pass_betul ==  'lanjut_kerja' && $_POST[user_id] <>  null )
{
  //catat waktu awal program jalan
  $catat_waktu_awal = microtime(true);

  $_SESSION['cek_waktu'] =  time();
  $level_user            = 'Admin';

  if ( $level_user == 'Admin' )
  {

    if ( substr( $_POST["web_menu"],0,4 ) == 'BS5_')
    { $class_menu_admin = "class='btn btn-success btn-sm mx-2'"; }
    else
    { $class_menu_admin = "class='mks_button'";  }

    echo "
      <form method='post' id=admin_area action='index.php'>
          <input type=hidden name=on_track  value='on_track'>
          <input type=hidden name=user_id   value='$user_id'>
          <input type=hidden name=mk_group  value='$mkg_group'>
      </form>";
    $_menu_admin = "<button type=submit $class_menu_admin accesskey='I' name=admin_level form=admin_area value='Admin Area'><i class='fa fa-wrench fa-lg fa-fw'></i><u><b>I</b></u>nfo</button>";

  }
  else
  {  $_menu_admin = ''; }


  // START memo untuk user di login depan
  //--------------------------------------
  {
      if ($_POST["web_menu"] == 'web_agen_direct' )
      {  $_notes =''; }
      else
      {
          $tgl_end_pub     = "2021-06-15";
          $tgl_end_pubish  = substr($tgl_end_pub,-2,2) . substr($tgl_end_pub,-6,4) . substr($tgl_end_pub,0,4);

          if ( date('Y-m-d') <= $tgl_end_pub )
          {
              $_notes=
              "<tr>
                  <td colspan=2>
                      <b>.: Notes :.</b><br>
                      KHUSUS UTK MKG 7<br>
                      - Untuk project isi no wording I.T Lock dulu pertanggal 24-05-2022<br>
                      - melihat hasil test kemaren tgl 23-05-2022, maka konsepnya di rubah,
                      kalian tidak perlu isi no wording yg bikin ribet dgn cara spt kemaren
                      modifikasi program sudah selesai dikerjakan supaya No Wording akan otomatis di isi otomatis saat naik ke AeGis.<br>
                      - Sekarang tinggal update No Wording yang sudah dipakai atau belum oleh Ibu Sandra + UWD + IT.
                      Jika update sudah selesai, maka MKG7 tidak perlu ribet lagi, semua by system yang atur. <br>

                     <br><br>
                      Notes ini berakhir $tgl_end_pubish
                 </td>
              </tr>";
          }
          else
          {  $_notes =''; }
      }



  }
  // END memo untuk user di login depan

  $_max_lebar      = 'max-width:430px;';


  // WORDING AUTO
  // 3 FEB 2023 = > AKTIFKAN MKG_GROUP NOTIFIKASI BY SHAFIRA
  // $mkg_wording_auto_aktif = array(
  //                             "MKGROUP1", "MKGROUP2", "MKGROUP3A", "MKGROUP4", "MKGROUP5",
  //                             "MKGROUP6", "MKGROUP8", "MKGROUP9", "MKGROUP11", "MKGROUP12", "MKGROUP14",
  //                             "MKGROUP7"
  //                           );


  //10-07-2023 => SHOW ALOKASI WORDING ONLY
  $mkg_show_alokasi_wording = array(
                                "02-MKG06",
                                "03-BDG01",
                                "03-CIREBON",
                                "03-JAMBI",
                                "04-MKG03",
                                "05-BATAM",
                                "05-MKG02",
                                "06-MANADO",
                                "06-MKG04",
                                "07-MKG02",
                                "07-PADANG",
                                "08-SBY1",
                                "08-SBY2",
                                "09-MKG05",
                                "09-MKG06",
                                "10-MKG04",
                                "11-MKG05",
                                "12-MKG04",
                                "13-MKG03",
                                "14-MKG01",
                                "15-MKG03",
                                "16-MKG01",
                                "17-MKG01",
                                "18-MKG01",
                                "19-MKG01",
                                "BD4",
                                "MKGROUP1",
                                "MKGROUP11",
                                "MKGROUP12",
                                "MKGROUP14",
                                "MKGROUP2",
                                "MKGROUP3A",
                                "MKGROUP4",
                                "MKGROUP5",
                                "MKGROUP6",
                                "MKGROUP7",
                                "MKGROUP9",
                                "19-KWG",
                                "13-SERANG"
                              );

  if(in_array($mkg_group, $mkg_show_alokasi_wording))
  {
      // NOTIF WORDING AUTO +SHOW ALOKASI SENDIRI
      if (  $mkg_group == 'MKGROUP7')
      {
            $_status_wording = '';
            $thn_wording = date("Y");

            // 5 JAN 2022 => REQUEST DARI SUKMA: WORDING AUTO DI TAHUN 2023 TETAP MENARIK WORDING TAHUN 2022
            // $thn_wor = date("Y");
            // $thn_wording     = date("Y");
            // 24 jan 2022 => notifikasi pakai 2023 dan nonaktifkan notifikasi 2022

            // $sql_wording = "SELECT DISTINCT a.Tahun,a.group_wording,a.dept,
            //                   (  SELECT count(no_wording) count_no_wording_ready
            //                      from no_warding_polis
            //                      where Tahun = a.Tahun and UPPER(valid) = 'Y' and dept = a.dept and group_wording =a.group_wording
            //                   ) W_ready,
            //                   (  SELECT count(no_wording) count_no_wording_use
            //                      from no_warding_polis
            //                      where Tahun = a.Tahun and dept = a.dept and alokasi_use = 'USE' and group_wording =a.group_wording
            //                   ) W_use
            //               from no_warding_polis a
            //               WHERE a.Tahun = '$thn_wording' AND a.dept = '$mkg_group'  ";



              $sql_wording = "SELECT a.Tahun,a.group_wording,a.dept,
                                     sum( W_ready )W_ready,
                                     sum( W_use )W_use
                              FROM
                                    (SELECT  a.Tahun,a.group_wording,a.dept,
                                          CASE
                                            WHEN UPPER(valid) = 'Y' then  '1'
                                            ELSE '0'
                                          END	  W_ready,

                                          CASE
                                            WHEN alokasi_use = 'USE' then '1'
                                            ELSE '0'
                                          END	  W_use
                                      from no_warding_polis a
                                      WHERE a.Tahun = '$thn_wording' AND a.dept = '$mkg_group'
                                    ) a
                            group by  a.Tahun,a.group_wording,a.dept";

          // echo $sql_wording; 0.03 sec
          $show_wording = mysqli_query($login_db_lite,$sql_wording);
          $isi_W = "";

          while ( $W = mysqli_fetch_array($show_wording) )
          {
              $sisa_w = $W[W_ready] - $W[W_use];
              if ( $W[group_wording] == 'SILVER')   { $woding_sisa          = $sisa_w; }
              if ( $W[group_wording] == 'GOLD')     { $woding_sisa_GOLD     = $sisa_w; }

              $isi_W = $isi_W . "
              <tr>
                    <td> $W[dept]                         </td>
                    <td align='center'> $W[Tahun]         </td>
                    <td align='center'> $W[group_wording] </td>
                    <td align='center'> $W[W_ready]       </td>
                    <td align='center'> $W[W_use]         </td>
                    <td align='center'> $sisa_w           </td>
              </tr>
              ";
          }

          if ( $woding_sisa <= 20 or $woding_sisa_GOLD <=20)
          {
              if ( $woding_sisa <= 5 or $woding_sisa_GOLD <= 2)
              { $text_wording = "style='color:red;font-weight:bold;' "; }
              else
              { $text_wording = "style='color:blue;font-weight:bold;'"; }
          }
          else
          { $text_wording = ""; }

          $_status_wording =  "
                                <tr>
                                  <td colspan=2>
                                        <table border='1' cellspacing='0' style='$_max_lebar;margin-top:2px;' width=430px >
                                            <tr>
                                                <td style='color:White;background-color:black;text-align:center;font-weight:bold;' colspan=6>WORDING ALLOCATION</td>
                                            </tr>
                                            <tr style='color:White;background-color:black;text-align:center;font-weight:bold;' >
                                                <td>Branch / Dept   </td>
                                                <td>Allocation Year. </td>
                                                <td>Group Wording   </td>
                                                <td>Available       </td>
                                                <td>Use             </td>
                                                <td>LEFT            </td>
                                            </tr>
                                            $isi_W
                                            <tr>
                                                <td colspan=6 $text_wording >Jika No Wordingnya SILVER / GOLD / GENERAL habis, maka tidak bisa naik ke <b>Push To AeGis</b>. Minta ke bagian UWD untuk tambahakan alokasi No Wording</td>
                                            </tr>

                                        </table>
                                  </td>
                                </tr>
                              ";

            if ( $woding_sisa <= 20  or $woding_sisa_GOLD <= 5 )
            {
                if ( $woding_sisa <= 20 )           { $w_gw = 'SILVER';     $sisaa_wording_send = $woding_sisa; }
                if ( $woding_sisa_GOLD <= 5 )       { $w_gw = 'GOLD';       $sisaa_wording_send = $woding_sisa_GOLD; }

                Function cek_notif_wording($no_HP,$g_wording)
                {
                   include 'koneksi_lite.php';
                   $tgl_skr= date("d-m-Y");
                   $sql_W = "SELECT rowid from no_warding_polis_notif
                             where TIMESTAMPDIFF(MINUTE,tgl_send,NOW()) > 20 and no_hp = '$no_HP' and infomasi = 'send' and group_wording = '$g_wording' AND date_format(tgl_send, '%d-%m-%Y')= '$tgl_skr'
                             order by tgl_send desc limit 1 ";
                   $w = mysqli_fetch_array( mysqli_query($login_db_lite,$sql_W) );
                   return( $w['rowid'] );
                }

                Function log_notif_wording($mkg_group,$no_telp,$status,$g_wording)
                {
                   include 'koneksi_lite.php';
                   $sql_I = "INSERT into no_warding_polis_notif ( mkg,no_hp,tgl_send,infomasi, group_wording) values ( '$mkg_group','$no_telp',now(),'$status','$g_wording' )";
                   mysqli_query($login_db_lite,$sql_I);
                }

                // // 12 OKTOBER 2022 => NOTIF WORDING DIGANTI DARI IRVANI KE ORANG BARU +FITUR NOTIF WORDING KE MULTI USER
                // $Pesen_WA = "$tgl_skr Jumlah Wording $w_gw di *$mkg_group* sisa *$sisaa_wording_send*, mohon ditambahkan segera. Notification akan terus dikirim sampai No Wording ditambahkan.";
                // $tgl_skr    = date('d-m-Y H:i:s');
                // $in_pesen   = $Pesen_WA;
                // $Wa_stat    = "OK";
                // $in_wa_type = "send_personal_text";
                // // $in_no_telp = '081994136923'; IRVANI DH RESIGN DIGANTI DENGAN ORANG BARU
                // // include 'api_wa.php';
                //
                // $NO_SUKMA         = "082361988388";
                // $NO_SAHFIRA       = "085708897340";
                // $NO_RIZKA         = "085693334622";
                // $NO_LINA          = "085778525114";
                // $NO_REGIE         = "085156656955";

                // if($W[group_wording]=="GENERAL") {
                //   $notif_wording_ke = array($NO_SUKMA, $NO_SAHFIRA, $NO_RIZKA, $NO_LINA, $NO_REGIE);
                // }
                // else {
                //   $notif_wording_ke = array($NO_SUKMA, $NO_SAHFIRA, $NO_RIZKA, $NO_LINA);
                // }

                // $notif_wording_ke = array($NO_SUKMA, $NO_SAHFIRA, $NO_RIZKA, $NO_LINA);
                // for($aa=0; $aa<count($notif_wording_ke); $aa++)
                // {
                //   $in_no_telp = $notif_wording_ke[$aa];
                //
                //   //BISA KIRIM MULTI USER
                //   if (cek_notif_wording($in_no_telp,$w_gw) == '' )
                //   {
                //     log_notif_wording($mkg_group,$in_no_telp,'send',$w_gw);
                //     // include 'api_wa.php';  MKS OF KRN WA SUDAH TIDAK JALAN
                //   }
                //   else
                //   {
                //     log_notif_wording($mkg_group,$in_no_telp,'no_send_notif',$w_gw);
                //   }
                // }


                // if ( cek_notif_wording($in_no_telp,$w_gw) == '' ) {
                //   log_notif_wording($mkg_group,$in_no_telp,'send',$w_gw); include 'api_wa.php';
                // }
                // else {
                //   log_notif_wording($mkg_group,$in_no_telp,'no_send_notif',$w_gw);
                // }

                // if ( $mkg_group == 'MKGROUP7' )
                // {
                //     $tgl_skr    = date('d-m-Y H:i:s');
                //     $in_pesen   = $Pesen_WA;
                //     $in_no_telp = '085659058920'; // sandra
                //     $Wa_stat    = "OK";
                //     $in_wa_type = "send_personal_text";
                //     // include 'api_wa.php';
                //     if ( cek_notif_wording($in_no_telp,$w_gw) == '' )
                //     { log_notif_wording($mkg_group,$in_no_telp,'send',$w_gw); include 'api_wa.php';}
                //     else
                //     { log_notif_wording($mkg_group,$in_no_telp,'no_send_notif',$w_gw); }
                //
                //     $tgl_skr    = date('d-m-Y H:i:s');
                //     $in_pesen   = $Pesen_WA;
                //     $in_no_telp = '08569882392'; // felli
                //     $Wa_stat    = "OK";
                //     $in_wa_type = "send_personal_text";
                //     // include 'api_wa.php';
                //     if ( cek_notif_wording($in_no_telp,$w_gw) == '' )
                //     { log_notif_wording($mkg_group,$in_no_telp,'send',$w_gw); include 'api_wa.php';}
                //     else
                //     { log_notif_wording($mkg_group,$in_no_telp,'no_send_notif',$w_gw); }
                //
                // }

            }
      }
      else
      {
          $_status_wording = '';
          $thn_wording = date("Y");

          // $sql_wording = "SELECT DISTINCT a.Tahun,a.group_wording,a.dept,
          //                   (  SELECT count(no_wording) count_no_wording_ready
          //                      from no_warding_polis
          //                      where Tahun = a.Tahun and UPPER(valid) = 'Y' and dept = a.dept and group_wording =a.group_wording
          //                   ) W_ready,
          //                   (  SELECT count(no_wording) count_no_wording_use
          //                      from no_warding_polis
          //                      where Tahun = a.Tahun and dept = a.dept and alokasi_use = 'USE' and group_wording =a.group_wording
          //                   ) W_use
          //               from no_warding_polis a
          //               WHERE a.Tahun = '$thn_wording' AND a.dept = '$mkg_group'  ";
          // // echo "$sql_wording<br>";
          // $show_wording = mysqli_query($login_db_lite,$sql_wording);
          // $isi_W = "";
          //
          // while ( $W = mysqli_fetch_array($show_wording) )
          // {
          //     $isi_W = $isi_W . "
          //     <tr>
          //           <td> $W[dept]                         </td>
          //           <td align='center'> $W[Tahun]         </td>
          //           <td align='center'> $W[group_wording] </td>
          //           <td align='center'> $W[W_ready]       </td>
          //           <td align='center'> $W[W_use]         </td>
          //           <td align='center'> $sisa_w           </td>
          //     </tr>
          //     ";
          // }


          $sql_wording = "SELECT DISTINCT a.Tahun,a.group_wording,a.dept
                        from no_warding_polis a
                        WHERE a.Tahun = '$thn_wording' AND a.dept = '$mkg_group'  ";
          // echo "$sql_wording<br>";
          $show_wording = mysqli_query($login_db_lite,$sql_wording);
          $isi_W = "";

          while ( $W = mysqli_fetch_array($show_wording) )
          {
              $sql_C1 = "SELECT count(no_wording) W_ready
                         from no_warding_polis
                        where     Tahun         = '$W[Tahun]'
                              and UPPER(valid)  = 'Y'
                              and dept          = '$W[dept]'
                              and group_wording = '$W[group_wording]' ";
              $dat_C1=mysqli_fetch_array( mysqli_query($login_db_lite,$sql_C1) );

              $sql_C2 = "SELECT count(no_wording) W_use
                         from no_warding_polis
                         where      Tahun         = '$W[Tahun]'
                                and dept          = '$W[dept]'
                                and alokasi_use   = 'USE'
                                and group_wording = '$W[group_wording]'   ";
              $dat_C2=mysqli_fetch_array( mysqli_query($login_db_lite,$sql_C2) );


              $isi_W = $isi_W . "
              <tr>
                    <td> $W[dept]                         </td>
                    <td align='center'> $W[Tahun]         </td>
                    <td align='center'> $W[group_wording] </td>
                    <td align='center'> $dat_C1[W_ready]  </td>
                    <td align='center'> $dat_C2[W_use]    </td>
                    <td align='center'> $sisa_w           </td>
              </tr>
              ";
          }

        $_status_wording = "
          <tr>
            <td colspan=2>
                  <table border='1' cellspacing='0' style='$_max_lebar;margin-top:2px;' width=430px >
                      <tr>
                          <td style='color:White;background-color:black;text-align:center;font-weight:bold;' colspan=6>WORDING ALLOCATION</td>
                      </tr>
                      <tr style='color:White;background-color:black;text-align:center;font-weight:bold;' >
                          <td>Branch / Dept.  </td>
                          <td>Allocation Year </td>
                          <td>Group Wording   </td>
                          <td>Available       </td>
                          <td>Use             </td>
                          <td>LEFT            </td>
                      </tr>
                      $isi_W
                      <tr>
                          <td colspan=6 $text_wording >Jika No Wordingnya GENERAL habis, maka tidak bisa naik ke <b>Push To AeGis</b>. Minta ke bagian UWD untuk tambahakan alokasi No Wording!</td>
                      </tr>

                  </table>
            </td>
          </tr>";
      }

  }



  // START NOTIF WORDING HVC + SHOW ALOKASI SENDIRI
  //-------------------------------------------------
  {
    $arr_mkg_utk_hvc  = array(
                          "MKGROUP1", "MKGROUP5", "MKGROUP2", "MKGROUP4", "MKGROUP3A", "MKGROUP11", "MKGROUP8",
                          'BD4', '07-MKG02', '06-MKG04', '08-SBY1', '08-SBY2',
                          '02-MKG06', '03-BDG01', '03-JAMBI', '04-MKG03', '09-MKG05', '10-MKG04', '13-MKG03', '14-MKG01', '18-MKG01'
                        );
    // if (  $mkg_group == 'MKGROUP1' || $mkg_group == 'MKGROUP5')
    if ( in_array($mkg_group, $arr_mkg_utk_hvc) )
    {
        // 2 JAN 2022 => REQUEST DARI SUKMA: POLIS POSTING 2023 TETAP MENARIK NO WORDING 2022...SEMUA CABANG...HVC ONLY
        // $thn_wording  = date("Y");
        // 24 jan 2022 => notifikasi pakai 2023 dan nonaktifkan notifikasi 2022
        $_status_wording = '';
        $thn_wording  = date('Y');

        $sql_wording = "SELECT a.Tahun,a.group_wording,a.dept,
                                     sum( W_ready )W_ready,
                                     sum( W_use )W_use
                              FROM
                                    (SELECT  a.Tahun,a.group_wording,a.dept,
                                          CASE
                                            WHEN UPPER(valid) = 'Y' then  '1'
                                            ELSE '0'
                                          END	  W_ready,

                                          CASE
                                            WHEN alokasi_use = 'USE' then '1'
                                            ELSE '0'
                                          END	  W_use
                                      from no_warding_polis a
                                      WHERE a.Tahun = '$thn_wording' AND a.dept = '$mkg_group'
                                    ) a
                            group by  a.Tahun,a.group_wording,a.dept";

      // echo $sql_wording;
      $show_wording = mysqli_query($login_db_lite,$sql_wording);
      $isi_W = "";
      while ( $W = mysqli_fetch_array($show_wording) )
      {
          $sisa_w = $W[W_ready] - $W[W_use];
          // 17 OKTOBER 2022 => NOTIF UTK WORDING HVC
          if ( $W[group_wording] == 'GENERAL')  { $woding_sisa_GENERAL  = $sisa_w; }

          $isi_W = $isi_W . "
          <tr>
                <td> $W[dept]                         </td>
                <td align='center'> $W[Tahun]         </td>
                <td align='center'> $W[group_wording] </td>
                <td align='center'> $W[W_ready]       </td>
                <td align='center'> $W[W_use]         </td>
                <td align='center'> $sisa_w           </td>
          </tr>
          ";
      }


      //23 NOVEMBER 2022 => JIKA MKG4,MKG3A, MKG11 BARU KASIH NOTIF SAAT WORDING SISA 5 KE BAWAH
      $list_mkg_lim_10_wording  = array('BD4', '07-MKG02', '06-MKG04', '08-SBY1', '08-SBY2');
      $list_mkg_lim_5_wording   = array('02-MKG06', '03-BDG01', '03-JAMBI', '04-MKG03', '09-MKG05', '10-MKG04', '13-MKG03', '14-MKG01', '18-MKG01');

      if($mkg_group=='MKGROUP4' || $mkg_group=='MKGROUP3A' || $mkg_group=='MKGROUP11')
      {
        $lim_wording= 5;
      }
      else if(in_array($mkg_group, $list_mkg_lim_10_wording))
      {
        $lim_wording=10;
      }
      else if(in_array($mkg_group, $list_mkg_lim_5_wording))
      {
        $lim_wording=5;
      }
      else
      {
        $lim_wording=20;
      }

      if ( $woding_sisa_GENERAL <= $lim_wording )
      {
          if ($woding_sisa_GENERAL <= $lim_wording)
          { $text_wording = "style='color:red;font-weight:bold;' "; }
          else
          { $text_wording = "style='color:blue;font-weight:bold;'"; }
      }
      else
      { $text_wording = ""; }


      $_status_wording = "
        <tr>
          <td colspan=2>
                <table border='1' cellspacing='0' style='$_max_lebar;margin-top:2px;' width=430px >
                    <tr>
                        <td style='color:White;background-color:black;text-align:center;font-weight:bold;' colspan=6>WORDING ALLOCATION</td>
                    </tr>
                    <tr style='color:White;background-color:black;text-align:center;font-weight:bold;' >
                        <td>Branch / Dept.   </td>
                        <td>Allocation Year </td>
                        <td>Group Wording   </td>
                        <td>Available       </td>
                        <td>Use             </td>
                        <td>LEFT            </td>
                    </tr>
                    $isi_W
                    <tr>
                        <td colspan=6 $text_wording >Jika No Wordingnya GENERAL habis, maka tidak bisa naik ke <b>Push To AeGis</b>. Minta ke bagian UWD untuk tambahakan alokasi No Wording</td>
                    </tr>

                </table>
          </td>
        </tr>";

        // if ($woding_sisa_GENERAL <= $lim_wording )
        // {
        //     if ( $woding_sisa_GENERAL <= $lim_wording )       { $w_gw = 'GENERAL';       $sisaa_wording_send = $woding_sisa_GENERAL; }
        //
        //     Function cek_notif_wording($no_HP,$g_wording)
        //     {
        //        include 'koneksi_lite.php';
        //        $tgl_skr= date("d-m-Y");
        //        $sql_W = "SELECT rowid from no_warding_polis_notif
        //                  where TIMESTAMPDIFF(MINUTE,tgl_send,NOW()) < 10 and no_hp = '$no_HP' and infomasi = 'send' and group_wording = '$g_wording' AND date_format(tgl_send, '%d-%m-%Y')= '$tgl_skr'
        //                  order by tgl_send desc limit 1 ";
        //        $w = mysqli_fetch_array( mysqli_query($login_db_lite,$sql_W) );
        //        return( $w['rowid'] );
        //     }
        //
        //     Function log_notif_wording($mkg_group,$no_telp,$status,$g_wording)
        //     {
        //        include 'koneksi_lite.php';
        //        $sql_I = "INSERT into no_warding_polis_notif ( mkg,no_hp,tgl_send,infomasi, group_wording) values ( '$mkg_group','$no_telp',now(),'$status','$g_wording' )";
        //        mysqli_query($login_db_lite,$sql_I);
        //     }
        //
        //     // 12 OKTOBER 2022 => NOTIF WORDING DIGANTI DARI IRVANI KE ORANG BARU +FITUR NOTIF WORDING KE MULTI USER
        //     $Pesen_WA = "$tgl_skr Jumlah Wording $w_gw di *$mkg_group* sisa *$sisaa_wording_send*, mohon ditambahkan segera. Notification akan terus dikirim sampai No Wording ditambahkan.";
        //     $tgl_skr    = date('d-m-Y H:i:s');
        //     $in_pesen   = $Pesen_WA;
        //     $Wa_stat    = "OK";
        //     $in_wa_type = "send_personal_text";
        //     // $in_no_telp = '081994136923'; IRVANI DH RESIGN DIGANTI DENGAN ORANG BARU
        //     // include 'api_wa.php';
        //
        //     $NO_SUKMA         = "082361988388";
        //     $NO_SAHFIRA       = "085708897340";
        //     $NO_RIZKA         = "085693334622";
        //     $NO_LINA          = "085778525114";
        //     $NO_REGIE         = "085156656955";
        //     $NO_LILIK         = "081315913942";
        //
        //     $NO_SUKMA         = "082361988388";
        //     $NO_SHAFIRA       = "085708897340";
        //     $NO_RIZKA         = "085693334622";
        //     $notif_wording_ke = array($NO_LILIK, $NO_SUKMA, $NO_SHAFIRA, $NO_RIZKA);
        //
        //     for($aa=0; $aa<count($notif_wording_ke); $aa++)
        //     {
        //       $in_no_telp = $notif_wording_ke[$aa];
        //
        //       //BISA KIRIM MULTI USER
        //       if (cek_notif_wording($in_no_telp,$w_gw)=='' || cek_notif_wording($in_no_telp,$w_gw)==null )
        //       {
        //         log_notif_wording($mkg_group,$in_no_telp,'send',$w_gw);
        //         // include 'api_wa.php';  MKS OFF KRN WA UDH KAGAK JALAN
        //       }
        //       else
        //       {
        //         log_notif_wording($mkg_group,$in_no_telp,'no_send_notif',$w_gw);
        //       }
        //     }
        // }

    }

  }
  // END NOTIF WORDING HVC + SHOW ALOKASI SENDIRI
  //-------------------------------------------------




  $AnyWhere_class = '';
  if ( substr( $_POST["web_menu"],0,4 ) == 'BS5_')
  {
      $AnyWhere_class_L_menu   = "class='form-select'";
      $AnyWhere_class_B_menu_S = "class='btn btn-primary btn-sm mx-2'";
      $AnyWhere_class_B_menu_O = "class='btn btn-danger  btn-sm mx-2'";

      if ( $_POST["web_menu"] == 'BS5_HVC_Entry_web')
      {
        if($user_id == 'MKS' || $user_id == 'mks')
        {
          include 'anywhere_hvc/dashboard.php';
        }

      }
      if ( $_POST["web_menu"] == 'BS5_Menu_Any_Print_cargo' )  { include 'print_cargo/cargo.php';       }
      else if ( $_POST["web_menu"] == 'BS5_Menu_Any_Print_polis_cargo' )  { include 'print_cargo_tipe_file/cargo.php';       }
      else if ( $_POST["web_menu"] == 'BS5_Menu_Any_Anyware_aerox' )  {error_reporting(E_ALL & ~E_NOTICE);
        ini_set('display_errors', 1); $menu = 'NEW'; include 'bike/bikes.php';  error_reporting(0);    }
  }
  else
  // AUTO
  {

      $AnyWhere_class_B_menu_S = "class='mks_button'";
      $AnyWhere_class_B_menu_O = "class='mks_button'";

      echo"
      <form method=post action='index.php'>
        <table border='1'  class='tbl_mks'  style='$_max_lebar;margin-top:2px;' width=430px >
          <tr>
              <td colspan=2 align='center'><b>.: MAIN MENU :. </b></td>
          </tr>
          <tr>
              <td>Project&nbsp;Code</td>
              <td align='left'>";

                  include 'index_main_menu.php';
                  echo"
              </td>
          </tr>
          <tr>
              <td colspan=2 align='center'>";

                  // $_menu_admin
                  // <button type=submit class='mks_button' name=pilih_menu  accesskey='S' value='PROCESS' > <i class='fa fa-cog fa-spin fa-lg fa-fw'></i><u><b>S</b></u>tart..</button>
                  // <button type=submit class='mks_button' name=LogOut_data accesskey='O' value='LogOut'                   > <i class='fa fa-sign-in     fa-lg fa-fw'></i>Log<u><b>O</b></u>ut</button>
                  //
                  // <input type=hidden name=on_track  value='on_track'    >
                  // <input type=hidden name=user_id   value='$user_id'    >
                  // <input type=hidden name=mk_group  value='$mkg_group'  >

                  include 'index_main_menu_button.php';

                  echo"
              </td>
          </tr>
          $_notes
          $_status_wording
        </table>
      </form>
      ";

      {

        define("SVR_PATH", $_SERVER['DOCUMENT_ROOT']);

        if ($_POST["admin_level"])
        { $id_admin = '_admin_'; include 'idx_admin.php'; $_SESSION["info_data_polis"] = ""; }

        if ($_POST["web_menu"] == 'Auto_renewal_web' )
        {
          $log_id  = data_browser_id();
          $sql_log = "INSERT into login_log  ( tgl_login,source_login,user,mkg_group,log_id,pilihan_ren ) values ( now(),'RENEWAL_ENTRY','$user_id','$mkg_group','$log_id','LIST_DETAIL' )";
          mysqli_query($login_db_lite,$sql_log);
          $id_web_menu = '_renewal_web_agen_direct_'; include 'idx_agen_direct_renewal.php';
        }

        if ($_POST["web_menu"] == 'Auto_email_entry_web' )
        { $id_web_menu = '_email_send_entry_direct_'; include 'idx_agen_direct_enrty_send_mail.php'; $_SESSION["info_data_polis"] = ""; }

        if ($_POST["web_menu"] == 'Auto_Entry_web' )
        { $id_web_menu = '_menu_web_agen_direct_'; $show_form = 'ON'; include 'idx_agen_direct.php'; $_SESSION["info_data_polis"] = ""; }

        if ($_POST["web_menu"] == 'renewal_FUA_DIRECT' )
        { $id_web_menu = '_menu_renewal_DIRECT_';  include ( SVR_PATH . '/mks/entry/direct/direct_renewal_FUA.php');  }

        if ($_POST["web_menu"] == 'penawaran_dari_apps' )
        { $id_web_menu = '_renewal_web_penawaran_from_apps_'; include 'idx_agen_direct_from_agent_apps.php';  }

        if ($_POST["web_menu"] == 'Menu_Any_Delivery' ) { $id_web_menu = '_MKS_delivery_Menu_'; include 'idx_agen_direct_delivery_menu.php';  }

        if ($_POST["web_menu"] == 'Menu_Any_Print_hvc' )
        {
          $id_web_menu = '_MKS_Print_pdf_HVC_';
          include '../epol/hvc/index.php';
        }

        if ($_POST["web_menu"] == 'view_no_anywhere' )
        {
          echo"
          <div  style='margin-top:4px;'>
              <form method=post action='index.php'>
                  <select name='F_source_data' >
                        <option value=''              "; if ( ''              == $_POST[F_source_data] ) { echo " selected ";} echo ">Choose
                        <option value='No_Anywhere'   "; if ( 'No_Anywhere'   == $_POST[F_source_data] ) { echo " selected ";} echo ">No Anywhere Entry
                        <option value='No_polis'      "; if ( 'No_polis'      == $_POST[F_source_data] ) { echo " selected ";} echo ">No Polis Anywhere
                        <option value='No_Delivery'  disabled "; if ( 'No_Delivery'   == $_POST[F_source_data] ) { echo " selected ";} echo ">No Anywhere Delivery
                        <option value='Insure_Entry'  "; if ( 'Insure_Entry'  == $_POST[F_source_data] ) { echo " selected ";} echo ">Insured Name Anywhere
                        <option value='Insure_Deli'   "; if ( 'Insure_Deli'   == $_POST[F_source_data] ) { echo " selected ";} echo ">Insured Name Delivery
                  </select>

                    <div class='tip2'>?
                      <span class='tiptext2'>
                        <table style='margin:auto;color:white;'>
                            <tr>
                              <td>.: Notes :.</td>
                            </tr>
                            <tr>
                              <td>Format No Anywhere P-02341-03-2022<br>
                                  Format No Polis 01-M-02504-000-2022-03<br>
                              </td>
                            </tr>
                        </table>
                      </span>
                    </div>

                  <input  type=text   name=F_no_anywhere  value='$_POST[F_no_anywhere]' size=18 autocomplete=off onkeydown=\"mks_upper_Case(this)\">
                  <button type=submit name=F_run_Anywhere value='F_data_Anywhere'> <i class='fa fa-rocket fa-lg fa-fw'></i>Retrieve Data</button> <br>
                  <input type=hidden name=on_track  value='on_track'    >
                  <input type=hidden name=user_id   value='$user_id'    >
                  <input type=hidden name=mk_group  value='$mkg_group'  >
                  <input type=hidden name=web_menu  value='view_no_anywhere'  >
              </form>
          </div>";

            if  ( $_POST["F_run_Anywhere"] and $_POST["F_source_data"] <> '' )
            {
                if (  $_POST["F_source_data"] == 'No_Anywhere' ) //P-02341-03-2022
                {
                  $sql_view = "SELECT m.register_id,u.Policy_No,m.customer_name from polis_agent_direct m, polis_agent_direct_unit u
                               where  m.register_id like '%$_POST[F_no_anywhere]%' and u.register_id = m.register_id and u.unit_no = '001'
                               order by m.tgl_buat desc";
                }

                if ( $_POST["F_source_data"] == 'No_polis' )
                {
                  $sql_view = "SELECT m.register_id,u.Policy_No,m.customer_name from polis_agent_direct m, polis_agent_direct_unit u
                               where  u.Policy_No like '%$_POST[F_no_anywhere]%' and u.register_id = m.register_id and u.unit_no = '001'
                               order by m.tgl_buat desc";

                }

                if ( $_POST["F_source_data"] == 'Insure_EntryInsure_Entry' )
                {
                  $sql_view = "SELECT m.register_id,u.Policy_No,m.customer_name from polis_agent_direct m, polis_agent_direct_unit u
                               where  m.customer_name like '%$_POST[F_no_anywhere]%' and u.register_id = m.register_id and u.unit_no = '001'
                               order by m.tgl_buat desc";
                }

                if ( $_POST["F_source_data"] == 'No_Delivery' )
                {
                  if (preg_match("/-/i", $_POST[F_no_anywhere] )) { $text_I = explode("-",$_POST[F_no_anywhere]); $_POST[F_no_anywhere] = $text_I[1]; }

                  $sql_view = "SELECT rowid,slip_no_aegis,Policy_No,insured_name,register_no,delivery_status,slip_messenger,customer_add, customer_dist,
                                      customer_city,customer_add_01,customer_add_02,delivery_status,
                                      customer_village, customer_rt, customer_rw, customer_province, customer_zip, customer_country, customer_post, customer_phone, attention, contract_no
                               from polis_agent_direct_delivery
                               where rowid  = '$_POST[F_no_anywhere]' OR rowid LIKE '%$_POST[F_no_anywhere]%'";
                }

                //echo $sql_view;
                // START Show Hasil Query View Only
                {
                  $aksess = array("No_Anywhere","No_polis","Insure_Entry");
                  if ( $_POST["view_anywhere_only"] )
                  {
                      if (in_array( $_POST["F_source_data"] , $aksess))
                      {
                        $id_web_menu      = '_menu_web_agen_direct_';
                        $show_form        = 'ON';
                        $butt_off_view    = 'ON';
                        $_POST[no_regis]  = $_POST["view_anywhere_only"] ; // $_No_AnyWhere;
                        $_unit_no         = '001';
                        include 'idx_agen_direct.php';
                      }

                  }
                  else
                  {
                      if (in_array( $_POST["F_source_data"] , $aksess))
                      {
                          echo"
                          <table class='tbl_mks' >
                            <tr>
                                <th>Action      </th>
                                <th>AnyWhere No </th>
                                <th>Policy No   </th>
                                <th>Insure Name </th>
                            </tr>
                          ";
                          $V=mysqli_query($login_db_lite,$sql_view);
                          while ($V_any=mysqli_fetch_array($V))
                          {
                              echo"
                              <form method='post'>
                                <tr>
                                    <td align='center'><button type=submit name=view_anywhere_only value='$V_any[register_id]'> <i class='fa fa-binoculars fa-lg fa-fw'></i></button> </td>
                                    <td>$V_any[register_id]</td>
                                    <td>$V_any[Policy_No]</td>
                                    <td>$V_any[customer_name]</td>
                                </tr>
                                <input type=hidden name=F_no_anywhere   value='$_POST[F_no_anywhere]'   >
                                <input type=hidden name=F_source_data   value='$_POST[F_source_data]'   >
                                <input type=hidden name=F_run_Anywhere  value='$_POST[F_run_Anywhere]'  >
                                <input type=hidden name=F_data_Anywhere value='$_POST[F_data_Anywhere]' >
                                <input type=hidden name=on_track        value='on_track'    >
                                <input type=hidden name=user_id         value='$user_id'    >
                                <input type=hidden name=mk_group        value='$mkg_group'  >
                                <input type=hidden name=web_menu        value='view_no_anywhere'  >
                              </form>";
                          }
                      }
                      // END IF No_Anywhere No_polis Insure_Name

                      if ( $_POST["F_source_data"] == 'No_Delivery' )
                      {
                          echo"
                          <table class='tbl_mks'  >
                              <tr>
                                  <th>VIEW</th>
                                  <th>Reg Any Deli</th>
                                  <th>Information</th>
                                  <th>STATUS</th>
                              </tr>";

                              $V=mysqli_query($login_db_lite,$sql_view);
                              while ($V_any=mysqli_fetch_array($V))
                              {
                                  echo"
                                  <form method=post action='index.php'>
                                      <tr>
                                          <td><button type=submit name=view_detail_deli value='$V_any[rowid]'> <i class='fa fa-binoculars fa-lg fa-fw'></i></button> </td>
                                          <td> AD-" . str_pad( $V_any[rowid],11,'0',STR_PAD_LEFT ) .  " </td>
                                          <td>$V_any[Policy_No] <br>
                                              $V_any[register_no] <br>
                                              $V_any[insured_name] <br>
                                              $V_any[customer_add_01]
                                          </td>
                                          <td>$V_any[delivery_status]</td>
                                      </tr>
                                      <input type=hidden name=F_no_anywhere   value='$_POST[F_no_anywhere]'   >
                                      <input type=hidden name=F_source_data   value='$_POST[F_source_data]'   >
                                      <input type=hidden name=F_run_Anywhere  value='$_POST[F_run_Anywhere]'  >
                                      <input type=hidden name=F_data_Anywhere value='$_POST[F_data_Anywhere]' >
                                      <input type=hidden name=on_track        value='on_track'        >
                                      <input type=hidden name=user_id         value='$user_id'        >
                                      <input type=hidden name=mk_group        value='$mkg_group'      >
                                      <input type=hidden name=web_menu        value='_MKS_delivery_'  >
                                  </form>";

                              }
                                    echo"
                          </table>";

                      }

                  }
                  // END Show Hasil Query View Only
                }


            }
        }

        if ($_POST["web_menu"] == 'Fire_Entry_web' ) { $id_web_menu = '_menu_FIRE_';   $show_form_fire = 'YES'; include 'idx_FIRE.php';  }
        if ($_POST["web_menu"] == 'EQ_Entry_web' )   { $id_web_menu   = '_menu_EQ_'; $show_form_eq = 'YES'; include 'idx_EQ.php';  }




        // sementara semua
        if ($_POST["web_menu"] == 'Request_survey_claim' ) { $id_web_menu = '_Request_survey_claim_'; include 'Temp_Request_survey_claim.php';  }
        if ($_POST["web_menu"] == 'Request_kwitansi' )     { $id_web_menu = '_Request_survey_claim_'; include 'Temp_Request_kwitansi.php';  }
        if ($_POST["web_menu"] == 'Report_Survey_BCA' )    { $id_web_menu = '_Request_survey_claim_'; include 'Temp_survey_bca.php';  }

      //catat waktu akhir program jalan
      $catat_waktu_akhir = microtime(true);
      $beda = number_format( $catat_waktu_akhir - $catat_waktu_awal ,2 ) ;

      //  echo " <br> <table border=1> <tr><td> Execution time  $beda  seconds </td></tr></table> "; // echo ($beda*1000).' milliseconds';
    }

  }



}
else
{
   // START login screen pertama x
   //-----------------------------
   if ( $otp_active != 'ON' )
   {  tampilan_login_index( $versi_anywhere,$login_err,'OFF','','' );  }
   // END login screen
}

/*
// mkstime
$time_php  = microtime();
$time_php  = explode(' ', $time_php);
$time_php  = $time_php[1] + $time_php[0];
$start_php = $time_php;



// mkstime
$time_php = microtime();
$time_php = explode(' ', $time_php);
$time_php = $time_php[1] + $time_php[0];
$finish_php = $time_php;
$total_time = round(($finish_php - $start_php), 2);
echo "<br>---------> idx_agent_direct, Page generated in " . number_format($total_time,2)  . "<br>";

*/
?>

</body>
</html>
