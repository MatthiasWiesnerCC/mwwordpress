# Debugging and profiling PHP apps on cloudControl with XDebug and NetBeans

Debugging software is not really a fun job for developers.

The most commonly used debugger for PHP still seems to be a `var_dump()` or `print_r()` statement.

To debug in a local environment, using the `var_dump()` method is probably acceptable. It’s fast and you don’t have any dependencies to worry about. But if the code already runs on a remote server, it’s a pain to push and deploy the code again and again just because you added or removed some simple debug statements.

Now imagine that you don’t have to repeat this push and deploy process to debug on a remote server – you can pause the script’s execution and watch the variables while editing your software in your IDE. That’s awesome! 

## Debugging PHP code
In this post, I’m going to show how I enabled this kind of painless debugging using this WordPress PHP code that’s hosted on cloudControl as an example. 

To do this, I needed the PHP extension XDebug installed on the server. The XDebug extension isn’t installed on cloudControl’s Pinky Stack by default. So following the steps on “Using self-compiled PHP libraries on cloudControl”, I prepared a `xdebug.sofile` and put it under a new `lib` folder. (You can download the xdebug.so file directly from here.)

Then I created a `xdebug.ini` file with the content:
~~~ini
[Xdebug]
zend_extension=/app/code/lib/xdebug.so
xdebug.remote_enable=1
xdebug.remote_host=<YOUR_LOCAL_IP>
~~~
(you can get your local IP from http://www.whatismyip.com/)

The structure of the new files should look like this:
~~~bash
.buildpack/
└── php
    └── conf
        └── xdebug.ini
lib
└── xdebug.so
~~~
That was all I needed on server side.

Locally, I only needed to configure the “Project URL” in the NetBeans (my preferred IDE) projects settings:

Now I’m ready to do some **serious** debugging. Yeah!

Note that since the local computer acts as a server, you’ll need to to unlock the Port 9000 on your local machine and enable the router’s port forwarding.
## Profiling
As long as we already have XDebug enabled, why not try out the powerful profiling feature?

To get profiling enabled, I only have to add a couple lines to the `xdebug.ini` file:
~~~ini
xdebug.profiler_enable=1
xdebug.profiler_output_dir=/app/code/tmp
~~~
While profiling, XDebug creates huge files, called `cachegrind.out.xxx`. These files are created in a relatively unintelligible format, so we’ll need an analyzing tool like Webgrind or kcachegrind to make some sense out of it.

I needed to set the `profiler_output_dir` to a writeable folder and a folder that is accessible by the webserver. I set the `APP_ROOT/tmp` folder as `profiler_output_dir`. But to be able to access this, I needed to convince Apache to list all `APP_ROOT/tmp` files. So I created a `APP_ROOT/tmp/.htaccess` file with the content:
~~~ini
Options +Indexes
~~~
Pushed and deployed to cloudControl and voilà, I had a new `cachegrind.out.xxx` file (25MB) in the tmp folder.

Note that the default of `xdebug.profiler_output_name` is `cachegrind.out.%p` with `%p` being  Apache’s process ID. That means only one cachegrind file will be created for every container (and overwritten with every request).

I use Webgrind because it’s so easy to get it running. I git-cloned it to an arbitrary folder, changed into it and started it with the PHP internal webserver.

I had to download the cachegrind file to the local tmp folder – this is the default folder which Webgrind scans (press the ‘update’ button).

But keep in mind, with each new deploy the cachegrind files are gone.

Ending?
