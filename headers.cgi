#!/usr/bin/perl

print "Content-type: text\/plain\n\n";
 
use strict;
use warnings;
use CGI;

my $q = CGI->new;
my %headers = map { $_ => $q->http($_) } $q->http();

print $q->header('text/plain');
print "Got the following headers:\n";
for my $header ( keys %headers ) {
    print "$header: $headers{$header}\n";
}

