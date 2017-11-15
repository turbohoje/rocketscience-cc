#!/usr/bin/perl

print "Content-type : text/html\n\n";
$cmd = 'find -L pls -name "*.mp3" -exec /usr/bin/mp3info -p "%S" {} \; -print';
$content = `$cmd`;
#print $content;
@data = split(/\n/,$content);


$total = 0;
foreach(@data){
	m/(\d+)/;	

	$total += $1;
}
print "total play time: ".($total/3600);
