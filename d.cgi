#!/usr/bin/perl

print "Content-type: text\/plain\n\n";

open(FILE, "doog.txt");
my @F = <FILE>;
close(FILE);
foreach(@F){
#	my $1, $2, $3;
	if($_ =~ /([\w\s\d\.\-]*?)\s([\.\d]*\s?)(oz|L)\s(.*)/){
		#print "\t$_";
		print "$1|$4|$2$3\n";
		
	}
	#elsif($_ =~ /([\.\d]*)\s?(oz|L)\s(.*)/  ){
	#	print "-$4|$2$3\n";

	#}
	else{
		print "$_";
	}

}


