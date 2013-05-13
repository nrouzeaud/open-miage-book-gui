<!DOCTYPE HTML>
<html>
    <head>
        <title>OpenM-Book</title>
        {include file='include/head.tpl'}
        {include file='include/coreCSS.tpl'}
    </head>
</head>
<body>
    {include file='include/navBar.tpl'}
    <div class="container-fluid">
        {include file='include/alert.tpl'}

        <div class="row-fluid">
            <div class="span5 offset1">
                <form class="form-custom " method="POST" action="{$keepInform}">
                    <legend >Entrez votre email :</legend>                    
                    <div class="control-group">
                        <label class="control-label" for="email">Email :</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on">@</span>
                                <input required class="input-large" id="email" name="email" type="email" {if $email}value="{$email}"{/if} placeholder="email">
                            </div>                            
                        </div>
                    </div>                  
                    <div class="control-group">
                        <div class="controls">                        
                            <button type="submit" class="btn btn-success btn-large" name="submit"><i class="icon-white icon-ok"></i> Enregistrer</button>
                            <div class="visible-phone">
                                <br>
                                <a href="#Explication" class="text-info" >(Voir ci-dessous les explications)</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="span6">
                <div class="hero-unit">
                    <a name="Explication"></a>
                    
                    <legend><h2>Explications </h2></legend>
                    <p>Afin de pouvoir être informé dès que le service OpenM-Book sera prés, 
                        veuillez entrer votre email afin que nous puissions vous contacter.
                    </p>
                    <p>
                        Une fois le service pret, un email vous sera envoyé, et celui-ci sera supprimé de nos bases de données.
                    </p>                
                </div>
            </div>
        </div>
    </div>
    <footer id="footer" class="test">
      <div class="container">
        <p class="muted credit"> 
            <a target="_blank" href="{$mention}">Mention Legale</a> 
            - 
            Copyright © 2013 Open-MIAGE All Rights Reserved 
       </p>
      </div>
    </footer>                            
    {include file='include/commonJS.tpl'}
    <script>
       {literal}$(function (){
                    $('.close').click(function() {
                        $('.alert').hide('slow');
                        $('#afficher').show();
                    });});{/literal}
    </script>
</body>
</html>