<?php
    defined('SYSPATH') OR die('No direct script access.');
    $error_id = uniqid('error');
?>

<?php
    // something like config data

    $background_color   = "#ef5350";
    $motive_color       = "#C62828";
    $font_color         = "#fff";


    $background_image   = "";

    //$background_image   = "http://1.bp.blogspot.com/-ZeMtUSzJgYg/VAGhLS_dA0I/AAAAAAAAE5E/xvZiDhX5FQI/s1600/Screen%2BShot%2B2014-08-30%2Bat%2B8.01.03%2Bpm.png";
    //$background_image   = "http://rustygate.org/wp-content/uploads/2016/10/maxresdefault-1140x641.jpg";
    //$background_image   = "http://c1.thejournal.ie/media/2014/10/screencap21-37-752x501.png";
?>

<script>
    // remove all previous content
    var e = document.body;
    e.innerHTML = "";
    var e = document.head;
    e.innerHTML = "";
</script>

<script type="text/javascript">
    document.documentElement.className = document.documentElement.className + ' js';
    function koggle(elem)
    {

        var element1 = document.querySelectorAll('.stack-link');

        [].forEach.call(element1, function(el) {
            el.classList.remove("active");
        });


        var element = document.getElementById("link-" + elem);
        element.classList.add("active");



        elem = document.getElementById(elem);

        var container = document.getElementById("code-block");

        container.innerHTML = elem.innerHTML;

        return false;
    }
</script>


<style type="text/css">

    body {
        padding-top: 50px;

        background-color: <?php echo $background_color;?>;

        <?php if($background_image != "") { ?>

        background: url(<?php echo $background_image; ?>);
        background-size: 100% 100%;
        background-attachment: fixed;

        <?php } ?>
    }
    <?php if($background_image != "") { ?>
        #mask {
            background: rgba(0,0,0,0.5);
            position: fixed;
            width:100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }
    <?php } ?>

    #kohana_error {
        max-width: 1300px;
        margin: 0 auto;
        z-index: 2;
        position: relative;
    }

    h1.debug-title .type {
        color: <?php echo $motive_color; ?>;
        font-weight: 100;
        font-size: 18px;

    }

    h1.debug-title .message {
        margin-top: -2px;
        display: block;
        font-weight: 100;
        font-size: 35px;
    }

    h1.debug-title .message .path {
        margin-top: 15px;
        display: block;
        font-size: 20px;
        font-weight: 100;
        color: <?php echo $font_color;?>;
        opacity: 0.6;
    }

    #code-block {
        height: 220px;
    }

    .box {
        margin-top: 40px;
        display: block;
    }

    .block-title {
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: -1px;
        color: <?php echo $font_color;?>;
        display: block;
    }
    
    .block-title:before {
        content: "";
        width: 30px;
        height: 2px;
        background: <?php echo $motive_color; ?>;
        display: block;
        margin-bottom: 5px;
    }

    .arrays-pre pre {
        padding: 10px;
        border-radius: 10px;
        background: rgba(0,0,0,0.6);
        color: <?php echo $font_color;?>;
    }

    #kohana_error {  font-size: 1em; font-family:sans-serif; text-align: left; color: #111; }
    #kohana_error h1,
    #kohana_error h1 a,
    #kohana_error h2 a { color: <?php echo $font_color;?>; }
    #kohana_error h3 { margin: 0; padding: 0.4em 0 0; font-size: 1em; font-weight: normal; }
    #kohana_error p { margin: 0; padding: 0.2em 0; }
    #kohana_error a { color: #1b323b; }
    #kohana_error pre { overflow: auto; white-space: pre-wrap; }
    #kohana_error table { width: 100%; display: block; margin: 0 0 0.4em; padding: 0; border-collapse: collapse; }
    #kohana_error table td { color: <?php echo $font_color;?>; text-align: left; vertical-align: top; padding: 0.4em; }
    #kohana_error div.content { padding: 0.4em 1em 1em; overflow: hidden; }
    #kohana_error pre.source { color: <?php echo $font_color;?>; }
    #kohana_error pre.source span.line { display: block; padding: 2px;  }
    #kohana_error pre.source span.highlight { background: <?php echo $motive_color; ?>; color: <?php echo $font_color;?>; border-radius: 4px; }
    #kohana_error pre.source span.line span.number { color: <?php echo $font_color;?>; }
    #kohana_error ol.trace { margin:0; padding: 0;  padding-left: 20px; margin-top: 20px; }
    #kohana_error ol.trace li { margin: 0; padding: 0; color: <?php echo $font_color;?>;  }
    #kohana_error ol.trace li p { color: <?php echo $font_color;?>;  }
    #kohana_error ol.trace li p a { color: <?php echo $font_color;?>; opacity: 0.6; text-decoration:  none}
    .js .collapsed { display: none; }

    a.active {
        color: <?php echo $motive_color; ?> !important;
    }

