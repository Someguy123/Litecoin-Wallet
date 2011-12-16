<?php  include("core/header.php"); ?>

    <div class="container">
      <div class="content">
        <div class="page-header">
          <h1>Server Information <small>Debugging for admins...</small></h1>
        </div>
        <div class="row">
          <div class="span10">
            <?php
            include("core/bitcoin.inc");
            $btclient = new bitcoinClient("http","root","qwerty","localhost","9332");
            switch($_GET['debug']) {
                case "enable":
                    setcookie("debug", 1, time()+3600);
                    echo '<div class="alert-message error" data-alert="alert"><a class="close" onclick="\$().alert()" href="#">&times</a><p>Debugging enabled</p></div>';
                    break;
                case "disable":
                    setcookie("debug", 0, time()-3600);
                    echo '<div class="alert-message error" data-alert="alert"><a class="close" onclick="\$().alert()" href="#">&times</a><p>Debugging disabled</p></div>';
            }
            echo '<h3>Litecoind statistics</h3>
            <table class=\'zebra-striped\'>
            <tr><td>Server balance total: </td><td>' . $btclient->getbalance() . '</td></tr>
            <tr><td>Server block count: </td><td>' . $btclient->getblockcount() . '</td></tr>
            <tr><td>Server connection count: </td><td>' . $btclient->getconnectioncount() . '</td></tr>
            <tr><td>Server balance recieved: </td><td>' . $btclient->getreceivedbyaccount('server') . '</td></tr>
            <tr><td>Server address: </td><td>' . $btclient->getaccountaddress("server") . '</td></tr></table>';
            echo '<h3>Other information</h3>
            <table class=\'zebra-striped\'>
            <tr><td>Server Hostname: </td><td>' . $_SERVER['SERVER_NAME'] . '</td></tr>
            <tr><td>Server IP Address: </td><td>' . $_SERVER['SERVER_ADDR'] . '</td></tr>
            <tr><td>Server requested file: </td><td>' . $_SERVER['REQUEST_URI'] . '</td></tr>
            <tr><td>Server time: </td><td>' . date("D M j G:i:s T Y") . '</td></tr>
            <tr><td>Your IP/Host: </td><td>' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . '</td></tr></table>
            <a href="?debug=enable">Enable debugging</a><br />
            <a href="?debug=disable">Disable debugging</a>';
            ?>
          </div>
<?php include("core/sidebar.php"); ?>
        </div>
      </div>

<?php include("core/footer.php"); ?>