<div class="row">
    <img src="<?php echo PUBLIC_PATH . 'img/pscc_logo.gif' ?>" />
</div>

<div class="row">
    <p>
    This is the prototype for an olnine app store, a place for Pellissippi
        students and faculty to show off various programs and applications
        they've created while at the school.
    </p>
    <p>
    This site was built for CSIT 2530 - Web Database Application Development.
    </p>
    <p>
    The site is driven by a MySQL database, written in PHP, and the visuals are 
        html5 and css3 using <a href="http://foundation.zurb.com/">Foundation 
        5.2.2</a> as a framework.
    </p>
    <p>
    The site's structure nd operation is based on the <a href="http://www.php-login.net/">
        PHP-MVC</a> project. It uses .htaccess to force all requests to index.php
        and append the entered url as a query string. The appication then parses
        that query and calls the approproate method of the appropriate controller.
    </p>
    <p>
    There is not a whole lot of functionality here yet -- I've concentrated more 
        on building solid groundwork for a secure PHP web application. So, you 
        upload your apps just yet, but you can register, upload an avatar,
        and change your email and password. Not a lot to get excited about from
        a user's perspective I know, but there's lot going on under the hood to 
        make it all happen in a (hopefully) secure and easily maintainable and 
        extensible way.
    </p>
    <p>
    So have a look around! Thanks for coming, and thanks to Professor Burlingame
        for a fun and eductional semester.
    </p>
    <p>
    The code for this project is available on my github repo 
        <a href="https://github.com/ajenshireman/csit2530">here</a>.
    </p>
</div>