</style>

<body>
    <div id="mask">

    </div>

    <div id="kohana_error">
        <h1 class="debug-title">
            <span class="type">
                <?php echo $class ?> [ <?php echo $code ?> ]
            </span>
            <span class="message">
                <?php echo htmlspecialchars( (string) $message, ENT_QUOTES | ENT_IGNORE, Kohana::$charset, TRUE); ?>
                <span class="path">in <?php echo Debug::path($file) ?> line  <?php echo $line ?>
            </span>
        </h1>

        <div class="source-code box">
            <p class="block-title">Broken code</p>
            <div id="code-block">
                <?php echo Debug::source($file, $line) ?>
            </div>
        </div>

        <div class="box">
            <p class="block-title">Stack trace</p>
            <ol class="trace" id="stack">
                <?php foreach (Debug::trace($trace) as $i => $step): ?>
                    <li>
                        <p>
                            <span class="file">
                                <?php if ($step['file']): $source_id = $error_id.'source'.$i; ?>
                                    <a href="#<?php echo $source_id ?>" class="stack-link" id="link-<?php echo $source_id; ?>" onclick="return koggle('<?php echo $source_id ?>')"><?php echo Debug::path($step['file']) ?> [ <?php echo $step['line'] ?> ]</a>
                                <?php else: ?>
                                    {<?php echo __('PHP internal call') ?>}
                                <?php endif ?>
                            </span>
                            &raquo;
                            <?php echo $step['function'] ?>(<?php if ($step['args']): $args_id = $error_id.'args'.$i; ?><?php endif ?>)
                        </p>
                        <?php if (isset($args_id)): ?>
                            <div id="<?php echo $args_id ?>" class="collapsed">
                                <table cellspacing="0">
                                    <?php foreach ($step['args'] as $name => $arg): ?>
                                        <tr>
                                            <td><code><?php echo $name ?></code></td>
                                            <td><pre><?php echo Debug::dump($arg) ?></pre></td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        <?php endif ?>
                        <?php if (isset($source_id)): ?>
                            <pre id="<?php echo $source_id ?>" class="source collapsed"><code><?php echo $step['source'] ?></code></pre>
                        <?php endif ?>
                    </li>
                    <?php unset($args_id, $source_id); ?>
                <?php endforeach ?>
            </ol>
        </div>



        <!--
        <div class="arrays-pre box">
            <p class="block-title">Additional request information</p>
            <?php foreach (array('_SESSION', '_GET', '_POST', '_FILES', '_COOKIE', '_SERVER') as $var): ?>
                <?php if (empty($GLOBALS[$var]) OR ! is_array($GLOBALS[$var])) continue ?>
                <pre>$<?php echo $var; ?> <?php print_r($GLOBALS[$var]); ?></pre>
            <?php endforeach ?>
        </div>
        -->
    </div>
</body>

<?php exit; ?>

