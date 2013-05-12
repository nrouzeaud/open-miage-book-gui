<!DOCTYPE HTML>
<html>
    <head>
        <title>OpenM-Book</title>
        {include file='include/head.tpl'}
        {include file='include/coreCSS.tpl'}
    </head>
    <body>
        {include file='include/navBar.tpl'}
        <nav id="menuMobile"></nav>
        <nav id="menuDesktop"></nav>
        <div id="loader" style="z-index: -1; position: absolute;left: 50%; top: 50%; margin-left: -16px; margin-top: -16px; ">
            <img src="{$resources_dir}OpenM-Book/gui/img/loader.gif"/>
        </div>
        <div class="container-fluid container-withmenunavigation">
            {include file='include/alert.tpl'}
            <div id="divParent"></div>
            <div id="divJSON"></div>
        </div>
        {include file='include/coreJS.tpl'}

        <!-- ForDEV  
<script src="{$resources_dir}OpenM-Book/gui/js/community/CommunityController.js"></script>
<script src="{$resources_dir}OpenM-Book/gui/js/community/CommunityDAO.js"></script>
<script src="{$resources_dir}OpenM-Book/gui/js/community/CommunityGUI.js"></script>
<script src="{$resources_dir}OpenM-Book/gui/js/menuGUI.js"></script>
<script src="{$resources_dir}OpenM-Book/gui/js/user/UserController.js"></script>
<script src="{$resources_dir}OpenM-Book/gui/js/user/UserDAO.js"></script>
<script src="{$resources_dir}OpenM-Book/gui/js/user/UserGUI.js"></script>
<script src="{$resources_dir}OpenM-SSO/gui/js/OpenM_SSOClientConnectionManager.js""></script>
<script src="{$clients_js}"></script>-->
        
       <script type="text/javascript">
            {include file='include/coreJS-initializing.tpl'}
        </script>
    </body>
</html>