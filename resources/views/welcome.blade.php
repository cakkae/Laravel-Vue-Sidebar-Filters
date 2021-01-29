<?php
    echo "<pre>";
        print_r(Cart::session(Auth::user()->id)->getContent());
    echo "</pre>";

