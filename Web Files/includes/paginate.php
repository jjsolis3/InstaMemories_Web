<?php

function paginate($reload, $page, $tpages) {
    $adjacents	= 3;
    $prevlabel	= "&lsaquo; Prev";
    $nextlabel	= "Next &rsaquo;";
	$lastlabel	= "Last";
	$firstlabel	= "First";
    $out = "";
		
	$fpage=1;
    
	$pmin=($page>$adjacents)?($page - $adjacents):1;

	$pmax=($page<($tpages - $adjacents))?($page + $adjacents):$tpages;
	
	// first
	if ($page == 1) {
		$out.= "";
	} elseif($page > $fpage) {
		$out.= "<li><a href=\"" . $reload."&amp;page=".$fpage."\">".$firstlabel."</a>\n</li>";
	}
    
	// previous
    if ($page == 1) {
        $out.= "";
    } elseif ($page > 1) {
        $out.="<li><a href=\"".$reload."&amp;page=".($page - 1)."\">".$prevlabel."</a>\n</li>";
    } else {
		$out.="".$prevlabel."";
    }
	
	// paginate pages
	for ($i = $fpage; $i <= $tpages; $i++) {
        if ($i == $page) {
            $out.= "<li class=\"selected\"><a href=\"".$reload."&amp;page=".$i."\">Page ".$i."</a></li>\n";
        } else {
            $out.= "<li><a href=\"".$reload. "&amp;page=".$i."\">Page ".$i. "</a>\n</li>";
        }
    }

	// next
    if ($page < $tpages) {
        $out.= "<li><a href=\"".$reload."&amp;page=".($page + 1)."\">".$nextlabel."</a>\n</li>";
    } elseif ($page == $tpages) {
		$out.= "";
	} else {
        $out.= "".$nextlabel."";
    }
	
	// last
	if ($page < $tpages) {
        $out.= "<li><a href=\"" . $reload."&amp;page=".$tpages."\">".$lastlabel."</a>\n</li>";
    } elseif ($page == $tpages) {
		$out.= "";
	} 
	
    $out.= "";
    return $out;
}