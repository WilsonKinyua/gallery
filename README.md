
# GUIDE ON INSTALLATION OF PHP ON YOUR SYSTEM
Installation of php on Unix systems ¶
Table of Contents ¶
Apache 1.3.x on Unix systems
Apache 2.x on Unix systems
Nginx 1.4.x on Unix systems
Lighttpd 1.4 on Unix systems
Sun, iPlanet and Netscape servers on Sun Solaris
LiteSpeed Web Server/OpenLiteSpeed Web Server on Unix systems
CGI and command line setups
HP-UX specific installation notes
OpenBSD installation notes
Solaris specific installation tips
Debian GNU/Linux installation notes
This section will guide you through the general configuration and installation of PHP on Unix systems. Be sure to investigate any sections specific to your platform or web server before you begin the process.

As our manual outlines in the General Installation Considerations section, we are mainly dealing with web centric setups of PHP in this section, although we will cover setting up PHP for command line usage as well.

There are several ways to install PHP for the Unix platform, either with a compile and configure process, or through various pre-packaged methods. This documentation is mainly focused around the process of compiling and configuring PHP. Many Unix like systems have some sort of package installation system. This can assist in setting up a standard configuration, but if you need to have a different set of features (such as a secure server, or a different database driver), you may need to build PHP and/or your web server. If you are unfamiliar with building and compiling your own software, it is worth checking to see whether somebody has already built a packaged version of PHP with the features you need.

Prerequisite knowledge and software for compiling:

Basic Unix skills (being able to operate "make" and a C compiler)
An ANSI C compiler
A web server
Any module specific components (such as GD, PDF libs, etc.)
When building directly from Git sources or after custom modifications you might also need:

autoconf: 2.13+ (for PHP < 5.4.0), 2.59+ (for PHP >= 5.4.0), 2.64+ (for PHP >= 7.2.0)
automake: 1.4+
libtool: 1.4.x+ (except 1.4.2)
re2c: Version 0.13.4 or newer
flex: Version 2.5.4 (for PHP <= 5.2)
bison:
PHP 5.4: 1.28, 1.35, 1.75, 1.875, 2.0, 2.1, 2.2, 2.3, 2.4, 2.4.1, 2.4.2, 2.4.3, 2.5, 2.5.1, 2.6, 2.6.1, 2.6.2, 2.6.4
PHP 5.5: 2.4, 2.4.1, 2.4.2, 2.4.3, 2.5, 2.5.1, 2.6, 2.6.1, 2.6.2, 2.6.3, 2.6.4, 2.6.5, 2.7
PHP 5.6: >= 2.4, < 3.0
PHP 7.0 - 7.3: 2.4 or later (including Bison 3.x)
PHP 7.4: > 3.0
The initial PHP setup and configuration process is controlled by the use of the command line options of the configure script. You could get a list of all available options along with short explanations running ./configure --help. Our manual documents the different options separately. You will find the core options in the appendix, while the different extension specific options are described on the reference pages.

When PHP is configured, you are ready to build the module and/or executables. The command make should take care of this. If it fails and you can't figure out why, see the Problems section.

# wilsonkinyuam@gmail.com
# copyright @ 2020# copyright @wilson 2020 